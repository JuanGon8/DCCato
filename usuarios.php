<?php
session_start();
require 'conexion.php';
$sql8 = "SELECT * FROM usuarios";
$resultado8 = $mysqli->query($sql8);
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


        <script src="main.js"></script>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Registro de gerentes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Módulo de usuarios</a></li>
                <li class="breadcrumb-item active">Registro de gerentes</li>
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
                                                    <option value="Calidad">Calidad</option>
                                                    <option value="Central">Central</option>
                                                    <option value="Cliente externo">Cliente externo</option>
                                                    <option value="Cliente interno">Cliente interno</option>
                                                    <option value="Contabilidad">Contabilidad</option>
                                                    <option value="Cuentas por pagar">Cuentas por pagar</option>
                                                    <option value="Facturación">Facturación</option>
                                                    <option value="Gerencia general">Gerencia general</option>
                                                    <option value="Gerencia general">Gerencia general</option>
                                                    <option value="Gerencia limpieza">Gerencia limpieza</option>
                                                    <option value="Gerencia vigilancia">Gerencia vigilancia</option>
                                                    <option value="Nóminas">Nóminas</option>
                                                    <option value="Público general">Público general</option>
                                                    <option value="REPSE">REPSE</option>
                                                    <option value="Recepción">Recepción</option>
                                                    <option value="Recursos humanos">Recursos humanos</option>
                                                    <option value="Sistemas">Sistemas</option>
                                                    <option value="Ventas">Ventas</option>
                                                </select> <br>
                                            </div>
                                            <!-- <label for="tipo_usuario">Nivel de usuario</label>
                                            <input class="form-control inputwidth" type="text" name="tipo_usuario" required> -->
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
                                             
                                                <th>Nombre</th>
                                                <th>Departamento</th>
                                                <th>Usuario</th>
                                                <!-- <th>Contraseña</th> -->
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
                                                    
                                                    <td><?php echo $row['nombre']; ?></td>
                                                    <td><?php echo $row['depto']; ?></td>
                                                    <td><?php echo $row['usuario']; ?></td>
                                                    <!-- <td><?php echo $row['password']; ?></td> -->

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
                        text: 'Usuario registrado exitosamente',
                        showConfirmButton: false,
                        timer: 1500 // Cierra automáticamente después de 1.5 segundos
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