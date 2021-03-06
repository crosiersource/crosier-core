/* eslint-disable */

import $ from "jquery";

import CrosierMasks from './CrosierMasks';

import 'datatables';

class DatatablesJs {

  static makeDatatableJs(listId, columns, params) {

    // declaro antes para poder sobreescrever ali com o extent, no caso de querer mudar alguma coisa (ex.: movimentacaoRecorrentesList.js)
    let defaultParams = {
      paging: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        'url': $(listId).data('listajaxurl'),
        'type': 'POST',
        'data': function (data) {
          data.formPesquisar = $('#formPesquisar').serialize()
        }
      },
      searching: false,
      columns: columns,
      language: {
        "url": "/build/static/datatables-Portuguese-Brasil.json"
      },
      order: [[columns.length - 1, "desc"]]
    };

    $.extend(defaultParams, params);

    let datatable = $(listId).DataTable(defaultParams);

    datatable.on('draw', function () {
      CrosierMasks.maskAll();
    });


  }

  static makeEditButton(editUrl) {
    return '<a role="button" class="btn btn-primary btn-sm" title="Editar registro" href="' + editUrl + '">' +
      '<i class="fas fa-wrench" aria-hidden="true"></i></a> ';
  }

  static makeDeleteButton(deleteUrl, csrfTokenDelete) {
    return '<button type="button" class="btn btn-danger btn-sm" title="Deletar registro" data-url="' + deleteUrl + '" ' +
      'data-token="' + csrfTokenDelete + '" data-target="#confirmationModal" data-toggle="modal">' +
      '<i class="fa fa-trash" aria-hidden="true"></i></button> ';
  }

}

export default DatatablesJs;
