<?php

namespace App\Repository\Config;

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
     * Monta o menu com somente aplicativos permitidos ao usuário logado.
     *
     * @return array
     */
    public function buildMenuByProgram(string $programUUID)
    {
        /** @var Program $program */
        $program = $this->_em->getRepository(Program::class)->findOneBy(['uuid' => $programUUID]);

        $entMenuPai = null;
        if ($program->getEntMenu()) {
            $entMenuPai = $program->getEntMenu();
        } else if ($program->getApp()->getDefaultEntMenu()) {
            $entMenuPai = $program->getApp()->getDefaultEntMenu();
        } else {
            $entMenuPai = $this->find(1);
        }

        $entsMenu = $this->findBy(['pai' => $entMenuPai], ['ordem' => 'ASC']);

        /** @var EntMenu $entMenu */
        foreach ($entsMenu as $entMenu) {
            $entMenuInJson = $this->entMenuInJson($entMenu);
            $this->addFilhosInJson($entMenu, $entMenuInJson);
            $rs[] = $entMenuInJson;
        }


        return $rs;

    }

    /**
     * Chamada recursiva para montar a árvore do menu.
     *
     * @param EntMenu $pai
     * @param $tree
     */
    private function getFilhos(EntMenu $pai, &$tree)
    {
        if ($pai)

            $ql = "SELECT e FROM App\Entity\Config\EntMenu e WHERE e.pai = :pai ORDER BY e.ordem";
        $qry = $this->getEntityManager()->createQuery($ql);
        $qry->setParameter('pai', $pai);
        $rs = $qry->getResult();
        if (count($rs) > 0) {
            /** @var EntMenu $r */
            foreach ($rs as $r) {
                $tree[] = $r;
                if ($r->getFilhos() && $r->getFilhos()->count() > 0) {
                    $this->getFilhos($r, $tree);
                }
            }
        } else {
            return;
        }
    }

    private function entMenuInJson(EntMenu $entMenu)
    {
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
                'label' => $entMenu->getPai() ? $entMenu->getPai()->getLabel() : null,
                'app' => [
                    'id' => $entMenu->getApp() ? $entMenu->getApp()->getId() : null,
                    'nome' => $entMenu->getApp() ? $entMenu->getApp()->getNome() : null,
                    'obs' => $entMenu->getApp() ? $entMenu->getApp()->getObs() : null,
                    'entranceUrl' => $entMenu->getApp() ? $entMenu->getApp()->getEntranceUrl() : null
                ],
            ],
            'app' => [
                'id' => $entMenu->getApp() ? $entMenu->getApp()->getId() : null,
                'nome' => $entMenu->getApp() ? $entMenu->getApp()->getNome() : null,
                'obs' => $entMenu->getApp() ? $entMenu->getApp()->getObs() : null,
                'entranceUrl' => $entMenu->getApp() ? $entMenu->getApp()->getEntranceUrl() : null
            ],
            'program' => [
                'id' => $entMenu->getProgram() ? $entMenu->getProgram()->getId() : null,
                'descricao' => $entMenu->getProgram() ? $entMenu->getProgram()->getDescricao() : null,
                'url' => $entMenu->getProgram() ? $entMenu->getProgram()->getUrl() : null,
                'uuid' => $entMenu->getProgram() ? $entMenu->getProgram()->getUuid() : null,
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
}
