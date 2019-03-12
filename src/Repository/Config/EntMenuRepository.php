<?php

namespace App\Repository\Config;

use App\Entity\Config\App;
use App\Entity\Config\AppConfig;
use App\Entity\Config\EntMenu;
use App\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
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

    public function getEntityClass()
    {
        return EntMenu::class;
    }

    /**
     * @return mixed
     */
    public function getSecurity(): Security
    {
        return $this->security;
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
        return $this->findBy(['pai' => null], ['ordem' => 'ASC']);
    }


    /**
     * @return array
     */
    public function getMenusPaisOuDropdowns(): array
    {
        $dql = "SELECT e FROM App\Entity\Config\EntMenu e WHERE e.pai IS NULL OR e.tipo = :tipo ORDER BY e.label";
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
                $entMenuPai = $this->find(1);
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
     * Monta o menu com somente aplicativos permitidos ao usuário logado.
     *
     * @return array
     */
    public function buildMenuByProgram(string $programUUID)
    {
        $entMenuPaiJson = $this->getEntMenuByProgramUUID($programUUID);
        if ($entMenuPaiJson) {
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
    public function buildMenuByEntMenuPai(EntMenu $entMenuPai)
    {

        $entsMenu = $this->findBy(['pai' => $entMenuPai], ['ordem' => 'ASC']);

        $rs = [];
        // Está no CrosierCore
        if ($entMenuPai->getId() === 1) {
            // Cria entradas para os Apps instalados
            $defaultEntMenuApps = $this->getEntityManager()->getRepository(App::class)->findDefaultEntMenuApps();
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
                    $token = $this->getSecurity()->getUser()->getApiToken();
                    $entMenuJson['program']['url'] = $url . $entMenuJson['program']['url'] . '?apiTokenAuthorization=' . $token;
                    $entMenuJson['label'] = $app->getNome();
                    $entMenuJson['cssStyle'] = 'background-color: darkblue';
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
    private function entMenuInJson(EntMenu $entMenu)
    {
        /** @var Program $program */
        $program = $this->getEntityManager()->getRepository(Program::class)->findOneBy(['UUID' => $entMenu->getProgramUUID()]);
        $app = null;
        if ($program) {
            /** @var App $app */
            $app = $this->getEntityManager()->getRepository(App::class)->findOneBy(['UUID' => $program->getAppUUID()]);
        }
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
        if ($entMenu->getFilhos() && $entMenu->getFilhos()->count() > 0) {
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
    public function makeTree(EntMenu $entMenuPai)
    {
        $ql = "SELECT e FROM App\Entity\Config\EntMenu e WHERE e.pai = :entMenuPai ORDER BY e.ordem";
        $qry = $this->getEntityManager()->createQuery($ql);
        $qry->setParameter('entMenuPai', $entMenuPai);

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
    private function getFilhos(EntMenu $pai, &$tree)
    {
        $ql = "SELECT e FROM App\Entity\Config\EntMenu e WHERE e.pai = :pai ORDER BY e.ordem";
        $qry = $this->getEntityManager()->createQuery($ql);
        $qry->setParameter('pai', $pai);
        $rs = $qry->getResult();
        if (count($rs) > 0) {
            foreach ($rs as $r) {
                $tree[] = $this->entMenuInJson($r);
                $this->getFilhos($r, $tree);
            }
        } else {
            return;
        }
    }
}
