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
        <link href="datatables/DataTables-1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/AutoFill-2.6.0/css/autoFill.bootstrap5.css" rel="stylesheet">
        <link href="datatables/Buttons-2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/ColReorder-1.7.0/css/colReorder.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/DateTime-1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet">
        <link href="datatables/FixedColumns-4.3.0/css/fixedColumns.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/FixedHeader-3.4.0/css/fixedHeader.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/KeyTable-2.11.0/css/keyTable.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/Responsive-2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/RowGroup-1.4.1/css/rowGroup.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/RowReorder-1.4.1/css/rowReorder.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/Scroller-2.3.0/css/scroller.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/SearchBuilder-1.6.0/css/searchBuilder.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/SearchPanes-2.2.0/css/searchPanes.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/Select-1.7.0/css/select.bootstrap5.min.css" rel="stylesheet">
        <link href="datatables/StateRestore-1.3.0/css/stateRestore.bootstrap5.min.css" rel="stylesheet">

        <script src="datatables/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
        <script src="datatables/JSZip-3.10.1/jszip.min.js"></script>
        <script src="datatables/pdfmake-0.2.7/pdfmake.min.js"></script>
        <script src="datatables/pdfmake-0.2.7/vfs_fonts.js"></script>
        <script src="datatables/DataTables-1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="datatables/DataTables-1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="datatables/AutoFill-2.6.0/js/dataTables.autoFill.min.js"></script>
        <script src="datatables/AutoFill-2.6.0/js/autoFill.bootstrap5.min.js"></script>
        <script src="datatables/Buttons-2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="datatables/Buttons-2.4.2/js/buttons.bootstrap5.min.js"></script>
        <script src="datatables/Buttons-2.4.2/js/buttons.colVis.min.js"></script>
        <script src="datatables/Buttons-2.4.2/js/buttons.html5.min.js"></script>
        <script src="datatables/Buttons-2.4.2/js/buttons.print.min.js"></script>
        <script src="datatables/ColReorder-1.7.0/js/dataTables.colReorder.min.js"></script>
        <script src="datatables/DateTime-1.5.1/js/dataTables.dateTime.min.js"></script>
        <script src="datatables/FixedColumns-4.3.0/js/dataTables.fixedColumns.min.js"></script>
        <script src="datatables/FixedHeader-3.4.0/js/dataTables.fixedHeader.min.js"></script>
        <script src="datatables/KeyTable-2.11.0/js/dataTables.keyTable.min.js"></script>
        <script src="datatables/Responsive-2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="datatables/Responsive-2.5.0/js/responsive.bootstrap5.js"></script>
        <script src="datatables/RowGroup-1.4.1/js/dataTables.rowGroup.min.js"></script>
        <script src="datatables/RowReorder-1.4.1/js/dataTables.rowReorder.min.js"></script>
        <script src="datatables/Scroller-2.3.0/js/dataTables.scroller.min.js"></script>
        <script src="datatables/SearchBuilder-1.6.0/js/dataTables.searchBuilder.min.js"></script>
        <script src="datatables/SearchBuilder-1.6.0/js/searchBuilder.bootstrap5.min.js"></script>
        <script src="datatables/SearchPanes-2.2.0/js/dataTables.searchPanes.min.js"></script>
        <script src="datatables/SearchPanes-2.2.0/js/searchPanes.bootstrap5.min.js"></script>
        <script src="datatables/Select-1.7.0/js/dataTables.select.min.js"></script>
        <script src="datatables/StateRestore-1.3.0/js/dataTables.stateRestore.min.js"></script>
        <script src="datatables/StateRestore-1.3.0/js/stateRestore.bootstrap5.min.js"></script>

        <script src="main.js"></script>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Reportes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Menú administrador</a></li>
                <li class="breadcrumb-item active">Reportes</li>
        </div>
        <div class="card mx-4 mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="exampler" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr class="tdh">
                                <th class="acciones">Más información</th>
                                <th class="acciones">Acciones</th>
                                <th>Folio</th>
                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Descripción</th>
                                <th>Fecha (alta)</th>
                                <th>Asignado a</th>
                                <th>Diagnostico téc</th>
                                <th>Materiales</th>
                                <th>Tipo servicio</th>
                                <th>Hora concluido</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado13->fetch_assoc()) { ?>
                                <tr id="row_<?php echo $row['folio']; ?>">
                                    <td class="tdh"></td>
                                    <td class="tdh">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['folio']; ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <!-- <button class="delete-button" onclick="deleteRow(<?php echo $row['codigo']; ?>)">
                                                            <i class="fas fa-trash"></i>
                                                        </button> -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_<?php echo $row['folio']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar información</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="updater.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="nombreu" id="nombreu" value="<?php echo $_SESSION['nombre']; ?>">
                                                            <input type="hidden" name="hora_registro" id="hora_registro">
                                                            <div class="row">
                                                                <input type="hidden" name="folio" value="<?php echo $row['folio']; ?>">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="asignado">Asignado a</label>
                                                                        <select name="asignado" id="moto" class="form-select">
                                                                            <option selected value="<?php echo $row['asignado']; ?>"><?php echo $row['asignado']; ?></option>
                                                                            <option value="Antonio D">Antonio D</option>
                                                                            <option value="Juan G">Juan G</option>
                                                                            <option value="Juan P">Juan P</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="diagnostico_t">Diagnóstico tec</label>
                                                                    <input class="form-control" type="text" name="diagnostico_t" value="<?php echo $row['diagnostico_t']; ?>">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="materiales">Materiales utilizados</label>
                                                                    <input class="form-control" type="text" name="materiales" value="<?php echo $row['materiales']; ?>">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="tipo_servicio">Tipo de servicio</label>
                                                                        <select name="tipo_servicio" id="moto" class="form-select">
                                                                            <option selected value="<?php echo $row['tipo_servicio']; ?>"><?php echo $row['tipo_servicio']; ?></option>
                                                                            <option value="Mantanimiento">Mantanimiento</option>
                                                                            <option value="Reparación">Reparación</option>
                                                                            <option value="Revisión">Revisión</option>
                                                                            <option value="Soporte">Soporte</option>
                                                                            <option value="Configuración">Configuración</option>
                                                                            <option value="Instalación">Instalación</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="hora_concluido">Hora concluido</label>
                                                                    <input type="datetime-local" id="fechaActual1" value="<?php echo $row['hora_concluido']; ?><" min="1920-01-01" name="hora_concluido">
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="estado">Estado</label>
                                                                        <select name="estado" id="moto" class="form-select">
                                                                            <option selected value="<?php echo $row['estado']; ?>"><?php echo $row['estado']; ?></option>
                                                                            <option value="Completado">Completado</option>
                                                                            <option value="Pendiente">Pendiente</option>
                                                                            <option value="En proceso">En proceso</option>
                                                                            <option value="No atendido">No atendido</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div><br>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <input type="submit" value="Guardar" class="btn btn-primary submitbutton" id="liveAlertBtn">
                                                            </div>


                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                    <!-- <th>Asignado a</th>
                                <th>Diagnostico téc</th>
                                <th>Tipo servicio</th>
                                <th>Hora concluido</th>
                                <th>Estado</th> -->
                                    <td><?php echo $row['folio']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['departamento']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['fecha']; ?></td>
                                    <td><?php echo $row['asignado']; ?></td>
                                    <td><?php echo $row['diagnostico_t']; ?></td>
                                    <td><?php echo $row['materiales']; ?></td>
                                    <td><?php echo $row['tipo_servicio']; ?></td>
                                    <td><?php echo $row['hora_concluido']; ?></td>
                                    <td><?php echo $row['estado']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
</div>
<script>
    // Obtener el elemento input por su ID
    var inputFechaHora = document.getElementById('fechaActual1');

    // Obtener la fecha y hora actual en la zona horaria local
    var now = new Date();
    var year = now.getFullYear();
    var month = (now.getMonth() + 1).toString().padStart(2, '0');
    var day = now.getDate().toString().padStart(2, '0');
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');

    // Formatear la fecha y hora en el formato aceptado por datetime-local
    var formattedDate = `${year}-${month}-${day}T${hours}:${minutes}`;

    // Establecer la fecha y hora actual como el valor del input
    inputFechaHora.value = formattedDate;
</script>
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de forma tradicional
            
            // Guarda una referencia al formulario para usarla dentro de la función de éxito
            var form = $(this);

            // Realiza la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: './update_files/updater.php',
                data: form.serialize(), // Serializa los datos del formulario
                success: function(response) {
                    // Muestra SweetAlert2 en caso de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Reporte actualizado exitosamente',
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
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

