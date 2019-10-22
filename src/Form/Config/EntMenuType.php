<?php

namespace App\Form\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\Config\App;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenu;
use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\StringUtils;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class EntMenuType extends AbstractType
{

    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
            $entMenu = $event->getData();
            $builder = $event->getForm();

            if (!$entMenu->getId()) {
                $builder->get('UUID')->setData(StringUtils::guidv4());
            }
        });


        $builder->add('label', TextType::class, [
            'label' => 'Label',
            'attr' => ['style' => 'text-transform: none;']
        ]);


        $builder->add('UUID', TextType::class, [
            'label' => 'UUID',
            'attr' => ['style' => 'text-transform: none;'],
        ]);

        $builder->add('icon', TextType::class, [
            'label' => 'Ícone',
            'attr' => ['style' => 'text-transform: none;'],
            'required' => false
        ]);

        $builder->add('tipo', ChoiceType::class, [
            'label' => 'Tipo',
            'choices' => [
                'PAI' => 'PAI',
                'ENT' => 'ENT',
                'DROPDOWN' => 'DROPDOWN',
                'TITLE' => 'TITLE'
            ],
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ]);

        $builder->add('appUUID', ChoiceType::class, [
            'label' => 'App',
            'choices' => array_merge([null], $this->doctrine->getRepository(App::class)->findAll()),
            'choice_label' => function (?App $app) {
                return $app ? $app->getNome() : ' ';
            },
            'required' => true,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ]);
        $builder->get('appUUID')
            ->addModelTransformer(new CallbackTransformer(
                function (?string $appUUID) {
                    if ($appUUID) {
                        return $this->doctrine->getRepository(App::class)->findOneBy(['UUID' => $appUUID]);
                    }
                    return null;
                },
                function (?App $app) {
                    return $app ? $app->getUUID() : null;
                }
            ));

        $builder->add('paiUUID', ChoiceType::class, [
            'label' => 'Pai',
            'choices' => array_merge([null], $this->doctrine->getRepository(EntMenu::class)->findAll()),
            'choice_label' => function (?EntMenu $entMenu) {
                return $entMenu ? $entMenu->getLabel() : ' ';
            },
            'required' => false,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ]);
        $builder->get('paiUUID')
            ->addModelTransformer(new CallbackTransformer(
                function (?string $paiUUID) {
                    if ($paiUUID) {
                        return $this->doctrine->getRepository(EntMenu::class)->findOneBy(['UUID' => $paiUUID]);
                    }
                    return null;
                },
                function (?EntMenu $entMenu) {
                    if ($entMenu) {
                        return $entMenu->getUUID();
                    }
                    return null;
                }
            ));

        $builder->add('cssStyle', TextType::class, [
            'label' => 'CSS Style',
            'required' => false,
            'attr' => ['style' => 'text-transform: none;']
        ]);

        $builder->add('url', TextType::class, [
            'label' => 'URL',
            'required' => false,
            'attr' => ['style' => 'text-transform: none;']
        ]);

        $builder->add('roles', TextType::class, [
            'label' => 'Roles',
            'help' => 'Separadas por vírgulas',
            'required' => false,
        ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => EntMenu::class
        ));
    }
}