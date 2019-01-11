'use strict';

let listId = "#groupList";

import DatatablesJs from '../crosier/DatatablesJs';

import routes from '../../static/fos_js_routes.json';
import Routing from '../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes)

function getDatatablesColumns() {
    return [
        {
            name: 'e.groupname',
            data: 'e.groupname',
            title: 'Grupo'
        },
        {
            name: 'e.id',
            data: 'e',
            title: '',
            render: function (data, type, row) {
                let routeedit = $(listId).data('routeedit');
                let url = routeedit + '/' + data.id;
                let deleteUrl = Routing.generate('cfg_app_delete', {id: data.id} );
                let csrfTokenDelete = $(listId).data('crsf-token-delete');
                return "<button type=\"button\" class=\"btn btn-primary\" onclick=\"window.location.href='" + url + "'\">" +
                    "<i class=\"fas fa-wrench\" aria-hidden=\"true\"></i></button>" +
                    " <button type=\"button\" class=\"btn btn-danger\" data-url=\"" + deleteUrl + "\" " +
                    "data-token=\"" + csrfTokenDelete + "\" data-target=\"#confirmationModal\" data-toggle=\"modal\">" +
                    "<i class=\"fa fa-trash\" aria-hidden=\"true\"></i>" +
                    "</button>";
            },
            className: 'text-right'
        }
    ];
}

DatatablesJs.makeDatatableJs(listId, getDatatablesColumns());