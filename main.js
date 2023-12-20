$(document).ready(function () {
  $('#example').DataTable({
    language: {
      "buttons": {
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select: {
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
        postfixButtons: ['colvisRestore', 'colvisGroup']
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
          value: function (input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function (input) {
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
$(document).ready(function () {
  $('#example1').DataTable({
    language: {
      "buttons": {
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select: {
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
        postfixButtons: ['colvisRestore', 'colvisGroup']
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
          value: function (input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function (input) {
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
$(document).ready(function () {
  $('#example11').DataTable({
    language: {
      "buttons": {
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,
    dom: 'QBfrtilp',
    buttons: [{
      extend: 'colvis',
      postfixButtons: ['colvisRestore', 'colvisGroup']
    }, ],
    // Inicializa el SearchBuilder
    searchBuilder: {
      conditions: {
        // Configura una condición para el rango de fechas
        'date-range': {
          id: 'date-range',
          name: 'Fecha',
          inputs: ['from', 'to'],
          value: function (input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function (input) {
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

$(document).ready(function () {
  var table = $('#example2').DataTable({
    language: {
      "buttons": {
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select: {
        rows: {
          _: "Seleccionó %d filas",
          0: "Click a row to select it",
          1: "Seleccionó 1 fila"
        }
      },
      url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/Spanish.json", // Enlace al archivo de idioma en español
    },
    responsive: true,

    pageLength: 10, // Establece el número de registros a mostrar inicialmente a 20
    order: [
      [0, 'desc']
    ],
    "processing": true,
    "serverSide": true,
    "sAjaxSource": "ServerSide/serversideUsuarios.php",
    // Define el formato de la columna de fecha
    columnDefs: [{
      targets: [1, 14],
      render: function (data, type, row) {
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
    },
  ],
  });
});

$(document).ready(function () {
  $('#example6').DataTable({
    language: {
      "buttons": {
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select: {
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
    buttons: [{
        extend: 'colvis',
        postfixButtons: ['colvisRestore', 'colvisGroup']
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
          value: function (input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function (input) {
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

$(document).ready(function () {
  $('#exampler').DataTable({
    language: {
      "buttons": {
        "colvis": "Ocultar / Mostrar",
        "colvisRestore": "Restablecer filtros"
      },
      select: {
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
    order: [
      [6, 'desc']
    ],
    // Fecha con formato dd/mm/yyyy

    // Botones de excel, pdf e impresión
    buttons: [{
        extend: 'colvis',
        postfixButtons: ['colvisRestore', 'colvisGroup']
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
          value: function (input) {
            return input[0] + ' to ' + input[1];
          },
          isInputValid: function (input) {
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

// REGISTRO NOMINAS
window.onload = function () {
  var fecha = new Date(); // Fecha actual
  var mes = fecha.getMonth() + 1; // Obteniendo mes
  var dia = fecha.getDate(); // Obteniendo día
  var ano = fecha.getFullYear(); // Obteniendo año
  if (dia < 10)
    dia = '0' + dia; // Agrega cero si es menor de 10
  if (mes < 10)
    mes = '0' + mes; // Agrega cero si es menor de 10
  document.getElementById('fechaActual1').value = ano + "-" + mes + "-" + dia;
  document.getElementById('fechaActual2').value = ano + "-" + mes + "-" + dia;
  document.getElementById('fechaActual3').value = ano + "-" + mes + "-" + dia;
  document.getElementById('fechaActual4').value = ano + "-" + mes + "-" + dia;
}

const selects = document.querySelectorAll("select");

selects.forEach(select => {
  select.addEventListener("change", function () {
    if (this.value === "") {
      this.setCustomValidity("Debes seleccionar una opción válida");
    } else {
      this.setCustomValidity("");
    }
  });
});


function eliminarRegistro(codigo) {
  console.log("codigo: " + codigo);

  Swal.fire({
    title: "¿Estás seguro de que deseas eliminar este empleado?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar"
  }).then((result) => {
    if (result.isConfirmed) {
      // Realizar una solicitud AJAX para eliminar el registro
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "./delete-files/eliminar_registro.php?codigo=" + codigo, true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          // Registro eliminado con éxito, puedes realizar alguna acción adicional si es necesario
          // Por ejemplo, eliminar la fila de la tabla
          Swal.fire({
            title: "Registro eliminado exitosamente",
            icon: "success",
            timerProgressBar: true,
            timer: 2000 // Timer set to 2 seconds
          });
          var button = event.target;
          var row = button.parentElement.parentElement.parentElement; // Ajusta la navegación DOM para llegar a la fila de la tabla
          row.remove();
        }
      };
      xhr.send();
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  // Obtener la fecha y hora actual
  var now = new Date();

  // Obtener día, mes, año, hora, minuto y segundo
  var dia = now.getDate();
  var mes = now.getMonth() + 1; // Los meses comienzan en 0, por lo que sumamos 1
  var anio = now.getFullYear();
  var horas = now.getHours();
  var minutos = now.getMinutes();
  var segundos = now.getSeconds();

  // Formatear los valores para asegurarse de que siempre tengan 2 dígitos
  if (dia < 10) {
    dia = "0" + dia;
  }
  if (mes < 10) {
    mes = "0" + mes;
  }
  if (horas < 10) {
    horas = "0" + horas;
  }
  if (minutos < 10) {
    minutos = "0" + minutos;
  }
  if (segundos < 10) {
    segundos = "0" + segundos;
  }

  // Crear una cadena con la fecha y hora completa
  var fechaHoraActual = anio + "-" + mes + "-" + dia + " " + horas + ":" + minutos + ":" + segundos;

  // Asignar la fecha y hora actual al campo de entrada oculto
  document.getElementById("hora_registro").value = fechaHoraActual;
});

function moverRepse(codigo) {
  console.log("codigo: " + codigo);

  // Utiliza SweetAlert2 en lugar de confirm
  Swal.fire({
    title: '¿Estás seguro?',
    text: "¿Estás seguro de que deseas agregar a este empleado a REPSE?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, moverlo',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      // Realizar una solicitud AJAX para ejecutar el archivo PHP 'mover_repse.php'
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "mover.php?codigo=" + codigo, true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          // Registro movido con éxito, puedes realizar alguna acción adicional si es necesario
          // Utiliza SweetAlert2 en lugar de alert
          Swal.fire({
            title: "¡Éxito!",
            text: "El empleado se agregó a REPSE",
            icon: "success",
            timerProgressBar: true,
            timer: 2000 // Timer set to 2 seconds
          });
        }
      };
      xhr.send();
    }
  });
}

$(document).ready(function () {
  $('#guardar').submit(function (e) {
    e.preventDefault(); // Evita que se envíe el formulario de forma tradicional

    // Guarda una referencia al formulario para usarla dentro de la función de éxito
    var form = $(this);

    // Realiza la solicitud AJAX
    $.ajax({
      type: 'POST',
      url: './register_files/guardar_informacion.php',
      data: form.serialize(), // Serializa los datos del formulario
      success: function (response) {
        // Muestra SweetAlert2 en caso de éxito
        Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: 'Empleado registrado exitosamente',
          showConfirmButton: true, // Muestra el botón de confirmación
          confirmButtonText: 'Aceptar' // Personaliza el texto del botón de confirmación
        }).then((result) => {
          // Si el usuario hace clic en el botón "Aceptar"
          if (result.isConfirmed) {
            // Recarga la página
            location.reload();
          }
        });

        // Puedes agregar más lógica aquí según la respuesta del servidor
        console.log(response);
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
});

$(document).ready(function () {
  $('form').submit(function (e) {
    e.preventDefault(); // Evita que se envíe el formulario de forma tradicional

    // Guarda una referencia al formulario para usarla dentro de la función de éxito
    var form = $(this);

    // Realiza la solicitud AJAX
    $.ajax({
      type: 'POST',
      url: './update_files/update.php',
      data: form.serialize(), // Serializa los datos del formulario
      success: function (response) {
        // Muestra SweetAlert2 en caso de éxito
        Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: 'Empleado actualizado exitosamente',
          showConfirmButton: true, // Muestra el botón de confirmación
          confirmButtonText: 'Aceptar' // Personaliza el texto del botón de confirmación
        }).then((result) => {
          // Si el usuario hace clic en el botón "Aceptar"
          if (result.isConfirmed) {
            // Recarga la página
            location.reload();
          }
        });

        // Puedes agregar más lógica aquí según la respuesta del servidor
        console.log(response);
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
});

function formatDate(date) {
  const options = {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric'
  };
  return new Date(date).toLocaleDateString('es-ES', options);
}

function exportData() {
  var fecha1 = document.getElementById("fecha1").value;
  var fecha2 = document.getElementById("fecha2").value;

  // Realizar petición AJAX a PHP con las fechas seleccionadas
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Procesar la respuesta del servidor (puede variar según la estructura de tus datos)
      var data = JSON.parse(xhr.responseText);

      // Ejemplo de cómo construir el contenido del archivo Excel
      var content = [
        ['Código', 'Fecha de alta', 'Apellido paterno', 'Apellido materno', 'Nombre', 'Tipo de periodo', 'Salario diario', 'SBC parte fija', 'Departamento', 'Turno de trabajo', 'Num seguridad social', 'RFC', 'CURP', 'Sexo', 'Fecha de nacimiento', 'Puesto', 'Entidad federativa de nacimiento', 'CP', 'Estado Civil', 'Banco para pago electrónico', 'Numero de cuenta para pago electrónico', 'Sucursal para pago electrónico', 'Registro patronal del IMSS']
      ];

      data.forEach(function (row) {
        // Formatear el código agregando ceros a la izquierda
        var codigoFormateado = String(row.codigo).padStart(5, '0');

        content.push([
          codigoFormateado,
          formatDate(row.fecha_alta), // Formatear fecha_alta
          row.ap_pat, row.ap_mat, row.nombre, row.ubicacion, row.salario_diario, row.sbc, row.departamento,
          row.turno, row.nss, row.rfc, row.curp, row.sexo, formatDate(row.fecha_nac), // Formatear fecha_nac 
          row.puesto, row.entidad, row.cp,
          row.estado_civil,
          row.e_banco, row.n_ecuenta, row.suc_epago, row.imss_pat
        ]);
      });

      // Crear un libro de Excel
      var ws = XLSX.utils.aoa_to_sheet(content);
      var wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, "Empleados");

      // Descargar el archivo Excel
      XLSX.writeFile(wb, 'Empleados.xlsx');
    }
  };
  xhr.open("GET", "exportar_excel.php?fecha1=" + fecha1 + "&fecha2=" + fecha2, true);
  xhr.send();
}
function exportData2() {
  var cod1 = document.getElementById("cod1").value;
  var cod2 = document.getElementById("cod2").value;
  console.log("cod1:", cod1);
  console.log("cod2:", cod2);

  // Realizar petición AJAX a PHP con las fechas seleccionadas
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Procesar la respuesta del servidor (puede variar según la estructura de tus datos)
      var data = JSON.parse(xhr.responseText);

      // Ejemplo de cómo construir el contenido del archivo Excel
      var content = [
        ['Código', 'Fecha de alta', 'Apellido paterno', 'Apellido materno', 'Nombre', 'Tipo de periodo', 'Salario diario', 'SBC parte fija', 'Departamento', 'Turno de trabajo', 'Num seguridad social', 'RFC', 'CURP', 'Sexo', 'Fecha de nacimiento', 'Puesto', 'Entidad federativa de nacimiento', 'CP', 'Estado Civil', 'Banco para pago electrónico', 'Numero de cuenta para pago electrónico', 'Sucursal para pago electrónico', 'Registro patronal del IMSS']
      ];

      data.forEach(function (row) {
        // Formatear el código agregando ceros a la izquierda
        var codigoFormateado = String(row.codigo).padStart(5, '0');

        content.push([
          codigoFormateado,
          formatDate(row.fecha_alta), // Formatear fecha_alta
          row.ap_pat, row.ap_mat, row.nombre, row.ubicacion, row.salario_diario, row.sbc, row.departamento,
          row.turno, row.nss, row.rfc, row.curp, row.sexo, formatDate(row.fecha_nac), // Formatear fecha_nac 
          row.puesto, row.entidad, row.cp,
          row.estado_civil,
          row.e_banco, row.n_ecuenta, row.suc_epago, row.imss_pat
        ]);
      });

      // Crear un libro de Excel
      var ws = XLSX.utils.aoa_to_sheet(content);
      var wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, "Empleados");

      // Descargar el archivo Excel
      XLSX.writeFile(wb, 'Empleados.xlsx');
    }
  };
  xhr.open("GET", "export_codigo.php?cod1=" + cod1 + "&cod2=" + cod2, true);
  xhr.send();
}