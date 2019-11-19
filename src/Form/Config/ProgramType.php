<?php

namespace App\Form\Config;

use CrosierSource\CrosierLibBaseBundle\Entity\Config\App;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\EntMenu;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\WhereBuilder;
use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\StringUtils;
use Doctrine\Common\Persistence\ManagerRegistry;
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
class ProgramType extends AbstractType
{
    /** @var ManagerRegistry */
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
            /** @var Program $program */
            $program = $event->getData();
            $builder = $event->getForm();

            if (!$program->getId()) {
                $builder->get('UUID')->setData(StringUtils::guidv4());
            }
        });

        $builder->add('descricao', TextType::class, [
            'label' => 'Descrição'
        ]);

        $builder->add('UUID', TextType::class, [
            'label' => 'UUID',
            'attr' => [
                'class' => 'notuppercase'
            ]
        ]);

        $builder->add('url', TextType::class, [
            'label' => 'URL',
            'attr' => ['style' => 'text-transform: none;'],
            'required' => false
        ]);

        $builder->add('appUUID', ChoiceType::class, [
            'label' => 'App',
            'choices' => array_merge([null], $this->doctrine->getRepository(App::class)->findAll(WhereBuilder::buildOrderBy(['nome']))),
            'choice_label' => function (?App $app) {
                return $app ? $app->getNome() : ' ';
            },
            'required' => false,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ]);
        $builder->get('appUUID')
            ->addModelTransformer(new CallbackTransformer(
                function (?string $appUUID) {
                    if ($appUUID) {
                        return $this->doctrine->getRepository(App::class)->findOneBy(['UUID' => $appUUID]);
                    }
                    return null;
                },
                function (?App $app) {
                    if ($app) {
                        return $app->getUUID();
                    }
                    return null;
                }
            ));

        $builder->add('entMenuUUID', ChoiceType::class, [
            'label' => 'Menu',
            'choices' => array_merge([null], $this->doctrine->getRepository(EntMenu::class)->findAll()),
            'choice_label' => function (?EntMenu $entMenu) {
                return $entMenu ? $entMenu->getLabel() : ' ';
            },
            'required' => false,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ]);
        $builder->get('entMenuUUID')
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
            'data_class' => Program::class
        ));
    }
}