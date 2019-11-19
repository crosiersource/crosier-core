<?php

namespace App\Form\Base;

use CrosierSource\CrosierLibBaseBundle\Entity\Base\CategoriaPessoa;
use CrosierSource\CrosierLibBaseBundle\Entity\Base\Pessoa;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\WhereBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class PessoaType extends AbstractType
{

    /** @var ManagerRegistry */
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', HiddenType::class, array(
            'required' => false
        ));

        $builder->add('tipo', ChoiceType::class, array(
            'label' => 'Tipo',
            'choices' => array(
                'Pessoa Física' => 'Pessoa Física',
                'Pessoa Jurídica' => 'Pessoa Jurídica'
            ),
            'required' => true,
            'attr' => [
                'class' => 'autoSelect2 focusOnReady'
            ]
        ));

        $builder->add('documento', TextType::class, array(
            'required' => false
        ));

        $builder->add('nome', TextType::class, array(
            'required' => true
        ));

        $builder->add('nomeFantasia', TextType::class, array(
            'label' => 'Nome Fantasia',
            'required' => false
        ));

        $builder->add('inscricaoEstadual', TextType::class, array(
            'label' => 'Inscr Est',
            'required' => false
        ));

        $builder->add('rg', TextType::class, array(
            'label' => 'RG',
            'required' => false
        ));

        $builder->add('categorias', EntityType::class, array(
            'label' => 'Categoria',
            'class' => CategoriaPessoa::class,
            'choices' => $this->doctrine->getRepository(CategoriaPessoa::class)->findAll(WhereBuilder::buildOrderBy(['descricao'])),
            'choice_label' => 'descricao',
            'multiple' => true,
            'attr' => [
                'class' => 'autoSelect2'
            ]
        ));


        $builder->add('obs', TextareaType::class, array(
            'label' => 'Obs',
            'attr' => array(
                'class' => ''
            ),
            'required' => false
        ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Pessoa::class
        ));
    }

}