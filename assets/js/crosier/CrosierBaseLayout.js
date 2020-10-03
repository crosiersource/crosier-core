'use strict';

import $ from 'jquery';

import toastrr from "toastr";

import sprintf from "sprintf-js";

import Moment from 'moment';

import 'daterangepicker';

import Push from "push.js";

import CrosierMasks from './CrosierMasks';
import Pace from "pace-progress";


class CrosierBaseLayout {

    /**
     * Ativar o pace nos submits dos forms.
     */
    static handlePace() {

        $('.blurriers').css('filter', 'blur(2px)');

        Pace.on('restart', function (e) {
            document.getElementById('preloader').style.display = '';
            $('.blurriers').css('filter', 'blur(2px) grayscale(3)');
        });

        Pace.on('start', function (e) {
            document.getElementById('preloader').style.display = '';
            $('.blurriers').css('filter', 'blur(2px) grayscale(3)');
        });

        Pace.on('hide', function (e) {
            document.getElementById('preloader').style.display = 'none';
            $('.blurriers').css('filter', '');
        });

        $('form').submit(function (e) {
            Pace.options = {ghostTime: 2500000};
            $('.blurriers').css('filter', 'blur(2px) grayscale(3)');
        });
    }


    /**
     * Métodos para funcionar os confirmationModals.
     */
    static handleConfirmationModal() {
        let $confirmationModal = $('#confirmationModal');

        $confirmationModal.on('show.bs.modal', function (e) {

            $('#btnConfirmationModalYes', this)
                .data('form', '')
                .data('url', '')
                .data('function', '')
                .data('name', '')
                .data('value', '')
                .data('token', '')
                .data('jsfunction', '')
                .data('jsfunction-args', '');

            $('#btnConfirmationModalYes', this)
                .data('form', $(e.relatedTarget).data('form'))
                .data('url', $(e.relatedTarget).data('url'))
                .data('function', $(e.relatedTarget).data('function'))
                .data('name', $(e.relatedTarget).attr('name'))
                .data('value', $(e.relatedTarget).attr('value'))
                .data('token', $(e.relatedTarget).data('token'))
                .data('jsfunction', $(e.relatedTarget).data('jsfunction'))
                .data('jsfunction-args', $(e.relatedTarget).data('jsfunction-args'));
        });


        // Função auxiliar para o confirmationModal poder chamar uma função javascript
        // https://stackoverflow.com/questions/359788/how-to-execute-a-javascript-function-when-i-have-its-name-as-a-string
        function executeFunctionByName(functionName, context /*, args */) {
            var args = Array.prototype.slice.call(arguments, 2);
            var namespaces = functionName.split(".");
            var func = namespaces.pop();
            for (let i = 0; i < namespaces.length; i++) {
                context = context[namespaces[i]];
            }
            return context[func].apply(context, args);
        }


        $confirmationModal.on(
            'click',
            '#btnConfirmationModalYes',
            function (e) {
                if ($(this).data('url')) {
                    let url = $(this).data('url');
                    let token = $(this).data('token');
                    let form = $('<form></form>').attr("method", "post").attr(
                        "action", url);
                    form.append($('<input />').attr("type", "hidden").attr(
                        "name", "token").attr("value", token));
                    $(form).appendTo('body').submit();
                } else if ($(this).data('form')) {
                    $("[name='" + $(this).data('form') + "']").append($('<input></input>')
                        .attr("type", "hidden")
                        .attr("name", $(this).data("name"))
                        .attr("value", $(this).data("value"))).submit();
                } else if ($(this).data('jsfunction')) {
                    executeFunctionByName($(this).data('jsfunction'), window, $(this).data('jsfunction-args'));
                }

            });
    }

