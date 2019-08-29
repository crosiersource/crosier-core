'use strict';

import $ from 'jquery';

import 'jquery-mask-plugin';
import 'jquery-maskmoney/dist/jquery.maskMoney.js';

class CrosierMasks {

    static maskDateTimes() {
        $('.crsr-date').mask('00/00/0000', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
        $('.crsr-datetime').mask('00/00/0000 00:00:00', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
    }

    static maskMoneys() {
        $(".crsr-money").each(function () {

            $(this).maskMoney({
                prefix: '',
                thousands: '.',
                decimal: ',',
                affixesStay: true,
                allowZero: true,
                precision: 2
            });
            $(this).trigger('mask.maskMoney');

        });
    }

    static maskDecs() {

        $(".crsr-dec2").maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 2,
            allowZero: true
        });
        $(".crsr-dec2").trigger('mask.maskMoney');

        $(".crsr-dec3").maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 3,
            allowZero: true
        });
        $(".crsr-dec3").trigger('mask.maskMoney');


        $(".crsr-dec4").maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 4,
            allowZero: true
        });
        $(".crsr-dec4").trigger('mask.maskMoney');

    }

    static maskCPF_CNPJ() {
        $('.cpf').mask('000.000.000-00', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
        $('.cnpj').mask('00.000.000/0000-00', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });

        $('.cpfCnpj').on('focus', function (e) {
            $(this).unmask();
        });

        $('.cpfCnpj').on('blur', function (e) {
            $(this).val($(this).val().replace(/[^\d]+/g,''));
            if ($(this).val().length == 11) {
                $(this).mask('000.000.000-00', {
                    clearIfNotMatch: true,
                    selectOnFocus: true
                });
            } else if ($(this).val().length == 14) {
                $(this).mask('00.000.000/0000-00', {
                    clearIfNotMatch: true,
                    selectOnFocus: true
                });
            }
        });
    }

    static maskCEP() {
        $('.cep').mask('00000-000', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
    }

    static maskTelefone9digitos() {

        // http://igorescobar.github.io/jQuery-Mask-Plugin/docs.html
        var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

        $('.telefone').mask(SPMaskBehavior, spOptions);

    }

    static maskAll() {
        CrosierMasks.maskDateTimes();
        CrosierMasks.maskMoneys();
        CrosierMasks.maskDecs();
        CrosierMasks.maskCPF_CNPJ();
        CrosierMasks.maskTelefone9digitos();
        CrosierMasks.maskCEP();
    }


}


export default CrosierMasks;