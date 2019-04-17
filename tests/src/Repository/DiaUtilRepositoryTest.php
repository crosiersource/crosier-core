<?php


namespace App\Tests\src\Repository;


use App\Repository\Base\DiaUtilRepository;
use CrosierSource\CrosierLibBaseBundle\Utils\DateTimeUtils\DateTimeUtils;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class DiaUtilRepositoryTest
 *
 * @package App\Tests\src\Repository
 * @author Carlos Eduardo Pauluk
 */
class DiaUtilRepositoryTest extends KernelTestCase
{

    public function test_findDiaUtil(): void
    {
        self::bootKernel();
        /** @var DiaUtilRepository $diaUtilRepo */
        $diaUtilRepo = self::$container->get('test.App\Repository\Base\DiaUtilRepository');

        $this->assertInstanceOf(DiaUtilRepository::class, $diaUtilRepo);


        $segundoDia = $diaUtilRepo->findDiaUtil(DateTimeUtils::parseDateStr('01/01/2019'), true, true, true);
        $this->assertEquals('02/01/2019', $segundoDia->format('d/m/Y'));

        // Considerando-se ordinalmente, dia 01 ou dia 02 sempre começarão a contagem pelo dia 02
        $this->assertEquals(
            '22/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('01/01/2019'), 15, true)->format('d/m/Y'));
        $this->assertEquals(
            '22/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('02/01/2019'), 15, true)->format('d/m/Y'));

        $this->assertEquals(
            '23/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('03/01/2019'), 15, true)->format('d/m/Y'));

    }
}