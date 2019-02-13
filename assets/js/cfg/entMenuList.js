'use strict';

import Sortable from 'sortablejs';
import $ from "jquery";

import routes from '../../static/fos_js_routes.json';
import Routing from '../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes)


let sortable = Sortable.create(simpleList, {
        animation: 150,

        onEnd: function (/**Event*/evt) {
            console.log('endd');
            console.log(this.toArray());
        }
    }
);


$('#confirmationModal').on(
    'click',
    '#btnConfirmationModalYes',
    function (e) {
        let jsonSortable = JSON.stringify(sortable.toArray());

        $.ajax({
            url: Routing.generate('cfg_entMenu_saveOrdem'),
            type: 'post',
            dataType: 'json',
            data: {
                'jsonSortable': jsonSortable
            },
            success: function (res) {
                console.log('deu boa')

            }
        });


    });

