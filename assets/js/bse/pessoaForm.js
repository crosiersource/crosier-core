'use strict';

import $ from "jquery";
import CrosierMasks from "../crosier/CrosierMasks";

$(document).ready(function () {

    let $tipo = $('#pessoa_tipo');
    let $documento = $('#pessoa_documento');
    let $nome = $('#pessoa_nome');
    let $nomeFantasia = $('#pessoa_nomeFantasia');
    let $inscrEst = $('#pessoa_inscricaoEstadual');
    let $rg = $('#pessoa_rg');

    let esc = [
        $nomeFantasia,
        $inscrEst,
        $rg
    ];

    function hideAll() {
        // Esconde todos
        esc.forEach(function (campo) {
            campo.closest('.form-group.row').css('display', 'none');
        });

    }

    function handleVisibleFields() {
        hideAll();
        let $tipoVal = $tipo.val();
        if ($tipoVal === 'Pessoa Física') {
            $rg.closest('.form-group.row').css('display', '');
            $("label[for='" + $documento.attr('id') + "']").text("CPF");
            $documento.addClass('cpf');
            $("label[for='" + $nome.attr('id') + "']").text("Nome");
        } else {
            $nomeFantasia.closest('.form-group.row').css('display', '');
            $inscrEst.closest('.form-group.row').css('display', '');
            $("label[for='" + $documento.attr('id') + "']").text("CNPJ");
            $documento.addClass('cnpj');
            $("label[for='" + $nome.attr('id') + "']").text("Razão Social");

        }

        CrosierMasks.maskAll();
    }

    $tipo.on('select2:select', function () {
        handleVisibleFields();
        $documento.focus();
    });




    handleVisibleFields();


});