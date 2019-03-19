<?php

namespace App\Form\Base;

use App\Entity\Base\Pessoa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form para Pessoa.
 *
 * @package App\Form\Security
 * @author Carlos Eduardo Pauluk
 */
class PessoaType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome', TextType::class, array(
            'label' => 'Nome'
        ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Pessoa::class
        ));
    }
}