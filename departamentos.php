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
            <h1 class="mt-4">Departamentos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Catálogo</a></li>
                <li class="breadcrumb-item active">Departamentos</li>
            </ol>
            <table width="100%">
                <tr>
                    <td width="25%" valign="top"> <!-- Esto hace que la celda ocupe la mitad de la tabla -->
                        <form method="POST" action="guardar_departamento.php" enctype="multipart/form-data">
                            <input type="hidden" name="nombreu" id="nombreu" value="<?php echo $_SESSION['nombre']; ?>">
                            <input type="hidden" name="hora_registro" id="hora_registro">
                            <div class="row">
                                <div class="col-11">
                                    <label for="departamentot">Departamento<i class="fa-solid fa-circle-exclamation" title="Este campo solo admite letras mayúsculas"></i></label>
                                    <input class="form-control inputwidth" type="text" name="departamentot" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                            <br>
                            <div id="liveAlertPlaceholder"></div>
                            <input type="submit" value="Guardar" class="btn btn-primary col-4 submitbutton" id="liveAlertBtn">
                        </form>
                    </td>
                    <td width="60%"> <!-- Esto hace que la celda ocupe la otra mitad de la tabla -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="example11" width="100%" cellspacing="0">
                                <thead class="table-dark">
                                    <tr class="tdh">
                                        <th class="acciones">Acciones</th>
                                        <th>ID</th>
                                        <th>Departamentos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $resultado5->fetch_assoc()) { ?>
                                        <tr id="row_<?php echo $row['id']; ?>">
                                            <td class="tdh">
                                                <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarRegistro(<?php echo $row['id']; ?>)">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                                <div class="modal modal-lg fade" id="exampleModal_<?php echo $row['id']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar información</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="update_d.php" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                        <div class="col">
                                                                            <label for="departamentot">Departamento</label>
                                                                            <input class="form-control inputwidth" type="text" name="departamentot" value="<?php echo $row['departamentot']; ?>">
                                                                        </div>

                                                                        <br>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                            <input type="submit" value="Guardar" class="btn btn-primary submitbutton" id="liveAlertBtn">
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['departamentot']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</div>
<script>
    function eliminarRegistro(id) {
        console.log("id: " + id);

        Swal.fire({
            title: "¿Estás seguro de que deseas eliminar este departamento?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar una solicitud AJAX para eliminar el registro
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "eliminar_dep.php?id=" + id, true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Registro eliminado con éxito, puedes realizar alguna acción adicional si es necesario
                        // Por ejemplo, eliminar la fila de la tabla
                        Swal.fire({
                            title: "Registro eliminado exitosamente",
                            icon: "success",
                            timerProgressBar: true,
                            timer: 2000  // Timer set to 2 seconds
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
</script>

<script>
function moverRepse(id) {
    console.log("id: " + id);

    if (confirm("¿Estás seguro de que deseas mover este registro?")) {
        // Realizar una solicitud AJAX para ejecutar el archivo PHP 'mover_repse.php'
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "mover_repse.php?id=" + id, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Registro movido con éxito, puedes realizar alguna acción adicional si es necesario
                alert('Registros movidos a departamento_repse.');
            }
        };
        xhr.send();
    }
}
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
                url: 'guardar_departamento.php',
                data: form.serialize(), // Serializa los datos del formulario
                success: function(response) {
                    // Muestra SweetAlert2 en caso de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Departamento registrado exitosamente',
                        showConfirmButton: false,
                        timer: 1500  // Cierra automáticamente después de 1.5 segundos
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
