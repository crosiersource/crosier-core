<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TesteCommand extends Command
{

    protected function configure()
    {
        $this->
        // the name of the command (the part after "bin/console")
        setName('app:teste')
            ->
            // the short description shown while running "php bin/console list"
            setDescription('Comando de teste.')
            ->
            // the full command description shown when running the command with
            // the "--help" option
            setHelp('??? ...');

//         $this->addArgument('password', $this->requirePassword ? InputArgument::OPTIONAL : InputArgument::REQUIRED, 'User password');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('');
        $output->writeln('');
        $output->writeln($this->someMethod());
        $output->writeln('');
        $output->writeln('');

    }

    public function someMethod()
    {


        $hts = "#sucesso
        #segredo
        #todomundo
        #motivacional
        #bomdia
        #maosaobra
        #esforço 
        #motivation
        #inspiration
        #success
        #entrepreneur
        #inspirational
        #business
        #quoteoftheday
        #motivationalquotes
        #sucesso
        #riqueza
        #inspiração
        #motivação
        #esforço
        #foco
        #empreendedorismo
        #motivação
        #coaching
        #empreender
        #business
        #dinheiro
        #investimento
        #força
        #sonhos
        #frases
        #felicidade
        #mindset
        #metas
        #empreendedor
        #luta
        #lute
        #vencedor
        #batalha
        #foco
        #empreendedorismo
        #motivação
        #coaching
        #empreender
        #business
        #dinheiro
        #amor
        #investimento
        #força
        #sonhos
        #frases
        #marketing
        #estilodevida
        #inspiração
        #positividade
        #crescimento
        #empreendedor
        #metas
        #exito
        #objetivo
        #negocio
        #empreendedorismo
        #empreendedor
        #carreira
        #desenvolvimentopessoal
        #geracaodevalor
        #movimentojourney
        #sucesso
        #traders
        #foco
        #atitude
        #mindfulness
        #oportunidade
        #investimentos
        #treinamento
        #objetivos
        #motivação
        #metas
        #coaching
        #empreendertransforma
        #empreender
        #workshop
        #líder
        #gestão";

        $htArr = explode("\n", $hts);
        $htArr = array_map(function ($a) {
            return trim($a);
        }, $htArr);
        $htArr = array_unique($htArr);
        sort($htArr);
        shuffle($htArr);
        $htArr = array_slice($htArr, 0, 28);

        return implode(" ", $htArr);


    }
}