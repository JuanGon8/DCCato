$(document).ready(function () {
    var table = $('#example2r').DataTable({
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
        targets: [1, 14, 24],
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
  
     // Agregar inputs de búsqueda para las columnas 2, 3 y 4 en el tfoot
     $('#example2 tfoot th').each(function (index) {
      if (index === 2 || index === 3 || index === 4) {
          var column = table.column(index);
          $(this).html('<input type="text" placeholder="Buscar ' + $(this).text() + '" />');
  
          $('input', this).on('keyup change', function () {
              if (column.search() !== this.value) {
                  column.search(this.value).draw();
              }
          });
      }
  });
  
  });
  $(document).ready(function() {
    $.ajax({
        url: 'get_usuarios_auxiliares.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            var select = $('#asignado');
            select.empty(); // Clear any existing options
            $.each(response, function(index, usuario) {
                select.append($('<option>', {
                    value: usuario.id,
                    text: usuario.nombre
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching usuarios auxiliares:', error);
        }
    });
});