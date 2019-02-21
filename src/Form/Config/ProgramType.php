<?php

namespace App\Form\Config;

use App\Entity\Config\App;
use App\Entity\Config\Modulo;
use App\Entity\Config\Program;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgramType extends AbstractType
{
    /** @var RegistryInterface */
    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descricao', TextType::class, array(
            'label' => 'Descrição'
        ));

        $builder->add('uuid', TextType::class, array(
            'label' => 'UUID'
        ));

        $builder->add('url', TextType::class, array(
            'label' => 'URL',
            'attr' => ['style' => 'text-transform: none;'],
            'required' => false
        ));

        $builder->add('app', EntityType::class, array(
            'class' => App::class,
            'choice_label' => 'nome'
        ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Program::class
        ));
    }
}