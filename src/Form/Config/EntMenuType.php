<?php

namespace App\Form\Config;

use App\Entity\Config\App;
use App\Entity\Config\EntMenu;
use App\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\WhereBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
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
        $builder->add('label', TextType::class, array(
            'label' => 'Label',
            'attr' => ['style' => 'text-transform: none;']
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

        $builder->add('program', EntityType::class, array(
            'label' => 'Programa',
            'class' => Program::class,
            'choices' => $this->doctrine->getRepository(Program::class)->findAll(WhereBuilder::buildOrderBy(['descricao'])),
            'choice_label' => function (Program $program) {
                return '[' . $program->getApp()->getNome() . '] ' . $program->getDescricao();
            },
            'required' => false,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ));

        $builder->add('pai', EntityType::class, array(
            'label' => 'Pai',
            'class' => EntMenu::class,
            'choices' => $this->doctrine->getRepository(EntMenu::class)->getMenusPaisOuDropdowns(),
            'choice_label' => 'label',
            'required' => false
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