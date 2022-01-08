<?php

namespace App\Controller\Utils;

use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOStatement;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GeradorEntidadesDoctrineController.
 *
 * @package App\Controller\Config
 * @author Carlos Eduardo Pauluk
 */
class GeradorEntidadesDoctrineController extends BaseController
{

    /**
     *
     * @Route("/utl/gerarEntidade/", name="utl_gerarEntidade")
     * @param Request $request
     * @return Response
     */
    public function generateDoctrineEntity(Request $request): Response
    {
        $table = $request->get('table');
        /** @var Connection $conn */
        $conn = $this->getDoctrine()->getConnection();
        $r = $conn->executeQuery('DESC ' . $table);
        $colunas = $r->fetchAllAssociative();
        $nGerados = '';


        $final = $this->genHead($table);

        foreach ($colunas as $coluna) {
            if (in_array($coluna['Field'], [
                'id',
                'inserted',
                'updated',
                'user_inserted_id',
                'user_updated_id',
                'estabelecimento_id',
                'version'
            ])) {
                continue;
            }

            $type = strpos($coluna['Type'], '(') ? substr($coluna['Type'], 0, strpos($coluna['Type'], '(')) : $coluna['Type'];

            if (substr($coluna['Field'], -3) === '_id') {
                if ($type !== 'bigint') {
                    $nGerados .= $coluna['Field'] . ',';
                    continue;
                }
                $final .= $this->genManyToOne($coluna);
                continue;
            }

            switch ($type) {
                case 'varchar':
                case 'char':
                    $final .= $this->genVarchar($coluna);
                    break;
                case 'int':
                case 'bigint':
                case 'smallint':
                    $final .= $this->genIntBigint($coluna);
                    break;
                case 'datetime':
                case 'date':
                case 'time':
                    $final .= $this->genDateTime($coluna);
                    break;
                case 'decimal':
                    $final .= $this->genDecimal($coluna);
                    break;
                case 'bit':
                    $final .= $this->genBoolean($coluna);
                    break;
                default:
                    $nGerados .= $coluna['Field'] . ',';
            }
        }

        return new Response('<pre>' . htmlentities($final) . '</pre><hr>' . 'NÃO GERADOS: ' . $nGerados);

    }


    /**
     * @param string $table
     * @return string
     */
    public function genHead(string $table): string
    {
        $entity = $this->convertToPojoName(ucfirst(substr($table, strpos($table, '_') + 1)));

        return '<?php' . PHP_EOL . PHP_EOL .
            "namespace App\Entity\?????????????;" . PHP_EOL . PHP_EOL .
            "use CrosierSource\CrosierLibBaseBundle\Entity\EntityId;" . PHP_EOL .
            "use CrosierSource\CrosierLibBaseBundle\Entity\EntityIdTrait;" . PHP_EOL .
            "use Symfony\Component\Serializer\Annotation\Groups;" . PHP_EOL .
            "use Doctrine\ORM\Mapping as ORM;" . PHP_EOL .
            '/**' . PHP_EOL .
            '*' . PHP_EOL .
            "* @ORM\Entity(repositoryClass=\"App\Repository\????????\\" . $entity . 'Repository")' . PHP_EOL .
            "* @ORM\Table(name=\"" . $table . '")' . PHP_EOL .
            '*/' . PHP_EOL .
            'class ' . $entity . ' implements EntityId' . PHP_EOL . '{' . PHP_EOL . PHP_EOL .
            'use EntityIdTrait;' . PHP_EOL . PHP_EOL

            ;
    }

    /**
     * @param $field
     * @return string
     */
    public function convertToPojoName($field)
    {
        $corr = $field;
        while (true) {
            if (strpos($corr, '_')) {
                $corr = substr($corr, 0, strpos($corr, '_')) . strtoupper($corr[strpos($corr, '_') + 1]) . substr($corr, strpos($corr, '_') + 2);
            } else {
                return $corr;
            }
        }
    }

    /**
     * @param $coluna
     * @return string
     */
    public function genManyToOne($coluna): string
    {
        $target = substr($coluna['Field'], 0, -3);
        $podeSerNull = $coluna['Null'] === 'YES';
        $pojoName = $this->convertToPojoName($target);


        return '/**' . PHP_EOL .
            '*' . PHP_EOL .
            "* @ORM\ManyToOne(targetEntity=\"App\Entity\????????????????\\" . ucfirst($pojoName) . '")' . PHP_EOL .
            "* @ORM\JoinColumn(name=\"" . $coluna['Field'] . '", nullable=' . ($podeSerNull ? 'true' : 'false') . ')' . PHP_EOL .
            '*' . PHP_EOL . '* @var $' . $pojoName . ' ' . ucfirst($pojoName) . PHP_EOL .
            '*/' . PHP_EOL .
            'public $' . $pojoName . ';' . PHP_EOL . PHP_EOL;
    }

