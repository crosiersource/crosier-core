<?php

namespace App\Form\Security;

use App\Entity\Security\Group;
use App\Entity\Security\Role;
use App\Entity\Security\User;
use App\Utils\Repository\WhereBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupType extends AbstractType
{

    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('groupname', TextType::class, array(
            'label' => 'Nome do Grupo'
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
            'data_class' => Group::class
        ));
    }
}