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

        $proxDiaUtil = $diaUtilRepo->findDiaUtil(DateTimeUtils::parseDateStr('01/01/2019'), true, true, true);
        $this->assertEquals('02/01/2019', $proxDiaUtil->format('d/m/Y'));

        $proxOuMesmoDiaUtil = $diaUtilRepo->findDiaUtil(DateTimeUtils::parseDateStr('01/01/2019'), null, true, true);
        $this->assertEquals('02/01/2019', $proxOuMesmoDiaUtil->format('d/m/Y'));

        $proxOuMesmoDiaUtil = $diaUtilRepo->findDiaUtil(DateTimeUtils::parseDateStr('02/01/2019'), null, true, true);
        $this->assertEquals('02/01/2019', $proxOuMesmoDiaUtil->format('d/m/Y'));

        $diaUtilAnterior = $diaUtilRepo->findDiaUtil(DateTimeUtils::parseDateStr('03/01/2019'), false, true, true);
        $this->assertEquals('02/01/2019', $diaUtilAnterior->format('d/m/Y'));





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

        $this->assertEquals(
            '03/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('03/01/2019'), 0, true)->format('d/m/Y'));

        $this->assertEquals(
            '03/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('03/01/2019'), -1, true)->format('d/m/Y'));

        $this->assertEquals(
            '02/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('03/01/2019'), -2, true)->format('d/m/Y'));

        $this->assertEquals(
            '04/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('04/01/2019'), 1, true)->format('d/m/Y'));





        // Próximo dia comercial ao dia 04/01/2019 (sexta): deve ser sábado dia 05/01/2019
        $this->assertEquals(
            '05/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('04/01/2019'), 2, null, true)->format('d/m/Y'));
        // Oposto
        $this->assertEquals(
            '04/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('05/01/2019'), -2, null, true)->format('d/m/Y'));




        // Próximo dia financeiro ao dia 04/01/2019 (sexta): deve ser segunda dia 07/01/2019
        $this->assertEquals(
            '07/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('04/01/2019'), 2, true)->format('d/m/Y'));
        // Oposto
        $this->assertEquals(
            '04/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('07/01/2019'), -2, true)->format('d/m/Y'));




        // O sétimo dia útil financeiro depois do dia 04/01/2019 (sexta): deve ser segunda dia 14/01/2019
        $this->assertEquals(
            '14/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('04/01/2019'), 7, true)->format('d/m/Y'));
        // O sétimo dia útil financeiro depois do dia 04/01/2019 (sexta): deve ser segunda dia 14/01/2019
        $this->assertEquals(
            '04/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('14/01/2019'), -7, true)->format('d/m/Y'));




        // O sétimo dia útil comercial depois do dia 04/01/2019 (sexta): deve ser sexta dia 11/01/2019
        $this->assertEquals(
            '11/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('04/01/2019'), 7, null, true)->format('d/m/Y'));
        // Oposto
        $this->assertEquals(
            '04/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('11/01/2019'), -7, null, true)->format('d/m/Y'));




        // O oitavo dia útil comercial depois do dia 04/01/2019 (sexta): deve ser sábado dia 12/01/2019
        $this->assertEquals(
            '12/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('04/01/2019'), 8, null, true)->format('d/m/Y'));
        // Oposto
        $this->assertEquals(
            '04/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('12/01/2019'), -8, null, true)->format('d/m/Y'));




        // O nono dia útil comercial depois do dia 04/01/2019 (sexta): deve ser segunda dia 14/01/2019
        $this->assertEquals(
            '14/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('04/01/2019'), 9, null, true)->format('d/m/Y'));
        // Oposto
        $this->assertEquals(
            '04/01/2019',
            $diaUtilRepo->findEnesimoDiaUtil(DateTimeUtils::parseDateStr('14/01/2019'), -9, null, true)->format('d/m/Y'));


    }
}