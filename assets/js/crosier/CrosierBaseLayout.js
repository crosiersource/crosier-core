'use strict';

import $ from 'jquery';

import toastrr from "toastr";

import sprintf from "sprintf-js";

import 'bootstrap-datepicker';
import 'bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR';

import Push from "push.js";

import CrosierMasks from './CrosierMasks';

class CrosierBaseLayout {

    /**
     * Ativar o pace nos submits dos forms.
     */
    static handlePace() {
        $('form').submit(function (e) {
            Pace.restart();
            for (let i = 0; i < document.getElementsByClassName("blur-on-pace").length; i++) {
                document.getElementsByClassName("blur-on-pace")[i].style.filter = 'blur(3px)';
            }
        });

        // $(document).ajaxStart(function () {
        //     Pace.restart();
        // });
    }


    /**
     * Métodos para funcionar os confirmationModals.
     */
    static handleConfirmationModal() {
        let $confirmationModal = $('#confirmationModal');

        $confirmationModal.on('show.bs.modal', function (e) {
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
     * Método para montar select2 automaticamente de acordo com a classe.
     */
    static handleSelect2() {
        /**
         * Montagem dos select2 automáticos.
         */
        $.fn.select2.defaults.set("theme", "bootstrap");
        $.fn.select2.defaults.set("language", "pt-BR");
        $('.autoSelect2').each(function () {
            let elem = $(this);

            // Se foi passado um id-route-url,
            if (elem.data('id-route-url')) {
                $.ajax({
                        type: 'GET',
                        url: elem.data('id-route-url'),
                        async: true,
                        crossDomain: true,
                        contentType: "application/json",
                        dataType: 'json',
                        xhrFields: {
                            withCredentials: true
                        },
                    }
                ).done(function (results) {

                    if (elem.data('text-format')) {
                        results = $.map(results, function (obj) {
                            let textt = sprintf.sprintf(elem.data('text-format'), obj);
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

                    let $s2 = elem.select2({
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
                                return elem.data('route-url');
                            },
                            headers: {
                                'X-Authorization': 'Bearer ' + elem.data('bearer'),
                                'Content-Type': 'application/json'
                            },
                            dataType: 'json',
                            processResults: function (data) {
                                // Se foi passado um formato a ser aplicado...
                                if (elem.data('text-format')) {
                                    data = $.map(data.results, function (obj) {
                                        let text = sprintf.sprintf(elem.data('text-format'), obj);
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
                                return {results: data};
                            },
                            cache: true
                        }
                    });

                    $s2.val(elem.data('val')).trigger('change');
                });
                return;

            }

            // else

            if (elem.data('route-url')) {
                let $s2 = elem.select2({
                    minimumInputLength: 2,
                    placeholder: '...',
                    allowClear: true,
                    ajax: {
                        delay: 750,
                        url: function (params) {
                            return elem.data('route-url');
                        },
                        headers: {
                            'X-Authorization': 'Bearer ' + elem.data('bearer'),
                            'Content-Type': 'application/json'
                        },
                        dataType: 'json',
                        processResults: function (data) {
                            console.dir(data);
                            // Se foi passado um formato a ser aplicado...
                            if (elem.data('text-format')) {
                                data = $.map(data.results, function (obj) {
                                    let text = sprintf.sprintf(elem.data('text-format'), obj);
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
                            return {results: data};
                        },
                        cache: true
                    }
                });
                return;
            }

            // else

            if (elem.data('options')) {
                elem.select2({
                    placeholder: '...',
                    allowClear: true,
                    data: elem.data('options')
                });
                if (elem.data('val')) {
                    elem.val(elem.data('val')).trigger('change');
                }
                return;
            }

            // else


            let opt = {
                placeholder: '...',
                allowClear: true,
            };

            if (elem.data('s2allownew')) {
                opt = {
                    placeholder: '...',
                    allowClear: true,
                    tags: true,
                    createTag: function (params) {
                        return {
                            id: params.term.toUpperCase(),
                            text: params.term.toUpperCase(),
                            newOption: true
                        }
                    },
                    templateResult: function (data) {
                        let $result = $("<span></span>");
                        $result.text(data.text.toUpperCase());

                        // if (data.newOption) {
                        //     $result.append(" <em> *</em>");
                        // }

                        return $result;
                    }
                };
            }

            let $s2 = elem.select2(opt);

            if (elem.data('val')) {
                elem.val(elem.data('val')).trigger('change');
            }


        });

    }


    static handleCamposCepComBtnConsulta() {
        let $cepComBtnConsulta = $('.cepComBtnConsulta');
        $cepComBtnConsulta.css('width', '50%').addClass('float-left');

        let html = $cepComBtnConsulta.parent().html();

        $cepComBtnConsulta.parent().html(html +
            '<button type="button" id="btnConsultaCep_' + $cepComBtnConsulta.attr('id') + '" data-campo-cep="' + $cepComBtnConsulta.attr('id') + '" class="btn btn-outline-success ml-2" title="Pesquisar endereço pelo CEP"><i class="fas fa-map-marked-alt"></i> Pesquisar</button>'
        );

        CrosierMasks.maskCEP(); // tem que remascarar depois de recriar o campo

        $cepComBtnConsulta = $('.cepComBtnConsulta');

        $('#btnConsultaCep_' + $cepComBtnConsulta.attr('id')).click(function () {
            let $cep = $cepComBtnConsulta.val();
            $.ajax({
                url: '/base/municipio/findEnderecoByCEP?cep=' + $cep,
                type: 'get',
                dataType: 'json',
                success: function (r) {
                    let res = JSON.parse(r);
                    let prefixoDosCampos = $cepComBtnConsulta.data('prefixodoscampos');

                    let campoLogradouro = $cepComBtnConsulta.data('campo-logradouro') ? $cepComBtnConsulta.data('campo-logradouro') : prefixoDosCampos + 'logradouro';
                    $('input[id=' + campoLogradouro + ']').val(res.tipo_logradouro + ' ' + res.logradouro);

                    let campoCidade = $cepComBtnConsulta.data('campo-cidade') ? $cepComBtnConsulta.data('campo-cidade') : prefixoDosCampos + 'cidade';
                    $('input[id=' + campoCidade + ']').val(res.cidade);

                    let campoBairro = $cepComBtnConsulta.data('campo-bairro') ? $cepComBtnConsulta.data('campo-bairro') : prefixoDosCampos + 'bairro';
                    $('input[id=' + campoBairro + ']').val(res.bairro);

                    let campoEstado = $cepComBtnConsulta.data('campo-estado') ? $cepComBtnConsulta.data('campo-estado') : prefixoDosCampos + 'estado';
                    $('#' + campoEstado + '').val(res.uf).trigger('change');
                }
            });

        });


    }

    /**
     * Ativar tooltip.
     */
    static handleTooltip() {
        $('[data-toggle="tooltip"]').tooltip();
    }


    static handleBootstrapDatepicker() {
        $('.bootstrap-datepicker').datepicker({
            language: 'pt-BR'
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
