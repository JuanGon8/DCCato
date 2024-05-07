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
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">
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
		<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/date-fns@2.23.0"></script>

		<script src="main.js"></script>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Registro de empleados Arrendador</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="">Módulo de registro</a></li>
				<li class="breadcrumb-item active">Registro de empleados Arrendador</li>
			</ol>
			<div class="card mb-4">
				
			<div class="card-body">
				<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModala">
				<b><i class="fa-solid fa-plus"></i> Registrar empleado</b>
			</button> 

			<div class="row mt-2">
					<div class="col">
					<div class="dropdown">
							<button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Exportar...
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Por código</a></li>
								<li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal1">Por fecha</a></li>
								<li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal3" >Reingresos por fecha</a></li>
								
							</ul>
						</div>
					<div class="col-3">
						<!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1">
							Exportar empleados por fecha
						</button> -->

						<!-- Modal -->
						<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel2">Exportar empleados por fecha</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form class="form-inline d-flex m-3" id="exportForm">
											<div class="row align-items-center">
												<div class="col form-group">
													<label for="fecha1" class="mr-2">De</label>
													<input type="date" id="fecha1" name="fecha1" class="form-control custom-input" required>
												</div>

												<div class="col form-group">
													<label for="fecha2" class="mr-2">Hasta</label>
													<input type="date" id="fecha2" name="fecha2" class="form-control custom-input" required>
												</div>

												<div class="col form-group d-flex justify-content-center">

												</div>
											</div>
										</form>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
										<button type="button" class="btn btn-success" onclick="exportData_a()">Exportar <i class="fas fa-file-excel"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-3">
						<!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
							Exportar empleados por código
						</button> -->

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Exportar empleados por código</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form class="form-inline d-flex m-3" id="exportForm2">
											<div class="row align-items-center">
												<div class="col form-group">
													<label for="cod1" class="mr-2">De</label>
													<input type="text" id="cod1" name="cod1" class="form-control custom-input" required>
												</div>

												<div class="col form-group">
													<label for="cod2" class="mr-2">Hasta</label>
													<input type="text" id="cod2" name="cod2" class="form-control custom-input" required>
												</div>

												<div class="col form-group d-flex justify-content-center">

												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
										<button type="button" class="btn btn-success" onclick="exportData2_a()">Exportar <i class="fas fa-file-excel"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-3">
						<!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal3">
							Exportar reingresos por fecha
						</button> -->

						<!-- Modal -->
						<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel3">Exportar reingresos por fecha</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form class="form-inline d-flex m-3" id="exportForm">
											<div class="row align-items-center">
												<div class="col form-group">
													<label for="fecha3" class="mr-2">De</label>
													<input type="date" id="fecha1r" name="fecha1r" class="form-control custom-input" required>
												</div>

												<div class="col form-group">
													<label for="fecha4" class="mr-2">Hasta</label>
													<input type="date" id="fecha2r" name="fecha2r" class="form-control custom-input" required>
												</div>

												<div class="col form-group d-flex justify-content-center">

												</div>
											</div>
										</form>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
										<button type="button" class="btn btn-success" onclick="exportDataR_a()">Exportar <i class="fas fa-file-excel"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<div class="row m-1">
							<div class="col-md-6">
								<label for="codigo">Editar empleado <i class="fa-solid fa-circle-exclamation" title="Ingresa el código del empleado a editar"></i></label>
								<input type="text" id="codigo" class="form-control" style="width: 100px;">

								<button class="btn btn-primary mt-2" onclick="openModal()">Editar</button>
							</div>
						</div>
						<!-- Modal -->
						<div class="modal modal-lg fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<!-- Modal content goes here -->
						</div>
						<script>
							function openModal() {
								var codigo = $('#codigo').val();
								$.ajax({
									type: 'POST',
									url: 'actualizar_a.php', // Replace with your server-side script to fetch record
									data: {
										codigo: codigo
									},
									success: function(response) {
										$('#editModal').html(response);
										$('#editModal').modal('show');
									}
								});
							}
						</script>
					</div>
					<div class="col-2">
						<div class="mb-3">
							<label for="codigoInput" class="form-label">Código</label>
							<input type="text" class="form-control" id="codigoInput" placeholder="Ingrese el código">
						</div>

						<button class="btn btn-danger" onclick="eliminarRegistro1()">Eliminar Registro</button>
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
						<script>
							function eliminarRegistro1() {
								// Obtener el código desde el input
								var codigo = document.getElementById("codigoInput").value;

								if (!codigo) {
									alert("Por favor, ingrese un código válido");
									return;
								}

								console.log("codigo: " + codigo);

								Swal.fire({
									title: "¿Estás seguro de que deseas dar de baja a este empleado?",
									icon: "warning",
									showCancelButton: true,
									confirmButtonText: "Sí, eliminar",
									cancelButtonText: "Cancelar"
								}).then((result) => {
									if (result.isConfirmed) {
										// Realizar una solicitud AJAX para eliminar el registro
										var xhr = new XMLHttpRequest();
										xhr.open("GET", "./delete-files/eliminar_registro_a.php?codigo=" + codigo, true);
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

												// Puedes realizar acciones adicionales después de eliminar el registro
												// Por ejemplo, limpiar el input
												document.getElementById("codigoInput").value = "";
											}
										};
										xhr.send();
									}
								});
							}
						</script>
					</div>
				</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Ingresa los datos</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST" action="./register_files/guardar_informacion_a.php" enctype="multipart/form-data" id="guardarlo">
								<input type="hidden" name="nombreu" id="nombreu" value="<?php echo $_SESSION['nombre']; ?>">
								<input type="hidden" name="hora_registro" id="hora_registro">


								<div class="row">
									<div class="col">
										<label for="fecha_alta">Fecha de ingreso</label>
										<input type="date" id="fechaActual1" value="Escoge una fecha" min="1920-01-01" name="fecha_alta">
									</div>
									<div class="col">
										<label for="ap_pat">Apellido paterno</label>
										<input class="form-control" type="text" name="ap_pat" required maxlength="30" id="ap_pat">
									</div>
									<div class="col">
										<label for="ap_mat">Apellido materno</label>
										<input class="form-control" type="text" name="ap_mat" required maxlength="30" id="ap_mat">
									</div>
									<div class="col">
										<label for="nombre">Nombre</label>
										<input class="form-control" type="text" name="nombre" required maxlength="40" id="nombre">
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
										<input class="form-control" type="text" name="salario_diario" required maxlength="10">
									</div>
								</div><br>
								<div class="row">
									<div class="col">
										<label for="sbc">SBC</label>
										<input class="form-control" type="text" name="sbc" required maxlength="10">
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
										<input class="form-control" type="text" name="nss" maxlength="11">
									</div>
									<div class="col">
										<label for="rfc">RFC <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
										<input class="form-control" type="text" name="rfc" maxlength="13">
									</div>
									<div class="col">
										<label for="curp">CURP <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
										<input class="form-control" type="text" name="curp" required maxlength="18" id="curp" oninput="validarYAsignarFecha(this)">
									</div>
								</div>
								<br>
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
										<input type="date" id="fecha_nac" value="Escoge una fecha" min="1920-01-01" name="fecha_nac" readonly>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="puesto">Puesto</label>
											<select name="puesto" id="puesto" class="form-select" required>
												<option selected disabled value="">Elige una opción</option>
												<option value="AFANADOR">AFANADOR</option>
												<option value="ASESOR DE VENTAS">ASESOR DE VENTAS</option>
												<option value="AUXILIAR CONTABLE">AUXILIAR CONTABLE</option>
												<option value="ASISTENTE DE DIRECCION">ASISTENTE DE DIRECCION</option>
												<option value="ATENCION A CLIENTES">ATENCION A CLIENTES</option>
												<option value="AUX ADMINISTRATIVO REPSE">AUX ADMINISTRATIVO REPSE</option>
												<option value="AUX ADMINISTRATIVO VIGILANCIA">AUX ADMINISTRATIVO VIGILANCIA</option>
												<option value="AUX CUENTAS POR COBRAR">AUX CUENTAS POR COBRAR</option>
												<option value="AUX FACTURACION Y COBRANZA">AUX FACTURACION Y COBRANZA</option>
												<option value="AUX reclutamiento_a Y SELECCIÓN">AUX reclutamiento_a Y SELECCIÓN</option>
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
											<option value="MEXICO">MÉXICO</option>
											<option value="MICHOACAN">MICHOACÁN</option>
											<option value="MORELOS">MORELOS</option>
											<option value="NAYARIT">NAYARIT</option>
											<option value="NUEVO LEON">NUEVO LEÓN</option>
											<option value="OAXACA">OAXACA</option>
											<option value="PUEBLA">PUEBLA</option>
											<option value="QUERETARO">QUERÉTARO</option>
											<option value="QUINTANA ROO">QUINTANA ROO</option>
											<option value="SAN LUIS POTOSI">SAN LUIS POTOSÍ</option>
											<option value="SINALOA">SINALOA</option>
											<option value="SONORA">SONORA</option>
											<option value="TABASCO">TABASCO</option>
											<option value="TAMAULIPAS">TAMAULIPAS</option>
											<option value="TLAXCALA">TLAXCALA</option>
											<option value="VERACRUZ">VERACRUZ</option>
											<option value="YUCATAN">YUCATÁN</option>
											<option value="ZACATECAS">ZACATECAS</option>
										</select>
									</div>
									<div class="col">
										<label for="cp">Código postal</label>
										<input class="form-control" type="text" name="cp" required maxlength="5">
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
										<input class="form-control" type="text" name="n_ecuenta" maxlength="18">
									</div>
									<div class="col">
										<label for="suc_epago">Sucursal para pago electrónico</label>
										<input class="form-control" type="text" name="suc_epago" maxlength="30">
									</div>
									<div class="col">
										<label for="imss_pat">Registro patronal del IMSS</label>
										<input class="form-control" type="text" name="imss_pat" required maxlength="11">
									</div>
									<div class="col">
										<label for="tipo_contrato">Tipo de contrato</label>
										<input class="form-control" type="hidden" name="tipo_contrato" maxlength="2" readonly value="01">
									</div>
								</div><br>
								<div class="row">
									<div class="col">
										<label for="base_cot">Base de cotización</label>
										<input class="form-control" type="hidden" name="base_cot" maxlength="1" readonly value="F">
									</div>
									<div class="col">
										<label for="estatus_emp">Estatus empleado</label>
										<input class="form-control" type="hidden" name="estatus_emp" maxlength="1" readonly value="A">
									</div>
									<div class="col">
										<label for="sindicalizado">Sindicalizado</label>
										<input class="form-control" type="hidden" name="sindicalizado" maxlength="1" readonly value="C">
									</div>
									<div class="col">
										<label for="tipo_reg">Tipo de régimen</label>
										<input class="form-control" type="hidden" name="tipo_reg" maxlength="02" readonly value="02">
									</div>
									<div class="col">
										<label for="tipo_prest">Tipo de prestación</label>
										<input class="form-control" type="hidden" name="tipo_prest" maxlength="6" readonly value="De_Ley">
									</div>
								</div>
								<br>
								<div id="liveAlertPlaceholder"></div>
								<input type="submit" value="Guardar" class="btn btn-primary col-2 submitbutton" id="liveAlertBtn">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
			<br>
			<?php if ($tipo_usuario == 1 || $tipo_usuario == 2) { ?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover table-responsive align-middle table-sm" id="example22" width="100%" cellspacing="0">
						<thead class="table-dark">
							<tr class="tdh">
								<!-- <th>Acciones</th> -->
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
								<th>Estatus de empleado</th>
								<th>Fecha de reingreso</th>
								<th>Fecha de baja</th>
							</tr>
						</thead>
						<tfoot class="table-dark">
							<tr class="tdh">
								<!-- <th>Acciones</th> -->
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
								<th>Estatus de empleado</th>
								<th>Fecha de reingreso</th>
								<th>Fecha de baja</th>
							</tr>
						</tfoot>
					</table>
					<tbody>

					</tbody>
				</div>
			<?php } ?>
		</div>
			</div>
		</div>

		

	</main>
