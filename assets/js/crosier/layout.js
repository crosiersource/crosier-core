import $ from "jquery";

import "bootstrap";
import "bootstrap/dist/css/bootstrap.css";
import "popper.js";
import "perfect-scrollbar";

import "@coreui/coreui";
import "@coreui/coreui/dist/css/coreui.css";

import "select2";
import "select2/dist/js/i18n/pt-BR.js";

import CrosierBaseLayout from "./CrosierBaseLayout";
import CrosierMasks from "./CrosierMasks";
import DatatablesJs from "./DatatablesJs";

import "select2/dist/css/select2.css";
import "select2-bootstrap-theme/dist/select2-bootstrap.css";
import "datatables.net-bs4/css/dataTables.bootstrap4.css";
import "datatables/media/css/jquery.dataTables.css";
import "bootstrap-datepicker/dist/css/bootstrap-datepicker3.css";
import "toastr/build/toastr.css";
import "daterangepicker/daterangepicker.css";

import "../../static/css/crosier.css";

$(document).ready(function init() {
  CrosierMasks.maskAll();

  CrosierBaseLayout.handleConfirmationModal();

  CrosierBaseLayout.handleFlashMessages();

  CrosierBaseLayout.handleBootstrapNavTabs();

  CrosierBaseLayout.handleSelect2();

  CrosierBaseLayout.handleBootstrapDatepicker();

  CrosierBaseLayout.handleCamposCepComBtnConsulta();

  const $focusOnReady = $(".focusOnReady");
  if ($focusOnReady) {
    if (!$focusOnReady.hasClass("autoSelect2")) {
      $focusOnReady.focus();
    }
  }

  CrosierBaseLayout.startPushForUser();
});

global.CrosierMasks = CrosierMasks;
global.DatatablesJs = DatatablesJs;
