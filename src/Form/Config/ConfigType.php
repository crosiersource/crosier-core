<?php

namespace App\Form\Config;

use App\Entity\Config\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ConfigType
 *
 * @package App\Form\Config
 * @author Carlos Eduardo Pauluk
 */
class ConfigType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('chave', TextType::class, array(
            'label' => 'Chave'
        ));

        $builder->add('valor', TextType::class, array(
            'label' => 'Valor',
            'attr' => ['style' => 'text-transform: none;']
        ));

        $builder->add('obs', TextareaType::class, array(
            'label' => 'Obs'
        ));

        $builder->add('global', ChoiceType::class, array(
            'choices' => array(
                'Sim' => true,
                'Não' => false
            )
        ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Config::class
        ));
    }
}