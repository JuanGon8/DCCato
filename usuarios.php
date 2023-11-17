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
            <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td width="25%" valign="top"> <!-- Esto hace que la celda ocupe la mitad de la tabla -->
                                    <form method="POST" action="guardar_usuario.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-11">
                                                <label for="nombre">Nombre</label>
                                                <input class="form-control inputwidth" type="text" name="nombre" required><br>
                                                <label for="usuario">Usuario</label>
                                                <input class="form-control inputwidth" type="text" name="usuario" required><br>
                                                <label for="password">Contraseña</label>
                                                <input class="form-control inputwidth" type="password" name="password" required><br>
                                                <div class="form-group">
                                                    <label for="depto">Departamento</label>
                                                    <select name="depto" id="depto" class="form-select" required>
                                                        <option selected disabled value="">Elige una opción</option>
                                                        <option value="Almacén">Almacén</option>
                                                        <option value="Recursos humanos">Recursos humanos</option>
                                                        <option value="Sistemas">Sistemas</option>
                                                        <!-- <option value="Nocturno">Nocturno</option> -->
                                                    </select> <br>
                                                </div>
                                                <label for="tipo_usuario">Nivel de usuario</label>
                                                <input class="form-control inputwidth" type="text" name="tipo_usuario" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div id="liveAlertPlaceholder"></div>
                                        <input type="submit" value="Guardar" class="btn btn-primary col-4 submitbutton" id="liveAlertBtn">
                                    </form>
                                </td>
                                <td width="60%"> <!-- Esto hace que la celda ocupe la otra mitad de la tabla -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="example6" width="100%" cellspacing="0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <!-- <th>Acciones</th> -->

                                                    <th>ID</th>
                                                    <th>Nivel de usuario</th>
                                                    <th>Nombre</th>
                                                    <th>Departamento</th>
                                                    <th>Usuario</th>
                                                    <th>Contraseña</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $resultado8->fetch_assoc()) { ?>
                                                    <tr id="row_<?php echo $row['id']; ?>">
                                                        <!-- <td align="center">
                                                                    <button class="delete-button" onclick="deleteRow(<?php echo $row['id']; ?>)">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </td> -->
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['tipo_usuario']; ?></td>
                                                        <td><?php echo $row['nombre']; ?></td>
                                                        <td><?php echo $row['depto']; ?></td>
                                                        <td><?php echo $row['usuario']; ?></td>
                                                        <td><?php echo $row['password']; ?></td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
    </main>
</div>
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de forma tradicional
            
            // Guarda una referencia al formulario para usarla dentro de la función de éxito
            var form = $(this);

            // Realiza la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: './register_files/guardar_usuario.php',
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
