<?php

namespace App\Form\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\Base\PessoaContato;
use CrosierSource\CrosierLibBaseBundle\Repository\Base\PessoaContatoRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\AbstractType;
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
class PessoaContatoType extends AbstractType
{

    /** @var RegistryInterface */
    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $defaults = [
            'FONE COMERCIAL',
            'FONE RESIDENCIAL',
            'FAX',
            'CELULAR',
            'CELULAR (WHATSAPP)',
            'E-MAIL PESSOAL',
            'E-MAIL PROFISSIONAL',
            'WEBSITE',
            'PERFIL FACEBOOK',
            'PERFIL INSTAGRAM',
            'PERFIL LINKEDIN'
        ];

        /** @var PessoaContatoRepository $repo */
        $repo = $this->doctrine->getRepository(PessoaContato::class);
        $todos = array_merge($repo->getAllTipos(), $defaults);
        foreach ($todos as $t) {
            $todosK[$t] = $t;
        }

        $builder->add('tipo', ChoiceType::class, array(
            'label' => 'Tipo',
            'choices' => $todosK,
            'attr' => [
                'class' => 'focusOnReady autoSelect2',
                'data-s2allownew' => 'true'

            ]
        ));

        $builder->add('valor', TextType::class, array(
            'label' => 'Contato',
            'attr' => [
                'class' => 'notuppercase'
            ]
        ));

        $builder->add('obs', TextType::class, array(
            'label' => 'Obs',
            'required' => false
        ));

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $tipo = $event->getData()['tipo'] ? $event->getData()['tipo'] : null;
                $choices = [$tipo];
                $form->remove('tipo');
                $form->add('tipo', ChoiceType::class, array(
                    'choices' => $choices
                ));
            }
        );


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PessoaContato::class
        ));
    }
}