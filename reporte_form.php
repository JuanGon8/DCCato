<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$tipo_usuario = $_SESSION['tipo_usuario'];
?>
<?php
include 'navbar.php';
?>
<div id="layoutSidenav_content">
    <main>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Alta de reportes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Inicio</a></li>
                <li class="breadcrumb-item active">Alta de reportes</li>
            </ol>
            <form action="enviar_formulario.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group mb-3">
                    <label for="correo_corporativo">Correo Corporativo</label>
                    <input type="email" class="form-control" id="correo_corporativo" name="correo_corporativo" required>
                </div>
                <div class="form-group mb-3">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="departamento">Departamento</label>
                    <select class="form-select" name="departamento" id="departamento" required>
                        <option disabled selected value="">Selecciona un departamento</option>
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Nóminas">Nóminas</option>
                        <option value="Recursos humanos">Recursos humanos</option>
                        <option value="Ventas">Ventas</option>
                        <option value="Gerencia vigilancia">Gerencia vigilancia</option>
                        <option value="Gerencia limpieza">Gerencia limpieza</option>
                        <option value="Facturación">Facturación</option>
                        <option value="Recepción">Recepción</option>
                        <option value="Sistemas">Sistemas</option>
                        <option value="REPSE">REPSE</option>
                        <option value="Público general">Público general</option>
                        <option value="Central">Central</option>
                    </select>
                    <div class="invalid-feedback">Por favor, selecciona un departamento.</div>
                </div>
                <div class="form-group mb-3">
                    <label for="fecha">Hora del reporte</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="fecha" name="fecha" readonly>
                        <button type="button" class="btn btn-secondary" id="btnActualizarHora"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </div>
                </div>
                <input type="hidden" name="folio" id="folio" value="" />
                <button type="submit" class="btn btn-primary">Enviar reporte</button>
            </form>
        </div>
    </main>
</div>
<script>
    // Función para obtener la fecha y hora actual en el formato deseado
    function obtenerFechaHoraActual() {
        var fechaHora = new Date();

        // Formato de fecha y hora (puedes personalizarlo según tus necesidades)
        var formatoFechaHora = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };

        // Convierte la fecha y hora a una cadena con el formato especificado
        return fechaHora.toLocaleString('es-ES', formatoFechaHora);
    }

    // Función para actualizar la fecha y hora en el campo de entrada
    function actualizarFechaHora() {
        var inputFecha = document.getElementById('fecha');
        inputFecha.value = obtenerFechaHoraActual();
    }

    // Asocia la función de actualización con el botón y llama a la función inicialmente
    document.getElementById('btnActualizarHora').addEventListener('click', actualizarFechaHora);
    actualizarFechaHora();

    // Actualiza automáticamente cada 5 segundos
    setInterval(actualizarFechaHora, 5000);
</script>
<script>
    const selects = document.querySelectorAll("select");

    selects.forEach(select => {
        select.addEventListener("change", function() {
            if (this.value === "") {
                this.setCustomValidity("Debes seleccionar una opción válida");
            } else {
                this.setCustomValidity("");
            }
        });
    });
</script>
<!-- ... (otros encabezados) ... -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- ... (otros encabezados) ... -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Función para generar un folio aleatorio de 5 dígitos sin repetición
    function generarFolio() {
        var folio = '';
        var digitosDisponibles = '0123456789';

        for (var i = 0; i < 5; i++) {
            // Selecciona un dígito aleatorio
            var indice = Math.floor(Math.random() * digitosDisponibles.length);
            var digito = digitosDisponibles.charAt(indice);

            // Agrega el dígito al folio y quítalo de los disponibles para evitar repetición
            folio += digito;
            digitosDisponibles = digitosDisponibles.replace(digito, '');
        }

        return folio;
    }

    // Espera a que se cargue el DOM
    $(document).ready(function() {
        // Captura el evento submit del formulario
        $('form').submit(function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de la manera convencional

            // Genera un folio
            var folioGenerado = generarFolio();

            // Agregar el folio al formulario
            $(this).append('<input type="hidden" name="folio_js" value="' + folioGenerado + '">');

            // Muestra el Sweet Alert con el folio generado
            Swal.fire({
                title: '¡Éxito!',
                text: 'Tu reporte se ha generado exitosamente. Folio: ' + folioGenerado,
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                // Verifica si el botón "Aceptar" fue presionado
                if (result.isConfirmed) {
                    // Recarga la página
                    location.reload();
                }
            });

            // Realiza la petición AJAX
            $.ajax({
                type: 'POST',
                url: 'enviar_formulario.php', // Ruta a tu script PHP
                data: $(this).serialize(), // Serializa los datos del formulario
                success: function(response) {
                    // Maneja la respuesta del servidor
                    console.log(response);
                },
                error: function(error) {
                    // Maneja el error en caso de que la petición AJAX falle
                    console.log('Error:', error);
                }
            });
        });
    });
</script>
<script>
    // Obtiene el elemento de entrada por su ID
    var inputFecha = document.getElementById('fecha');

    // Obtiene el elemento del botón por su ID
    var btnActualizarHora = document.getElementById('btnActualizarHora');

    // Actualiza el valor del campo de entrada con la fecha y hora actual
    function actualizarHora() {
        inputFecha.value = obtenerFechaHoraActual();
    }

    // Asigna la función actualizarHora al evento click del botón
    btnActualizarHora.addEventListener('click', actualizarHora);
</script>