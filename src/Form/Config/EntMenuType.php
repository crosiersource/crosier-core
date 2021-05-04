<?php

namespace App\Form\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\Config\App;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenu;
use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\StringUtils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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

    public function __construct(EntityManagerInterface $doctrine)
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

        $builder->add('ordem', IntegerType::class, [
            'label' => 'Ordem',
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

        $rsApps = $this->doctrine->getRepository(App::class)->findAll();
        $choicesApps = [];
        /** @var App $app */
        foreach ($rsApps as $app) {
            $choicesApps[$app->getNome()] = $app->getUUID();
        }
        
        $builder->add('appUUID', ChoiceType::class, [
            'label' => 'App',
            'choices' => $choicesApps,
            'required' => true,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ]);

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

        $builder->add('yaml', TextareaType::class, [
            'label' => 'Yaml',
            'required' => false,
            'attr' => [
                'style' => 'text-transform: none; font-family: monospace; font-size: smaller;',
                'rows' => '20',
            ]
        ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => EntMenu::class
        ));
    }
}