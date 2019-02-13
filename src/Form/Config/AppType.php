<?php

namespace App\Form\Config;

use App\Entity\Config\App;
use App\Entity\Config\Modulo;
use App\Entity\Security\Role;
use App\Utils\Repository\WhereBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppType extends AbstractType
{

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

        $builder->add('route', TextType::class, array(
            'label' => 'Route',
            'attr' => ['style' => 'text-transform: none;'],
            'required' => false
        ));

        $builder->add('modulo', EntityType::class, array(
            'class' => Modulo::class,
            'choice_label' => 'nome'
        ));

        $builder->add('roles', EntityType::class, array(
            'label' => 'Role',
            'class' => Role::class,
            'choices' => $this->doctrine->getRepository(Role::class)->findAll(WhereBuilder::buildOrderBy('role')),
            'multiple' => true,
            'choice_label' => 'Role',
            'expanded' => true
        ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => App::class
        ));
    }
}