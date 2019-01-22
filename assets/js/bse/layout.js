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

// import 'summernote/dist/summernote-bs4.css';
//
//
//
//
// import '@fortawesome/fontawesome-free/css/all.css';
//
// import 'flag-icon-css/css/flag-icon.css';
//
//
// import 'simple-line-icons/css/simple-line-icons.css';
//
//
// import 'datatables/media/css/jquery.dataTables.css';
// import 'datatables';
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


$(document).ready(function () {

    CrosierMasks.maskAll();

    CrosierBaseLayout.handlePace();

    CrosierBaseLayout.handleConfirmationModal();

    CrosierBaseLayout.handleFlashMessages();

    CrosierBaseLayout.handleBootstrapNavTabs();

    CrosierBaseLayout.handleSelect2();

    CrosierBaseLayout.handleTooltip();

    CrosierBaseLayout.buildMainMenuSelect();



});

global.$ = $; // manter isso até remover todos os <script>'s dos templates