<?php

namespace App\Form\Config;

use App\Entity\Config\App;
use App\Entity\Config\EntMenu;
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

        $builder->add('defaultEntMenuUUID', ChoiceType::class, array(
            'label' => 'Menu Padrão',
            'choices' => array_merge([null], $this->doctrine->getRepository(EntMenu::class)->findAll()),
            'choice_label' => function (?EntMenu $entMenu) {
                return $entMenu ? $entMenu->getLabel() : ' ';
            },
            'required' => false,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ));
        $builder->get('defaultEntMenuUUID')
            ->addModelTransformer(new CallbackTransformer(
                function (?string $entMenuUUID) {
                    if ($entMenuUUID) {
                        return $this->doctrine->getRepository(EntMenu::class)->findOneBy(['UUID' => $entMenuUUID]);
                    }
                    return null;
                },
                function (?EntMenu $entMenuUUID) {
                    if ($entMenuUUID) {
                        return $entMenuUUID->getUUID();
                    }
                    return null;
                }
            ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => App::class
        ));
    }
}