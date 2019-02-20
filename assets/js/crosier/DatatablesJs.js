'use strict';

import $ from "jquery";

import CrosierMasks from './CrosierMasks';

import 'datatables';

class DatatablesJs {

    static makeDatatableJs(listId, columns, params) {
        $(document).ready(function () {

            // declaro antes para poder sobreescrever ali com o extent, no caso de querer mudar alguma coisa (ex.: movimentacaoRecorrentesList.js)
            let defaultParams = {
                paging: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    'url': $(listId).data('listajaxurl'),
                    'type': 'POST',
                    'data': function (data) {
                        data.formPesquisar = $('#formPesquisar').serialize()
                    }
                },
                searching: false,
                columns: columns,
                "language": {
                    "url": "/build/static/datatables-Portuguese-Brasil.json"
                }
            };

            console.dir(defaultParams);

            $.extend(defaultParams, params);

            let datatable = $(listId).DataTable(defaultParams);

            console.log('fiz');

            datatable.on('draw', function () {
                $('[data-toggle="tooltip"]').tooltip();
                CrosierMasks.maskAll();
            });

            console.log('mascarei');


        });
    }

}

export default DatatablesJs;