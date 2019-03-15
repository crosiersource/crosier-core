<?php

namespace App\Form\Config;

use App\Entity\Config\EntMenu;
use App\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\WhereBuilder;
use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\StringUtils;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
 * Class EntMenuType
 *
 * @package App\Form\Config
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


        $builder->add('label', TextType::class, array(
            'label' => 'Label',
            'attr' => ['style' => 'text-transform: none;']
        ));


        $builder->add('UUID', TextType::class, array(
            'label' => 'UUID',
            'attr' => ['style' => 'text-transform: none;'],
        ));

        $builder->add('icon', TextType::class, array(
            'label' => 'Ícone',
            'attr' => ['style' => 'text-transform: none;'],
            'required' => false
        ));

        $builder->add('tipo', ChoiceType::class, array(
            'label' => 'Tipo',
            'choices' => array(
                'ENT' => 'ENT',
                'DROPDOWN' => 'DROPDOWN',
                'TITLE' => 'TITLE'
            ),
        ));

        $builder->add('programUUID', ChoiceType::class, array(
            'label' => 'Programa',
            'choices' => array_merge([null], $this->doctrine->getRepository(Program::class)->findAll(WhereBuilder::buildOrderBy(['descricao']))),
            'choice_label' => function (?Program $program) {
                return $program ? $program->getDescricao() : ' ';
            },
            'required' => false,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ));

        $builder->get('programUUID')
            ->addModelTransformer(new CallbackTransformer(
                function (?string $programUUID) {
                    if ($programUUID) {
                        return $this->doctrine->getRepository(Program::class)->findOneBy(['UUID' => $programUUID]);
                    }
                    return null;
                },
                function (?Program $program) {
                    if ($program) {
                        return $program->getUUID();
                    }
                    return null;
                }
            ));


        $builder->add('paiUUID', ChoiceType::class, array(
            'label' => 'Pai',
            'choices' => array_merge([null], $this->doctrine->getRepository(EntMenu::class)->findAll()),
            'choice_label' => function (?EntMenu $entMenu) {
                return $entMenu ? $entMenu->getLabel() : ' ';
            },
            'required' => false,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ));
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


        $builder->add('cssStyle', TextType::class, array(
            'label' => 'CSS Style',
            'required' => false,
            'attr' => ['style' => 'text-transform: none;']
        ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => EntMenu::class
        ));
    }
}