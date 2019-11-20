<?php

namespace App\Form\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenu;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenuLocator;
use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\StringUtils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class EntMenuLocatorType extends AbstractType
{

    private $doctrine;

    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

//        $builder->add('menuUUID', ChoiceType::class, [
//            'label' => 'Menu',
//            'choices' => array_merge([null], $this->doctrine->getRepository(EntMenu::class)->getMenusPais()),
//            'choice_label' => function (?EntMenu $entMenu) {
//                return $entMenu ? $entMenu->getLabel() : ' ';
//            },
//            'required' => false,
//            'attr' => ['class' => 'autoSelect2']
//        ]);
//        $builder->get('menuUUID')
//            ->addModelTransformer(new CallbackTransformer(
//                function (?string $menuUUID) {
//                    if ($menuUUID) {
//                        return $this->doctrine->getRepository(EntMenu::class)->findOneBy(['UUID' => $menuUUID]);
//                    }
//                    return null;
//                },
//                function (?EntMenu $entMenu) {
//                    if ($entMenu) {
//                        return $entMenu->getUUID();
//                    }
//                    return null;
//                }
//            ));

        $builder->add('id', HiddenType::class, [
            'required' => false,
        ]);

        $builder->add('menuUUID', HiddenType::class, [
            'required' => true,
            'attr' => ['style' => 'text-transform: none;']
        ]);

        $builder->add('quem', TextType::class, [
            'label' => 'Quem',
            'required' => true,
            'attr' => ['style' => 'text-transform: none;']
        ]);


        $builder->add('urlRegexp', TextType::class, [
            'label' => 'URL (Regexp)',
            'required' => true,
            'attr' => ['style' => 'text-transform: none;']
        ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => EntMenuLocator::class
        ));
    }
}