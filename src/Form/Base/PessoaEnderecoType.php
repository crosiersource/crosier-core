<?php

namespace App\Form\Base;


use App\Entity\Base\PessoaEndereco;
use CrosierSource\CrosierLibBaseBundle\Form\Traits\EnderecoTypeTrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PessoaEnderecoType
 *
 * @package App\Form\Base
 * @author Carlos Eduardo Pauluk
 */
class PessoaEnderecoType extends AbstractType
{

    use EnderecoTypeTrait;

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PessoaEndereco::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'endereco';
    }

}