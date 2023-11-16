$(document).ready(function() {
  $('#example').DataTable({
    language: {
      "buttons":{
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select:{
        rows: {
          _: "Seleccionó %d filas",
          0: "Click a row to select it",
          1: "Seleccionó 1 fila"
      }
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,
    dom: 'QBfrtilp',
    // select: {
    //   style: 'os',
    //   info: false
    // },
    // Fecha con formato dd/mm/yyyy

    // Botones de excel, pdf e impresión
    buttons: [
      
      // 'selectRows',
      // 'selectColumns',
      // 'showSelected',
      // 'columnsVisibility',
      // 'columnVisibility',
      // 'colvisGroup',
      {
        extend: 'colvis',
        postfixButtons: [ 'colvisRestore', 'colvisGroup']
      },
      {
        extend: 'excelHtml5',
        title: '',
        filename: 'Reporte de empleados',
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success',
        exportOptions: {
           columns: ':not(.acciones):visible',
          // Excluir la primera columna ("Acciones")
        }
      },
      {
        extend: 'pdfHtml5',
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-danger',
      },
      {
        extend: 'print',
        text: '<i class="fa fa-print"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-info'
      },
    ],
    // Inicializa el SearchBuilder
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function(input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function(input) {
            return (input.length === 2) && (input[0] !== '') && (input[1] !== '');
          },
        }
      },
      i18n: {
        // Configura el idioma del SearchBuilder en español
        "add": "Filtrar",
        "button": {
          "0": "Borrar Todo",
        },
        "title": {
          0: "Condiciones",
          "_": "Condiciones",
        },
        "logicAnd": "Y",
        "logicOr": "O",
        "clearAll": "Borrar todos los filtros",
        "value": "Valores",
        "condition": "Condición",
        "conditions": {
          "date": {
              "before": "Antes",
              "between": "Entre",
              "empty": "Vacío",
              "equals": "Igual a",
              "notBetween": "No entre",
              "not": "Diferente de",
              "after": "Después",
              "notEmpty": "No Vacío"
          },
          "number": {
              "between": "Entre",
              "equals": "Igual a",
              "gt": "Mayor a",
              "gte": "Mayor o igual a",
              "lt": "Menor que",
              "lte": "Menor o igual que",
              "notBetween": "No entre",
              "notEmpty": "No vacío",
              "not": "Diferente de",
              "empty": "Vacío"
          },
          "string": {
              "contains": "Contiene",
              "empty": "Vacío",
              "endsWith": "Termina en",
              "equals": "Igual a",
              "startsWith": "Empieza con",
              "not": "Diferente de",
              "notContains": "No Contiene",
              "notStartsWith": "No empieza con",
              "notEndsWith": "No termina con",
              "notEmpty": "No Vacío"
          },
          "array": {
              "not": "Diferente de",
              "equals": "Igual",
              "empty": "Vacío",
              "contains": "Contiene",
              "notEmpty": "No Vacío",
              "without": "Sin"
          }
      },
      "data": "Consultas",
        "deleteTitle": "Eliminar regla de filtrado",
      },
    },
  });
});
$(document).ready(function() {
  $('#example1').DataTable({
    language: {
      "buttons":{
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select:{
        rows: {
          _: "Seleccionó %d filas",
          0: "Click a row to select it",
          1: "Seleccionó 1 fila"
      }
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,
    dom: 'Qfrtilp',
    // select: {
    //   style: 'os',
    //   info: false
    // },
    // Fecha con formato dd/mm/yyyy

    // Botones de excel, pdf e impresión
    buttons: [
      
      // 'selectRows',
      // 'selectColumns',
      // 'showSelected',
      // 'columnsVisibility',
      // 'columnVisibility',
      // 'colvisGroup',
      {
        extend: 'colvis',
        postfixButtons: [ 'colvisRestore', 'colvisGroup']
      },
      // {
      //   extend: 'excelHtml5',
      //   title: '',
      //   filename: 'Reporte de empleados',
      //   text: '<i class="fas fa-file-excel"></i> ',
      //   titleAttr: 'Exportar a Excel',
      //   className: 'btn btn-success',
      //   exportOptions: {
      //      columns: ':not(.acciones):visible',
      //     // Excluir la primera columna ("Acciones")
      //   }
      // },
      // {
      //   extend: 'pdfHtml5',
      //   text: '<i class="fas fa-file-pdf"></i> ',
      //   titleAttr: 'Exportar a PDF',
      //   className: 'btn btn-danger',
      // },
      // {
      //   extend: 'print',
      //   text: '<i class="fa fa-print"></i> ',
      //   titleAttr: 'Imprimir',
      //   className: 'btn btn-info'
      // },
    ],
    // Inicializa el SearchBuilder
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function(input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function(input) {
            return (input.length === 2) && (input[0] !== '') && (input[1] !== '');
          },
        }
      },
      i18n: {
        // Configura el idioma del SearchBuilder en español
        "add": "Filtrar",
        "button": {
          "0": "Borrar Todo",
        },
        "title": {
          0: "Condiciones",
          "_": "Condiciones",
        },
        "logicAnd": "Y",
        "logicOr": "O",
        "clearAll": "Borrar todos los filtros",
        "value": "Valores",
        "condition": "Condición",
        "conditions": {
          "date": {
              "before": "Antes",
              "between": "Entre",
              "empty": "Vacío",
              "equals": "Igual a",
              "notBetween": "No entre",
              "not": "Diferente de",
              "after": "Después",
              "notEmpty": "No Vacío"
          },
          "number": {
              "between": "Entre",
              "equals": "Igual a",
              "gt": "Mayor a",
              "gte": "Mayor o igual a",
              "lt": "Menor que",
              "lte": "Menor o igual que",
              "notBetween": "No entre",
              "notEmpty": "No vacío",
              "not": "Diferente de",
              "empty": "Vacío"
          },
          "string": {
              "contains": "Contiene",
              "empty": "Vacío",
              "endsWith": "Termina en",
              "equals": "Igual a",
              "startsWith": "Empieza con",
              "not": "Diferente de",
              "notContains": "No Contiene",
              "notStartsWith": "No empieza con",
              "notEndsWith": "No termina con",
              "notEmpty": "No Vacío"
          },
          "array": {
              "not": "Diferente de",
              "equals": "Igual",
              "empty": "Vacío",
              "contains": "Contiene",
              "notEmpty": "No Vacío",
              "without": "Sin"
          }
      },
      "data": "Consultas",
        "deleteTitle": "Eliminar regla de filtrado",
      },
    },
  });
});
$(document).ready(function() {
  $('#example11').DataTable({
    language: {
      "buttons":{
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,
    dom: 'QBfrtilp',
    buttons: [
      {
      extend: 'colvis',
      postfixButtons: [ 'colvisRestore', 'colvisGroup']
      },
    ],
    // Inicializa el SearchBuilder
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function(input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function(input) {
            return (input.length === 2) && (input[0] !== '') && (input[1] !== '');
          },
        }
      },
      i18n: {
        // Configura el idioma del SearchBuilder en español
        "add": "Filtrar",
        "button": {
          "0": "Borrar Todo",
        },
        "title": {
          0: "Condiciones",
          "_": "Condiciones",
        },
        "logicAnd": "Y",
        "logicOr": "O",
        "clearAll": "Borrar todos los filtros",
        "value": "Valores",
        "condition": "Condición",
        "conditions": {
          "date": {
              "before": "Antes",
              "between": "Entre",
              "empty": "Vacío",
              "equals": "Igual a",
              "notBetween": "No entre",
              "not": "Diferente de",
              "after": "Después",
              "notEmpty": "No Vacío"
          },
          "number": {
              "between": "Entre",
              "equals": "Igual a",
              "gt": "Mayor a",
              "gte": "Mayor o igual a",
              "lt": "Menor que",
              "lte": "Menor o igual que",
              "notBetween": "No entre",
              "notEmpty": "No vacío",
              "not": "Diferente de",
              "empty": "Vacío"
          },
          "string": {
              "contains": "Contiene",
              "empty": "Vacío",
              "endsWith": "Termina en",
              "equals": "Igual a",
              "startsWith": "Empieza con",
              "not": "Diferente de",
              "notContains": "No Contiene",
              "notStartsWith": "No empieza con",
              "notEndsWith": "No termina con",
              "notEmpty": "No Vacío"
          },
          "array": {
              "not": "Diferente de",
              "equals": "Igual",
              "empty": "Vacío",
              "contains": "Contiene",
              "notEmpty": "No Vacío",
              "without": "Sin"
          }
      },
      "data": "Consultas",
        "deleteTitle": "Eliminar regla de filtrado",
      },
    },

  });
});

$(document).ready(function() {
  var table = $('#example2').DataTable({
    language: {
      "buttons":{
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select:{
        rows: {
          _: "Seleccionó %d filas",
          0: "Click a row to select it",
          1: "Seleccionó 1 fila"
      }
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,
    dom: 'QBfrtilp',
    pageLength: 10,  // Establece el número de registros a mostrar inicialmente a 20
    order: [[2, 'desc']],
    // select: {
    //   style: 'os',
    //   info: false
    // },
    // Fecha con formato dd/mm/yyyy

    // Botones de excel, pdf e impresión
    buttons: [
      
      // 'selectRows',
      // 'selectColumns',
      // 'showSelected',
      // 'columnsVisibility',
      // 'columnVisibility',
      // 'colvisGroup',
      {
        extend: 'colvis',
        postfixButtons: [ 'colvisRestore', 'colvisGroup']
      },
      {
        extend: 'excelHtml5',
        title: '',
        filename: 'Reporte de empleados',
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success',
        exportOptions: {
          columns: ':not(.acciones)'
          // Excluir la primera columna (Acciones) y seleccionar las columnas 2 a 25
      }
      },
      {
        extend: 'pdfHtml5',
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-danger',
      },
      {
        extend: 'print',
        text: '<i class="fa fa-print"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-info'
      },
    ],
    // Inicializa el SearchBuilder
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function(input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function(input) {
            return (input.length === 2) && (input[0] !== '') && (input[1] !== '');
          },
        }
      },
      i18n: {
        // Configura el idioma del SearchBuilder en español
        "add": "Filtrar",
        "button": {
          "0": "Borrar Todo",
        },
        "title": {
          0: "Condiciones",
          "_": "Condiciones",
        },
        "logicAnd": "Y",
        "logicOr": "O",
        "clearAll": "Borrar todos los filtros",
        "value": "Valores",
        "condition": "Condición",
        "conditions": {
          "date": {
              "before": "Antes",
              "between": "Entre",
              "empty": "Vacío",
              "equals": "Igual a",
              "notBetween": "No entre",
              "not": "Diferente de",
              "after": "Después",
              "notEmpty": "No Vacío"
          },
          "number": {
              "between": "Entre",
              "equals": "Igual a",
              "gt": "Mayor a",
              "gte": "Mayor o igual a",
              "lt": "Menor que",
              "lte": "Menor o igual que",
              "notBetween": "No entre",
              "notEmpty": "No vacío",
              "not": "Diferente de",
              "empty": "Vacío"
          },
          "string": {
              "contains": "Contiene",
              "empty": "Vacío",
              "endsWith": "Termina en",
              "equals": "Igual a",
              "startsWith": "Empieza con",
              "not": "Diferente de",
              "notContains": "No Contiene",
              "notStartsWith": "No empieza con",
              "notEndsWith": "No termina con",
              "notEmpty": "No Vacío"
          },
          "array": {
              "not": "Diferente de",
              "equals": "Igual",
              "empty": "Vacío",
              "contains": "Contiene",
              "notEmpty": "No Vacío",
              "without": "Sin"
          }
      },
      "data": "Consultas",
        "deleteTitle": "Eliminar regla de filtrado",
      },
    },
    // Define el formato de la columna de fecha
    columnDefs: [
      {
        targets: [3, 16],
        render: function(data, type, row) {
          if (type === 'display') {
            var date = new Date(data);
            date.setDate(date.getDate() + 1); // Sumar 1 día
            var day = date.getDate().toString().padStart(2, '0');
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var year = date.getFullYear();
            return day + '/' + month + '/' + year;
          }
          return data;
        }
      }
    ],
  });
});

$(document).ready(function() {
  $('#example3').DataTable({
    language: {
      "buttons":{
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,
    dom: 'QBfrtilp',
    buttons: [
      {
        extend: 'colvis',
        postfixButtons: [ 'colvisRestore', 'colvisGroup']
      }
    ],
    // Inicializa el SearchBuilder
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function(input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function(input) {
            return (input.length === 2) && (input[0] !== '') && (input[1] !== '');
          },
        }
      },
      i18n: {
        // Configura el idioma del SearchBuilder en español
        "add": "Filtrar",
        "button": {
          "0": "Borrar Todo",
        },
        "title": {
          0: "Condiciones",
          "_": "Condiciones",
        },
        "logicAnd": "Y",
        "logicOr": "O",
        "clearAll": "Borrar todos los filtros",
        "value": "Valores",
        "condition": "Condición",
        "conditions": {
          "date": {
              "before": "Antes",
              "between": "Entre",
              "empty": "Vacío",
              "equals": "Igual a",
              "notBetween": "No entre",
              "not": "Diferente de",
              "after": "Después",
              "notEmpty": "No Vacío"
          },
          "number": {
              "between": "Entre",
              "equals": "Igual a",
              "gt": "Mayor a",
              "gte": "Mayor o igual a",
              "lt": "Menor que",
              "lte": "Menor o igual que",
              "notBetween": "No entre",
              "notEmpty": "No vacío",
              "not": "Diferente de",
              "empty": "Vacío"
          },
          "string": {
              "contains": "Contiene",
              "empty": "Vacío",
              "endsWith": "Termina en",
              "equals": "Igual a",
              "startsWith": "Empieza con",
              "not": "Diferente de",
              "notContains": "No Contiene",
              "notStartsWith": "No empieza con",
              "notEndsWith": "No termina con",
              "notEmpty": "No Vacío"
          },
          "array": {
              "not": "Diferente de",
              "equals": "Igual",
              "empty": "Vacío",
              "contains": "Contiene",
              "notEmpty": "No Vacío",
              "without": "Sin"
          }
      },
      "data": "Consultas",
        "deleteTitle": "Eliminar regla de filtrado",
      },
    },
    // Define el formato de la columna de fecha
    columnDefs: [
      {
        targets: [2, 15],
        render: function(data, type, row) {
          if (type === 'display') {
            var date = new Date(data);
            date.setDate(date.getDate() + 1); // Sumar 1 día
            var day = date.getDate().toString().padStart(2, '0');
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var year = date.getFullYear();
            return day + '/' + month + '/' + year;
          }
          return data;
        }
      }
    ],
  });
});
$(document).ready(function() {
    $('#example4').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "",
            "infoEmpty": "",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        responsive: true,
        // Fecha con formato dd/mm/yyyy
        columnDefs: [
            {
              "targets": [1,14], // El índice de la columna de fecha
              "render": function (data, type, row) {
                if (type === 'display' || type === 'filter') {
                  // Formatear la fecha en el formato "dd/mm/yyyy"
                  var date = new Date(data);
                  var day = date.getDate().toString().padStart(2, '0');
                  var month = (date.getMonth() + 1).toString().padStart(2, '0');
                  var year = date.getFullYear();
                  return day + '/' + month + '/' + year;
                }
                return data;
              }
            }
          ],
    });
});
$(document).ready(function() {
  $('#example5').DataTable({
      language: {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "",
          "infoEmpty": "",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar:",
          "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
          },
          "sProcessing": "Procesando...",
      },
      responsive: true,
      // Fecha con formato dd/mm/yyyy
      columnDefs: [
          {
            "targets": [1,14], // El índice de la columna de fecha
            "render": function (data, type, row) {
              if (type === 'display' || type === 'filter') {
                // Formatear la fecha en el formato "dd/mm/yyyy"
                var date = new Date(data);
                var day = date.getDate().toString().padStart(2, '0');
                var month = (date.getMonth() + 1).toString().padStart(2, '0');
                var year = date.getFullYear();
                return day + '/' + month + '/' + year;
              }
              return data;
            }
          }
        ],
  });
});
$(document).ready(function() {
  $('#example6').DataTable({
    language: {
      "buttons":{
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select:{
        rows: {
          _: "Seleccionó %d filas",
          0: "Click a row to select it",
          1: "Seleccionó 1 fila"
      }
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,
    dom: 'QBfrtilp',
    // Fecha con formato dd/mm/yyyy

    // Botones de excel, pdf e impresión
    buttons: [
      {
        extend: 'colvis',
        postfixButtons: [ 'colvisRestore', 'colvisGroup']
      },
      {
        extend: 'excelHtml5',
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success',
        exportOptions: {
          columns: ':not(.acciones):visible',
          // Excluir la primera columna ("Acciones")
          
        }
      },
      {
        extend: 'pdfHtml5',
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-danger',
      },
      {
        extend: 'print',
        text: '<i class="fa fa-print"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-info'
      },
    ],
    // Inicializa el SearchBuilder
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function(input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function(input) {
            return (input.length === 2) && (input[0] !== '') && (input[1] !== '');
          },
        }
      },
      i18n: {
        // Configura el idioma del SearchBuilder en español
        "add": "Filtrar",
        "button": {
          "0": "Borrar Todo",
        },
        "title": {
          0: "Condiciones",
        },
        "logicAnd": "Y",
        "logicOr": "O",
      },
      
    }
  });
});

$(document).ready(function() {
  $('#example7').DataTable({
    language: {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "info": "",
      "infoEmpty": "",
      "infoFiltered": "",
      "sSearch": "Buscar:",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "sProcessing": "Procesando...",
    },
    responsive: true,

    // Fecha con formato dd/mm/yyyy

    // Botones de excel, pdf e impresión
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function(input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function(input) {
            return (input.length === 2) && (input[0] !== '') && (input[1] !== '');
          },
        }
      },
      i18n: {
        // Configura el idioma del SearchBuilder en español
        "add": "Filtrar",
        "button": {
          "0": "Borrar Todo",
        },
        "title": {
          0: "Condiciones",
        },
        "logicAnd": "Y",
        "logicOr": "O",
      },
    }
  });
});

