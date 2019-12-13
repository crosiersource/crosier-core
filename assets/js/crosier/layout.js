'use strict';

import $ from 'jquery';


import CustomTooltips from '@coreui/coreui-plugin-chartjs-custom-tooltips';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import 'popper.js';
import 'perfect-scrollbar';


import '@coreui/coreui';
import '@coreui/coreui/dist/css/coreui.css';
import '@coreui/icons/css/coreui-icons.css';
import 'simple-line-icons/css/simple-line-icons.css';


import 'select2/dist/css/select2.css';
import 'select2';
import 'select2/dist/js/i18n/pt-BR.js';
import 'select2-bootstrap-theme/dist/select2-bootstrap.css';

import CrosierBaseLayout from './CrosierBaseLayout';

import CrosierMasks from '../crosier/CrosierMasks';

import 'datatables.net-bs4/css/dataTables.bootstrap4.css';
import 'datatables/media/css/jquery.dataTables.css';


import 'bootstrap-datepicker/dist/css/bootstrap-datepicker3.css';

import Hotkeys from "hotkeys-js";

import Pace from 'pace-progress';

import 'toastr/build/toastr.css'

import '../../static/css/crosier.css';

import 'daterangepicker/daterangepicker.css';


window.onbeforeunload = function (e) {
    Pace.options = {ghostTime: 2500000};
    document.getElementById('preloader').style.display = '';
    $('.blurriers').css('filter', 'blur(2px) grayscale(2)');
};

$(document).ready(function () {

    CrosierBaseLayout.handlePace();

    CrosierMasks.maskAll();

    CrosierBaseLayout.handleConfirmationModal();

    CrosierBaseLayout.handleFlashMessages();

    CrosierBaseLayout.handleBootstrapNavTabs();

    CrosierBaseLayout.handleSelect2();

    CrosierBaseLayout.handleTooltip();

    CrosierBaseLayout.handleBootstrapDatepicker();

    CrosierBaseLayout.handleCamposCepComBtnConsulta();

    Hotkeys('ctrl+m', function (event, handler) {
        // Prevent the default refresh event under WINDOWS system
        event.preventDefault();
        console.dir(event);
        $('#appMainMenu').select2('open');
    });

    let $focusOnReady = $('.focusOnReady');
    if ($focusOnReady) {
        if ($focusOnReady.hasClass('autoSelect2')) {
            $focusOnReady.select2('focus');
        } else {
            $focusOnReady.focus();
        }
    }

    CrosierBaseLayout.startPushForUser();


});

global.$ = $; // manter isso até remover todos os <script>'s dos templates
global.CustomTooltips = CustomTooltips; // manter isso até remover todos os <script>'s dos templates
