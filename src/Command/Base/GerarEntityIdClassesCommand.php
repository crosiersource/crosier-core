<?php

namespace App\Command\Base;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Carlos Eduardo Pauluk
 */
class GerarEntityIdClassesCommand extends Command
{

    private EntityManagerInterface $doctrine;

    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setName('crosier:gerarEntityIdClasses');
        $this->addOption('tabela', 't', InputOption::VALUE_OPTIONAL, 'Nome da tabela (ou filtro)');
        $this->addOption('pacote', 'p', InputOption::VALUE_OPTIONAL, 'Nome do Pacote');
        $this->addOption('pastaOutput', null, InputOption::VALUE_OPTIONAL, 'Pasta root onde ficarão as classes (informar path completo)');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tabela = $input->getOption('tabela');
        $pacote = $input->getOption('pacote');
        $pastaOutput = $input->getOption('pastaOutput');

        $conn = $this->doctrine->getConnection();
        $dbname = $conn->getDatabase();

        $tabelas = $conn->fetchAllAssociative(
            'SELECT table_name FROM information_schema.tables WHERE table_schema = :dbName AND table_name LIKE :tableName',
            ['tableName' => $tabela . '%', 'dbName' => $dbname]);

        $sql_campos = 'SELECT *  FROM information_schema.columns WHERE table_schema = :dbName and table_name = :tableName order by ordinal_position';

        foreach ($tabelas as $tabela) {
            $campos = $conn->fetchAllAssociative($sql_campos, ['tableName' => $tabela['TABLE_NAME'], 'dbName' => $dbname]);
        }


    }


}
