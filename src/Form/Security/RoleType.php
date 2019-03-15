<?php

namespace App\Form\Security;


use CrosierSource\CrosierLibBaseBundle\Entity\Security\Role;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RoleType
 * @package App\Form\Security
 * @author Carlos Eduardo Pauluk
 */
class RoleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('role', TextType::class, array(
            'label' => 'Role'
        ));

        $builder->add('descricao', TextType::class, array(
            'label' => 'Descrição',
            'required' => false
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Role::class
        ));
    }
}