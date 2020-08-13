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
        $('.crsr-date-diames').mask('00/00', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
        $('.crsr-mesano').mask('00/0000', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
        $('.crsr-datetime').mask('00/00/0000 00:00:00', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
        $('.crsr-datetime-hm').mask('00/00/0000 00:00', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
    }

    static maskDecs() {
        let $dec0 = $(".crsr-dec0, .decimal0");
        let $dec1 = $(".crsr-dec1, .decimal1");
        let $dec2 = $(".crsr-dec2, .decimal2, .crsr-money, .money, .dinheiro");
        let $dec3 = $(".crsr-dec3, .decimal3");
        let $dec4 = $(".crsr-dec4, .decimal4");
        let $dec5 = $(".crsr-dec5, .decimal5");

        $dec0.maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 0,
            allowZero: true,
            allowEmpty: true,
            selectAllOnFocus: true
        });
        $dec0.trigger('mask.maskMoney');

        $dec1.maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 1,
            allowZero: true,
            allowEmpty: true,
            selectAllOnFocus: true
        });
        $dec1.trigger('mask.maskMoney');

        $dec2.maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 2,
            allowZero: true,
            allowEmpty: true,
            selectAllOnFocus: true
        });
        $dec2.trigger('mask.maskMoney');

        $dec3.maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 3,
            allowZero: true,
            allowEmpty: true,
            selectAllOnFocus: true
        });
        $dec3.trigger('mask.maskMoney');

        $dec4.maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 4,
            allowZero: true,
            allowEmpty: true,
            selectAllOnFocus: true
        });
        $dec4.trigger('mask.maskMoney');

        $dec5.maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true,
            precision: 4,
            allowZero: true,
            allowEmpty: true,
            selectAllOnFocus: true
        });
        $dec5.trigger('mask.maskMoney');

        $dec0.attr("autocomplete", "off");
        $dec1.attr("autocomplete", "off");
        $dec2.attr("autocomplete", "off");
        $dec3.attr("autocomplete", "off");
        $dec4.attr("autocomplete", "off");
        $dec5.attr("autocomplete", "off");

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

        let $cpfCnpj = $('.cpfCnpj');

        $cpfCnpj.on('focus', function (e) {
            $(this).val($(this).val().replace(/[^\d]+/g, ''));
        });

        $cpfCnpj.on('blur', function (e) {
            $(this).val(
                ($(this).val().length === 14 ?
                    $(this).val().replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g, "\$1.\$2.\$3\/\$4\-\$5") :
                    $(this).val().replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g, "\$1.\$2.\$3\-\$4")));
        });
    }

    static maskCEP() {
        $('.cep').mask('00000-000', {
            clearIfNotMatch: true,
            selectOnFocus: true
        });
        $('.cepComBtnConsulta').mask('00000-000', {
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
        CrosierMasks.maskDecs();
        CrosierMasks.maskCPF_CNPJ();
        CrosierMasks.maskTelefone9digitos();
        CrosierMasks.maskCEP();
    }


}


export default CrosierMasks;
