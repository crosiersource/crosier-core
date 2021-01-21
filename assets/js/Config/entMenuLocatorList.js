/* eslint-disable */

import Moment from 'moment';

let listId = "#entMenuLocatorList";

function getDatatablesColumns() {
    return [
        {
            name: 'e.menuUUID',
            data: 'e.menuUUID',
            title: 'Menu UUID'
        },
        {
            name: 'e.urlRegexp',
            data: 'e.urlRegexp',
            title: 'URL'
        },
        {
            name: 'e.quem',
            data: 'e.quem',
            title: 'Quem',
        },
        {
            name: 'e.id',
            data: 'e',
            title: '',
            render: function (data, type, row) {
                let colHtml = "";
                if ($(listId).data('routeedit')) {
                    let routeedit = Routing.generate($(listId).data('routeedit'), {id: data.id});
                    colHtml += DatatablesJs.makeEditButton(routeedit);
                }
                if ($(listId).data('routedelete')) {
                    let deleteUrl = Routing.generate($(listId).data('routedelete'), {id: data.id});
                    let csrfTokenDelete = $(listId).data('crsf-token-delete');
                    colHtml += DatatablesJs.makeDeleteButton(deleteUrl, csrfTokenDelete);
                }
                colHtml += '<br /><span class="badge badge-pill badge-info">' + Moment(data.updated).format('DD/MM/YYYY HH:mm:ss') + '</span> ';
                return colHtml;
            },
            className: 'text-right'
        }
    ];
}

DatatablesJs.makeDatatableJs(listId, getDatatablesColumns());