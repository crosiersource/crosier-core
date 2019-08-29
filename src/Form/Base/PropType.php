<?php

namespace App\Form\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\Base\Prop;
use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\StringUtils;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class PropType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
            /** @var Prop $prop */
            $app = $event->getData();
            $builder = $event->getForm();

            if (!$app->getId()) {
                $builder->get('UUID')->setData(StringUtils::guidv4());
            }
        });

        $builder->add('UUID', TextType::class, array(
            'label' => 'UUID',
            'attr' => [
                'class' => 'notuppercase'
            ]
        ));

        $builder->add('nome', TextType::class, array(
            'label' => 'Nome'
        ));

        $builder->add('obs', TextareaType::class, array(
            'label' => 'Obs'
        ));

        $builder->add('valores', TextareaType::class, array(
            'label' => 'Valores'
        ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Prop::class
        ));
    }
}