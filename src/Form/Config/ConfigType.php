<?php

namespace App\Form\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\Config\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class ConfigType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('chave', TextType::class, [
            'label' => 'Chave'
        ]);

        $builder->add('valor', TextType::class, [
            'label' => 'Valor',
            'attr' => ['style' => 'text-transform: none;']
        ]);

        $builder->add('obs', TextareaType::class, [
            'label' => 'Obs'
        ]);

        $builder->add('global', ChoiceType::class, [
            'choices' => [
                'Sim' => true,
                'Não' => false
            ],
            'attr' => ['class' => 'autoSelect2']
        ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Config::class
        ));
    }
}