    /**
     * @param $coluna
     * @return string
     */
    public function genVarchar($coluna): string
    {
        $campo = $coluna['Field'];
        $pojoName = $this->convertToPojoName($campo);
        $podeSerNull = $coluna['Null'] === 'YES';
        $r1 = '[^(]*';
        $r2 = '\(';
        $r3 = '(\d+)';
        $r4 = '\)';
        preg_match('/' . $r1 . $r2 . $r3 . $r4 . '/', $coluna['Type'], $matches);
        $size = $matches[1];

        return '/**' . PHP_EOL .
            '*' . PHP_EOL .
            "* @ORM\Column(name=\"" . $campo . '", type="string", nullable=' . ($podeSerNull ? 'true' : 'false') . ')' . PHP_EOL .
            '*/' . PHP_EOL .
            'public $' . $pojoName . ';' . PHP_EOL . PHP_EOL;
    }

    /**
     * @param $coluna
     * @return string
     */
    public function genIntBigInt($coluna): string
    {
        $campo = $coluna['Field'];
        $type = strpos($coluna['Type'], '(') ? substr($coluna['Type'], 0, strpos($coluna['Type'], '(')) : $coluna['Type'];
        $tipo = $type === 'int' ? 'integer' : 'bigint';
        $pojoName = $this->convertToPojoName($campo);
        $podeSerNull = $coluna['Null'] === 'YES';


        return '/**' . PHP_EOL .
            '*' . PHP_EOL .
            "* @ORM\Column(name=\"" . $campo . '", type="' . $tipo . '", nullable=' . ($podeSerNull ? 'true' : 'false') . ')' . PHP_EOL .
            '*/' . PHP_EOL .
            'public $' . $pojoName . ';' . PHP_EOL . PHP_EOL;

    }

    /**
     * @param $coluna
     * @return string
     */
    public function genDateTime($coluna): string
    {
        $campo = $coluna['Field'];

        $pojoName = $this->convertToPojoName($campo);
        $podeSerNull = $coluna['Null'] === 'YES';


        return '/**' . PHP_EOL .
            '* ' . PHP_EOL .
            "* @ORM\Column(name=\"" . $campo . '", type="' . $coluna['Type'] . '", nullable=' . ($podeSerNull ? 'true' : 'false') . ')' . PHP_EOL .
            '*/' . PHP_EOL .
            'public $' . $pojoName . ';' . PHP_EOL . PHP_EOL;
    }

    /**
     * @param $coluna
     * @return string
     */
    public function genDecimal($coluna): string
    {
        $campo = $coluna['Field'];
        $pojoName = $this->convertToPojoName($campo);
        $podeSerNull = $coluna['Null'] === 'YES';

        return '/**' . PHP_EOL .
            '*' . PHP_EOL .
            "* @ORM\Column(name=\"" . $campo . '", type="decimal", nullable=' . ($podeSerNull ? 'true' : 'false') . ')' . PHP_EOL .
            '*/' . PHP_EOL .
            'public $' . $pojoName . ';' . PHP_EOL . PHP_EOL;
    }


    /**
     * @param $coluna
     * @return string
     */
    public function genBoolean($coluna): string
    {
        $campo = $coluna['Field'];
        $pojoName = $this->convertToPojoName($campo);
        $podeSerNull = $coluna['Null'] === 'YES' ? true : false;


        return '/**' . PHP_EOL .
            '*' . PHP_EOL .
            "* @ORM\Column(name=\"" . $campo . '", type="boolean", nullable=' . ($podeSerNull ? 'true' : 'false') . ')' . PHP_EOL .
            '*/' . PHP_EOL .
            'public $' . $pojoName . ';' . PHP_EOL . PHP_EOL;
    }



    /**
     * @Route("/helpGenSettersGettersFormatted", name="helpGenSettersGettersFormatted")
     */
    public function helpGenSettersGettersFormatted(Request $request): Response {
        $campos = explode(',', $request->get('campos'));
        $entity = $request->get('entity');
        $codigo =
            '
    /**
     * Para aceitar tanto em string quanto em double.
     * @Groups(":::entity")
     * @SerializedName(":::campo")
     * @return float
     */
    public function get:::fucampoFormatted(): float
    {
        return (float)$this->:::campo;
    }

    /**
     * Para aceitar tanto em string quanto em double.
     * @Groups(":::entity")
     * @SerializedName(":::campo")
     * @param float $:::campo
     */
    public function set:::fucampoFormatted(float $:::campo)
    {
        $this->:::campo = $:::campo;
    }
    
    
';
        $r = '';

        foreach ($campos as $campo) {
            $r .= str_replace([':::entity', ':::campo', ':::fucampo'],
                [$entity, $campo, ucfirst($campo)],
                $codigo);

        }
        return new Response('<pre>' . $r);
    }
    

}