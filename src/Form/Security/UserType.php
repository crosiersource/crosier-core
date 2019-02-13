<?php

namespace App\Form\Security;

use App\Entity\Security\Group;
use App\Entity\Security\Role;
use App\Entity\Security\User;
use App\Utils\Repository\WhereBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{

    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', TextType::class, array(
            'label' => 'Usuário',
            'attr' => ['style' => 'text-transform: none;']
        ));

        $builder->add('nome', TextType::class, array(
            'label' => 'Nome'
        ));

        $builder->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'invalid_message' => 'As senhas são diferentes.',
            'required' => false,
            'options' => array('always_empty' => true, 'attr' => array('class' => 'password-field')),
            'first_options'  => array('label' => 'Senha'),
            'second_options' => array('label' => 'Repita a senha'),
        ));

        $builder->add('email', EmailType::class, array(
            'label' => 'E-mail',
            'attr' => ['style' => 'text-transform: none;']
        ));

        $builder->add('isActive', ChoiceType::class, array(
            'label' => 'Ativo',
            'choices' => array(
                'Sim' => true,
                'Não' => false
            )
        ));

        $builder->add('group', EntityType::class, array(
            'label' => 'Grupo',
            'class' => Group::class,
            'choices' => $this->doctrine->getRepository(Group::class)->findAll(WhereBuilder::buildOrderBy('groupname')),
            'choice_label' => 'groupname'
        ));

        $builder->add('userRoles', EntityType::class, array(
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
            'data_class' => User::class
        ));
    }
}