<?php

namespace App\Repository\Config;

use App\Entity\Config\EntMenu;
use App\Entity\Config\Modulo;
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
     * Monta o menu com somente aplicativos permitidos ao usuário logado.
     *
     * @return array
     */
    public function getMainMenuSecured()
    {
        $pais = $this->findBy(['pai' => null], ['ordem' => 'ASC']);
        $ents = [];
        $i = 0;
        foreach ($pais as $pai) {
            if (!$pai->getFilhos() or $pai->getFilhos()->count() < 1) {
                $ents[$i]['pai'] = $pai;
                $i++;
            } else {
                $addPai = false;
                foreach ($pai->getFilhos() as $filho) {
                    if ($filho->getApp() and $filho->getApp()->getRoles()) {
                        if ($this->getSecurity()->isGranted($filho->getApp()->getRolesArray())) {
                            $addPai = true;
                            $ents[$i]['filhos'][] = $filho;
                        }
                    }
                }
                if ($addPai) {
                    $ents[$i]['pai'] = $pai;
                    $i++;
                }
            }
        }
        return $ents;
    }

    /**
     * Retorna
     *
     * @param Modulo $modulo
     * @return array
     */
    public function getAppMainMenuSecured(Modulo $modulo)
    {
        $dql = "SELECT e.* FROM App\Entity\Config\EntMenu e JOIN App\Entity\Config\App a WHERE e.pai IS NULL AND a.modulo = :modulo ORDER BY e.ordem";
        $qry = $this->getEntityManager()->createQuery($dql);
        $qry->setParameter('modulo', $modulo);

        $pais = $qry->getResult();
        $ents = [];
        $i = 0;
        foreach ($pais as $pai) {
            if (!$pai->getFilhos() or $pai->getFilhos()->count() < 1) {
                $ents[$i]['pai'] = $pai;
                $i++;
            } else {
                $addPai = false;
                foreach ($pai->getFilhos() as $filho) {
                    if ($filho->getApp() and $filho->getApp()->getRoles()) {
                        if ($this->getSecurity()->isGranted($filho->getApp()->getRolesArray())) {
                            $addPai = true;
                            $ents[$i]['filhos'][] = $filho;
                        }
                    }
                }
                if ($addPai) {
                    $ents[$i]['pai'] = $pai;
                    $i++;
                }
            }
        }
        return $ents;
    }

    public function makeTree()
    {
        $ql = "SELECT e FROM App\Entity\Config\EntMenu e WHERE e.pai IS NULL ORDER BY e.ordem";
        $qry = $this->getEntityManager()->createQuery($ql);

        $pais = $qry->getResult();

        $tree = array();

        foreach ($pais as $pai) {
            $tree[] = $pai;
            $this->getFilhos($pai, $tree);
        }
        return $tree;
    }

    private function getFilhos(EntMenu $pai, &$tree)
    {
        $ql = "SELECT e FROM App\Entity\Config\EntMenu e WHERE e.pai = :pai ORDER BY e.ordem";
        $qry = $this->getEntityManager()->createQuery($ql);
        $qry->setParameter('pai', $pai);
        $rs = $qry->getResult();
        if (count($rs) > 0) {
            foreach ($rs as $r) {
                $tree[] = $r;
                $this->getFilhos($r, $tree);
            }
        } else {
            return;
        }
    }
}
