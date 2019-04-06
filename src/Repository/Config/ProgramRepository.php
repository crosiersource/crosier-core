<?php

namespace App\Repository\Config;

use App\Entity\Config\App;
use App\Entity\Config\Program;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Repository para a entidade Program.
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class ProgramRepository extends FilterRepository
{

    public function getEntityClass(): string
    {
        return Program::class;
    }

    public function handleFrombyFilters(QueryBuilder $qb)
    {
        return $qb->from($this->getEntityClass(), 'e')
            ->leftJoin(App::class, 'a', 'WITH', 'e.appUUID = a.UUID');
    }

    public function buildTransientsInAll(array $programs): void
    {
        foreach ($programs as $program) {
            $this->buildTransients($program);
        }
    }

    /**
     * Preenche os atributos transientes da entidades
     * @param Program $program
     */
    public function buildTransients(Program $program): void
    {
        if ($program && $program->getAppUUID()) {
            /** @var App $app */
            $app = $this->getEntityManager()->getRepository(App::class)->findOneBy(['UUID' => $program->getAppUUID()]);
            $program->setApp($app);
        }
    }


}
