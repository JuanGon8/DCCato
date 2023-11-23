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
		<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/autofill/2.6.0/css/autoFill.bootstrap5.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/keytable/2.11.0/css/keyTable.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/rowgroup/1.4.1/css/rowGroup.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/scroller/2.3.0/css/scroller.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/searchbuilder/1.6.0/css/searchBuilder.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/staterestore/1.3.0/css/stateRestore.bootstrap5.min.css" rel="stylesheet">

		<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
		<script src="https://cdn.datatables.net/autofill/2.6.0/js/dataTables.autoFill.min.js"></script>
		<script src="https://cdn.datatables.net/autofill/2.6.0/js/autoFill.bootstrap5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
		<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
		<script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
		<script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
		<script src="https://cdn.datatables.net/keytable/2.11.0/js/dataTables.keyTable.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.js"></script>
		<script src="https://cdn.datatables.net/rowgroup/1.4.1/js/dataTables.rowGroup.min.js"></script>
		<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
		<script src="https://cdn.datatables.net/scroller/2.3.0/js/dataTables.scroller.min.js"></script>
		<script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/dataTables.searchBuilder.min.js"></script>
		<script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/searchBuilder.bootstrap5.min.js"></script>
		<script src="https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js"></script>
		<script src="https://cdn.datatables.net/searchpanes/2.2.0/js/searchPanes.bootstrap5.min.js"></script>
		<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
		<script src="https://cdn.datatables.net/staterestore/1.3.0/js/dataTables.stateRestore.min.js"></script>
		<script src="https://cdn.datatables.net/staterestore/1.3.0/js/stateRestore.bootstrap5.min.js"></script>

		<script src="main.js"></script>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Registro nóminas</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="">Módiulo de registro</a></li>
				<li class="breadcrumb-item active">Registro nóminas</li>
			</ol>

			<!-- Formulario -->
			<?php if ($tipo_usuario == 1 || $tipo_usuario == 2 || $tipo_usuario == 3 || $tipo_usuario == 4) { ?>
				<form method="POST" action="guardar_informacion.php" enctype="multipart/form-data" id="guardar">
					<input type="hidden" name="nombreu" id="nombreu" value="<?php echo $_SESSION['nombre']; ?>">
					<input type="hidden" name="hora_registro" id="hora_registro">


					<div class="row">
						<div class="col">
							<label for="fecha_alta">Fecha de ingreso</label>
							<input type="date" id="fechaActual1" value="Escoge una fecha" min="1920-01-01" name="fecha_alta">
						</div>
						<div class="col">
							<label for="ap_pat">Apellido paterno</label>
							<input class="form-control" type="text" name="ap_pat" required maxlength="30">
						</div>
						<div class="col">
							<label for="ap_mat">Apellido materno</label>
							<input class="form-control" type="text" name="ap_mat" required maxlength="30">
						</div>
						<div class="col">
							<label for="nombre">Nombre</label>
							<input class="form-control" type="text" name="nombre" required maxlength="40">
						</div>
						<div class="col">
							<label for="ubicacion">Tipo de periodo</label>
							<select name="ubicacion" id="ubicacion" class="form-select" required>
								<option selected disabled value="">Elige una opción</option>
								<?php
								// Conexión a la base de datos (debes configurar tus propias credenciales)
								$conexion = new mysqli("localhost", "root", "", "sistema");

								// Verificar si la conexión es exitosa
								if ($conexion->connect_error) {
									die("Error de conexión: " . $conexion->connect_error);
								}

								// Consulta SQL para obtener los datos de la tabla "ubicaciones"
								$consulta = "SELECT ubicaciont FROM ubicaciones";

								// Ejecutar la consulta
								$resultado = $conexion->query($consulta);

								// Recorrer los resultados y generar opciones en el select
								while ($fila = $resultado->fetch_assoc()) {
									echo '<option value="' . $fila['ubicaciont'] . '">' . $fila['ubicaciont'] . '</option>';
								}

								// Cerrar la conexión a la base de datos
								$conexion->close();
								?>
							</select>
						</div>
						<div class="col">
							<label for="salario_diario">Salario diario</label>
							<input class="form-control" type="text" name="salario_diario" required maxlength="10" pattern="[0-9]+\.[0-9]+">
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<label for="sbc">SBC</label>
							<input class="form-control" type="text" name="sbc" required maxlength="10" pattern="[0-9]+\.[0-9]+">
						</div>
						<div class="col">
							<div class="form-group">
								<label for="departamento">Departamento</label>
								<select name="departamento" id="departamento" class="form-select" required>
									<option selected disabled value="">Elige una opción</option>
									<?php
									// Conexión a la base de datos (debes configurar tus propias credenciales)
									$conexion = new mysqli("localhost", "root", "", "sistema");

									// Verificar si la conexión es exitosa
									if ($conexion->connect_error) {
										die("Error de conexión: " . $conexion->connect_error);
									}

									// Consulta SQL para obtener los datos de la tabla "ubicaciones"
									$consulta = "SELECT departamentot FROM departamento";

									// Ejecutar la consulta
									$resultado = $conexion->query($consulta);

									// Recorrer los resultados y generar opciones en el select
									while ($fila = $resultado->fetch_assoc()) {
										echo '<option value="' . $fila['departamentot'] . '">' . $fila['departamentot'] . '</option>';
									}

									// Cerrar la conexión a la base de datos
									$conexion->close();
									?>
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="turno">Turno de trabajo</label>
								<select name="turno" id="turno" class="form-select" required>
									<option selected disabled value="">Elige una opción</option>
									<option value="Matutino">Matutino</option>
									<option value="Matutino limpieza">Matutino limpieza</option>
									<option value="Matutino vigilancia">Matutino vigilancia</option>
									<option value="Nocturno">Nocturno</option>
								</select>
							</div>
						</div>
						<div class="col">
							<label for="nss">NSS <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
							<input class="form-control" type="text" name="nss" maxlength="11" pattern="[0-9]{11}">
						</div>
						<div class="col">
							<label for="rfc">RFC <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
							<input class="form-control" type="text" name="rfc" maxlength="13" pattern="[A-Z0-9]{13}">
						</div>
						<div class="col">
							<label for="curp">CURP <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
							<input class="form-control" type="text" name="curp" required maxlength="18" pattern="[A-Z0-9]{18}">
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="sexo">Sexo</label>
								<select name="sexo" id="sexo" class="form-select" required>
									<option selected disabled value="">Elige una opción</option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
						</div>
						<div class="col">
							<label for="fecha_nac">Fecha de nacimiento</label>
							<input type="date" id="fechaActual2" value="Escoge una fecha" min="1920-01-01" name="fecha_nac">
						</div>
						<div class="col">
							<div class="form-group">
								<label for="puesto">Puesto</label>
								<select name="puesto" id="puesto" class="form-select" required>
									<option selected disabled value="">Elige una opción</option>
									<option value="AFANADOR">AFANADOR</option>
									<option value="ASESOR DE VENTAS">ASESOR DE VENTAS</option>
									<option value="ASISTENTE DE DIRECCION">ASISTENTE DE DIRECCION</option>
									<option value="ATENCION A CLIENTES">ATENCION A CLIENTES</option>
									<option value="AUX ADMINISTRATIVO REPSE">AUX ADMINISTRATIVO REPSE</option>
									<option value="AUX ADMINISTRATIVO VIGILANCIA">AUX ADMINISTRATIVO VIGILANCIA</option>
									<option value="AUX CUENTAS POR COBRAR">AUX CUENTAS POR COBRAR</option>
									<option value="AUX FACTURACION Y COBRANZA">AUX FACTURACION Y COBRANZA</option>
									<option value="AUX RECLUTAMIENTO Y SELECCIÓN">AUX RECLUTAMIENTO Y SELECCIÓN</option>
									<option value="CABALLERANGO">CABALLERANGO</option>
									<option value="CAPITAN">CAPITAN</option>
									<option value="CENTRALISTA">CENTRALISTA</option>
									<option value="CHOFER DE DIRECCION">CHOFER DE DIRECCION</option>
									<option value="CONTADOR GENERAL">CONTADOR GENERAL</option>
									<option value="CONTADORA">CONTADORA</option>
									<option value="DILIGENCIERO">DILIGENCIERO</option>
									<option value="ENCARGADO">ENCARGADO</option>
									<option value="ENCARGADO DE ALMACEN">ENCARGADO DE ALMACEN</option>
									<option value="ENCARGADO DE SISTEMAS">ENCARGADO DE SISTEMAS</option>
									<option value="GERENTE GENERAL">GERENTE GENERAL</option>
									<option value="GERENTE LIMPIEZA">GERENTE LIMPIEZA</option>
									<option value="GERENTE VIGILANCIA">GERENTE VIGILANCIA</option>
									<option value="JARDINERO">JARDINERO</option>
									<option value="MARINERO">MARINERO</option>
									<option value="NOMINISTA">NOMINISTA</option>
									<option value="PRACTICANTE">PRACTICANTE</option>
									<option value="SUPERVISOR DE LIMPIEZA">SUPERVISOR DE LIMPIEZA</option>
									<option value="SUPERVISOR DE VIGILANCIA">SUPERVISOR DE VIGILANCIA</option>
									<option value="TECNICO INSTALADOR">TECNICO INSTALADOR</option>
									<option value="VIGILANTE">VIGILANTE</option>
								</select>
							</div>
						</div>
						<div class="col">
							<label for="entidad">Entidad federativa de nacimiento</label>
							<select name="entidad" id="entidad" class="form-select" required>
								<option selected disabled value="">Elige una opción</option>
								<option value="AGUASCALIENTES">AGUASCALIENTES</option>
								<option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
								<option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
								<option value="CAMPECHE">CAMPECHE</option>
								<option value="CHIAPAS">CHIAPAS</option>
								<option value="CHIHUAHUA">CHIHUAHUA</option>
								<option value="COAHUILA">COAHUILA</option>
								<option value="COLIMA">COLIMA</option>
								<option value="DURANGO">DURANGO</option>
								<option value="GUANAJUATO">GUANAJUATO</option>
								<option value="GUERRERO">GUERRERO</option>
								<option value="HIDALGO">HIDALGO</option>
								<option value="JALISCO">JALISCO</option>
								<option value="MÉXICO">MÉXICO</option>
								<option value="MICHOACÁN">MICHOACÁN</option>
								<option value="MORELOS">MORELOS</option>
								<option value="NAYARIT">NAYARIT</option>
								<option value="NUEVO LEÓN">NUEVO LEÓN</option>
								<option value="OAXACA">OAXACA</option>
								<option value="PUEBLA">PUEBLA</option>
								<option value="QUERÉTARO">QUERÉTARO</option>
								<option value="QUINTANA ROO">QUINTANA ROO</option>
								<option value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option>
								<option value="SINALOA">SINALOA</option>
								<option value="SONORA">SONORA</option>
								<option value="TABASCO">TABASCO</option>
								<option value="TAMAULIPAS">TAMAULIPAS</option>
								<option value="TLAXCALA">TLAXCALA</option>
								<option value="VERACRUZ">VERACRUZ</option>
								<option value="YUCATÁN">YUCATÁN</option>
								<option value="ZACATECAS">ZACATECAS</option>

							</select>
						</div>
						<div class="col">
							<label for="cp">Código postal</label>
							<input class="form-control" type="text" name="cp" required maxlength="5" pattern="[0-9]{5}">
						</div>
						<div class="col">
							<div class="form-group">
								<label for="estado_civil">Estado civil</label>
								<select name="estado_civil" id="estado_civil" class="form-select" required>
									<option selected disabled value="">Elige una opción</option>
									<option value="S">Soltero</option>
									<option value="C">Casado</option>
								</select>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="e_banco">Banco para pago electrónico</label>
								<select name="e_banco" id="e_banco" class="form-select">
									<option selected disabled value="">Elige una opción</option>
									<?php
									// Conexión a la base de datos (debes configurar tus propias credenciales)
									$conexion = new mysqli("localhost", "root", "", "sistema");

									// Verificar si la conexión es exitosa
									if ($conexion->connect_error) {
										die("Error de conexión: " . $conexion->connect_error);
									}

									// Consulta SQL para obtener los datos de la tabla "ubicaciones"
									$consulta = "SELECT c_banco, n_banco FROM bancos";

									// Ejecutar la consulta
									$resultado = $conexion->query($consulta);

									// Recorrer los resultados y generar opciones en el select
									while ($fila = $resultado->fetch_assoc()) {
										echo '<option value="' . $fila['c_banco'] . '">' . $fila['n_banco'] . '</option>';
									}

									// Cerrar la conexión a la base de datos
									$conexion->close();
									?>
								</select>
							</div>
						</div>
						<div class="col">
							<label for="n_ecuenta">Número de cuenta para pago electrónico</label>
							<input class="form-control" type="text" name="n_ecuenta" maxlength="18" pattern="[0-9]{}">
						</div>
						<div class="col">
							<label for="suc_epago">Sucursal para pago electrónico</label>
							<input class="form-control" type="text" name="suc_epago" maxlength="30">
						</div>
						<div class="col">
							<label for="imss_pat">Registro patronal del IMSS</label>
							<input class="form-control" type="text" name="imss_pat" required maxlength="11" pattern="[A-Z0-9]{11}">
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
							<table class="table table-striped table-bordered table-hover table-responsive align-middle table-sm" id="example2" width="100%" cellspacing="0">
								<thead class="table-dark">
									<tr class="tdh">
										<th class="acciones">Mostrar información</th>
										<th class="acciones">Acciones</th>
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
									<?php while ($row = $resultado2->fetch_assoc()) { ?>
										<tr id="row_<?php echo $row['codigo']; ?>">
											<td class="tdh">
												<!-- <button class="delete-button" onclick="deleteRow(<?php echo $row['codigo']; ?>)">
													<i class="fas fa-trash"></i>
												</button> -->
											</td>
											<td class="d-flex justify-content-center">
												<button type="button" class="btn btn-outline-info btn-sm" onclick="moverRepse(<?php echo $row['codigo']; ?>)" title="Mover a REPSE">
													<i class="fa-solid fa-arrow-right"></i>
												</button>
												<button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['codigo']; ?>">
													<i class="fa-solid fa-pencil"></i>
												</button>
												<button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarRegistro(<?php echo $row['codigo']; ?>)">
													<i class="fa-solid fa-trash"></i>
												</button>
												<div class="modal modal-lg fade" id="exampleModal_<?php echo $row['codigo']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header">
																<h1 class="modal-title fs-5" id="exampleModalLabel">Editar información</h1>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form method="POST" action="/update_files/update.php" enctype="multipart/form-data" id="update">
																	<div class="row">
																		<input type="hidden" name="codigo" value="<?php echo $row['codigo']; ?>">
																		<div class="col">
																			<label for="fecha_alta">Fecha de alta</label>
																			<input type="date" id="fechaActual3" value="<?php echo $row['fecha_alta']; ?>" min="1920-01-01" name="fecha_alta">
																		</div>
																		<div class="col">
																			<label for="ap_pat">Apellido paterno</label>
																			<input class="form-control" type="text" name="ap_pat" required maxlength="30" value="<?php echo $row['ap_pat']; ?>">
																		</div>
																		<div class="col">
																			<label for="ap_mat">Apellido materno</label>
																			<input class="form-control" type="text" name="ap_mat" required maxlength="30" value="<?php echo $row['ap_mat']; ?>">
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<label for="nombre">Nombre</label>
																			<input class="form-control" type="text" name="nombre" required maxlength="40" value="<?php echo $row['nombre']; ?>">
																		</div>
																		<div class="col">
																			<label for="ubicacion">Tipo de periodo</label>
																			<select name="ubicacion" id="ubicacion" class="form-select" required>
																				<option selected value="<?php echo $row['ubicacion']; ?>"><?php echo $row['ubicacion']; ?></option>
																				<?php
																				// Conexión a la base de datos (debes configurar tus propias credenciales)
																				$conexion = new mysqli("localhost", "root", "", "sistema");

																				// Verificar si la conexión es exitosa
																				if ($conexion->connect_error) {
																					die("Error de conexión: " . $conexion->connect_error);
																				}

																				// Consulta SQL para obtener los datos de la tabla "ubicaciones"
																				$consulta = "SELECT ubicaciont FROM ubicaciones";

																				// Ejecutar la consulta
																				$resultado = $conexion->query($consulta);

																				// Recorrer los resultados y generar opciones en el select
																				while ($fila = $resultado->fetch_assoc()) {
																					echo '<option value="' . $fila['ubicaciont'] . '">' . $fila['ubicaciont'] . '</option>';
																				}

																				// Cerrar la conexión a la base de datos
																				$conexion->close();
																				?>
																			</select>
																		</div>
																		<div class="col">
																			<label for="salario_diario">Salario diario</label>
																			<input class="form-control" type="text" name="salario_diario" required maxlength="10" pattern="[0-9]+\.[0-9]+" value="<?php echo $row['salario_diario']; ?>">
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<label for="sbc">SBC</label>
																			<input class="form-control" type="text" name="sbc" required maxlength="10" pattern="[0-9]+\.[0-9]+" value="<?php echo $row['sbc']; ?>">
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label for="departamento">Departamento</label>
																				<select name="departamento" id="departamento" class="form-select" required>
																					<option selected value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
																					<?php
																					// Conexión a la base de datos (debes configurar tus propias credenciales)
																					$conexion = new mysqli("localhost", "root", "", "sistema");

																					// Verificar si la conexión es exitosa
																					if ($conexion->connect_error) {
																						die("Error de conexión: " . $conexion->connect_error);
																					}

																					// Consulta SQL para obtener los datos de la tabla "ubicaciones"
																					$consulta = "SELECT departamentot FROM departamento";

																					// Ejecutar la consulta
																					$resultado = $conexion->query($consulta);

																					// Recorrer los resultados y generar opciones en el select
																					while ($fila = $resultado->fetch_assoc()) {
																						echo '<option value="' . $fila['departamentot'] . '">' . $fila['departamentot'] . '</option>';
																					}

																					// Cerrar la conexión a la base de datos
																					$conexion->close();
																					?>
																				</select>
																			</div>
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label for="turno">Turno de trabajo</label>
																				<select name="turno" id="turno" class="form-select" required>
																					<option selected value="<?php echo $row['turno']; ?>"><?php echo $row['turno']; ?></option>
																					<option value="Matutino">Matutino</option>
																					<option value="Matutino limpieza">Matutino limpieza</option>
																					<option value="Matutino vigilancia">Matutino vigilancia</option>
																					<option value="Nocturno">Nocturno</option>
																				</select>
																			</div>
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<label for="nss">NSS <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
																			<input class="form-control" type="text" name="nss" required maxlength="11" pattern="[0-9]{11}" value="<?php echo $row['nss']; ?>">
																		</div>
																		<div class="col">
																			<label for="rfc">RFC <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
																			<input class="form-control" type="text" name="rfc" required maxlength="13" pattern="[A-Z0-9]{13}" value="<?php echo $row['rfc']; ?>">
																		</div>
																		<div class="col">
																			<label for="curp">CURP <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
																			<input class="form-control" type="text" name="curp" required maxlength="18" pattern="[A-Z0-9]{18}" value="<?php echo $row['curp']; ?>">
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label for="sexo">Sexo</label>
																				<select name="sexo" id="sexo" class="form-select" required>
																					<option selected value="<?php echo $row['sexo']; ?>"><?php echo $row['sexo']; ?></option>
																					<option value="M">Masculino</option>
																					<option value="F">Femenino</option>
																				</select>
																			</div>
																		</div>
																		<div class="col">
																			<label for="fecha_nac">Fecha de nacimiento</label>
																			<input type="date" id="fechaActual4" value="<?php echo $row['fecha_nac']; ?>" min="1920-01-01" name="fecha_nac">
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label for="puesto">Puesto</label>
																				<select name="puesto" id="puesto" class="form-select" required>
																					<option selected value="<?php echo $row['puesto']; ?>"><?php echo $row['puesto']; ?></option>
																					<option value="AFANADOR">AFANADOR</option>
																					<option value="ASESOR DE VENTAS">ASESOR DE VENTAS</option>
																					<option value="ASISTENTE DE DIRECCION">ASISTENTE DE DIRECCION</option>
																					<option value="ATENCION A CLIENTES">ATENCION A CLIENTES</option>
																					<option value="AUX ADMINISTRATIVO REPSE">AUX ADMINISTRATIVO REPSE</option>
																					<option value="AUX ADMINISTRATIVO VIGILANCIA">AUX ADMINISTRATIVO VIGILANCIA</option>
																					<option value="AUX CUENTAS POR COBRAR">AUX CUENTAS POR COBRAR</option>
																					<option value="AUX FACTURACION Y COBRANZA">AUX FACTURACION Y COBRANZA</option>
																					<option value="AUX RECLUTAMIENTO Y SELECCIÓN">AUX RECLUTAMIENTO Y SELECCIÓN</option>
																					<option value="CABALLERANGO">CABALLERANGO</option>
																					<option value="CAPITAN">CAPITAN</option>
																					<option value="CENTRALISTA">CENTRALISTA</option>
																					<option value="CHOFER DE DIRECCION">CHOFER DE DIRECCION</option>
																					<option value="CONTADOR GENERAL">CONTADOR GENERAL</option>
																					<option value="CONTADORA">CONTADORA</option>
																					<option value="DILIGENCIERO">DILIGENCIERO</option>
																					<option value="ENCARGADO">ENCARGADO</option>
																					<option value="ENCARGADO DE ALMACEN">ENCARGADO DE ALMACEN</option>
																					<option value="ENCARGADO DE SISTEMAS">ENCARGADO DE SISTEMAS</option>
																					<option value="GERENTE GENERAL">GERENTE GENERAL</option>
																					<option value="GERENTE LIMPIEZA">GERENTE LIMPIEZA</option>
																					<option value="GERENTE VIGILANCIA">GERENTE VIGILANCIA</option>
																					<option value="JARDINERO">JARDINERO</option>
																					<option value="MARINERO">MARINERO</option>
																					<option value="NOMINISTA">NOMINISTA</option>
																					<option value="PRACTICANTE">PRACTICANTE</option>
																					<option value="SUPERVISOR DE LIMPIEZA">SUPERVISOR DE LIMPIEZA</option>
																					<option value="SUPERVISOR DE VIGILANCIA">SUPERVISOR DE VIGILANCIA</option>
																					<option value="TECNICO INSTALADOR">TECNICO INSTALADOR</option>
																					<option value="VIGILANTE">VIGILANTE</option>
																				</select>
																			</div>
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<label for="entidad">Entidad federativa de nacimiento</label>
																			<select name="entidad" id="entidad" class="form-select" required>
																				<option selected value="<?php echo $row['entidad']; ?>"><?php echo $row['entidad']; ?></option>
																				<option value="AGS">AGUASCALIENTES</option>
																				<option value="BC">BAJA CALIFORNIA</option>
																				<option value="BCS">BAJA CALIFORNIA SUR</option>
																				<option value="CAMP">CAMPECHE</option>
																				<option value="CHIS">CHIAPAS</option>
																				<option value="CHIH">CHIHUAHUA</option>
																				<option value="COAH">COAHUILA</option>
																				<option value="COL">COLIMA</option>
																				<option value="DGO">DURANGO</option>
																				<option value="GTO">GUANAJUATO</option>
																				<option value="GRO">GUERRERO</option>
																				<option value="HGO">HIDALGO</option>
																				<option value="JAL">JALISCO</option>
																				<option value="MEX">MÉXICO</option>
																				<option value="MICH">MICHOACÁN</option>
																				<option value="MOR">MORELOS</option>
																				<option value="NAY">NAYARIT</option>
																				<option value="NL">NUEVO LEÓN</option>
																				<option value="OAX">OAXACA</option>
																				<option value="PUE">PUEBLA</option>
																				<option value="QRO">QUERÉTARO</option>
																				<option value="QRoo">QUINTANA ROO</option>
																				<option value="SLP">SAN LUIS POTOSÍ</option>
																				<option value="SIN">SINALOA</option>
																				<option value="SON">SONORA</option>
																				<option value="TAB">TABASCO</option>
																				<option value="TAM">TAMAULIPAS</option>
																				<option value="TLAX">TLAXCALA</option>
																				<option value="VER">VERACRUZ</option>
																				<option value="YUC">YUCATÁN</option>
																				<option value="ZAC">ZACATECAS</option>>
																			</select>
																		</div>
																		<div class="col">
																			<label for="cp">Código postal</label>
																			<input class="form-control" type="text" name="cp" required maxlength="5" pattern="[0-9]{5}" value="<?php echo $row['cp']; ?>">
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label for="estado_civil">Estado civil</label>
																				<select name="estado_civil" id="estado_civil" class="form-select" required>
																					<option selected value="<?php echo $row['estado_civil']; ?>"><?php echo $row['estado_civil']; ?></option>
																					<option value="S">Soltero</option>
																					<option value="C">Casado</option>
																				</select>
																			</div>
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label for="e_banco">Banco para pago electrónico</label>
																				<select name="e_banco" id="e_banco" class="form-select">
																					<option selected value="<?php echo $row['e_banco']; ?>"><?php echo $row['e_banco']; ?></option>
																					<?php
																					// Conexión a la base de datos (debes configurar tus propias credenciales)
																					$conexion = new mysqli("localhost", "root", "", "sistema");

																					// Verificar si la conexión es exitosa
																					if ($conexion->connect_error) {
																						die("Error de conexión: " . $conexion->connect_error);
																					}

																					// Consulta SQL para obtener los datos de las columnas c_banco y n_banco de la tabla "bancos"
																					$consulta = "SELECT c_banco, n_banco FROM bancos";

																					// Ejecutar la consulta
																					$resultado = $conexion->query($consulta);

																					// Recorrer los resultados y generar opciones en el select
																					while ($fila = $resultado->fetch_assoc()) {
																						echo '<option value="' . $fila['c_banco'] . '">' . $fila['n_banco'] . '</option>';
																					}

																					// Cerrar la conexión a la base de datos
																					$conexion->close();
																					?>

																				</select>
																			</div>
																		</div>
																		<div class="col">
																			<label for="n_ecuenta">Núm. de cuenta para pago elec.</label>
																			<input class="form-control" type="text" name="n_ecuenta" maxlength="18" pattern="[0-9]{}" value="<?php echo $row['n_ecuenta']; ?>">
																		</div>
																		<div class="col">
																			<label for="suc_epago">Sucursal para pago electrónico</label>
																			<input class="form-control" type="text" name="suc_epago" maxlength="30" value="<?php echo $row['suc_epago']; ?>">
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col-4">
																			<label for="imss_pat">Registro patronal del IMSS</label>
																			<input class="form-control" type="text" name="imss_pat" required maxlength="11" pattern="[A-Z0-9]{11}" value="<?php echo $row['imss_pat']; ?>">
																		</div>
																		<div class="col">

																		</div>
																	</div>
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
											<td class="tdh"><?php echo $row['codigo']; ?></td>
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
					<?php } ?>
					<!-- Tabla usuario 3  -->
					<?php if ($tipo_usuario == 3) { ?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover table-responsive align-middle table-sm" id="example3" width="100%" cellspacing="0">
								<thead class="table-dark">
									<tr class="tdh">
										<th class="acciones">Mostrar información</th>
										<th class="acciones">Acciones</th>
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
									<?php while ($row = $resultado2->fetch_assoc()) { ?>
										<tr id="row_<?php echo $row['codigo']; ?>">
											<td class="tdh">
												<!-- <button class="delete-button" onclick="deleteRow(<?php echo $row['codigo']; ?>)">
													<i class="fas fa-trash"></i>
												</button> -->
											</td>
											<td class="d-flex justify-content-center">
												<button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['codigo']; ?>">
													<i class="fa-solid fa-pencil"></i>
												</button>
												<div class="modal modal-lg fade" id="exampleModal_<?php echo $row['codigo']; ?>" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header">
																<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form method="POST" action="update.php" enctype="multipart/form-data">
																	<div class="row">
																		<input type="hidden" name="codigo" value="<?php echo $row['codigo']; ?>">
																		<div class="col">
																			<label for="fecha_alta">Fecha de alta</label>
																			<input type="date" id="fechaActual3" value="<?php echo $row['fecha_alta']; ?>" min="1920-01-01" name="fecha_alta">
																		</div>
																		<div class="col">
																			<label for="ap_pat">Apellido paterno</label>
																			<input class="form-control" type="text" name="ap_pat" required maxlength="30" value="<?php echo $row['ap_pat']; ?>">
																		</div>
																		<div class="col">
																			<label for="ap_mat">Apellido materno</label>
																			<input class="form-control" type="text" name="ap_mat" required maxlength="30" value="<?php echo $row['ap_mat']; ?>">
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<label for="nombre">Nombre</label>
																			<input class="form-control" type="text" name="nombre" required maxlength="40" value="<?php echo $row['nombre']; ?>">
																		</div>
																		<div class="col">
																			<label for="ubicacion">Tipo de periodo</label>
																			<select name="ubicacion" id="ubicacion" class="form-select" required>
																				<option selected value="<?php echo $row['ubicacion']; ?>"><?php echo $row['ubicacion']; ?></option>
																				<?php
																				// Conexión a la base de datos (debes configurar tus propias credenciales)
																				$conexion = new mysqli("localhost", "root", "", "sistema");

																				// Verificar si la conexión es exitosa
																				if ($conexion->connect_error) {
																					die("Error de conexión: " . $conexion->connect_error);
																				}

																				// Consulta SQL para obtener los datos de la tabla "ubicaciones"
																				$consulta = "SELECT ubicaciont FROM ubicaciones";

																				// Ejecutar la consulta
																				$resultado = $conexion->query($consulta);

																				// Recorrer los resultados y generar opciones en el select
																				while ($fila = $resultado->fetch_assoc()) {
																					echo '<option value="' . $fila['ubicaciont'] . '">' . $fila['ubicaciont'] . '</option>';
																				}

																				// Cerrar la conexión a la base de datos
																				$conexion->close();
																				?>
																			</select>
																		</div>
																		<div class="col">
																			<label for="salario_diario">Salario diario</label>
																			<input class="form-control" type="text" name="salario_diario" required maxlength="10" pattern="[0-9]+\.[0-9]+" value="<?php echo $row['salario_diario']; ?>">
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<label for="sbc">SBC</label>
																			<input class="form-control" type="text" name="sbc" required maxlength="10" pattern="[0-9]+\.[0-9]+" value="<?php echo $row['sbc']; ?>">
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label for="departamento">Departamento</label>
																				<select name="departamento" id="departamento" class="form-select" required>
																					<option selected value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
																					<?php
																					// Conexión a la base de datos (debes configurar tus propias credenciales)
																					$conexion = new mysqli("localhost", "root", "", "sistema");

																					// Verificar si la conexión es exitosa
																					if ($conexion->connect_error) {
																						die("Error de conexión: " . $conexion->connect_error);
																					}

																					// Consulta SQL para obtener los datos de la tabla "ubicaciones"
																					$consulta = "SELECT departamentot FROM departamento";

																					// Ejecutar la consulta
																					$resultado = $conexion->query($consulta);

																					// Recorrer los resultados y generar opciones en el select
																					while ($fila = $resultado->fetch_assoc()) {
																						echo '<option value="' . $fila['departamentot'] . '">' . $fila['departamentot'] . '</option>';
																					}

																					// Cerrar la conexión a la base de datos
																					$conexion->close();
																					?>
																				</select>
																			</div>
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label for="turno">Turno de trabajo</label>
																				<select name="turno" id="turno" class="form-select" required>
																					<option selected value="<?php echo $row['turno']; ?>"><?php echo $row['turno']; ?></option>
																					<option value="Matutino">Matutino</option>
																					<option value="Matutino limpieza">Matutino limpieza</option>
																					<option value="Matutino vigilancia">Matutino vigilancia</option>
																					<option value="Nocturno">Nocturno</option>
																				</select>
																			</div>
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<label for="nss">NSS <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números"></i></label>
																			<input class="form-control" type="text" name="nss" required maxlength="11" pattern="[0-9]{11}" value="<?php echo $row['nss']; ?>">
																		</div>
																		<div class="col">
																			<label for="rfc">RFC <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
																			<input class="form-control" type="text" name="rfc" required maxlength="13" pattern="[A-Z0-9]{13}" value="<?php echo $row['rfc']; ?>">
																		</div>
																		<div class="col">
																			<label for="curp">CURP <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
																			<input class="form-control" type="text" name="curp" required maxlength="18" pattern="[A-Z0-9]{18}" value="<?php echo $row['curp']; ?>">
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label for="sexo">Sexo</label>
																				<select name="sexo" id="sexo" class="form-select" required>
																					<option selected value="<?php echo $row['sexo']; ?>"><?php echo $row['sexo']; ?></option>
																					<option value="M">Masculino</option>
																					<option value="F">Femenino</option>
																				</select>
																			</div>
																		</div>
																		<div class="col">
																			<label for="fecha_nac">Fecha de nacimiento</label>
																			<input type="date" id="fechaActual4" value="<?php echo $row['fecha_nac']; ?>" min="1920-01-01" name="fecha_nac">
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label for="puesto">Puesto</label>
																				<select name="puesto" id="puesto" class="form-select" required>
																					<option selected value="<?php echo $row['puesto']; ?>"><?php echo $row['puesto']; ?></option>
																					<option value="AFANADOR">AFANADOR</option>
																					<option value="ASESOR DE VENTAS">ASESOR DE VENTAS</option>
																					<option value="ASISTENTE DE DIRECCION">ASISTENTE DE DIRECCION</option>
																					<option value="ATENCION A CLIENTES">ATENCION A CLIENTES</option>
																					<option value="AUX ADMINISTRATIVO REPSE">AUX ADMINISTRATIVO REPSE</option>
																					<option value="AUX ADMINISTRATIVO VIGILANCIA">AUX ADMINISTRATIVO VIGILANCIA</option>
																					<option value="AUX CUENTAS POR COBRAR">AUX CUENTAS POR COBRAR</option>
																					<option value="AUX FACTURACION Y COBRANZA">AUX FACTURACION Y COBRANZA</option>
																					<option value="AUX RECLUTAMIENTO Y SELECCIÓN">AUX RECLUTAMIENTO Y SELECCIÓN</option>
																					<option value="CABALLERANGO">CABALLERANGO</option>
																					<option value="CAPITAN">CAPITAN</option>
																					<option value="CENTRALISTA">CENTRALISTA</option>
																					<option value="CHOFER DE DIRECCION">CHOFER DE DIRECCION</option>
																					<option value="CONTADOR GENERAL">CONTADOR GENERAL</option>
																					<option value="CONTADORA">CONTADORA</option>
																					<option value="DILIGENCIERO">DILIGENCIERO</option>
																					<option value="ENCARGADO">ENCARGADO</option>
																					<option value="ENCARGADO DE ALMACEN">ENCARGADO DE ALMACEN</option>
																					<option value="ENCARGADO DE SISTEMAS">ENCARGADO DE SISTEMAS</option>
																					<option value="GERENTE GENERAL">GERENTE GENERAL</option>
																					<option value="GERENTE LIMPIEZA">GERENTE LIMPIEZA</option>
																					<option value="GERENTE VIGILANCIA">GERENTE VIGILANCIA</option>
																					<option value="JARDINERO">JARDINERO</option>
																					<option value="MARINERO">MARINERO</option>
																					<option value="NOMINISTA">NOMINISTA</option>
																					<option value="PRACTICANTE">PRACTICANTE</option>
																					<option value="SUPERVISOR DE LIMPIEZA">SUPERVISOR DE LIMPIEZA</option>
																					<option value="SUPERVISOR DE VIGILANCIA">SUPERVISOR DE VIGILANCIA</option>
																					<option value="TECNICO INSTALADOR">TECNICO INSTALADOR</option>
																					<option value="VIGILANTE">VIGILANTE</option>
																				</select>
																			</div>
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<label for="entidad">Entidad federativa de nacimiento</label>
																			<select name="entidad" id="entidad" class="form-select" required>
																				<option selected value="<?php echo $row['entidad']; ?>"><?php echo $row['entidad']; ?></option>
																				<option value="AGS">AGUASCALIENTES</option>
																				<option value="BC">BAJA CALIFORNIA</option>
																				<option value="BCS">BAJA CALIFORNIA SUR</option>
																				<option value="CAMP">CAMPECHE</option>
																				<option value="CHIS">CHIAPAS</option>
																				<option value="CHIH">CHIHUAHUA</option>
																				<option value="COAH">COAHUILA</option>
																				<option value="COL">COLIMA</option>
																				<option value="DGO">DURANGO</option>
																				<option value="GTO">GUANAJUATO</option>
																				<option value="GRO">GUERRERO</option>
																				<option value="HGO">HIDALGO</option>
																				<option value="JAL">JALISCO</option>
																				<option value="MEX">MÉXICO</option>
																				<option value="MICH">MICHOACÁN</option>
																				<option value="MOR">MORELOS</option>
																				<option value="NAY">NAYARIT</option>
																				<option value="NL">NUEVO LEÓN</option>
																				<option value="OAX">OAXACA</option>
																				<option value="PUE">PUEBLA</option>
																				<option value="QRO">QUERÉTARO</option>
																				<option value="QRoo">QUINTANA ROO</option>
																				<option value="SLP">SAN LUIS POTOSÍ</option>
																				<option value="SIN">SINALOA</option>
																				<option value="SON">SONORA</option>
																				<option value="TAB">TABASCO</option>
																				<option value="TAM">TAMAULIPAS</option>
																				<option value="TLAX">TLAXCALA</option>
																				<option value="VER">VERACRUZ</option>
																				<option value="YUC">YUCATÁN</option>
																				<option value="ZAC">ZACATECAS</option>>
																			</select>
																		</div>
																		<div class="col">
																			<label for="cp">Código postal</label>
																			<input class="form-control" type="text" name="cp" required maxlength="5" pattern="[0-9]{5}" value="<?php echo $row['cp']; ?>">
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label for="estado_civil">Estado civil</label>
																				<select name="estado_civil" id="estado_civil" class="form-select" required>
																					<option selected value="<?php echo $row['estado_civil']; ?>"><?php echo $row['estado_civil']; ?></option>
																					<option value="S">Soltero</option>
																					<option value="C">Casado</option>
																				</select>
																			</div>
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label for="e_banco">Banco para pago electrónico</label>
																				<select name="e_banco" id="e_banco" class="form-select">
																					<option selected value="<?php echo $row['e_banco']; ?>"><?php echo $row['e_banco']; ?></option>
																					<?php
																					// Conexión a la base de datos (debes configurar tus propias credenciales)
																					$conexion = new mysqli("localhost", "root", "", "sistema");

																					// Verificar si la conexión es exitosa
																					if ($conexion->connect_error) {
																						die("Error de conexión: " . $conexion->connect_error);
																					}

																					// Consulta SQL para obtener los datos de las columnas c_banco y n_banco de la tabla "bancos"
																					$consulta = "SELECT c_banco, n_banco FROM bancos";

																					// Ejecutar la consulta
																					$resultado = $conexion->query($consulta);

																					// Recorrer los resultados y generar opciones en el select
																					while ($fila = $resultado->fetch_assoc()) {
																						echo '<option value="' . $fila['c_banco'] . '">' . $fila['n_banco'] . '</option>';
																					}

																					// Cerrar la conexión a la base de datos
																					$conexion->close();
																					?>

																				</select>
																			</div>
																		</div>
																		<div class="col">
																			<label for="n_ecuenta">Núm. de cuenta para pago elec.</label>
																			<input class="form-control" type="text" name="n_ecuenta" maxlength="18" pattern="[0-9]{}" value="<?php echo $row['n_ecuenta']; ?>">
																		</div>
																		<div class="col">
																			<label for="suc_epago">Sucursal para pago electrónico</label>
																			<input class="form-control" type="text" name="suc_epago" maxlength="30" value="<?php echo $row['suc_epago']; ?>">
																		</div>
																	</div> <br>
																	<div class="row">
																		<div class="col-4">
																			<label for="imss_pat">Registro patronal del IMSS</label>
																			<input class="form-control" type="text" name="imss_pat" required maxlength="11" pattern="[A-Z0-9]{11}" value="<?php echo $row['imss_pat']; ?>">
																		</div>
																	</div>
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
											<td class="tdh"><?php echo $row['codigo']; ?></td>
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
					<?php } ?>
					<!-- Tabla usuario 4 y 5-->
					<?php if ($tipo_usuario == 4 || $tipo_usuario == 5) { ?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover table-responsive align-middle table-sm" id="example3" width="100%" cellspacing="0">
								<thead class="table-dark">
									<tr class="tdh">
										<th class="acciones">Mostrar información</th>
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
									<?php while ($row = $resultado2->fetch_assoc()) { ?>
										<tr id="row_<?php echo $row['codigo']; ?>">
											<td class="tdh">
												<!-- <button class="delete-button" onclick="deleteRow(<?php echo $row['codigo']; ?>)">
													<i class="fas fa-trash"></i>
												</button> -->
											</td>
											<td class="tdh"><?php echo $row['codigo']; ?></td>
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
					<?php } ?>
				</div>
			</div>
		</div>
	</main>
</div>
<script>
	window.onload = function() {
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
<script>
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
				xhr.onload = function() {
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
</script>


<script>
	document.addEventListener("DOMContentLoaded", function() {
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
</script>
<script>
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
				xhr.onload = function() {
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
				url: './register_files/guardar_informacion.php',
				data: form.serialize(), // Serializa los datos del formulario
				success: function(response) {
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
				url: './update_files/update.php',
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