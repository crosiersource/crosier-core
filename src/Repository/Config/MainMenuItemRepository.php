<?php

namespace App\Repository\Config;

use App\Entity\Config\App;
use App\Entity\Config\MainMenuItem;
use App\Entity\Config\Modulo;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use Symfony\Component\Security\Core\Security;

/**
 * Repository para a entidade EntMenu.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class MainMenuItemRepository extends FilterRepository
{

    private $security;


    public function getEntityClass()
    {
        return MainMenuItem::class;
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
     * Retorna os itens do menu para o $modulo.
     *
     * @param Modulo $modulo
     * @return array
     */
    public function getAppMainMenuSecured(Modulo $modulo)
    {
        $dql = "SELECT e FROM App\Entity\Config\MainMenuItem e JOIN e.programa a WHERE a.modulo = :modulo ORDER BY e.ordem";
        $qry = $this->getEntityManager()->createQuery($dql);
        $qry->setParameter('modulo', $modulo);

        $itens = $qry->getResult();
        $mainMenu = [];
        $i = 0;
        /** @var MainMenuItem $item */
        foreach ($itens as $item) {

            if ($this->getSecurity()->isGranted($item->getPrograma()->getRolesArray())) {

                $mainMenuItem = [
                    'id' => $item->getId(),
                    'label' => $item->getLabel(),
                    'icon' => $item->getIcon(),
                    'tipo' => $item->getTipo(),
                    'ordem' => $item->getOrdem(),
                    'cssStyle' => $item->getCssStyle()
                ];
                if ($item->getPrograma() and $item->getPrograma()->getId()) {
                    /** @var App $app */
                    $programa = $item->getPrograma();

                    $mainMenuItem['programa'] = [
                        'id' => $programa->getId(),
                        'descricao' => $programa->getDescricao(),
                        'route' => $programa->getRoute()
                    ];
                }
                $mainMenu[] = $mainMenuItem;
            }


        }
        return $mainMenu;
    }


}
