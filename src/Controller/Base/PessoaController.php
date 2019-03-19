<?php

namespace App\Controller\Base;

use App\Business\Base\PessoaBusiness;
use App\Entity\Base\Pessoa;
use App\Entity\Config\App;
use App\Form\Base\PessoaType;
use App\Repository\Base\PessoaRepository;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PessoaController extends FormListController
{

    protected $crudParams =
        [
            'typeClass' => PessoaType::class,
            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'bse_pessoa_form',
            'formPageTitle' => 'Pessoa',
            'listView' => 'Base/pessoaList.html.twig',
            'listRoute' => 'bse_pessoa_list',
            'listRouteAjax' => 'bse_pessoa_datatablesJsList',
            'listPageTitle' => 'Pessoas',
            'listId' => 'pessoaList',
            'normalizedAttrib' => [
                'id',
                'nome',
            ],

        ];

    /** @var PessoaBusiness */
    private $pessoaBusiness;

    /**
     * @param mixed $pessoaBusiness
     */
    public function setPessoaBusiness(PessoaBusiness $pessoaBusiness): void
    {
        $this->pessoaBusiness = $pessoaBusiness;
    }


    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['nome'], 'LIKE', 'descricao', 'string', $params)
        ];
    }

    /**
     *
     * @Route("/bse/pessoa/form/{id}", name="bse_pessoa_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param app|null $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function form(Request $request, App $app = null)
    {
        return $this->doForm($request, $app);
    }

    /**
     *
     * @Route("/bse/pessoa/list/", name="bse_pessoa_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function list(Request $request): Response
    {
        return $this->doList($request);
    }

    /**
     *
     * @Route("/bse/pessoa/datatablesJsList/", name="bse_pessoa_datatablesJsList")
     * @param Request $request
     * @return Response
     * @throws \CrosierSource\CrosierLibBaseBundle\Exception\ViewException
     */
    public function datatablesJsList(Request $request): Response
    {
        return $this->doDatatablesJsList($request);
    }

    /**
     *
     * @Route("/bse/pessoa/delete/{pessoa}/", name="bse_pessoa_delete", requirements={"pessoa"="\d+"})
     * @param Request $request
     * @param Pessoa $pessoa
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Pessoa $pessoa): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $pessoa);
    }


    /**
     *
     * @Route("/bse/pessoa/findById/{id}", name="bse_pessoa_findById", requirements={"id"="\d+"}, methods={"GET","OPTIONS"})
     */
    public function findById(int $id)
    {
        try {
            $pessoa = $this->getDoctrine()->getRepository(Pessoa::class)->find($id);
            if (!$pessoa) {
                return new Response(json_encode(['msg' => 'Não encontrado']));
            } else {
                // $pessoa = $this->pessoaBusiness->fillTransients($pessoa);
                $normalizer = new ObjectNormalizer();
                $encoder = new JsonEncoder();
                $attributes = ['id', 'nome', 'nomeFantasia', 'documento', 'fone1', 'fone2',
                    'endereco' => ['id', 'bairro', 'cep', 'cidade', 'estado', 'complemento', 'logradouro', 'numero']
                ];
                $serializer = new Serializer(array($normalizer), array($encoder));
                $json = json_decode($serializer->serialize($pessoa, 'json', ['attributes' => $attributes]));
                return new JsonResponse([$json]);
            }
        } catch (\Exception $e) {
            return new Response(json_encode(['msg' => 'Erro']));
        }
    }





}