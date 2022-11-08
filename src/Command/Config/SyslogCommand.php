<?php

namespace App\Command\Config;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * author Carlos Eduardo Pauluk
 * 
 * php bin/console crosier:syslog deletar_antigos
 * 
 */
class SyslogCommand extends Command
{

    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('crosier:syslog');
        $this->addArgument('acao', InputArgument::REQUIRED, 'Ação: "deletar_antigos""');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $acao = $input->getArgument('acao');

        switch ($acao) {
            case 'deletar_antigos':
                $this->deletarAntigos($output);
                break;
            default:
                throw new \RuntimeException('acao n/d');
        }
        return 1;
    }

    /**
     * @param OutputInterface $output
     */
    public function deletarAntigos(OutputInterface $output)
    {
        $conn = $this->doctrine->getConnection('default');
        $rDias = $conn->fetchAllAssociative('SELECT valor FROM cfg_app_config WHERE app_uuid = :appUUID AND chave = :chave',
            [
                'appUUID' => $_SERVER['CROSIERAPP_UUID'],
                'chave' => 'syslog.manter_por_x_dias'
            ]);

        if (!$rDias) {
            throw new \RuntimeException('syslog.manter_por_x_dias n/d');
        }

        try {
            $connLogs = $this->doctrine->getConnection('logs');
            $connLogs->executeStatement('DELETE FROM cfg_syslog WHERE moment < DATE_SUB(NOW(),INTERVAL ' . (int)$rDias[0]['valor'] . ' DAY)');
        } catch (\Throwable $e) {
            throw new \RuntimeException('Erro ao deletar syslogs');
        }
    }

}