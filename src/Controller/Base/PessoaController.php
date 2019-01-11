<?php

namespace App\Controller\Base;

use App\Business\Base\PessoaBusiness;
use App\Entity\Base\Pessoa;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PessoaController extends AbstractController
{

    private $pessoaBusiness;

    public function __construct(PessoaBusiness $pessoaBusiness)
    {
        Route::class;
        $this->pessoaBusiness = $pessoaBusiness;
    }

    /**
     *
     * @Route("/bse/pessoa/findByNome/{str}", name="bse_pessoa_findByNome")
     *
     */
    public function findByNome($str = null)
    {

        $repo = $this->getDoctrine()->getRepository(Pessoa::class);
        $pessoas = $repo->findAllByNome($str);

        $results = array('results' => $pessoas);

        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));
        $json = $serializer->serialize($results, 'json');

        return new Response($json);
    }

    /**
     *
     * @Route("/bse/pessoa/findByDocumento/{documento}", name="bse_pessoa_findByNome")
     *
     */
    public function findByDocumento($documento = null)
    {
        if ($documento == null) {
            return;
        }
        $repo = $this->getDoctrine()->getRepository(Pessoa::class);
        $pessoa = $repo->findByDocumento(preg_replace('/\D/', '', $documento));

        $pessoa = $this->pessoaBusiness->fillTransients($pessoa);

        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();

        $attributes = ['id', 'nome', 'nomeFantasia', 'documento', 'fone1', 'fone2',
                'endereco' => ['id', 'bairro', 'cep', 'cidade', 'estado', 'complemento', 'logradouro', 'numero']
            ];

        $serializer = new Serializer(array($normalizer), array($encoder));
        $json = $serializer->serialize($pessoa, 'json', ['attributes' => $attributes]);

        return new Response($json);
    }


}