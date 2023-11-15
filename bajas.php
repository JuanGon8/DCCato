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
            <h1 class="mt-4">Bajas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Menú administrador</a></li>
                <li class="breadcrumb-item active">Bajas</li>
        </div>
        <div class="card mx-4 mb-4">
            <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="example6" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>Mostrar información</th>
                                <th>Acciones</th>
                                <th>Código</th>
                                <th>Fecha de alta</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Nombre</th>
                                <th>Ubicación (Tipo de periodo)</th>
                                <th>Salario diario</th>
                                <th>SBC</th>
                                <th>Departamento</th>
                                <th>Turno de trabajo</th>
                                <th>Num seguridad social</th>
                                <th>RFC</th>
                                <th>CURP</th>
                                <th>Sexo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Puesto</th>
                                <th>Entidad federativa de nacimiento</th>
                                <th>CP</th>
                                <th>Estado Civil</th>
                                <th>Banco para pago electrónico</th>
                                <th>Numero de cuenta para pago electrónico</th>
                                <th>Sucursal para pago electrónico</th>
                                <th>Registro patronal del IMSS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado7->fetch_assoc()) { ?>

                                <tr id="row_<?php echo $row['codigo']; ?>">
                                    <td></td>
                                    <td class="tdh"><button class="delete-button" onclick="eliminarRegistro(<?php echo $row['codigo']; ?>)">
                                            <i class="fa-solid fa-arrow-rotate-left"></i>
                                        </button></td>
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['fecha_alta']; ?></td>
                                    <td><?php echo $row['ap_pat']; ?></td>
                                    <td><?php echo $row['ap_mat']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['ubicacion']; ?></td>
                                    <td><?php echo $row['salario_diario']; ?></td>
                                    <td><?php echo $row['sbc']; ?></td>
                                    <td><?php echo $row['departamento']; ?></td>
                                    <td><?php echo $row['turno']; ?></td>
                                    <td><?php echo $row['nss']; ?></td>
                                    <td><?php echo $row['rfc']; ?></td>
                                    <td><?php echo $row['curp']; ?></td>
                                    <td><?php echo $row['sexo']; ?></td>
                                    <td><?php echo $row['fecha_nac']; ?></td>
                                    <td><?php echo $row['puesto']; ?></td>
                                    <td><?php echo $row['entidad']; ?></td>
                                    <td><?php echo $row['cp']; ?></td>
                                    <td><?php echo $row['estado_civil']; ?></td>
                                    <td><?php echo $row['e_banco']; ?></td>
                                    <td><?php echo $row['n_ecuenta']; ?></td>
                                    <td><?php echo $row['suc_epago']; ?></td>
                                    <td><?php echo $row['imss_pat']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
</div>
</main>
</div>
<script>
	function eliminarRegistro(codigo) {
		console.log("codigo: " + codigo);

		Swal.fire({
			title: "¿Estás seguro de que deseas recuperar este empleado?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Sí, recuperar",
			cancelButtonText: "Cancelar"
		}).then((result) => {
			if (result.isConfirmed) {
				// Realizar una solicitud AJAX para eliminar el registro
				var xhr = new XMLHttpRequest();
				xhr.open("GET", "recuperar_baja.php?codigo=" + codigo, true);
				xhr.onload = function() {
					if (xhr.status === 200) {
						// Registro eliminado con éxito, puedes realizar alguna acción adicional si es necesario
						// Por ejemplo, eliminar la fila de la tabla
						Swal.fire({
							title: "Registro recuperado exitosamente",
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