</div>

<script>
	function validarYAsignarFecha(input) {
		// Obtener el valor del input
		const curp = input.value.toUpperCase();

		// Expresión regular para validar la estructura del CURP
		const regexCURP = /^[A-Z]{4}[0-9]{6}[HM]{1}[A-Z0-9]{5}[A-Z0-9]{2}$/;

		// Verificar si el CURP cumple con la estructura correcta
		if (regexCURP.test(curp)) {
			// Obtener el año de nacimiento del CURP
			let anioNacimiento = parseInt('20' + curp.substr(4, 2));

			// Corregir el año si el quinto carácter es un dígito del 3 al 9
			const quintoCaracter = curp.charAt(4);
			if (quintoCaracter >= '3' && quintoCaracter <= '9') {
				anioNacimiento -= 100;
			}

			// Formatear la fecha de nacimiento
			const fechaNacimiento = anioNacimiento + '-' + curp.substr(6, 2) + '-' + curp.substr(8, 2);

			// Asignar la fecha de nacimiento al campo correspondiente
			document.getElementById('fecha_nac').value = fechaNacimiento;

			// Asignar los primeros 10 caracteres del CURP al campo de RFC
			document.getElementsByName('rfc')[0].value = curp.substr(0, 10);

			// CURP válido
			input.setCustomValidity('');
		} else {
			// CURP inválido
			input.setCustomValidity('El CURP no tiene la estructura correcta');
		}
	}
