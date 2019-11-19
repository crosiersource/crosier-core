<?php

namespace App\Command\Base;

use App\EntityOC\OcProduct;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 * @package App\Command\Base
 */
class TesteOcCommand extends Command
{

    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        parent::__construct();
    }

    /**
     * @return ManagerRegistry
     */
    public function getDoctrine(): ManagerRegistry
    {
        return $this->doctrine;
    }

    /**
     * @param ManagerRegistry $doctrine
     */
    public function setDoctrine(ManagerRegistry $doctrine): void
    {
        $this->doctrine = $doctrine;
    }


    protected function configure()
    {
        $this
            ->setName('crosier:testeOcCommand');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->doIt($output));

    }

    public function doIt(OutputInterface $output)
    {
        $ocProducts = $this->getDoctrine()->getEntityManager('oc')->getRepository(OcProduct::class)->findAll();

        foreach ($ocProducts as $ocProduct) {
            $output->writeln($ocProduct->getSku());
        }
    }

}