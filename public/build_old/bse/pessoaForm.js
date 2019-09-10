(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["bse/pessoaForm"],{

/***/ "./assets/js/bse/pessoaForm.js":
/*!*************************************!*\
  !*** ./assets/js/bse/pessoaForm.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _crosier_CrosierMasks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../crosier/CrosierMasks */ "./assets/js/crosier/CrosierMasks.js");




jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(function () {
  var $tipo = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#pessoa_tipo');
  var $documento = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#pessoa_documento');
  var $nome = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#pessoa_nome');
  var $nomeFantasia = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#pessoa_nomeFantasia');
  var $inscrEst = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#pessoa_inscricaoEstadual');
  var $rg = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#pessoa_rg');
  var esc = [$nomeFantasia, $inscrEst, $rg];

  function hideAll() {
    // Esconde todos
    esc.forEach(function (campo) {
      campo.closest('.form-group.row').css('display', 'none');
    });
  }

  function handleVisibleFields() {
    hideAll();
    var $tipoVal = $tipo.val();

    if ($tipoVal === 'Pessoa Física') {
      $rg.closest('.form-group.row').css('display', '');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()("label[for='" + $documento.attr('id') + "']").text("CPF");
      $documento.addClass('cpf');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()("label[for='" + $nome.attr('id') + "']").text("Nome");
    } else {
      $nomeFantasia.closest('.form-group.row').css('display', '');
      $inscrEst.closest('.form-group.row').css('display', '');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()("label[for='" + $documento.attr('id') + "']").text("CNPJ");
      $documento.addClass('cnpj');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()("label[for='" + $nome.attr('id') + "']").text("Razão Social");
    }

    _crosier_CrosierMasks__WEBPACK_IMPORTED_MODULE_1__["default"].maskAll();
  }

  $tipo.on('select2:select', function () {
    handleVisibleFields();
    $documento.focus();
  });
  handleVisibleFields();
});

/***/ })

},[["./assets/js/bse/pessoaForm.js","runtime","crosier/layout"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYnNlL3Blc3NvYUZvcm0uanMiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCIkdGlwbyIsIiRkb2N1bWVudG8iLCIkbm9tZSIsIiRub21lRmFudGFzaWEiLCIkaW5zY3JFc3QiLCIkcmciLCJlc2MiLCJoaWRlQWxsIiwiZm9yRWFjaCIsImNhbXBvIiwiY2xvc2VzdCIsImNzcyIsImhhbmRsZVZpc2libGVGaWVsZHMiLCIkdGlwb1ZhbCIsInZhbCIsImF0dHIiLCJ0ZXh0IiwiYWRkQ2xhc3MiLCJDcm9zaWVyTWFza3MiLCJtYXNrQWxsIiwib24iLCJmb2N1cyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQWE7O0FBRWI7QUFDQTtBQUVBQSw2Q0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFZO0FBRTFCLE1BQUlDLEtBQUssR0FBR0gsNkNBQUMsQ0FBQyxjQUFELENBQWI7QUFDQSxNQUFJSSxVQUFVLEdBQUdKLDZDQUFDLENBQUMsbUJBQUQsQ0FBbEI7QUFDQSxNQUFJSyxLQUFLLEdBQUdMLDZDQUFDLENBQUMsY0FBRCxDQUFiO0FBQ0EsTUFBSU0sYUFBYSxHQUFHTiw2Q0FBQyxDQUFDLHNCQUFELENBQXJCO0FBQ0EsTUFBSU8sU0FBUyxHQUFHUCw2Q0FBQyxDQUFDLDJCQUFELENBQWpCO0FBQ0EsTUFBSVEsR0FBRyxHQUFHUiw2Q0FBQyxDQUFDLFlBQUQsQ0FBWDtBQUVBLE1BQUlTLEdBQUcsR0FBRyxDQUNOSCxhQURNLEVBRU5DLFNBRk0sRUFHTkMsR0FITSxDQUFWOztBQU1BLFdBQVNFLE9BQVQsR0FBbUI7QUFDZjtBQUNBRCxPQUFHLENBQUNFLE9BQUosQ0FBWSxVQUFVQyxLQUFWLEVBQWlCO0FBQ3pCQSxXQUFLLENBQUNDLE9BQU4sQ0FBYyxpQkFBZCxFQUFpQ0MsR0FBakMsQ0FBcUMsU0FBckMsRUFBZ0QsTUFBaEQ7QUFDSCxLQUZEO0FBSUg7O0FBRUQsV0FBU0MsbUJBQVQsR0FBK0I7QUFDM0JMLFdBQU87QUFDUCxRQUFJTSxRQUFRLEdBQUdiLEtBQUssQ0FBQ2MsR0FBTixFQUFmOztBQUNBLFFBQUlELFFBQVEsS0FBSyxlQUFqQixFQUFrQztBQUM5QlIsU0FBRyxDQUFDSyxPQUFKLENBQVksaUJBQVosRUFBK0JDLEdBQS9CLENBQW1DLFNBQW5DLEVBQThDLEVBQTlDO0FBQ0FkLG1EQUFDLENBQUMsZ0JBQWdCSSxVQUFVLENBQUNjLElBQVgsQ0FBZ0IsSUFBaEIsQ0FBaEIsR0FBd0MsSUFBekMsQ0FBRCxDQUFnREMsSUFBaEQsQ0FBcUQsS0FBckQ7QUFDQWYsZ0JBQVUsQ0FBQ2dCLFFBQVgsQ0FBb0IsS0FBcEI7QUFDQXBCLG1EQUFDLENBQUMsZ0JBQWdCSyxLQUFLLENBQUNhLElBQU4sQ0FBVyxJQUFYLENBQWhCLEdBQW1DLElBQXBDLENBQUQsQ0FBMkNDLElBQTNDLENBQWdELE1BQWhEO0FBQ0gsS0FMRCxNQUtPO0FBQ0hiLG1CQUFhLENBQUNPLE9BQWQsQ0FBc0IsaUJBQXRCLEVBQXlDQyxHQUF6QyxDQUE2QyxTQUE3QyxFQUF3RCxFQUF4RDtBQUNBUCxlQUFTLENBQUNNLE9BQVYsQ0FBa0IsaUJBQWxCLEVBQXFDQyxHQUFyQyxDQUF5QyxTQUF6QyxFQUFvRCxFQUFwRDtBQUNBZCxtREFBQyxDQUFDLGdCQUFnQkksVUFBVSxDQUFDYyxJQUFYLENBQWdCLElBQWhCLENBQWhCLEdBQXdDLElBQXpDLENBQUQsQ0FBZ0RDLElBQWhELENBQXFELE1BQXJEO0FBQ0FmLGdCQUFVLENBQUNnQixRQUFYLENBQW9CLE1BQXBCO0FBQ0FwQixtREFBQyxDQUFDLGdCQUFnQkssS0FBSyxDQUFDYSxJQUFOLENBQVcsSUFBWCxDQUFoQixHQUFtQyxJQUFwQyxDQUFELENBQTJDQyxJQUEzQyxDQUFnRCxjQUFoRDtBQUVIOztBQUVERSxpRUFBWSxDQUFDQyxPQUFiO0FBQ0g7O0FBRURuQixPQUFLLENBQUNvQixFQUFOLENBQVMsZ0JBQVQsRUFBMkIsWUFBWTtBQUNuQ1IsdUJBQW1CO0FBQ25CWCxjQUFVLENBQUNvQixLQUFYO0FBQ0gsR0FIRDtBQVFBVCxxQkFBbUI7QUFHdEIsQ0F0REQsRSIsImZpbGUiOiJic2UvcGVzc29hRm9ybS5qcyIsInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JztcclxuXHJcbmltcG9ydCAkIGZyb20gXCJqcXVlcnlcIjtcclxuaW1wb3J0IENyb3NpZXJNYXNrcyBmcm9tIFwiLi4vY3Jvc2llci9Dcm9zaWVyTWFza3NcIjtcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICBsZXQgJHRpcG8gPSAkKCcjcGVzc29hX3RpcG8nKTtcclxuICAgIGxldCAkZG9jdW1lbnRvID0gJCgnI3Blc3NvYV9kb2N1bWVudG8nKTtcclxuICAgIGxldCAkbm9tZSA9ICQoJyNwZXNzb2Ffbm9tZScpO1xyXG4gICAgbGV0ICRub21lRmFudGFzaWEgPSAkKCcjcGVzc29hX25vbWVGYW50YXNpYScpO1xyXG4gICAgbGV0ICRpbnNjckVzdCA9ICQoJyNwZXNzb2FfaW5zY3JpY2FvRXN0YWR1YWwnKTtcclxuICAgIGxldCAkcmcgPSAkKCcjcGVzc29hX3JnJyk7XHJcblxyXG4gICAgbGV0IGVzYyA9IFtcclxuICAgICAgICAkbm9tZUZhbnRhc2lhLFxyXG4gICAgICAgICRpbnNjckVzdCxcclxuICAgICAgICAkcmdcclxuICAgIF07XHJcblxyXG4gICAgZnVuY3Rpb24gaGlkZUFsbCgpIHtcclxuICAgICAgICAvLyBFc2NvbmRlIHRvZG9zXHJcbiAgICAgICAgZXNjLmZvckVhY2goZnVuY3Rpb24gKGNhbXBvKSB7XHJcbiAgICAgICAgICAgIGNhbXBvLmNsb3Nlc3QoJy5mb3JtLWdyb3VwLnJvdycpLmNzcygnZGlzcGxheScsICdub25lJyk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgfVxyXG5cclxuICAgIGZ1bmN0aW9uIGhhbmRsZVZpc2libGVGaWVsZHMoKSB7XHJcbiAgICAgICAgaGlkZUFsbCgpO1xyXG4gICAgICAgIGxldCAkdGlwb1ZhbCA9ICR0aXBvLnZhbCgpO1xyXG4gICAgICAgIGlmICgkdGlwb1ZhbCA9PT0gJ1Blc3NvYSBGw61zaWNhJykge1xyXG4gICAgICAgICAgICAkcmcuY2xvc2VzdCgnLmZvcm0tZ3JvdXAucm93JykuY3NzKCdkaXNwbGF5JywgJycpO1xyXG4gICAgICAgICAgICAkKFwibGFiZWxbZm9yPSdcIiArICRkb2N1bWVudG8uYXR0cignaWQnKSArIFwiJ11cIikudGV4dChcIkNQRlwiKTtcclxuICAgICAgICAgICAgJGRvY3VtZW50by5hZGRDbGFzcygnY3BmJyk7XHJcbiAgICAgICAgICAgICQoXCJsYWJlbFtmb3I9J1wiICsgJG5vbWUuYXR0cignaWQnKSArIFwiJ11cIikudGV4dChcIk5vbWVcIik7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgJG5vbWVGYW50YXNpYS5jbG9zZXN0KCcuZm9ybS1ncm91cC5yb3cnKS5jc3MoJ2Rpc3BsYXknLCAnJyk7XHJcbiAgICAgICAgICAgICRpbnNjckVzdC5jbG9zZXN0KCcuZm9ybS1ncm91cC5yb3cnKS5jc3MoJ2Rpc3BsYXknLCAnJyk7XHJcbiAgICAgICAgICAgICQoXCJsYWJlbFtmb3I9J1wiICsgJGRvY3VtZW50by5hdHRyKCdpZCcpICsgXCInXVwiKS50ZXh0KFwiQ05QSlwiKTtcclxuICAgICAgICAgICAgJGRvY3VtZW50by5hZGRDbGFzcygnY25waicpO1xyXG4gICAgICAgICAgICAkKFwibGFiZWxbZm9yPSdcIiArICRub21lLmF0dHIoJ2lkJykgKyBcIiddXCIpLnRleHQoXCJSYXrDo28gU29jaWFsXCIpO1xyXG5cclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIENyb3NpZXJNYXNrcy5tYXNrQWxsKCk7XHJcbiAgICB9XHJcblxyXG4gICAgJHRpcG8ub24oJ3NlbGVjdDI6c2VsZWN0JywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGhhbmRsZVZpc2libGVGaWVsZHMoKTtcclxuICAgICAgICAkZG9jdW1lbnRvLmZvY3VzKCk7XHJcbiAgICB9KTtcclxuXHJcblxyXG5cclxuXHJcbiAgICBoYW5kbGVWaXNpYmxlRmllbGRzKCk7XHJcblxyXG5cclxufSk7Il0sInNvdXJjZVJvb3QiOiIifQ==