</script>

<script>
	$(document).ready(function () {
  $('#guardarlo').submit(function (e) {
    e.preventDefault();

    var form = $(this);
    var curp = $('#curp').val();
    var nombre = $('#nombre').val();
    var ap_pat = $('#ap_pat').val();
    var ap_mat = $('#ap_mat').val();

    $.ajax({
      type: 'POST',
      url: './exportA/verificar_curp.php',
      data: { curp: curp },
      success: function (response) {
        if (response === 'CURP_EXISTE') {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'La CURP ingresada ya existe en la base de datos',
            showConfirmButton: true,
            confirmButtonText: 'Aceptar'
          });
        } else {
          $.ajax({
            type: 'POST',
            url: './register_files/guardar_informacion_a.php',
            data: form.serialize(),
            success: function (response) {
              // Obtener el último valor de la columna "codigo" después de haber registrado el nuevo empleado
              $.ajax({
                type: 'GET',
                url: './exportA/obtener_ultimo_codigo.php',
                success: function (ultimoCodigo) {
                  // Mostrar SweetAlert2 en caso de éxito con el nombre y el último código
                  Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'El empleado ' + ap_pat + ' ' + ap_mat + ' ' + nombre +''+ ' con el código ' +''+ ultimoCodigo + ' ha sido registrado exitosamente.',
                    showConfirmButton: true,
                    confirmButtonText: 'Aceptar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      location.reload(true);
                    }
                  });
                },
                error: function (error) {
                  console.log(error);
                }
              });

              console.log(response);
            },
            error: function (error) {
              console.log(error);
            }
          });
        }
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
});

