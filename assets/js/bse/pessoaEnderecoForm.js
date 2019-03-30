'use strict';

import $ from "jquery";

$(document).ready(function () {

    let $logradouro = $('#endereco_logradouro');
    let $cep = $('#endereco_cep');
    let $bairro = $('#endereco_bairro');
    let $numero = $('#endereco_numero');
    let $cidade = $('#endereco_cidade');
    let $estado = $('#endereco_estado');


    $('#pesquisar_cep').click(function () {
        $.ajax({
            url: 'http://cep.republicavirtual.com.br/web_cep.php',
            type: 'get',
            dataType: 'json',
            crossDomain: true,
            data: {
                cep: $cep.val(), //pega valor do campo
                formato: 'json'
            },
            success: function (res) {
                $logradouro.val(res.tipo_logradouro + ' ' + res.logradouro);
                $cidade.val(res.cidade);
                $bairro.val(res.bairro);
                $estado.val(res.uf).change();
                $numero.focus();

            }
        });
    });

});