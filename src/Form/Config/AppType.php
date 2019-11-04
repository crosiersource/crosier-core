<?php

namespace App\Form\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenu;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\App;
use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\StringUtils;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class AppType extends AbstractType
{

    /** @var RegistryInterface */
    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
            /** @var App $app */
            $app = $event->getData();
            $builder = $event->getForm();

            if (!$app->getId()) {
                $builder->get('UUID')->setData(StringUtils::guidv4());
            }
        });

        $builder->add('nome', TextType::class, array(
            'label' => 'Nome',
            'attr' => [
                'class' => 'notuppercase'
            ]
        ));

        $builder->add('UUID', TextType::class, array(
            'label' => 'UUID',
            'attr' => [
                'class' => 'notuppercase'
            ]
        ));

        $builder->add('obs', TextType::class, array(
            'label' => 'Obs',
            'required' => false
        ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => App::class
        ));
    }
}