$(document).ready(function () {
  var table = $('#example22').DataTable({
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
    "sAjaxSource": "ServerSide/serversideUsuarios_a.php",
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
   $('#example22 tfoot th').each(function (index) {
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


function exportData_a() {
  var fecha1 = document.getElementById("fecha1").value;
  var fecha2 = document.getElementById("fecha2").value;

  // Realizar petición AJAX a PHP con las fechas seleccionadas
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Procesar la respuesta del servidor (puede variar según la estructura de tus datos)
      var data = JSON.parse(xhr.responseText);

      // Ejemplo de cómo construir el contenido del archivo Excel
      var content = [
        ['Código', 'Fecha de alta', 'Fecha de baja','Fecha de reingreso', 'Apellido paterno', 'Apellido materno', 'Nombre', 'Tipo de periodo', 'Salario diario', 'SBC parte fija', 'Departamento', 'Turno de trabajo', 'Num seguridad social', 'RFC', 'CURP', 'Sexo', 'Fecha de nacimiento', 'Puesto', 'Entidad federativa de nacimiento', 'CP', 'Estado Civil', 'Banco para pago electrónico', 'Numero de cuenta para pago electrónico', 'Sucursal para pago electrónico', 'Registro patronal del IMSS', 'Tipo de contrato', 'Base de cotización', 'Estatus empleado', 'Sindicalizado', 'Tipo de régimen', 'Tipo de prestación']
      ];

      data.forEach(function (row) {
        // Formatear el código agregando ceros a la izquierda
        var codigoFormateado = String(row.codigo).padStart(5, '0');

        // Verificar si la fecha de reingreso está vacía y asignar '31/12/1999' en ese caso
        var fechaReingresoFormateada = row.fecha_reingreso ? formatDate(new Date(row.fecha_reingreso)) : '31/12/1999';

        content.push([
          codigoFormateado,
          formatDate(new Date(addDay(row.fecha_alta))), formatDate(new Date(addDay(row.fecha_baja))),
          formatDate(new Date(addDay(row.fecha_reingreso))), // Utilizar la fecha de reingreso formateada
          row.ap_pat, row.ap_mat, row.nombre, row.ubicacion, row.salario_diario, row.sbc, row.departamento,
          row.turno, row.nss, row.rfc, row.curp, row.sexo, formatDate(new Date(addDay(row.fecha_nac))),
          row.puesto, row.entidad, row.cp,
          row.estado_civil,
          row.e_banco, row.n_ecuenta, row.suc_epago, row.imss_pat, row.tipo_contrato, row.base_cot, row.estatus_emp, row.sindicalizado, row.tipo_reg, row.tipo_prest
        ]);
      });

      // Crear un libro de Excel
      var ws = XLSX.utils.aoa_to_sheet(content);
      var wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, "Empleados");

      // Descargar el archivo Excel
      XLSX.writeFile(wb, 'Empleados.xlsx');
    }
  };
  xhr.open("GET", "./exportA/exportar_excel.php?fecha1=" + fecha1 + "&fecha2=" + fecha2, true);
  xhr.send();
}


function exportData2_a() {
  var cod1 = document.getElementById("cod1").value;
  var cod2 = document.getElementById("cod2").value;
  console.log("cod1:", cod1);
  console.log("cod2:", cod2);

  // Realizar petición AJAX a PHP con las fechas seleccionadas
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Procesar la respuesta del servidor (puede variar según la estructura de tus datos)
      var data = JSON.parse(xhr.responseText);

      // Ejemplo de cómo construir el contenido del archivo Excel
      var content = [
        ['Código', 'Fecha de alta', 'Fecha de baja','Fecha de reingreso', 'Apellido paterno', 'Apellido materno', 'Nombre', 'Tipo de periodo', 'Salario diario', 'SBC parte fija', 'Departamento', 'Turno de trabajo', 'Num seguridad social', 'RFC', 'CURP', 'Sexo', 'Fecha de nacimiento', 'Puesto', 'Entidad federativa de nacimiento', 'CP', 'Estado Civil', 'Banco para pago electrónico', 'Numero de cuenta para pago electrónico', 'Sucursal para pago electrónico', 'Registro patronal del IMSS', 'Tipo de contrato', 'Base de cotización', 'Estatus empleado', 'Sindicalizado', 'Tipo de régimen', 'Tipo de prestación']
      ];
      data.forEach(function (row) {
        // Formatear el código agregando ceros a la izquierda
        var codigoFormateado = String(row.codigo).padStart(5, '0');

        content.push([
          codigoFormateado,
          formatDate(new Date(addDay(row.fecha_alta))), formatDate(new Date(addDay(row.fecha_baja))),
          formatDate(new Date(addDay(row.fecha_reingreso))), // Utilizar la fecha de reingreso formateada
          row.ap_pat, row.ap_mat, row.nombre, row.ubicacion, row.salario_diario, row.sbc, row.departamento,
          row.turno, row.nss, row.rfc, row.curp, row.sexo, formatDate(new Date(addDay(row.fecha_nac))),
          row.puesto, row.entidad, row.cp,
          row.estado_civil,
          row.e_banco, row.n_ecuenta, row.suc_epago, row.imss_pat, row.tipo_contrato, row.base_cot, row.estatus_emp, row.sindicalizado, row.tipo_reg, row.tipo_prest
        ]);
      });


      // Crear un libro de Excel
      var ws = XLSX.utils.aoa_to_sheet(content);
      var wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, "Empleados");

      // Descargar el archivo Excel
      XLSX.writeFile(wb, 'Empleados.xlsx');
    }
  };
  xhr.open("GET", "./exportA/export_codigo.php?cod1=" + cod1 + "&cod2=" + cod2, true);
  xhr.send();
}

