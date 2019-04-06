<?php

namespace App\Repository\Config;

use App\Entity\Config\App;
use App\Entity\Config\AppConfig;
use App\Entity\Config\EntMenu;
use App\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use Doctrine\ORM\NonUniqueResultException;
use http\Exception\RuntimeException;
use Symfony\Component\Security\Core\Security;

/**
 * Repository para a entidade EntMenu.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class EntMenuRepository extends FilterRepository
{

    private $security;

    public function getEntityClass(): string
    {
        return EntMenu::class;
    }

    /**
     * @required
     * @param mixed $security
     */
    public function setSecurity(Security $security): void
    {
        $this->security = $security;
    }

    /**
     * @return array
     */
    public function getMenusPais(): array
    {
        return $this->findBy(['paiUUID' => null, 'tipo' => 'PAI'], ['ordem' => 'ASC']);
    }


    /**
     * @return array
     */
    public function getMenusPaisOuDropdowns(): array
    {
        $dql = "SELECT e FROM App\Entity\Config\EntMenu e WHERE e.paiUUID IS NULL OR e.tipo = :tipo ORDER BY e.label";
        $qry = $this->getEntityManager()->createQuery($dql);
        $qry->setParameter('tipo', 'DROPDOWN');
        return $qry->getResult();
    }

    /**
     * @param string $programUUID
     * @return array|null
     */
    public function getEntMenuByProgramUUID(string $programUUID)
    {
        /** @var Program $program */
        $program = $this->getEntityManager()->getRepository(Program::class)->findOneBy(['UUID' => $programUUID]);
        if ($program) {
            /** @var EntMenu $entMenuPai */
            $entMenuPai = null;
            if ($program->getEntMenuUUID()) {
                $entMenuPai = $this->findOneBy(['UUID' => $program->getEntMenuUUID()]);
            } else if ($program->getAppUUID()) {
                /** @var App $app */
                $app = $this->getEntityManager()->getRepository(App::class)->findOneBy(['UUID' => $program->getAppUUID()]);
                $entMenuPai = $this->findOneBy(['UUID' => $app->getDefaultEntMenuUUID()]);
            } else {
                $entMenuPai = $this->findOneBy(['UUID' => '71d1456b-3a9f-4589-8f71-42bbf6c91a3e']);
            }
            $rEntMenu = [
                'id' => $entMenuPai->getId(),
                'UUID' => $entMenuPai->getUUID(),
                'label' => $entMenuPai->getLabel(),
                'icon' => $entMenuPai->getIcon(),
                'tipo' => $entMenuPai->getTipo(),
                'ordem' => $entMenuPai->getOrdem()
            ];

            return $rEntMenu;
        }
        return null;

    }

    /**
     *
     * @param string $programUUID
     * @return array
     */
    public function buildMenuByProgram(string $programUUID): array
    {
        /** @var EntMenu $entMenuPaiJson */
        $entMenuPaiJson = $this->getEntMenuByProgramUUID($programUUID);
        if ($entMenuPaiJson) {
            /** @var EntMenu $entMenuPai */
            $entMenuPai = $this->find($entMenuPaiJson['id']);
            if ($entMenuPai) {
                return $this->buildMenuByEntMenuPai($entMenuPai);
            }
        }
        return null;
    }

    /**
     * @param EntMenu $entMenuPai
     * @return array
     */
    public function buildMenuByEntMenuPai(EntMenu $entMenuPai): array
    {
        $entsMenu = $this->findBy(['paiUUID' => $entMenuPai->getUUID()], ['ordem' => 'ASC']);

        $rs = [];
        // Está no CrosierCore
        if ($entMenuPai->getUUID() === '71d1456b-3a9f-4589-8f71-42bbf6c91a3e') {
            // Cria entradas para os Apps instalados
            $defaultEntMenuApps = $this->findBy(['tipo' => 'CROSIERCORE_APPENT']);
            /** @var EntMenu $defaultEntMenuApp */
            foreach ($defaultEntMenuApps as $defaultEntMenuApp) {
                if ($defaultEntMenuApp->getProgramUUID()) {
                    /** @var ProgramRepository $programRepo */
                    $programRepo = $this->getEntityManager()->getRepository(Program::class);
                    /** @var Program $program */
                    $program = $programRepo->findOneBy(['UUID' => $defaultEntMenuApp->getProgramUUID()]);
                    $programRepo->buildTransients($program);
                    $app = $program->getApp();
                    $url = $this->getEntityManager()->getRepository(AppConfig::class)->findConfigByCrosierEnv($app, 'URL');
                    $entMenuJson = $this->entMenuInJson($defaultEntMenuApp);
                    $token = $this->security->getUser()->getApiToken();
                    $entMenuJson['program']['url'] = $url . $entMenuJson['program']['url'] . '?apiTokenAuthorization=' . $token;
//                    $entMenuJson['label'] = $app->getNome();
//                    $entMenuJson['cssStyle'] = 'background-color: darkblue';
                    $rs[] = $entMenuJson;
                }
            }
        }

        $rs[] = ['tipo' => 'hr'];

        /** @var EntMenu $entMenu */
        foreach ($entsMenu as $entMenu) {
            $entMenuInJson = $this->entMenuInJson($entMenu);
            $this->addFilhosInJson($entMenu, $entMenuInJson);
            $rs[] = $entMenuInJson;
        }
        return $rs;
    }

    /**
     * @param EntMenu $entMenu
     * @return array
     */
    private function entMenuInJson(EntMenu $entMenu): array
    {
        /** @var Program $program */
        $program = $this->getEntityManager()->getRepository(Program::class)->findOneBy(['UUID' => $entMenu->getProgramUUID()]);
        $app = null;
        if ($program) {
            /** @var App $app */
            $app = $this->getEntityManager()->getRepository(App::class)->findOneBy(['UUID' => $program->getAppUUID()]);
        }
        $this->fillTransients($entMenu);
        return [
            'id' => $entMenu->getId(),
            'label' => $entMenu->getLabel(),
            'icon' => $entMenu->getIcon(),
            'tipo' => $entMenu->getTipo(),
            'ordem' => $entMenu->getOrdem(),
            'cssStyle' => $entMenu->getCssStyle(),
            'pai' => [
                'id' => $entMenu->getPai() ? $entMenu->getPai()->getId() : null,
                'tipo' => $entMenu->getPai() ? $entMenu->getPai()->getTipo() : null,
                'icon' => $entMenu->getPai() ? $entMenu->getPai()->getIcon() : null,
                'label' => $entMenu->getPai() ? $entMenu->getPai()->getLabel() : null
            ],
            'program' => [
                'id' => $program ? $program->getId() : null,
                'descricao' => $program ? $program->getDescricao() : null,
                'url' => $program ? $program->getUrl() : null,
                'UUID' => $program ? $program->getUUID() : null,
                'app' => [
                    'id' => $app ? $app->getId() : null,
                    'nome' => $app ? $app->getNome() : null

                ]
            ]
        ];
    }

    /**
     * @param EntMenu $entMenu
     * @param array $json
     * @return array
     */
    private function addFilhosInJson(EntMenu $entMenu, array &$json): array
    {
        $this->fillTransients($entMenu);
        if ($entMenu->getFilhos() && count($entMenu->getFilhos()) > 0) {
            foreach ($entMenu->getFilhos() as $filho) {
                $filhoJson = $this->entMenuInJson($filho);
                $this->addFilhosInJson($filho, $filhoJson);
                $json['filhos'][] = $filhoJson;
            }
        }
        return $json;
    }


    /**
     * Cria a árvore do menu para ser manipulada na tela de organização de menus.
     *
     * @param EntMenu $entMenuPai
     * @return array
     */
    public function makeTree(EntMenu $entMenuPai): array
    {
        $ql = "SELECT e FROM App\Entity\Config\EntMenu e WHERE e.paiUUID = :entMenuPaiUUID ORDER BY e.ordem";
        $qry = $this->getEntityManager()->createQuery($ql);
        $qry->setParameter('entMenuPaiUUID', $entMenuPai->getUUID());

        $pais = $qry->getResult();

        $tree = array();

        foreach ($pais as $pai) {
            $tree[] = $this->entMenuInJson($pai);
            $this->getFilhos($pai, $tree);
        }
        return $tree;
    }

    /**
     * @param EntMenu $pai
     * @param $tree
     */
    private function getFilhos(EntMenu $pai, &$tree): void
    {
        $this->fillTransients($pai);
        if ($pai->getFilhos()) {
            $filhos = $pai->getFilhos();
            foreach ($filhos as $filho) {
                $tree[] = $this->entMenuInJson($filho);
                $this->getFilhos($filho, $tree);
            }
        } else {
            return;
        }
    }


    /**
     * Preenche os atributos transientes.
     *
     * @param EntMenu $entMenu
     */
    public function fillTransients(EntMenu $entMenu): void
    {
        if ($entMenu->getPaiUUID()) {
            if (!$entMenu->getPai()) {
                $pai = $this->findOneBy(['UUID' => $entMenu->getPaiUUID()]);
                $entMenu->setPai($pai);
            }

            if (!$entMenu->getFilhos()) {
                $filhos = $this->findBy(['paiUUID' => $entMenu->getUUID()],['ordem' => 'ASC']);
                $entMenu->setFilhos($filhos);
            }
        }

    }

    /**
     * @param string $appUUID
     * @return mixed
     */
    public function findAppMainProgramUUID(string $appUUID) {
        try {
            $dql = 'SELECT p FROM App\Entity\Config\EntMenu e JOIN App\Entity\Config\Program p WITH e.programUUID = p.UUID WHERE p.appUUID = :appUUID AND e.tipo = \'CROSIERCORE_APPENT\'';
            $qry = $this->getEntityManager()->createQuery($dql);
            $qry->setParameter('appUUID', $appUUID);
            return $qry->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            throw new \RuntimeException($e->getMessage());
        }
    }

}
