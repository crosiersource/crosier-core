'use strict';

import $ from 'jquery';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import 'popper.js';
import 'perfect-scrollbar';


import '@coreui/coreui';
import '@coreui/coreui/dist/css/coreui.css';
import '@coreui/icons/css/coreui-icons.css';



import 'select2/dist/css/select2.css';
import 'select2';
import 'select2/dist/js/i18n/pt-BR.js';
import 'select2-bootstrap-theme/dist/select2-bootstrap.css';

import CrosierBaseLayout from './CrosierBaseLayout';

import CrosierMasks from '../crosier/CrosierMasks';

import 'datatables.net-bs4/css/dataTables.bootstrap4.css';
import 'datatables/media/css/jquery.dataTables.css';


import 'bootstrap-datepicker/dist/css/bootstrap-datepicker3.css';

import Pace from 'pace-progress';

import 'toastr/build/toastr.css'

import '../../static/css/crosier.css';

import 'daterangepicker/daterangepicker.css';
import DatatablesJs from "./DatatablesJs";


$(document).ready(function () {

    CrosierBaseLayout.handlePace();

    CrosierMasks.maskAll();

    CrosierBaseLayout.handleConfirmationModal();

    CrosierBaseLayout.handleFlashMessages();

    CrosierBaseLayout.handleBootstrapNavTabs();

    CrosierBaseLayout.handleSelect2();

    CrosierBaseLayout.handleBootstrapDatepicker();

    CrosierBaseLayout.handleCamposCepComBtnConsulta();

    let $focusOnReady = $('.focusOnReady');
    if ($focusOnReady) {
        if (!$focusOnReady.hasClass('autoSelect2')) {
            $focusOnReady.focus();
        }
    }

    CrosierBaseLayout.startPushForUser();

});

window.onbeforeunload = function (e) {
    Pace.options = {ghostTime: 2500000};
    document.getElementById('preloader').style.display = '';
    $('.blurriers').css('filter', 'blur(2px) grayscale(2)');
};


global.$ = $; // manter isso até remover todos os <script>'s dos templates
global.CrosierMasks = CrosierMasks;
global.DatatablesJs = DatatablesJs;
