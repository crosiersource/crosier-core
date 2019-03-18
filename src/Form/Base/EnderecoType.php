<?php

namespace App\Form\Base;

use App\Entity\Base\EnderecoTrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form para entidade Endereco.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class EnderecoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('id', HiddenType::class, array(
            'required' => false,
            // atributo utilizado para que o javascript possa localizar facilmente este input
            'attr' => array(
                'class' => 'ID_ENTITY'
            )
        ));

        $builder->add('cep', TextType::class, array(
            'label' => 'CEP',
            'attr' => array(
                'class' => 'cep'
            ),
            'required' => false
        ));

        $builder->add('logradouro', TextType::class, array(
            'label' => 'Logradouro',
            'required' => false
        ));
        $builder->add('numero', TextType::class, array(
            'label' => 'Número',
            'required' => false
        ));
        $builder->add('complemento', TextType::class, array(
            'label' => 'Complemento',
            'required' => false
        ));
        $builder->add('bairro', TextType::class, array(
            'label' => 'Bairro',
            'required' => false
        ));
        $builder->add('cidade', TextType::class, array(
            'label' => 'Cidade',
            'required' => false
        ));

        $builder->add('tipoEndereco', ChoiceType::class, array(
            'label' => 'Tipo',
            'choices' => array(
                'COMERCIAL' => 'COMERCIAL',
                'RESIDENCIAL' => 'RESIDENCIAL',
                'OUTROS' => 'OUTROS'),
            'required' => false));

        $builder->add('estado', ChoiceType::class, array(
            'label' => 'Estado',
            'choices' => array(
                'Acre' => 'AC',
                'Alagoas' => 'AL',
                'Amapá' => 'AP',
                'Amazonas' => 'AM',
                'Bahia' => 'BA',
                'Ceará' => 'CE',
                'Distrito Federal' => 'DF',
                'Espírito Santo' => 'ES',
                'Goiás' => 'GO',
                'Maranhão' => 'MA',
                'Mato Grosso' => 'MT',
                'Mato Grosso do Sul' => 'MS',
                'Minas Gerais' => 'MG',
                'Pará' => 'PA',
                'Paraíba' => 'PB',
                'Paraná' => 'PR',
                'Pernambuco' => 'PE',
                'Piauí' => 'PI',
                'Rio de Janeiro' => 'RJ',
                'Rio Grande do Norte' => 'RN',
                'Rio Grande do Sul' => 'RS',
                'Rondônia' => 'RO',
                'Roraima' => 'RR',
                'Santa Catarina' => 'SC',
                'São Paulo' => 'SP',
                'Sergipe' => 'SE',
                'Tocantins' => 'TO'
            ),
            'required' => false
        ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => EnderecoTrait::class
        ));
    }

}