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
            <h1 class="mt-4">Control de expedientes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Recursos humanos</a></li>
                <li class="breadcrumb-item active">Control de expedientes</li>
        </div>
        <div class="card mx-4 mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="example6" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr class="tdh">
                                <th class="acciones">Más información</th>
                                <th class="acciones">Acciones</th>
                                <th>Código</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Nombre</th>
                                <th>RFC</th>
                                <th>CURP</th>
                                <th>Contrato firmado</th>
                                <th>Acta de nacimiento</th>
                                <th>NSS</th>
                                <th>INE</th>
                                <th>Cartilla militar</th>
                                <th>Comprobante de domicilio</th>
                                <th>Comprobante de estudio</th>
                                <th>Carta de recomendación</th>
                                <th>Antecedentes no penales</th>
                                <th>Alta ante IMSS</th>
                                <th>Banco</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado2->fetch_assoc()) { ?>
                                <tr id="row_<?php echo $row['codigo']; ?>">
                                    <td class="tdh"></td>
                                    <td class="tdh">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['codigo']; ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <!-- <button class="delete-button" onclick="deleteRow(<?php echo $row['codigo']; ?>)">
                                                            <i class="fas fa-trash"></i>
                                                        </button> -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_<?php echo $row['codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xs modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar información</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="update2.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="nombreu" id="nombreu" value="<?php echo $_SESSION['nombre']; ?>">
                                                            <input type="hidden" name="hora_registro" id="hora_registro">
                                                            <div class="row">
                                                                <input type="hidden" name="codigo" value="<?php echo $row['codigo']; ?>">
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="contrato" name="contrato" <?php echo $row['contrato'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="contrato">
                                                                            Contrato firmado
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="acta_nac" name="acta_nac" <?php echo $row['acta_nac'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="acta_nac">
                                                                            Acta de nacimiento
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div> <br>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="nsss" name="nsss" <?php echo $row['nsss'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="nsss">
                                                                            NSS
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="car_mil" name="car_mil" <?php echo $row['car_mil'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="car_mil">
                                                                            Cartilla militar
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div> <br>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="com_doc" name="com_doc" <?php echo $row['com_doc'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="com_doc">
                                                                            Comprobante de domicilio
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="com_estu" name="com_estu" <?php echo $row['com_estu'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="com_estu">
                                                                            Comprobante de estudio
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div><br>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="ine" name="ine" <?php echo $row['ine'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="ine">
                                                                            INE
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="car_rec" name="car_rec" <?php echo $row['car_rec'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="car_rec">
                                                                            Carta de recomendación
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div> <br>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="ant_pen" name="ant_pen" <?php echo $row['ant_pen'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="ant_pen">
                                                                            Antecedentes no penales
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="alta_imss" name="alta_imss" <?php echo $row['alta_imss'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="alta_imss">
                                                                            Alta ante IMSS
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                            <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="tbanco" name="tbanco" <?php echo $row['tbanco'] ? 'checked' : ''; ?>>
                                                                        <label class="form-check-label" for="tbanco">
                                                                            Banco
                                                                        </label>
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
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['ap_pat']; ?></td>
                                    <td><?php echo $row['ap_mat']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['rfc']; ?></td>
                                    <td><?php echo $row['curp']; ?></td>
                                    <?php
                                    // Arreglo con los nombres de las columnas en tu base de datos
                                    $columnNames = array('contrato', 'acta_nac', 'ine', 'nsss', 'car_mil', 'com_doc', 'com_estu', 'car_rec', 'ant_pen', 'alta_imss', 'tbanco');

                                    foreach ($columnNames as $columnName) {
                                        $value = $row[$columnName];
                                        $text = ($value == 1) ? 'Si' : 'No';

                                        echo '<td style="text-align: center;">';
                                        echo '<input type="checkbox" ' . ($value ? 'checked' : '') . '>';
                                        echo '<span class="op">' . $text . '</span>';
                                        echo '</td>';
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        </ol>
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
                url: './update_files/update2.php',
                data: form.serialize(), // Serializa los datos del formulario
                success: function(response) {
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
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

