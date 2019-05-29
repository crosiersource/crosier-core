<?php

namespace App\Controller\Base\API;

use App\Entity\Base\Pessoa;
use App\Entity\Base\PessoaContato;
use App\Entity\Base\PessoaEndereco;
use App\EntityHandler\Base\PessoaEntityHandler;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseAPIEntityIdController;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use CrosierSource\CrosierLibBaseBundle\Utils\APIUtils\APIProblem;
use CrosierSource\CrosierLibBaseBundle\Utils\EntityIdUtils\EntityIdUtils;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


/**
 * Class PessoaAPIController.
 *
 * @package App\Controller\Base\API
 * @author Carlos Eduardo Pauluk
 */
class PessoaAPIController extends BaseAPIEntityIdController
{

    /** @var PessoaEntityHandler */
    protected $entityHandler;

    /**
     * @required
     * @param PessoaEntityHandler $entityHandler
     */
    public function setEntityHandler(PessoaEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }


    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Pessoa::class;
    }


    /**
     *
     * @Route("/api/bse/pessoa/findById/{id}", name="api_bse_pessoa_findById", requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return $this->doFindById($id);
    }


    /**
     *
     * @Route("/api/bse/pessoa/findByFilters/", name="api_bse_pessoa_findByFilters")
     * @param Request $request
     * @return JsonResponse
     */
    public function findByFilters(Request $request): JsonResponse
    {
        return $this->doFindByFilters($request);
    }

    /**
     *
     * @Route("/api/bse/pessoa/getNew", name="api_bse_pessoa_getNew")
     * @return JsonResponse
     */
    public function getNew(): JsonResponse
    {
        $pessoa = new Pessoa();
        $pessoa->addEndereco(new PessoaEndereco());
        $pessoa->addContato(new PessoaContato());
        return new JsonResponse(['entity' => EntityIdUtils::serialize($pessoa)]);
    }


    /**
     *
     * @Route("/api/bse/pessoa/save", name="api_bse_pessoa_save")
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse
    {
        return $this->doSave($request);
    }


    /**
     *
     * @Route("/api/bse/pessoa/findByStr/{str}", name="api_bse_pessoa_findByStr")
     * @param string $str
     * @return JsonResponse
     */
    public function findByStr(string $str): JsonResponse
    {
        $filters =
            [
                ['nome', 'nomeFantasia', 'documento'],
                'LIKE',
                '%' . $str . '%'
            ];
        try {
            $filterDatas = [];
            foreach ($filters as $filterArray) {
                $filterDatas[] = FilterData::fromArray($filters);
            }
            /** @var FilterRepository $repo */
            $repo = $this->getDoctrine()->getRepository($this->getEntityClass());
            $r = $repo->findByFilters($filterDatas, ['e.nome' => 'ASC'], 0, 100);
            $this->handleFindByFilters($r);

            $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
            $serializer = new Serializer([new DateTimeNormalizer(), new ObjectNormalizer($classMetadataFactory)]);
            $serialized = $serializer->normalize($r, 'json',
                ['groups' => ['entity', 'entityId']]);
            $results = array('results' => $serialized);
            return new JsonResponse($results);
        } catch (\Throwable $e) {
            return (new APIProblem(
                400,
                ApiProblem::TYPE_INTERNAL_ERROR
            ))->toJsonResponse();
        }

    }


}