$(document).ready(function() {
  $('#exampler').DataTable({
    language: {
      "buttons":{
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select:{
        rows: {
          _: "Seleccionó %d filas",
          0: "Click a row to select it",
          1: "Seleccionó 1 fila"
      }
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,
    dom: 'QBfrtilp',
    order: [[6, 'desc']],
    // Fecha con formato dd/mm/yyyy

    // Botones de excel, pdf e impresión
    buttons: [
      {
        extend: 'colvis',
        postfixButtons: [ 'colvisRestore', 'colvisGroup']
      },
      {
        extend: 'excelHtml5',
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success',
        exportOptions: {
          columns: ':not(.acciones):visible',
          // Excluir la primera columna ("Acciones")
          
        }
      },
      {
        extend: 'pdfHtml5',
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-danger',
      },
      {
        extend: 'print',
        text: '<i class="fa fa-print"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-info'
      },
    ],
    // Inicializa el SearchBuilder
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function(input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function(input) {
            return (input.length === 2) && (input[0] !== '') && (input[1] !== '');
          },
        }
      },
      i18n: {
        // Configura el idioma del SearchBuilder en español
        "add": "Filtrar",
        "button": {
          "0": "Borrar Todo",
        },
        "title": {
          0: "Condiciones",
        },
        "logicAnd": "Y",
        "logicOr": "O",
      },
      
    }
  });
});
