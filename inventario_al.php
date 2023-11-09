<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$tipo_usuario = $_SESSION['tipo_usuario'];
$sql3 = "SELECT * FROM inv_alm";
$resultado13 = $mysqli->query($sql3);
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
            <h1 class="mt-4">Inventario almacén</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Inventario</a></li>
                <li class="breadcrumb-item active">Almacén</li>
            </ol>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="example11" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr class="tdh">
                            <th class="acciones">Acciones</th>
                            <th>Código de producto</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Costo U.</th>
                            <th>Precio venta</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultado13->fetch_assoc()) { ?>
                            <tr id="row_<?php echo $row['codigo_pro']; ?>">
                                <td class="tdh">
                                    <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['codigo_pro']; ?>">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarRegistro(<?php echo $row['codigo_pro']; ?>)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <div class="modal modal-lg fade" id="exampleModal_<?php echo $row['codigo_pro']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar información</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="update_u.php" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <input type="hidden" name="id" value="<?php echo $row['codigo_pro']; ?>">
                                                            <div class="col">
                                                                <label for="codigo_pro">Código de producto</label>
                                                                <input class="form-control inputwidth" type="text" name="codigo_pro" value="<?php echo $row['codigo_pro']; ?>">
                                                            </div>
                                                            <div class="col">
                                                                <label for="nombrep">Nombre</label>
                                                                <input class="form-control inputwidth" type="text" name="nombrep" value="<?php echo $row['nombrep']; ?>">
                                                            </div>
                                                            <div class="col">
                                                                <label for="descripcion">Descripción</label>
                                                                <input class="form-control inputwidth" type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="costou">Costo U.</label>
                                                                <input class="form-control inputwidth" type="text" name="costou" value="<?php echo $row['costou']; ?>">
                                                            </div>
                                                            <div class="col">
                                                                <label for="preciou">Precio venta</label>
                                                                <input class="form-control inputwidth" type="text" name="preciou" value="<?php echo $row['preciou']; ?>">
                                                            </div>
                                                            <div class="col">
                                                                <label for="nombreu">Usuario</label>
                                                                <input class="form-control inputwidth" type="text" name="nombreu" value="<?php echo $row['nombreu']; ?>">
                                                            </div>
                                                        </div><br> <br>
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
                                <td><?php echo $row['codigo_pro']; ?></td>
                                <td><?php echo $row['nombrep']; ?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                                <td>$<?php echo $row['costou']; ?></td>
                                <td>$<?php echo $row['preciou']; ?></td>
                                <td><?php echo $row['nombreu']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>