function exportDataR_a() {
  var fecha1r = document.getElementById("fecha1r").value;
  var fecha2r = document.getElementById("fecha2r").value;

  // Realizar petición AJAX a PHP con las fechas seleccionadas
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Procesar la respuesta del servidor (puede variar según la estructura de tus datos)
      var data = JSON.parse(xhr.responseText);

      // Ejemplo de cómo construir el contenido del archivo Excel
      var content = [
        ['Código', 'Fecha de alta', 'Fecha de baja','Fecha de reingreso', 'Apellido paterno', 'Apellido materno', 'Nombre', 'Tipo de periodo', 'Salario diario', 'SBC parte fija', 'Departamento', 'Turno de trabajo', 'Num seguridad social', 'RFC', 'CURP', 'Sexo', 'Fecha de nacimiento', 'Puesto', 'Entidad federativa de nacimiento', 'CP', 'Estado Civil', 'Banco para pago electrónico', 'Numero de cuenta para pago electrónico', 'Sucursal para pago electrónico', 'Registro patronal del IMSS', 'Tipo de contrato', 'Base de cotización', 'Estatus empleado', 'Sindicalizado', 'Tipo de régimen', 'Tipo de prestación']
      ];

      data.forEach(function (row) {
        // Formatear el código agregando ceros a la izquierda
        var codigoFormateado = String(row.codigo).padStart(5, '0');

        // Verificar si la fecha de reingreso está vacía y asignar '31/12/1999' en ese caso
        var fechaReingresoFormateada = row.fecha_reingreso ? formatDate(new Date(addDay(row.fecha_reingreso))) : '31/12/1999';

        content.push([
          codigoFormateado,
          formatDate(new Date(addDay(row.fecha_alta))), formatDate(new Date(addDay(row.fecha_baja))),
          fechaReingresoFormateada, // Utilizar la fecha de reingreso formateada
          row.ap_pat, row.ap_mat, row.nombre, row.ubicacion, row.salario_diario, row.sbc, row.departamento,
          row.turno, row.nss, row.rfc, row.curp, row.sexo, formatDate(new Date(addDay(row.fecha_nac))),
          row.puesto, row.entidad, row.cp,
          row.estado_civil,
          row.e_banco, row.n_ecuenta, row.suc_epago, row.imss_pat, row.tipo_contrato, row.base_cot, row.estatus_emp, row.sindicalizado, row.tipo_reg, row.tipo_prest
        ]);
      });

      // Crear un libro de Excel
      var ws = XLSX.utils.aoa_to_sheet(content);
      var wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, "Empleados");

      // Descargar el archivo Excel
      XLSX.writeFile(wb, 'Empleados.xlsx');
    }
  };
  xhr.open("GET", "./exportA/exportar_excelReingreso.php?fecha1r=" + fecha1r + "&fecha2r=" + fecha2r, true);
  xhr.send();
}
</script>
