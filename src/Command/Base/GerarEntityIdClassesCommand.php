<?php

namespace App\Command\Base;

use CrosierSource\CrosierLibBaseBundle\Utils\StringUtils\CaseString;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Environment;

/**
 * @author Carlos Eduardo Pauluk
 */
class GerarEntityIdClassesCommand extends Command
{

    private EntityManagerInterface $doctrine;

    private Environment $twig;

    private ParameterBagInterface $params;

    public function __construct(EntityManagerInterface $doctrine, Environment $twig, ParameterBagInterface $params)
    {
        $this->doctrine = $doctrine;
        $this->twig = $twig;
        $this->params = $params;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setName('crosier:gerarEntityIdClasses');
        $this->addOption('tabela', 't', InputOption::VALUE_OPTIONAL, 'Nome da tabela (ou filtro)');
        $this->addOption('prefixoARemover', null, InputOption::VALUE_OPTIONAL, 'Prefixo da tabela a ser removido');
        $this->addOption('pacote', 'p', InputOption::VALUE_OPTIONAL, 'Nome do Pacote');
        $this->addOption('pastaOutput', null, InputOption::VALUE_OPTIONAL, 'Pasta root onde ficarão as classes (informar path completo)');
        $this->addOption('role', null, InputOption::VALUE_OPTIONAL, 'Role padrão (default: ROLE_ADMIN)', 'ROLE_ADMIN');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tabela = $input->getOption('tabela');
        $prefixoARemover = $input->getOption('prefixoARemover');
        $pacote = $input->getOption('pacote');
        $pastaOutput = $input->getOption('pastaOutput');
        $role = $input->getOption('role');


        $conn = $this->doctrine->getConnection();
        $dbname = $conn->getDatabase();

        $tabelas = $conn->fetchAllAssociative(
            'SELECT table_name FROM information_schema.tables WHERE table_schema = :dbName AND table_name LIKE :tableName',
            ['tableName' => $tabela . '%', 'dbName' => $dbname]);

        $sql_campos = 'SELECT *  FROM information_schema.columns WHERE table_schema = :dbName and table_name = :tableName order by ordinal_position';


        foreach ($tabelas as $tabela) {
            $nomeDaTabela = $tabela['TABLE_NAME'];
            $tabelaSemPrefixo = str_replace($prefixoARemover, '', $nomeDaTabela);
            $nomeDoRecurso = CaseString::snake($tabelaSemPrefixo)->kebab();
            $nomeDaClasse = CaseString::snake($tabelaSemPrefixo)->pascal();

            $campos = $conn->fetchAllAssociative($sql_campos, ['tableName' => $nomeDaTabela, 'dbName' => $dbname]);

            $blocoCampos = '';

            foreach ($campos as $campo) {
                if (in_array($campo['COLUMN_NAME'], ['id', 'inserted', 'updated', 'estabelecimento_id', 'user_inserted_id', 'user_updated_id'], true)) {
                    continue;
                }
                $blocoCampos .= $this->gerarBlocoCampo($campo);
            }

            $entity = $this->twig->render('/GerarEntityIdClasses_templates/Entity.template.twig',
                [
                    'pacote' => $pacote,
                    'nomeTabela' => $nomeDaTabela,
                    'nomeDaClasse' => $nomeDaClasse,
                    'nomeDoRecurso' => $nomeDoRecurso,
                    'role' => $role,
                    'campos' => $blocoCampos
                ]);


            @mkdir($pastaOutput . '/src/Entity/' . $pacote . '/', 0777, true);
            $data = mb_convert_encoding($entity, "UTF-8", 'HTML-ENTITIES');
            file_put_contents($pastaOutput . '/src/Entity/' . $pacote . '/' . $nomeDaClasse . '.php', $data, FILE_TEXT);

            $repository = $this->twig->render('/GerarEntityIdClasses_templates/Repository.template.twig',
                [
                    'pacote' => $pacote,
                    'nomeDaClasse' => $nomeDaClasse,
                ]);
            @mkdir($pastaOutput . '/src/Repository/' . $pacote . '/', 0777, true);
            file_put_contents($pastaOutput . '/src/Repository/' . $pacote . '/' . $nomeDaClasse . 'Repository.php', $repository);


            $entityHandler = $this->twig->render('/GerarEntityIdClasses_templates/EntityHandler.template.twig',
                [
                    'pacote' => $pacote,
                    'nomeDaClasse' => $nomeDaClasse,
                ]);
            @mkdir($pastaOutput . '/src/EntityHandler/' . $pacote . '/', 0777, true);

            file_put_contents($pastaOutput . '/src/EntityHandler/' . $pacote . '/' . $nomeDaClasse . 'EntityHandler.php', $entityHandler);

        }

        return 1;
    }

    private function gerarBlocoCampo($arrCampo)
    {
        switch ($arrCampo['DATA_TYPE']) {
            case 'int':
            case 'bigint':
                return $this->gerarBlocoCampo_intOubigint($arrCampo);
            case 'decimal':
                return $this->gerarBlocoCampo_decimal($arrCampo);
            case 'date':
            case 'datetime':
                return $this->gerarBlocoCampo_dateOudatetime($arrCampo);
            case 'varchar':
                return $this->gerarBlocoCampo_varchar($arrCampo);
            case 'text':
                return $this->gerarBlocoCampo_text($arrCampo);
            default:
                throw new \LogicException('Tipo de campo não previsto: ' . $arrCampo['DATA_TYPE']);
        }
    }