    /**
     * Método para exibir em um 'toastr' os flash messages do Symfony.
     */
    static handleFlashMessages() {
        let $fixedFlashes = $('#fixedFlashes');
        $('.FLASHMESSAGE').each(function () {
            if ($(this).hasClass('FLASHMESSAGE_SUCCESS')) {
                toastrr.success($(this).html(), '', 'trustedHtml');
                if ($fixedFlashes) {
                    $fixedFlashes.append(
                        '<div class="alert alert-success" role="alert">\n<i class="fas fa-check-circle"></i> ' +
                        $(this).html() +
                        '</div>'
                    );
                }
            } else if ($(this).hasClass('FLASHMESSAGE_WARNING')) {
                toastrr.warning($(this).html(), '', 'trustedHtml');
                if ($fixedFlashes) {
                    $fixedFlashes.append(
                        '<div class="alert alert-success" role="alert">\n<i class="fas fa-exclamation-circle"></i> ' +
                        $(this).html() +
                        '</div>'
                    );
                }
            } else if ($(this).hasClass('FLASHMESSAGE_INFO')) {
                toastrr.info($(this).html(), '', 'trustedHtml');
                if ($fixedFlashes) {
                    $fixedFlashes.append(
                        '<div class="alert alert-success" role="alert">\n<i class="fas fa-info-circle"></i> ' +
                        $(this).html() +
                        '</div>'
                    );
                }
            } else if ($(this).hasClass('FLASHMESSAGE_ERROR')) {
                toastrr.error($(this).html(), '', 'trustedHtml');
                if ($fixedFlashes) {
                    $fixedFlashes.append(
                        '<div class="alert alert-danger" role="alert">\n<i class="fas fa-exclamation-triangle"></i> ' +
                        $(this).html() +
                        '</div>'
                    );
                }
            }
        });
    }

    /**
     * Método para controlar o link na url de acordo com a tab no bootstrap.
     */
    static handleBootstrapNavTabs() {
        // Javascript to enable link to tab
        let url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        }

        // Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
            window.scrollTo(0, 0);
        });
    }

    /**
     *
     * @param $select2
     */
    static handleSelect2IdRouteUrl($select2) {
        $.ajax({
                type: 'GET',
                url: $select2.data('id-route-url'),
                async: true,
                crossDomain: true,
                contentType: "application/json",
                dataType: 'json',
                xhrFields: {
                    withCredentials: true
                },
            }
        ).done(function (results) {
            if ($select2.data('text-format')) {
                results = $.map(results, function (obj) {
                    let textt = sprintf.sprintf($select2.data('text-format'), obj);
                    textt = textt
                        .replace(/^null /, '')
                        .replace(/ null$/, '')
                        .replace(/ null /, ' ')
                        .replace(/ - $/, '')
                        .replace(/ -$/, '')
                        .replace(/^\s*- /, '');
                    obj.text = textt;
                    return obj;
                });
            }

            let $s2 = $select2.select2({
                width: '100%',
                dropdownAutoWidth: true,
                minimumInputLength: 2,
                placeholder: '...',
                allowClear: true,
                data: results,
                sorter: function (data) {
                    return data.sort(function (a, b) {
                        a = a.text.toLowerCase();
                        b = b.text.toLowerCase();
                        if (a > b) {
                            return 1;
                        } else if (a < b) {
                            return -1;
                        }
                        return 0;
                    });
                },
                ajax: {
                    delay: 750,
                    url: function (params) {
                        return $s2.data('route-url');
                    },
                    headers: {
                        'X-Authorization': 'Bearer ' + $select2.data('bearer'),
                        'Content-Type': 'application/json'
                    },
                    dataType: 'json',
                    processResults: function (data) {
                        // Se foi passado um formato a ser aplicado...
                        if ($s2.data('text-format')) {
                            data = $.map(data.results, function (obj) {
                                let text = sprintf.sprintf($s2.data('text-format'), obj);
                                text = text
                                    .replace(/^null /, '')
                                    .replace(/ null$/, '')
                                    .replace(/ null /, ' ')
                                    .replace(/ - $/, '')
                                    .replace(/ -$/, '')
                                    .replace(/^\s*- /, '');
                                obj.text = text;
                                return obj;
                            });
                        }
                        let dataResults = data.results ? data.results : data;
                        return {results: dataResults};
                    },
                    cache: true
                }
            });

            $s2.val($s2.data('val')).trigger('change');

            if ($s2.hasClass('focusOnReady')) {
                $s2.select2('focus');
            }
        });
    }

    /**
     *
     * @param $s2
     */
    static handleSelect2RouteUrl($s2) {
        let config = {
            width: '100%',
            dropdownAutoWidth: true,
            minimumInputLength: 2,
            placeholder: '...',
            allowClear: true,
            ajax: {
                delay: 750,
                url: function (params) {
                    return $s2.data('route-url');
                },
                headers: {
                    'X-Authorization': 'Bearer ' + $s2.data('bearer'),
                    'Content-Type': 'application/json'
                },
                dataType: 'json',
                processResults: function (data) {
                    // Se foi passado um formato a ser aplicado...
                    if ($s2.data('text-format')) {
                        data = $.map(data.results, function (obj) {
                            let text = sprintf.sprintf($s2.data('text-format'), obj);
                            text = text
                                .replace(/^null /, '')
                                .replace(/ null$/, '')
                                .replace(/ null /, ' ')
                                .replace(/ - $/, '')
                                .replace(/ -$/, '')
                                .replace(/^\s*- /, '');
                            obj.text = text;
                            return obj;
                        });
                    }
                    let dataResults = data.results ? data.results : data;
                    return {results: dataResults};
                },
                cache: true
            }
        };
        if ($s2.data('options')) {
            config.data = $s2.data('options');
        }
        $s2 = $s2.select2(config);

        if ($s2.hasClass('focusOnReady')) {
            $s2.select2('focus');
        }

        if ($s2.data('val')) {
            $s2.val($s2.data('val')).trigger('change');
        }
    }

    /**
     *
     * @param $s2
     */
    static handleSelect2Options($s2) {
        let opt = null;
        if ($s2.hasClass('s2allownew')) {
            opt = {
                width: '100%',
                dropdownAutoWidth: true,
                placeholder: '...',
                allowClear: true,
                tags: true,
                data: $s2.data('options'),
                createTag: function (params) {
                    let termStr = $s2.hasClass('notuppercase') ? params.term : params.term.toUpperCase();
                    return {
                        id: termStr,
                        text: termStr,
                        newOption: true
                    }
                },
                templateResult: function (data) {
                    let termStr = $s2.hasClass('notuppercase') ? data.text : data.text.toUpperCase();
                    let $result = $("<span></span>");
                    $result.text(termStr);
                    return $result;
                }
            };
        } else {
            opt = {
                width: '100%',
                dropdownAutoWidth: true,
                placeholder: '...',
                allowClear: true,
                data: $s2.data('options')
            };
        }
        $s2 = $s2.select2(opt);

        if ($s2.data('val')) {
            $s2.val($s2.data('val')).trigger('change');
        }

        if ($s2.hasClass('focusOnReady')) {
            $s2.select2('focus');
        }
        return $s2;
    }

    static handleSelect2DataTagsOptions($s2) {

        $s2.select2({
            width: '100%',
            dropdownAutoWidth: true,
            tags: true,
            tokenSeparators: [',']
        });
        let val = String($s2.data('val')).split(',');

        String($s2.data('tagsoptions')).split(',').forEach(function (t) {
            if (t) {
                t = t.toUpperCase();
                let selected = true;
                if (val) {
                    selected = val && val.includes(t);
                }
                $s2.append(new Option(t, t, false, selected)).trigger('change');
            }
        });
        if ($s2.hasClass('focusOnReady')) {
            $s2.select2('focus');
        }
    }

    /**
     * Método para montar select2 automaticamente de acordo com a classe.
     */
    static handleSelect2() {
        /**
         * Montagem dos select2 automáticos.
         */
        $.fn.select2.defaults.set("theme", "bootstrap");
        $.fn.select2.defaults.set("language", "pt-BR");
        $('.autoSelect2').each(function () {

            let $s2 = $(this);


            if (!$s2.is('select')) {
                console.log($s2.attr('id') + ' não é <select>');
                return;
            }

            if ($s2.data('id-route-url')) {
                CrosierBaseLayout.handleSelect2IdRouteUrl($s2);
                return;
            } // else
            if ($s2.data('route-url')) {
                CrosierBaseLayout.handleSelect2RouteUrl($s2);
                return;
            } // else
            if ($s2.data('options')) {
                $s2 = CrosierBaseLayout.handleSelect2Options($s2);
                return;
            } // else
            if ($s2[0].hasAttribute('data-tagsoptions')) {
                CrosierBaseLayout.handleSelect2DataTagsOptions($s2);
                return;
            } // else

            let opt = {
                allowClear: true,
                width: '100%',
                dropdownAutoWidth: true,
            };

            if ($s2.hasClass('s2allownew')) {
                opt = {
                    width: '100%',
                    dropdownAutoWidth: true,
                    placeholder: '...',
                    allowClear: true,
                    tags: true,
                    createTag: function (params) {
                        let termStr = $s2.hasClass('notuppercase') ? params.term : params.term.toUpperCase();
                        return {
                            id: termStr,
                            text: termStr,
                            newOption: true
                        }
                    },
                    templateResult: function (data) {
                        let termStr = $s2.hasClass('notuppercase') ? data.text : data.text.toUpperCase();
                        let $result = $("<span></span>");
                        $result.text(termStr);
                        return $result;
                    }
                };
            }

            $s2 = $s2.select2(opt);

            if ($s2.data('val')) {
                $s2.val($s2.data('val')).trigger('change');
            }

            if ($s2.hasClass('focusOnReady')) {
                $s2.select2('focus');
            }


        });

    }


    static handleCamposCepComBtnConsulta() {
        let $cepComBtnConsulta = $('.cepComBtnConsulta');
        $cepComBtnConsulta.css('width', '50%').addClass('float-left');

        let html = $cepComBtnConsulta.parent().html();

        $cepComBtnConsulta.parent().html(html +
            '<div class="input-group-append"><button type="button" id="btnConsultaCep_' + $cepComBtnConsulta.attr('id') + '" data-campo-cep="' + $cepComBtnConsulta.attr('id') + '" class="btn btn-outline-success" title="Pesquisar endereço pelo CEP"><i class="fas fa-map-marked-alt"></i></button></div>'
        );

        CrosierMasks.maskCEP(); // tem que remascarar depois de recriar o campo

        $('#btnConsultaCep_' + $cepComBtnConsulta.attr('id')).click(function () {
            CrosierBaseLayout.retCamposCep();
        });
    }

    static retCamposCep() {
        let $cepComBtnConsulta = $('.cepComBtnConsulta');
        let $cep = $cepComBtnConsulta.val();
        $.ajax({
            url: '/base/municipio/findEnderecoByCEP?cep=' + $cep,
            type: 'get',
            dataType: 'json',
            success: function (r) {

                let res = JSON.parse(r);
                let prefixoDosCampos = $cepComBtnConsulta.data('prefixodoscampos');

                let campoLogradouro = $cepComBtnConsulta.data('campo-logradouro') ? $cepComBtnConsulta.data('campo-logradouro') : prefixoDosCampos + 'logradouro';
                $('input[id=' + campoLogradouro + ']').val(res.logradouro ? res.logradouro : '');

                let campoCidade = $cepComBtnConsulta.data('campo-cidade') ? $cepComBtnConsulta.data('campo-cidade') : prefixoDosCampos + 'cidade';
                $('input[id=' + campoCidade + ']').val(res.localidade ? res.localidade : '');

                let campoBairro = $cepComBtnConsulta.data('campo-bairro') ? $cepComBtnConsulta.data('campo-bairro') : prefixoDosCampos + 'bairro';
                $('input[id=' + campoBairro + ']').val(res.bairro ? res.bairro : '');

                if (res.uf) {
                    let campoEstado = $cepComBtnConsulta.data('campo-estado') ? $cepComBtnConsulta.data('campo-estado') : prefixoDosCampos + 'estado';
                    let container = $('#select2-' + campoEstado + '-container')
                    campoEstado = $('#' + campoEstado + '');
                    campoEstado.val(res.uf).trigger('change').trigger('selection:update');
                    container.prop('title', res.uf);
                    container.html(res.uf);
                }
            }
        });
    }


    static handleBootstrapDatepicker() {
        $('.bootstrap-datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(Moment().format('YYYY'), 10),
            locale: {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "De",
                "toLabel": "Até",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Dom",
                    "Seg",
                    "Ter",
                    "Qua",
                    "Qui",
                    "Sex",
                    "Sáb"
                ],
                "monthNames": [
                    "Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro"
                ],
                "firstDay": 0
            },
        });
    }


    static startPushForUser() {

        if (!Push.Permission.has()) {
            Push.Permission.request(function () {
            }, function () {
                console.log('Push.Permission.DENIED')
            });
        }

        let crosierCoreUrl = $('#crosierCoreUrl').data('value');
        let at = $('#at').data('value');


        if (crosierCoreUrl && at) {
            window.setInterval(function () {

                Pace.ignore(
                    function () {

                        $.ajax(
                            crosierCoreUrl + '/api/cfg/pushMessage/getNewMessages',
                            {
                                crossDomain: true,
                                dataType: "json",
                                headers: {
                                    'X-Authorization': 'Bearer ' + at,
                                    'Content-Type': 'application/json'
                                },
                            }
                        ).done(function (data) {
                            $.each(data, function (key, val) {
                                Push.create(val.mensagem, {
                                    icon: $('link[rel="icon"]').attr('href'),
                                    timeout: 8000,
                                    onClick: function () {
                                        if (val.url) {
                                            let win = window.open(val.url, '_blank');
                                            win.focus();
                                        } else {
                                            window.focus();
                                        }
                                        this.close();
                                    }
                                });
                            });
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            console.log('Erro - /api/cfg/pushMessage/getNewMessages');
                            if (jqXHR) {
                                console.dir(jqXHR);
                            }
                            if (textStatus) {
                                console.dir(textStatus);
                            }
                        });
                    }
                );


            }, 10000);

        }
    }

}

export default CrosierBaseLayout;

