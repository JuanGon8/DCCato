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
			<h1 class="mt-4">Registro candidatos</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="">Módulo de reclutamiento</a></li>
				<li class="breadcrumb-item active">Registro candidatos</li>
			</ol>
			<!-- Formulario usuario 1-4 -->
			<?php if ($tipo_usuario == 1  || $tipo_usuario == 2 || $tipo_usuario == 3 || $tipo_usuario == 4) { ?>
				<form method="POST" action="guardar_informacion2.php" enctype="multipart/form-data" id="guardar">
					<input type="hidden" name="nombreu" id="nombreu" value="<?php echo $_SESSION['nombre']; ?>">
					<input type="hidden" name="hora_registro" id="hora_registro">

					<div class="row">
						<div class="col">
							<label for="nombres">Nombres</label>
							<input class="form-control inputwidth" type="text" name="nombres">
						</div>
						<div class="col">
							<label for="primer_apellido">Primer Apellido</label>
							<input class="form-control" type="text" name="primer_apellido">
						</div>
						<div class="col">
							<label for="segundo_apellido">Segundo Apellido</label>
							<input class="form-control" type="text" name="segundo_apellido">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="telefono">Teléfono <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
							<input class="form-control" type="text" name="telefono" maxlength="10">
						</div>
						<div class="col">
							<label for="edad">Edad <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
							<input class="form-control" type="text" name="edad" maxlength="2">
						</div>
						<div class="col">
							<label for="direccion">Dirección</label>
							<input class="form-control" type="text" name="direccion">
						</div>
						<div class="col">
							<div class="form-group">
								<label for="moto">¿Cuenta con vehículo?</label>
								<select name="moto" id="moto" class="form-control">
									<option selected disabled value="">Elige una opción</option>
									<option value="Sí">Sí</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col">
							<label for="ultimo_empleo">Último Empleo</label>
							<input class="form-control" type="text" name="ultimo_empleo">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-2">
							<label for="antiguedad">Antigüedad <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
							<input class="form-control" type="text" name="antiguedad" maxlength="2">
						</div>
						<div class="col">
							<label for="motivo_salida">Motivo de Salida</label>
							<input class="form-control" type="text" name="motivo_salida">
						</div>
						<div class="col">
							<label for="puesto_aplicado">Puesto Aplicado</label>
							<input class="form-control" type="text" name="puesto_aplicado">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="comentarios">Comentarios</label>
							<textarea class="form-control texta" name="comentarios" rows="5"></textarea>
						</div>
					</div>
					<br>
					<div id="liveAlertPlaceholder"></div>
					<input type="submit" value="Guardar" class="btn btn-primary col-2 submitbutton" id="liveAlertBtn">
				</form>
			<?php } ?><br>

			<div class="card mb-4">
				<div class="card-body">
					<!-- Tabla usuario 1 y 2 -->
					<?php if ($tipo_usuario == 1 || $tipo_usuario == 2) { ?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="example" width="100%" cellspacing="0">
								<thead class="table-dark">
									<tr class="tdh">
										<th class="acciones">Mostrar información</th>
										<th class="acciones">Acciones</th>
										<th>ID</th>
										<th>Nombre</th>
										<th>Primer apellido</th>
										<th>Segundo apellido</th>
										<th>Teléfono</th>
										<th>Dirección</th>
										<th>Edad</th>
										<th>Moto</th>
										<th>Último empleo</th>
										<th>Antiguedad</th>
										<th>Motivo de salida</th>
										<th>Puesto aplicado</th>
										<th>Comentarios</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($row = $resultado3->fetch_assoc()) { ?>
										<tr id="row_<?php echo $row['id']; ?>">
											<td class="tdh"></td>
											<td class="tdh">
												<button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>">
													<i class="fa-solid fa-pencil"></i>
												</button>
												<button type="button" class="btn btn-danger" onclick="eliminarRegistro(<?php echo $row['id']; ?>)">
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
																<form method="POST" action="updatec.php" enctype="multipart/form-data">
																	<div class="row">
																		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
																		<div class="col">
																			<label for="nombres">Nombres</label>
																			<input class="form-control inputwidth" type="text" name="nombres" value="<?php echo $row['nombres']; ?>">
																		</div>
																		<div class="col">
																			<label for="primer_apellido">Primer Apellido</label>
																			<input class="form-control" type="text" name="primer_apellido" value="<?php echo $row['primer_apellido']; ?>">
																		</div>
																		<div class="col">
																			<label for="segundo_apellido">Segundo Apellido</label>
																			<input class="form-control" type="text" name="segundo_apellido" value="<?php echo $row['segundo_apellido']; ?>">
																		</div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col">
																			<label for="telefono">Teléfono <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
																			<input class="form-control" type="text" name="telefono" maxlength="10" pattern="[0-9]{10}" value="<?php echo $row['telefono']; ?>">
																		</div>
																		<div class="col">
																			<label for="edad">Edad <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
																			<input class="form-control" type="text" name="edad" maxlength="2" pattern="[0-9]{2}" value="<?php echo $row['edad']; ?>">
																		</div>
																		<div class="col">
																			<label for="direccion">Dirección</label>
																			<input class="form-control" type="text" name="direccion" value="<?php echo $row['direccion']; ?>">
																		</div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label for="moto">¿Cuenta con vehículo?</label>
																				<select name="moto" id="moto" class="form-select">
																					<option selected value="<?php echo $row['moto']; ?>"><?php echo $row['moto']; ?></option>
																					<option value="Sí">Sí</option>
																					<option value="No">No</option>
																				</select>
																			</div>
																		</div>
																		<div class="col">
																			<label for="ultimo_empleo">Último Empleo</label>
																			<input class="form-control" type="text" name="ultimo_empleo" value="<?php echo $row['ultimo_empleo']; ?>">
																		</div>
																		<div class="col">
																			<label for="antiguedad">Antigüedad <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
																			<input class="form-control" type="text" name="antiguedad" maxlength="2" pattern="[0-9]{2}" value="<?php echo $row['antiguedad']; ?>">
																		</div>

																	</div>
																	<br>
																	<div class="row">
																		<div class="col">
																			<label for="motivo_salida">Motivo de Salida</label>
																			<input class="form-control" type="text" name="motivo_salida" value="<?php echo $row['motivo_salida']; ?>">
																		</div>
																		<div class="col">
																			<label for="puesto_aplicado">Puesto Aplicado</label>
																			<input class="form-control" type="text" name="puesto_aplicado" value="<?php echo $row['puesto_aplicado']; ?>">
																		</div>
																		<div class="col">
																			<label for="comentarios">Comentarios</label>
																			<input class="form-control" type="text" name="comentarios" value="<?php echo $row['comentarios']; ?>">
																		</div>
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
											<td><?php echo $row['nombres']; ?></td>
											<td><?php echo $row['primer_apellido']; ?></td>
											<td><?php echo $row['segundo_apellido']; ?></td>
											<td><?php echo $row['telefono']; ?></td>
											<td><?php echo $row['direccion']; ?></td>
											<td><?php echo $row['edad']; ?></td>
											<td><?php echo $row['moto']; ?></td>
											<td><?php echo $row['ultimo_empleo']; ?></td>
											<td><?php echo $row['antiguedad']; ?></td>
											<td><?php echo $row['motivo_salida']; ?></td>
											<td><?php echo $row['puesto_aplicado']; ?></td>
											<td><?php echo $row['comentarios']; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

						</div>
					<?php } ?>
					<!-- Tabla usuario 3 -->
					<?php if ($tipo_usuario == 3) { ?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="example1" width="100%" cellspacing="0">
								<thead class="table-dark">
									<tr class="tdh">
										<th class="acciones">Mostrar información</th>
										<th class="acciones">Acciones</th>
										<th>ID</th>
										<th>Nombre</th>
										<th>Primer apellido</th>
										<th>Segundo apellido</th>
										<th>Teléfono</th>
										<th>Dirección</th>
										<th>Edad</th>
										<th>Moto</th>
										<th>Último empleo</th>
										<th>Antiguedad</th>
										<th>Motivo de salida</th>
										<th>Puesto aplicado</th>
										<th>Comentarios</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($row = $resultado3->fetch_assoc()) { ?>
										<tr id="row_<?php echo $row['id']; ?>">
											<td class="tdh"></td>
											<td>
												<button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>">
													<i class="fa-solid fa-pencil"></i>
												</button>
												<div class="modal modal-lg fade" id="exampleModal_<?php echo $row['id']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header">
																<h1 class="modal-title fs-5" id="exampleModalLabel">Editar información</h1>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form method="POST" action="updatec.php" enctype="multipart/form-data">
																	<div class="row">
																		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
																		<div class="col">
																			<label for="nombres">Nombres</label>
																			<input class="form-control inputwidth" type="text" name="nombres" value="<?php echo $row['nombres']; ?>">
																		</div>
																		<div class="col">
																			<label for="primer_apellido">Primer Apellido</label>
																			<input class="form-control" type="text" name="primer_apellido" value="<?php echo $row['primer_apellido']; ?>">
																		</div>
																		<div class="col">
																			<label for="segundo_apellido">Segundo Apellido</label>
																			<input class="form-control" type="text" name="segundo_apellido" value="<?php echo $row['segundo_apellido']; ?>">
																		</div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col">
																			<label for="telefono">Teléfono <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
																			<input class="form-control" type="text" name="telefono" maxlength="10" pattern="[0-9]{10}" value="<?php echo $row['telefono']; ?>">
																		</div>
																		<div class="col">
																			<label for="edad">Edad <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
																			<input class="form-control" type="text" name="edad" maxlength="2" pattern="[0-9]{2}" value="<?php echo $row['edad']; ?>">
																		</div>
																		<div class="col">
																			<label for="direccion">Dirección</label>
																			<input class="form-control" type="text" name="direccion" value="<?php echo $row['direccion']; ?>">
																		</div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label for="moto">¿Cuenta con vehículo?</label>
																				<select name="moto" id="moto" class="form-select">
																					<option selected value="<?php echo $row['moto']; ?>"><?php echo $row['moto']; ?></option>
																					<option value="Sí">Sí</option>
																					<option value="No">No</option>
																				</select>
																			</div>
																		</div>
																		<div class="col">
																			<label for="ultimo_empleo">Último Empleo</label>
																			<input class="form-control" type="text" name="ultimo_empleo" value="<?php echo $row['ultimo_empleo']; ?>">
																		</div>
																		<div class="col">
																			<label for="antiguedad">Antigüedad <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
																			<input class="form-control" type="text" name="antiguedad" maxlength="2" pattern="[0-9]{2}" value="<?php echo $row['antiguedad']; ?>">
																		</div>

																	</div>
																	<br>
																	<div class="row">
																		<div class="col">
																			<label for="motivo_salida">Motivo de Salida</label>
																			<input class="form-control" type="text" name="motivo_salida" value="<?php echo $row['motivo_salida']; ?>">
																		</div>
																		<div class="col">
																			<label for="puesto_aplicado">Puesto Aplicado</label>
																			<input class="form-control" type="text" name="puesto_aplicado" value="<?php echo $row['puesto_aplicado']; ?>">
																		</div>
																		<div class="col">
																			<label for="comentarios">Comentarios</label>
																			<input class="form-control" type="text" name="comentarios" value="<?php echo $row['comentarios']; ?>">
																		</div>
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
											<td><?php echo $row['nombres']; ?></td>
											<td><?php echo $row['primer_apellido']; ?></td>
											<td><?php echo $row['segundo_apellido']; ?></td>
											<td><?php echo $row['telefono']; ?></td>
											<td><?php echo $row['direccion']; ?></td>
											<td><?php echo $row['edad']; ?></td>
											<td><?php echo $row['moto']; ?></td>
											<td><?php echo $row['ultimo_empleo']; ?></td>
											<td><?php echo $row['antiguedad']; ?></td>
											<td><?php echo $row['motivo_salida']; ?></td>
											<td><?php echo $row['puesto_aplicado']; ?></td>
											<td><?php echo $row['comentarios']; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

						</div>
					<?php } ?>
					<?php if ($tipo_usuario == 4 || $tipo_usuario == 5) { ?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="example11" width="100%" cellspacing="0">
								<thead class="table-dark">
									<tr class="tdh">
										<th class="acciones">Mostrar más información</th>
										<th>ID</th>
										<th>Nombre</th>
										<th>Primer apellido</th>
										<th>Segundo apellido</th>
										<th>Teléfono</th>
										<th>Dirección</th>
										<th>Edad</th>
										<th>Moto</th>
										<th>Último empleo</th>
										<th>Antiguedad</th>
										<th>Motivo de salida</th>
										<th>Puesto aplicado</th>
										<th>Comentarios</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($row = $resultado3->fetch_assoc()) { ?>

										<tr id="row_<?php echo $row['id']; ?>">
											<td></td>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['nombres']; ?></td>
											<td><?php echo $row['primer_apellido']; ?></td>
											<td><?php echo $row['segundo_apellido']; ?></td>
											<td><?php echo $row['telefono']; ?></td>
											<td><?php echo $row['direccion']; ?></td>
											<td><?php echo $row['edad']; ?></td>
											<td><?php echo $row['moto']; ?></td>
											<td><?php echo $row['ultimo_empleo']; ?></td>
											<td><?php echo $row['antiguedad']; ?></td>
											<td><?php echo $row['motivo_salida']; ?></td>
											<td><?php echo $row['puesto_aplicado']; ?></td>
											<td><?php echo $row['comentarios']; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

						</div>
					<?php } ?>
				</div>
			</div>
		</div>
</div>
</main>
</div>
<script>
   function eliminarRegistro(id) {
    console.log("id: " + id);

    if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
        // Realizar una solicitud AJAX para eliminar el registro
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "./delete-files/eliminar_candidatos.php?id=" + id, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Registro eliminado con éxito, puedes realizar alguna acción adicional si es necesario
                // Por ejemplo, eliminar la fila de la tabla
                var button = event.target;
                var row = button.parentElement.parentElement.parentElement; // Ajusta la navegación DOM para llegar a la fila de la tabla
                row.remove();
            }
        };
        xhr.send();
        window.location.href = "registro_candidatos.php";
    }
}
</script>
<script>
    $(document).ready(function() {
        $('#guardar').submit(function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de forma tradicional
            
            // Guarda una referencia al formulario para usarla dentro de la función de éxito
            var form = $(this);

            // Realiza la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: './register_files/guardar_informacion2.php',
                data: form.serialize(), // Serializa los datos del formulario
                success: function(response) {
                    // Muestra SweetAlert2 en caso de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Empleado registrado exitosamente',
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
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de forma tradicional
            
            // Guarda una referencia al formulario para usarla dentro de la función de éxito
            var form = $(this);

            // Realiza la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: './update_files/updatec.php',
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


