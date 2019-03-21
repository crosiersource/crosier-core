<?php

namespace Tests\src\Controller\Base;


use CrosierSource\CrosierLibBaseBundle\Utils\DateTimeUtils\DateTimeUtils;
use PHPUnit\Framework\TestCase;

class DiaUtilControllerTest extends TestCase
{

    public function testPeriodos()
    {

        $testes = [
            [
                'dtIni' => '2019-01-01',
                'dtFim' => '2019-01-01',
                'dtIni_dec' => '2018-12-31',
                'dtFim_dec' => '2018-12-31',
                'dtIni_inc' => '2019-01-02',
                'dtFim_inc' => '2019-01-02'
            ],
            [
                'dtIni' => '2019-01-01',
                'dtFim' => '2019-01-31',
                'dtIni_dec' => '2018-12-01',
                'dtFim_dec' => '2018-12-31',
                'dtIni_inc' => '2019-02-01',
                'dtFim_inc' => '2019-02-28'
            ],
            [
                'dtIni' => '2019-01-01',
                'dtFim' => '2019-01-15',
                'dtIni_dec' => '2018-12-16',
                'dtFim_dec' => '2018-12-31',
                'dtIni_inc' => '2019-01-16',
                'dtFim_inc' => '2019-01-31'
            ],
            [
                'dtIni' => '2019-01-01',
                'dtFim' => '2019-06-30',
                'dtIni_dec' => '2018-07-01',
                'dtFim_dec' => '2018-12-31',
                'dtIni_inc' => '2019-07-01',
                'dtFim_inc' => '2019-12-31'
            ],
            [
                'dtIni' => '2018-12-16',
                'dtFim' => '2019-01-15',
                'dtIni_dec' => '2018-11-16',
                'dtFim_dec' => '2018-12-15',
                'dtIni_inc' => '2019-01-16',
                'dtFim_inc' => '2019-02-15'
            ],
            [
                'dtIni' => '2018-12-16',
                'dtFim' => '2019-01-31',
                'dtIni_dec' => '2018-11-01',
                'dtFim_dec' => '2018-12-15',
                'dtIni_inc' => '2019-02-01',
                'dtFim_inc' => '2019-03-15'
            ],
            [
                'dtIni' => '2019-10-01',
                'dtFim' => '2020-02-29',
                'dtIni_dec' => '2019-05-01',
                'dtFim_dec' => '2019-09-30',
                'dtIni_inc' => '2020-03-01',
                'dtFim_inc' => '2020-07-31'
            ],
        ];

        foreach ($testes as $t) {

            $dtIni = \DateTime::createFromFormat('Y-m-d', $t['dtIni']);
            $dtFim = \DateTime::createFromFormat('Y-m-d', $t['dtFim']);
            $periodo_dec = DateTimeUtils::decPeriodoRelatorial($dtIni, $dtFim);
            $periodo_inc = DateTimeUtils::incPeriodoRelatorial($dtIni, $dtFim);

            $this->assertEquals($t['dtIni_dec'], $periodo_dec['dtIni']);
            $this->assertEquals($t['dtFim_dec'], $periodo_dec['dtFim']);

            $this->assertEquals($t['dtIni_inc'], $periodo_inc['dtIni']);
            $this->assertEquals($t['dtFim_inc'], $periodo_inc['dtFim']);

        }


    }


}