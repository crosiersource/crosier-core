'use strict';

import $ from "jquery";

$(document).ready(function () {

    $('#pesquisar_cep').click(function () {
        $.ajax({
            url: 'http://cep.republicavirtual.com.br/web_cep.php',
            type: 'get',
            dataType: 'json',
            crossDomain: true,
            data: {
                cep: $('input[id=endereco_cep]').val(), //pega valor do campo
                formato: 'json'
            },
            success: function (res) {
                $('input[id=endereco_logradouro]').val(res.tipo_logradouro + ' ' + res.logradouro);
                $('input[id=endereco_cidade]').val(res.cidade);
                $('input[id=endereco_bairro]').val(res.bairro);
                $('select[id=endereco_estado]').val(res.uf).change();

            }
        });
    });

});