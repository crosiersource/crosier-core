'use strict';

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
            },
            className: 'text-right'
        }
    ];
}

DatatablesJs.makeDatatableJs(listId, getDatatablesColumns());