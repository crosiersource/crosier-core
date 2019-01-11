<?php

namespace App\Repository\Config;

use App\Entity\Config\Config;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 * Repository para a entidade Config.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class ConfigRepository extends FilterRepository
{

    public function getEntityClass()
    {
        return Config::class;
    }

    public function findByChave($chave)
    {

        // TODO: parametrizar o estabelecimento conforme o login
        $ql = "SELECT c FROM App\Entity\Config\Config c WHERE c.chave = :chave AND c.estabelecimento = 1";
        $query = $this->getEntityManager()->createQuery($ql);
        $query->setParameters(array(
            'chave' => $chave
        ));

        $results = $query->getResult();

        if (count($results) > 1) {
            throw new \Exception('Mais de um Config encontrado para [' . $chave . ']');
        }

        return count($results) == 1 ? $results[0] : null;
    }

}
