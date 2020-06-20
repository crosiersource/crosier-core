<?php

namespace App\Form\Security;


use CrosierSource\CrosierLibBaseBundle\Entity\Security\Group;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\Role;
use CrosierSource\CrosierLibBaseBundle\Entity\Security\User;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\WhereBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserType
 * @package App\Form\Security
 * @author Carlos Eduardo Pauluk
 */
class UserType extends AbstractType
{

    private $doctrine;

    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', TextType::class, [
            'label' => 'Usuário',
            'attr' => ['style' => 'text-transform: none;']
        ]);

        $builder->add('nome', TextType::class, [
            'label' => 'Nome'
        ]);

        $builder->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'As senhas são diferentes.',
            'required' => false,
            'options' => [
                'always_empty' => true,
                'attr' => [
                    'class' => 'password-field',
                    'maxlength' => 52,
                    'autocomplete' => 'new-password'
                ]
            ],
            'help' => 'Máximo de 52 caracteres',
            'first_options' => ['label' => 'Senha'],
            'second_options' => ['label' => 'Repita a senha'],
        ]);

        $builder->add('email', EmailType::class, [
            'label' => 'E-mail',
            'attr' => ['style' => 'text-transform: none;']
        ]);

        $builder->add('isActive', ChoiceType::class, [
            'label' => 'Ativo',
            'choices' => [
                'Sim' => true,
                'Não' => false
            ],
            'attr' => [
                'class' => 'autoSelect2',
            ]
        ]);

        $builder->add('group', EntityType::class, [
            'label' => 'Grupo',
            'class' => Group::class,
            'choices' => $this->doctrine->getRepository(Group::class)->findAll(WhereBuilder::buildOrderBy('groupname')),
            'choice_label' => 'groupname',
            'attr' => [
                'class' => 'autoSelect2',
            ]
        ]);

        $builder->add('userRoles', EntityType::class, [
            'label' => 'Role',
            'class' => Role::class,
            'choices' => $this->doctrine->getRepository(Role::class)->findAll(WhereBuilder::buildOrderBy('role')),
            'multiple' => true,
            'choice_label' => 'Role',
            'expanded' => true
        ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class
        ));
    }
}