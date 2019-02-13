'use strict';

import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import 'popper.js';
import 'perfect-scrollbar';

import 'select2/dist/css/select2.css';
import 'select2';
import 'select2-bootstrap-theme/dist/select2-bootstrap.css';

import CrosierBaseLayout from './CrosierBaseLayout';

import CrosierMasks from '../crosier/CrosierMasks';

import 'datatables.net-bs4/css/dataTables.bootstrap4.css';
import 'datatables/media/css/jquery.dataTables.css';


import 'bootstrap-datepicker/dist/css/bootstrap-datepicker3.css';


// import 'summernote/dist/summernote-bs4.css';
//
//
//
//
//
// import 'flag-icon-css/css/flag-icon.css';
//
//
// import 'simple-line-icons/css/simple-line-icons.css';
//
//

//

//
//
//
//
//
// import Moment from 'moment';
// import 'moment/locale/pt-br';
// import Numeral from 'numeral';
// import 'numeral/locales/pt-br.js'
// //import '../../static/css/crosier.css';
//
//
//
//
//
// Moment().locale('pt-BR');
//
// Numeral.locale('pt-br');

import Hotkeys from "hotkeys-js";

$(document).ready(function () {

    CrosierMasks.maskAll();

    CrosierBaseLayout.handlePace();

    CrosierBaseLayout.handleConfirmationModal();

    CrosierBaseLayout.handleFlashMessages();

    CrosierBaseLayout.handleBootstrapNavTabs();

    CrosierBaseLayout.handleSelect2();

    CrosierBaseLayout.handleTooltip();

    CrosierBaseLayout.buildAppMainMenu();

    CrosierBaseLayout.handleBootstrapDatepicker();

    Hotkeys('ctrl+m', function(event, handler){
        // Prevent the default refresh event under WINDOWS system
        event.preventDefault();
        console.dir(event);
        $('#appMainMenu').select2('open');
    });

});

global.$ = $; // manter isso até remover todos os <script>'s dos templates