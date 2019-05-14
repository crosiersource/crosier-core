'use strict';

let listId = "#pessoaList";

import DatatablesJs from '../crosier/DatatablesJs';

import routes from '../../static/fos_js_routes.json';
import Routing from '../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes)

function getDatatablesColumns() {
    return [
        {
            name: 'e.id',
            data: 'e.id',
            title: 'ID',
            render: function (data, type, row) {
                return (data+"").padStart(8, "0");
            },
        },
        {
            name: 'e.nome',
            data: 'e.nome',
            title: 'Nome'
        },
        {
            name: 'e.id',
            data: 'e',
            title: '',
            render: function (data, type, row) {
                let colHtml = "";
                if ($(listId).data('routeedit')) {
                    let routeedit = $(listId).data('routeedit');
                    let editUrl = routeedit + '/' + data.id;
                    colHtml += DatatablesJs.makeEditButton(editUrl);
                }
                if ($(listId).data('routedelete')) {
                    let deleteUrl = Routing.generate($(listId).data('routedelete'), {id: data.id});
                    let csrfTokenDelete = $(listId).data('crsf-token-delete');
                    colHtml += DatatablesJs.makeDeleteButton(deleteUrl, csrfTokenDelete);
                }
                return colHtml;
            },
            className: 'text-right'
        }
    ];
}

DatatablesJs.makeDatatableJs(listId, getDatatablesColumns());