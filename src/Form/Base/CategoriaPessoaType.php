<?php

namespace App\Form\Base;

use App\Entity\Base\CategoriaPessoa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form para CategoriaPessoa.
 *
 * @package App\Form\Base
 * @author Carlos Eduardo Pauluk
 */
class CategoriaPessoaType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', HiddenType::class, array(
            'required' => false
        ));


        $builder->add('descricao', TextType::class, array(
            'label' => 'Descrição'
        ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CategoriaPessoa::class
        ));
    }

}