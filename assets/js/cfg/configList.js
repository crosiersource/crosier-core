'use strict';

import Moment from 'moment';

let listId = "#configList";

import DatatablesJs from '../crosier/DatatablesJs';

function getDatatablesColumns() {
    return [
        {
            name: 'e.chave',
            data: 'e.chave',
            title: 'Chave'
        },
        {
            name: 'e.valor',
            data: 'e.valor',
            title: 'Valor'
        },
        {
            name: 'e.global',
            data: 'e.global',
            title: 'Global',
            render: function (data, type, row) {
                return data ? 'S' : 'N'
            },
        },
        {
            name: 'e.id',
            data: 'e',
            title: '',
            render: function (data, type, row) {
                let routeedit = Routing.generate($(listId).data('routeedit'), {id: data.id});
                colHtml += DatatablesJs.makeEditButton(routeedit);
                colHtml += '<br /><span class="badge badge-pill badge-info">' + Moment(data.updated).format('DD/MM/YYYY HH:mm:ss') + '</span> ';
                return colHtml;

            },
            className: 'text-right'
        }
    ];
}

DatatablesJs.makeDatatableJs(listId, getDatatablesColumns());