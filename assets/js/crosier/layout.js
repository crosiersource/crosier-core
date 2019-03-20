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

import Hotkeys from "hotkeys-js";

import '@coreui/coreui';
import '@coreui/coreui/dist/css/coreui.css';
import '@coreui/icons/css/coreui-icons.css';
import 'simple-line-icons/css/simple-line-icons.css';


import CustomTooltips from '@coreui/coreui-plugin-chartjs-custom-tooltips';
import '../main.js';

import 'toastr/build/toastr.css'

// import 'summernote/dist/summernote-bs4.css';
//
// import 'flag-icon-css/css/flag-icon.css';
//
//
//
// import Moment from 'moment';
// import 'moment/locale/pt-br';
// import Numeral from 'numeral';
// import 'numeral/locales/pt-br.js'
import '../../static/css/crosier.css';
//
// Moment().locale('pt-BR');
//
// Numeral.locale('pt-br');

$(document).ready(function () {

    CrosierMasks.maskAll();

    CrosierBaseLayout.handlePace();

    CrosierBaseLayout.handleConfirmationModal();

    CrosierBaseLayout.handleFlashMessages();

    CrosierBaseLayout.handleBootstrapNavTabs();

    CrosierBaseLayout.handleSelect2();

    CrosierBaseLayout.handleTooltip();

    // CrosierBaseLayout.buildAppMainMenu();

    CrosierBaseLayout.handleBootstrapDatepicker();

    Hotkeys('ctrl+m', function (event, handler) {
        // Prevent the default refresh event under WINDOWS system
        event.preventDefault();
        console.dir(event);
        $('#appMainMenu').select2('open');
    });

    $('.focusOnReady').focus();



});

global.$ = $; // manter isso até remover todos os <script>'s dos templates
global.CustomTooltips = CustomTooltips; // manter isso até remover todos os <script>'s dos templates
