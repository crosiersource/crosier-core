<?php

namespace App\Repository\Config;

use App\Entity\Config\App;
use App\Entity\Config\AppConfig;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Repository para a entidade AppConfig.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class AppConfigRepository extends FilterRepository
{

    public function getEntityClass()
    {
        return AppConfig::class;
    }

    public function findConfigByCrosierEnv(App $app, string $chave) {
        try {
            $dql = "SELECT c FROM App\Entity\Config\AppConfig c WHERE c.app = :app AND c.chave = :chave";
            $qry = $this->getEntityManager()->createQuery($dql);
            $qry->setParameter('app', $app);
            $crosierEnv = getenv('CROSIER_ENV');
            $qry->setParameter('chave', $chave . '_' . $crosierEnv);
            $appConfig = $qry->getOneOrNullResult();
            return $appConfig->getValor();
        } catch (NonUniqueResultException $e) {
            $this->getLogger()->error($e->getMessage());
            return null;
        }
    }

}