    private function gerarBlocoCampo_intOubigint($arrCampo): string
    {
        $nomeDaVariavel = CaseString::snake($arrCampo['COLUMN_NAME'])->camel();
        $nomeDoCampo = $arrCampo['COLUMN_NAME'];
        $nullable = $arrCampo['IS_NULLABLE'] === 'YES' ? 'true' : 'false';

        $str = PHP_EOL .
            '    /**' . PHP_EOL .
            "    * @ORM\Column(name=\"$nomeDoCampo\", type=\"integer\", nullable=$nullable)" . PHP_EOL .
            '    * @Groups("entity")' . PHP_EOL .
            '    * @Assert\Type(type="integer")' . PHP_EOL .
            '    */' . PHP_EOL .
            "   public ?int \$$nomeDaVariavel = null;" . PHP_EOL . PHP_EOL;

        return $str;
    }


    private function gerarBlocoCampo_decimal($arrCampo): string
    {
        $nomeDaVariavel = CaseString::snake($arrCampo['COLUMN_NAME'])->camel();
        $nomeDoCampo = $arrCampo['COLUMN_NAME'];
        $nullable = $arrCampo['IS_NULLABLE'] === 'YES' ? 'true' : 'false';
        $precision = $arrCampo['NUMERIC_PRECISION'];
        $scale = $arrCampo['NUMERIC_SCALE'];
// lembrar que o doctrine converte decimal para string (discussão sobre float)
        $str = PHP_EOL .
            '    /**' . PHP_EOL .
            "    * @ORM\Column(name=\"$nomeDoCampo\", type=\"decimal\", nullable=$nullable, precision=$precision, scale=$scale)" . PHP_EOL .
            '    * @Groups("entity")' . PHP_EOL .
            '    * @Assert\Type(type="string")' . PHP_EOL .
            '    */' . PHP_EOL .
            "   public ?string \$$nomeDaVariavel = null;" . PHP_EOL . PHP_EOL;

        return $str;
    }

    private function gerarBlocoCampo_dateOudatetime($arrCampo): string
    {
        $datetime = $arrCampo['DATA_TYPE'] === 'datetime';
        $nomeDaVariavel = CaseString::snake($arrCampo['COLUMN_NAME'])->camel();
        $nomeDoCampo = $arrCampo['COLUMN_NAME'];
        $nullable = $arrCampo['IS_NULLABLE'] === 'YES' ? 'true' : 'false';
        $assertNotNull = $arrCampo['IS_NULLABLE'] !== 'YES' ? ('    @Assert\NotNull' . PHP_EOL) : '';
        $tipo = $datetime ? 'datetime' : 'date';

        $str = PHP_EOL .
            '    /**' . PHP_EOL .
            "    * @ORM\Column(name=\"$nomeDoCampo\", type=\"$tipo\", nullable=$nullable)" . PHP_EOL .
            '    * @Groups("entity")' . PHP_EOL .
            ($assertNotNull ?? '') .
            ($datetime ? '    * @Assert\DateTime' : '    * @Assert\Date') . PHP_EOL .
            '    */' . PHP_EOL .
            "   public ?\DateTime \$$nomeDaVariavel = null;" . PHP_EOL . PHP_EOL;

        return $str;
    }

    private function gerarBlocoCampo_varchar($arrCampo): string
    {
        $nomeDaVariavel = CaseString::snake($arrCampo['COLUMN_NAME'])->camel();
        $nomeDoCampo = $arrCampo['COLUMN_NAME'];
        $nullable = $arrCampo['IS_NULLABLE'] === 'YES' ? 'true' : 'false';
        $assertNotBlank = $arrCampo['IS_NULLABLE'] !== 'YES' ? ('    @Assert\NotBlank' . PHP_EOL) : '';
        $length = $arrCampo['CHARACTER_MAXIMUM_LENGTH'];
        $assertLength = '    * @Assert\Length(max="' . $length . '")';


        $str = PHP_EOL .
            '    /**' . PHP_EOL .
            "    * @ORM\Column(name=\"$nomeDoCampo\", type=\"string\", nullable=$nullable, length=$length)" . PHP_EOL .
            '    * @Groups("entity")' . PHP_EOL .
            ($assertNotBlank ?? '') .
            $assertLength . PHP_EOL .
            '    * @Assert\Type(type="string")' . PHP_EOL .
            '    */' . PHP_EOL .
            "   public ?string \$$nomeDaVariavel = null;" . PHP_EOL . PHP_EOL;

        return $str;
    }

    private function gerarBlocoCampo_text($arrCampo): string
    {
        $nomeDaVariavel = CaseString::snake($arrCampo['COLUMN_NAME'])->camel();
        $nomeDoCampo = $arrCampo['COLUMN_NAME'];
        $nullable = $arrCampo['IS_NULLABLE'] === 'YES' ? 'true' : 'false';
        $assertNotBlank = $arrCampo['IS_NULLABLE'] !== 'YES' ? ('    @Assert\NotBlank' . PHP_EOL) : '';
        $length = $arrCampo['CHARACTER_MAXIMUM_LENGTH'];
        $assertLength = '    * @Assert\Length(max="' . $length . '")';


        $str = PHP_EOL .
            '    /**' . PHP_EOL .
            "    * @ORM\Column(name=\"$nomeDoCampo\", type=\"string\", nullable=$nullable, length=$length)" . PHP_EOL .
            '    * @Groups("entity")' . PHP_EOL .
            '    * @NotUppercase()' . PHP_EOL .
            ($assertNotBlank ?? '') .
            $assertLength . PHP_EOL .
            '    * @Assert\Type(type="string")' . PHP_EOL .
            '    */' . PHP_EOL .
            "   public ?string \$$nomeDaVariavel = null;" . PHP_EOL . PHP_EOL;

        return $str;
    }


}
