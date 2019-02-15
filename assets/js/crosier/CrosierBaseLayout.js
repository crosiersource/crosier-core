'use strict';

import $ from 'jquery';

import 'toastr/build/toastr.css'
import toastrr from "toastr";

import sprintf from "sprintf-js";

import 'bootstrap-datepicker';
import 'bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR';

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

        $(document).ajaxStart(function () {
            Pace.restart();
        });
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
            for (var i = 0; i < namespaces.length; i++) {
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
        $('.FLASHMESSAGE').each(function () {
            if ($(this).hasClass('FLASHMESSAGE_SUCCESS')) {
                toastrr.success($(this).html(), '', 'trustedHtml');
            } else if ($(this).hasClass('FLASHMESSAGE_WARNING')) {
                toastrr.warning($(this).html(), '', 'trustedHtml');
            } else if ($(this).hasClass('FLASHMESSAGE_INFO')) {
                toastrr.info($(this).html(), '', 'trustedHtml');
            } else if ($(this).hasClass('FLASHMESSAGE_ERROR')) {
                toastrr.error($(this).html(), '', 'trustedHtml');
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
        $('.autoSelect2').each(function () {
            let elem = $(this);
            if (elem.data('route-id')) {
                $.ajax({
                        type: 'GET',
                        url: elem.data('route-id'),
                        async: true,
                        crossDomain: true,
                        contentType: "application/json",
                        dataType: 'json',
                        xhrFields: {
                            withCredentials: true
                        },
                    }
                ).done(function (results) {
                    console.dir(results);

                    if (elem.data('text-format')) {
                        results = $.map(results, function (obj) {
                            console.dir(obj);
                            console.log(elem.data('text-format'));
                            obj.text = sprintf.sprintf(elem.data('text-format'), obj);
                            return obj;
                        });
                    }

                    let $s2 = elem.select2({
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
                        }
                    });

                    $s2.val(elem.data('val')).trigger('change');
                });

            }
        });
        $.fn.select2.defaults.set("theme", "bootstrap");
    }


    /**
     * Ativar tooltip.
     */
    static handleTooltip() {
        $('[data-toggle="tooltip"]').tooltip();
    }


    /**
     * Construir o mainMenu do app.
     */
    static buildAppMainMenu() {
        let $appMainMenu = $('#appMainMenu');

        // Construção do mainMenuSelect
        $.ajax({
                dataType: "json",
                async: false,
                url: '/getAppMainMenu',
                type: 'POST'
            }
        ).done(function (results) {
            let data = $.map(results, function (obj) {
                obj.text = obj.label; // replace name with the property used for the text
                return obj;
            });
            $appMainMenu.select2({
                    data: results,
                    templateResult: function (data) {
                        var $item = $(
                            '<span><i class="' + data.icon + ' text-center" style="width: 30px"></i> ' + data.text + '</span>'
                        );
                        return $item;

                    },
                    templateSelection: function (data) {
                        var $item = $(
                            '<span><i class="' + data.icon + '"></i> ' + data.text + '</span>'
                        );
                        return $item;

                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    },
                }
            ).on('select2:select', function (e) {
                let data = e.params.data;
                if (data.programa.url) {
                    window.location.href = data.programa.url;
                }
            });
            data.forEach(function (e, index, arr) {
                if (window.location.pathname === e.programa.url) {
                    $appMainMenu.val(e.id).trigger('change');
                }
            });

        });


    }


    static handleBootstrapDatepicker() {
        $('.bootstrap-datepicker').datepicker({
            language: 'pt-BR'
        });
    }


}

export default CrosierBaseLayout;
