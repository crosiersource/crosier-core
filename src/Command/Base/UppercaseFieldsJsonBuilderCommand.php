<?php

namespace App\Command\Base;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Classe responsável por varrer a estrutura de metadados do Doctrine, encontrar todos os campos que sejam string e montar o uppercaseFields.json.
 * Este arquivo json é utilizado nos eventos de PrePersist e PreUpdate das classes filhas de EntityId para colocar em uppercase todos os campos de caracteres.
 *
 *
 *
 * @package App\Command\Base
 */
class UppercaseFieldsJsonBuilderCommand extends Command
{

    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
        parent::__construct();
    }

    /**
     * @return RegistryInterface
     */
    public function getDoctrine(): RegistryInterface
    {
        return $this->doctrine;
    }

    /**
     * @param RegistryInterface $doctrine
     */
    public function setDoctrine(RegistryInterface $doctrine): void
    {
        $this->doctrine = $doctrine;
    }


    protected function configure()
    {
        $this
            ->setName('crosier:uppercaseFieldsJsonBuilder')
            ->setDescription('Percorre as entidades e cria o u com os campos string para poder utilizar com o UppercaseStrings.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->buildJson($output));

    }

    public function buildJson(OutputInterface $output)
    {
        $array = array();

        $all = $this->getDoctrine()->getEntityManager()->getMetadataFactory()->getAllMetadata();
        $annotationReader = new AnnotationReader();
        foreach ($all as $classMeta) {
            $reflectionClass = $classMeta->getReflectionClass();
            $fields = array();
            $eMeta = $this->getDoctrine()->getEntityManager()->getMetadataFactory()->getMetadataFor($classMeta->getName());
            $output->writeln('Pesquisando ' . $classMeta->getName());
            foreach ($eMeta->getFieldNames() as $field) {
                $notUppercaseAnnotation = $annotationReader->getPropertyAnnotation(new \ReflectionProperty($classMeta->getName(),$field),'App\Doctrine\Annotations\NotUppercase');
                if ($notUppercaseAnnotation) {
                    continue;
                }

                $fieldM = $eMeta->getFieldMapping($field);
                if ($fieldM['type'] == 'string') {
                    $output->writeln($field);
                    $fields[] = $field;
                }
            }
            if (count($fields) > 0) {
                $className = str_replace('\\', '_', $classMeta->getName());
                $array[$className] = $fields;
            }
            $output->writeln('');
        }

        print_r($array);

        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));
        $json = $serializer->serialize($array, 'json');

        $output->writeln('');
        $output->writeln('');
        $output->writeln($json);

        file_put_contents('./src/Entity/uppercaseFields.json', $json);

    }

}