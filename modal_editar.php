
<!-- Agrega esto en la sección head de tu documento HTML -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar información</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="./update_files/update.php" enctype="multipart/form-data" id="update">
                <div class="row">
                    <input type="hidden" name="codigo" value="<?php echo $row['codigo']; ?>">
                    <div class="col">
                        <label for="fecha_alta">Fecha de alta</label>
                        <input type="date" id="fechaActual3" value="<?php echo $row['fecha_alta']; ?>" min="1920-01-01" name="fecha_alta">
                    </div>
                    <div class="col">
                        <label for="ap_pat">Apellido paterno</label>
                        <input class="form-control" type="text" name="ap_pat" maxlength="30" value="<?php echo $row['ap_pat']; ?>">
                    </div>
                    <div class="col">
                        <label for="ap_mat">Apellido materno</label>
                        <input class="form-control" type="text" name="ap_mat" maxlength="30" value="<?php echo $row['ap_mat']; ?>">
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" maxlength="40" value="<?php echo $row['nombre']; ?>">
                    </div>
                    <div class="col">
                        <label for="ubicacion">Tipo de periodo</label>
                        <select name="ubicacion" id="ubicacion" class="form-select">
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
                        <input class="form-control" type="text" name="salario_diario" maxlength="10" pattern="[0-9]+\.[0-9]+" value="<?php echo $row['salario_diario']; ?>">
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col">
                        <label for="sbc">SBC</label>
                        <input class="form-control" type="text" name="sbc" maxlength="10" pattern="[0-9]+\.[0-9]+" value="<?php echo $row['sbc']; ?>">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="departamento">Departamento</label>
                            <select name="departamento" id="departamento" class="form-select">
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
                            <select name="turno" id="turno" class="form-select">
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
                        <input class="form-control" type="text" name="nss" maxlength="11" value="<?php echo $row['nss']; ?>">
                    </div>
                    <div class="col">
                        <label for="rfc">RFC <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
                        <input class="form-control" type="text" name="rfc" maxlength="13" value="<?php echo $row['rfc']; ?>">
                    </div>
                    <div class="col">
                        <label for="curp">CURP <i class="fa-solid fa-circle-exclamation" title="Este campo solo admite números y letras en mayúsculas"></i></label>
                        <input class="form-control" type="text" name="curp" maxlength="18" pattern="[A-Z0-9]{18}" value="<?php echo $row['curp']; ?>">
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-select">
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
                            <select name="puesto" id="puesto" class="form-select">
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
                        <select name="entidad" id="entidad" class="form-select">
                            <option selected value="<?php echo $row['entidad']; ?>"><?php echo $row['entidad']; ?></option>
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
                        <input class="form-control" type="text" name="cp" maxlength="5" pattern="[0-9]{5}" value="<?php echo $row['cp']; ?>">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="estado_civil">Estado civil</label>
                            <select name="estado_civil" id="estado_civil" class="form-select">
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
                        <input class="form-control" type="text" name="imss_pat" maxlength="11" pattern="[A-Z0-9]{11}" value="<?php echo $row['imss_pat']; ?>">
                    </div>
                    <div class="col">
                        <label for="estatus_emp">Estatus de empleado</label>
                        <input class="form-control" type="text" name="estatus_emp" maxlength="1" value="<?php echo $row['estatus_emp']; ?>">
                    </div>
                    <div class="col-4">
                        <label for="fecha_reingreso">Fecha de reingreso</label>
                        <input class="form-control" type="date" name="fecha_reingreso" value="<?php echo $row['fecha_reingreso']; ?>">
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
<script>
	$(document).ready(function() {
		// Agregar campo de búsqueda al select
		$("#departamento").select2({
			placeholder: "Buscar departamento",
			allowClear: true
		});
	});
</script>
<!-- Agrega esto antes de cerrar el body de tu documento HTML -->
<script>
    $(document).ready(function () {
        // Agregar campo de búsqueda al select
        $("#puesto").select2({
            placeholder: "Buscar puesto",
            allowClear: true
        });
    });
</script>
