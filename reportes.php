<?php
session_start();
require 'conexion.php';
$sql3 = "SELECT * FROM alta_reportes ORDER BY fecha DESC";
$resultado13 = $mysqli->query($sql3);

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$tipo_usuario = $_SESSION['tipo_usuario'];
$depto = $_SESSION['depto'];
$puesto = $_SESSION['puesto'];
?>
<?php
include 'navbar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <script src="js/main_r.js"></script>
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script src="main.js"></script>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Reportes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Menú administrador</a></li>
                <li class="breadcrumb-item active">Reportes</li>
        </div>

        <div class="card mx-4 mb-4">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Crear reporte
                </button>
                <!-- <button id="generatePdf">Generar PDF</button> -->
                <SCRipt>
                    document.getElementById('generatePdf').addEventListener('click', function() {
                        fetch('generatePdf.php')
                            .then(response => response.blob())
                            .then(blob => {
                                // Crea una URL para el blob
                                const url = window.URL.createObjectURL(blob);
                                // Crea un enlace y haz clic en él para descargar el PDF
                                const a = document.createElement('a');
                                a.style.display = 'none';
                                a.href = url;
                                a.download = 'archivo.pdf';
                                document.body.appendChild(a);
                                a.click();
                                window.URL.revokeObjectURL(url);
                            })
                            .catch((error) => console.error(error));
                    });
                </SCRipt>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear reporte</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="enviar_formulario.php" method="POST" enctype="multipart/form-data" id="formcrearreporte">
                                    <div class="form-group mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="correo_corporativo">Correo Corporativo</label>
                                        <input type="email" class="form-control" id="correo_corporativo" name="correo_corporativo" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="departamento">Departamento</label>
                                        <select class="form-select" name="departamento" id="departamento" required>
                                            <option disabled selected value="">Selecciona un departamento</option>
                                            <option value="Calidad">Calidad</option>
                                            <option value="Central">Central</option>
                                            <option value="Cliente externo">Cliente externo</option>
                                            <option value="Cliente interno">Cliente interno</option>
                                            <option value="Contabilidad">Contabilidad</option>
                                            <option value="Cuentas por pagar">Cuentas por pagar</option>
                                            <option value="Facturación">Facturación</option>
                                            <option value="Gerencia calidad">Gerencia calidad</option>
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
                                        </select>
                                        <div class="invalid-feedback">Por favor, selecciona un departamento.</div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="departamento_receptor">Departamento receptor</label>
                                        <select class="form-select" name="departamento_receptor" id="departamento_receptor" required>
                                            <option disabled selected value="">Selecciona un departamento</option>
                                            <option value="ejecutivocuentaclave@gruposvm.com">Calidad</option>
                                            <option value="central@gruposvm.com">Central</option>
                                            <option value="auxiliarcontable@gruposvm.com">Contabilidad</option>
                                            <option value="cuentasporpagar@gruposvm.com">Cuentas por pagar</option>
                                            <option value="facturacionvigilancia@gruposvm.com">Facturación</option>
                                            <option value="gerenciageneral@gruposvm.com">Gerencia general</option>
                                            <option value="gerenciageneral@gruposvm.com">Gerencia general</option>
                                            <option value="gerenciaoperativalimpieza@gruposvm.com">Gerencia limpieza</option>
                                            <option value="gerenciaoperativa@gruposvm.com">Gerencia vigilancia</option>
                                            <option value="nomina@gruposvm.com">Nóminas</option>
                                            <option value="repse@gruposvm.com">REPSE</option>
                                            <option value="recepcion@gruposvm.com">Recepción</option>
                                            <option value="gerenciarecursoshumanos@gruposvm.com">Recursos humanos</option>
                                            <option value="sistemas@gruposvm.com">Sistemas</option>
                                            <option value="ventas@gruposvm.com">Ventas</option>
                                        </select>
                                        <div class="invalid-feedback">Por favor, selecciona un departamento receptor.</div>
                                        <input type="hidden" name="dep_r" id="dep_r" value="" hidden>
                                        <script>
                                            // Obtener el select y el input
                                            const select = document.getElementById('departamento_receptor');
                                            const input = document.getElementById('dep_r');

                                            // Escuchar el cambio en el select
                                            select.addEventListener('change', function() {
                                                // Establecer en el input el texto de la opción seleccionada
                                                const selectedText = select.options[select.selectedIndex].text;
                                                input.value = selectedText;
                                            });
                                        </script>
                                    </div>
                                    <?php if ($puesto == "Gerente") { ?>
                                        <div class="form-group mb-3">
                                            <label for="prioridad">Prioridad</label>
                                            <select class="form-select" name="prioridad" id="prioridad" required>
                                                <option disabled selected value="">Selecciona el tipo de prioridad</option>
                                                <option value="Alta">Alta</option>
                                                <option value="Media">Media</option>
                                                <option value="Baja">Baja</option>
                                            </select>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group mb-3">
                                        <label for="fecha">Hora del reporte</label>
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" id="fecha" name="fecha" readonly>
                                            <button type="button" class="btn btn-secondary" id="btnActualizarHora"><i class="fa-solid fa-arrows-rotate"></i></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="folio" id="folio" value="" />
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Enviar reporte</button>
                                    </div>

                                    <!-- <a href="../DCCato/index.php" class="btn greenbtn">Regresar</a> -->
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="exampler" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr class="tdh">
                                <th class="acciones">Más información</th>
                                <th class="acciones">Acciones</th>
                                <th>Folio</th>
                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Descripción</th>
                                <th>Fecha (alta)</th>
                                <th>Prioridad</th>
                                <th>Asignado a</th>
                                <th>Observaciones</th>
                                <th>Materiales</th>
                                <th>Tipo servicio</th>
                                <th>Estado</th>
                                <th>Fecha en proceso</th>
                                <th>Fecha concluido</th>
                                <th>Etapa</th>
                                <th>Tiempo realizado</th>
                                <th>Evidencia</th>
                                <th hidden>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado13->fetch_assoc()) {
                                if (
                                    $depto === "Admin" ||
                                    $row['departamento'] === $depto ||
                                    ($depto === "Gerencia calidad" &&
                                        ($row['departamento'] === "Calidad" || $row['departamento'] === "Gerencia calidad"))
                                ) {
                                    $completado = ($row['estado'] === 'Completado') ? 'completado' : '';
                                    $completado_g = ($row['estado_g'] === 'Finalizado') ? 'finalizado' : '';
                            ?>
                                    <tr id="row_<?php echo $row['folio']; ?>" class="<?php echo $completado; ?> <?php echo $completado_g; ?> ">
                                        <td class="tdh"></td>
                                        <td class="tdh">
                                            <!-- <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['folio']; ?>">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button> -->


                                        </td>
                                        <td><?php echo $row['folio']; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['departamento']; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['fecha']; ?></td>
                                        <td>
                                            <?php
                                            $prioridad = $row['prioridad'];
                                            if ($prioridad == "Alta") {
                                                echo '<span class="badge bg-danger">' . $prioridad . '</span>';
                                            } elseif ($prioridad == "Media") {
                                                echo '<span class="badge bg-warning text-dark">' . $prioridad . '</span>';
                                            } elseif ($prioridad == "Baja") {
                                                echo '<span class="badge bg-success">' . $prioridad . '</span>';
                                            } else {
                                                echo '<span class="badge bg-secondary">' . $prioridad . '</span>';
                                            }
                                            ?>
                                        </td>

                                        <td><?php echo $row['asignado']; ?></td>
                                        <td><?php echo $row['diagnostico_t']; ?></td>
                                        <td><?php echo $row['materiales']; ?></td>
                                        <td><?php echo $row['tipo_servicio']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td><?php echo $row['fecha_proceso']; ?></td>
                                        <td><?php echo $row['hora_concluido']; ?></td>
                                        <td><?php echo $row['estado_g']; ?></td>
                                        <td>
                                            <?php
                                            // Cálculo del tiempo transcurrido
                                            $fechaInicio = strtotime($row['fecha']);
                                            $horaConcluido = $row['hora_concluido'] ?? null;

                                            // Verifica si hora_concluido está vacío o no
                                            if (empty($horaConcluido)) {
                                                $tiempoTranscurrido = "Sin concluir";
                                                $badge_color = 'bg-secondary';
                                            } else {
                                                $fechaFin = strtotime($horaConcluido);

                                                // Calcula la diferencia en segundos
                                                $diferencia = $fechaFin - $fechaInicio;

                                                // Calcula días, horas, minutos y segundos
                                                $dias = floor($diferencia / (60 * 60 * 24));
                                                $horas = floor(($diferencia % (60 * 60 * 24)) / (60 * 60));
                                                $minutos = floor(($diferencia % (60 * 60)) / 60);
                                                $segundos = $diferencia % 60;

                                                // Formatea el tiempo transcurrido
                                                $tiempoTranscurrido = "{$dias}d {$horas}h {$minutos}m {$segundos}s";

                                                // Determinar el color de la badge según las horas transcurridas y la prioridad
                                                $horasTranscurridas = $diferencia / (60 * 60);
                                                if ($row['prioridad'] == "Alta") {
                                                    if ($horasTranscurridas > 4) {
                                                        $badge_color = 'bg-danger';
                                                    } elseif ($horasTranscurridas >= 2 && $horasTranscurridas < 4) {
                                                        $badge_color = 'bg-warning text-dark';
                                                    } else {
                                                        $badge_color = 'bg-success';
                                                    }
                                                } elseif ($row['prioridad'] == "Media") {
                                                    if ($horasTranscurridas > 24) {
                                                        $badge_color = 'bg-danger';
                                                    } elseif ($horasTranscurridas >= 12 && $horasTranscurridas < 24) {
                                                        $badge_color = 'bg-warning text-dark';
                                                    } else {
                                                        $badge_color = 'bg-success';
                                                    }
                                                } elseif ($row['prioridad'] == "Baja") {
                                                    if ($horasTranscurridas > 72) {
                                                        $badge_color = 'bg-danger';
                                                    } elseif ($horasTranscurridas >= 36 && $horasTranscurridas < 72) {
                                                        $badge_color = 'bg-warning text-dark';
                                                    } else {
                                                        $badge_color = 'bg-success';
                                                    }
                                                } else {
                                                    $badge_color = 'bg-secondary';
                                                }
                                            }

                                            // Muestra la badge con el color determinado y el tiempo transcurrido
                                            echo '<span class="badge ' . $badge_color . '">' . $tiempoTranscurrido . '</span>';
                                            ?>
                                        </td>
                                        <td><button onclick="abrirImagen('<?php echo $row['imagen']; ?>')" class="btn btn-secondary btn-sm">Ver Imagen</button></td>
                                        <td> <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_<?php echo $row['folio']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog  modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Editar información</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data" id="formenviar_<?php echo $row['folio']; ?>">
                                                                <input type="hidden" name="nombreu" id="nombreu" value="<?php echo $_SESSION['nombre']; ?>">
                                                                <input type="hidden" name="folio" value="<?php echo $row['folio']; ?>">
                                                                <div class="form-group mb-3">
                                                                    <label for="asignado">Asignado a</label>
                                                                    <select name="asignado" class="form-select asignado" disabled>
                                                                    <option selected value="<?php echo $row['asignado']; ?>"><?php echo $row['asignado']; ?></option>
                                                                        <!-- Las opciones se llenarán aquí -->
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="diagnostico_t">Trabajo realizado</label>
                                                                    <textarea class="form-control" name="diagnostico_t" rows="4" <?php echo !empty($row['diagnostico_t']) ? 'readonly' : ''; ?>><?php echo $row['diagnostico_t']; ?></textarea>
                                                                </div>
                                                                <!-- <div class="form-group mb-3" id="additionalObservation_<?php echo $row['folio']; ?>" style="display: none;">
                                                                    <label for="new_observation">Nueva Observación</label>
                                                                    <input class="form-control" type="text" name="new_observation" id="new_observation_<?php echo $row['folio']; ?>">
                                                                </div> -->
                                                                <!-- <button type="button" id="addObservationBtn_<?php echo $row['folio']; ?>" class="btn btn-primary">Más observaciones</button> -->

                                                                <div class="form-group mb-3">
                                                                    <label for="materiales">Materiales utilizados</label>
                                                                    <input class="form-control" type="text" name="materiales" value="<?php echo $row['materiales']; ?>" readonly>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="tipo_servicio">Tipo de servicio</label>
                                                                    <select name="tipo_servicio" class="form-select tipo-servicio" disabled>
                                                                    <option selected value="<?php echo $row['tipo_servicio']; ?>"><?php echo $row['tipo_servicio']; ?></option>
                                                                        <!-- Las opciones se llenarán aquí -->
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="estado">Estado</label>
                                                                    <select name="estado" id="estado_<?php echo $row['folio']; ?>" class="form-select" disabled>
                                                                        <option selected value="<?php echo $row['estado']; ?>"><?php echo $row['estado']; ?></option>
                                                                        <option value="Completado">Completado</option>
                                                                        <option value="En proceso">En proceso</option>
                                                                    </select>
                                                                </div>
                                                                <div id="fecha-container_<?php echo $row['folio']; ?>" class="form-group mb-3" style="display:none;">
                                                                    <label for="fecha_proceso">Fecha en proceso</label>
                                                                    <input type="datetime-local" class="form-control" id="fecha_proceso_<?php echo $row['folio']; ?>" name="fecha_proceso" value="<?php echo date('Y-m-d\TH:i', strtotime($row['fecha_proceso'])); ?>" readonly>
                                                                </div>
                                                                <div id="hora-container_<?php echo $row['folio']; ?>" class="form-group mb-3" style="display:none;">
                                                                    <label for="hora_concluido">Fecha concluido</label>
                                                                    <input type="datetime-local" class="form-control" id="hora_concluido_<?php echo $row['folio']; ?>" name="hora_concluido" value="<?php echo date('Y-m-d\TH:i', strtotime($row['hora_concluido'])); ?>" readonly>
                                                                </div>
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        function toggleContainersAndObservations(folio) {
                                                                            const estado = $('#estado_' + folio).val();

                                                                            if (estado === 'En proceso') {
                                                                                $('#fecha-container_' + folio).show();
                                                                                $('#hora-container_' + folio).hide();
                                                                                $('#hora_concluido_' + folio).val('');
                                                                            } else if (estado === 'Completado') {
                                                                                $('#fecha-container_' + folio).show();
                                                                                $('#hora-container_' + folio).show();
                                                                            } else {
                                                                                $('#fecha-container_' + folio).hide();
                                                                                $('#hora-container_' + folio).hide();
                                                                                $('#fecha_proceso_' + folio).val('');
                                                                                $('#hora_concluido_' + folio).val('');
                                                                            }
                                                                        }

                                                                        // Inicializar contenedores y campo Observaciones según el estado inicial
                                                                        toggleContainersAndObservations(<?php echo $row['folio']; ?>);

                                                                        // Cambiar contenedores y campo Observaciones al cambiar el estado
                                                                        $('#estado_<?php echo $row['folio']; ?>').change(function() {
                                                                            toggleContainersAndObservations(<?php echo $row['folio']; ?>);
                                                                        });

                                                                        // Manejar el evento del botón "Más observaciones"
                                                                        $('#addObservationBtn_<?php echo $row['folio']; ?>').click(function() {
                                                                            $('#additionalObservation_<?php echo $row['folio']; ?>').show();
                                                                        });

                                                                        // Manejar el envío del formulario con ID único
                                                                        $('#formenviar_<?php echo $row['folio']; ?>').submit(function(e) {
                                                                            e.preventDefault(); // Evita que se envíe el formulario de forma tradicional

                                                                            // Guarda una referencia al formulario para usarla dentro de la función de éxito
                                                                            var form = $(this);

                                                                            // Crea un objeto FormData para enviar datos de formulario y archivos
                                                                            var formData = new FormData(form[0]);

                                                                            // Realiza la solicitud AJAX

                                                                        });
                                                                    });
                                                                </script>
                                                                <div class="form-group mb-3">
                                                                    <label for="correo_corporativo" hidden>Correo corporativo</label>
                                                                    <input class="form-control" type="hidden" name="correo_corporativo" value="<?php echo $row['correo_corporativo']; ?>" readonly>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="file">Subir imagen</label> <br>
                                                                    <button onclick="abrirImagen('<?php echo $row['imagen']; ?>')" class="btn btn-secondary btn-sm">Ver Imagen</button>
                                                                </div>


                                                                <div class="form-group mb-3">
                                                                    <label for="estado_g">Etapa</label>
                                                                    <select class="form-select" name="estado_g" id="estado_g" required disabled>

                                                                        <option selected value="<?php echo $row['estado_g']; ?>"><?php echo $row['estado_g']; ?></option>
                                                                        <option value="Activo">Activo</option>
                                                                        <option value="Finalizado">Finalizado</option>
                                                                    </select>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <!-- <input type="submit" value="Guardar" class="btn btn-primary submitbutton" id="liveAlertBtn" name="submit"> -->
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
</div>
<script>
    // Obtener el elemento input por su ID
    var inputFechaHora = document.getElementById('fechaActual1');

    // Obtener la fecha y hora actual en la zona horaria local
    var now = new Date();
    var year = now.getFullYear();
    var month = (now.getMonth() + 1).toString().padStart(2, '0');
    var day = now.getDate().toString().padStart(2, '0');
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');

    // Formatear la fecha y hora en el formato aceptado por datetime-local
    var formattedDate = `${year}-${month}-${day}T${hours}:${minutes}`;

    // Establecer la fecha y hora actual como el valor del input
    inputFechaHora.value = formattedDate;
</script>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#formenviar', function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de forma tradicional

            // Guarda una referencia al formulario para usarla dentro de la función de éxito
            var form = $(this);

            // Crea un objeto FormData para enviar datos de formulario y archivos
            var formData = new FormData(form[0]);

            // Realiza la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: './update_files/updater.php',
                data: formData, // Usa el objeto FormData en lugar de form.serialize()
                enctype: 'multipart/form-data',
                contentType: false, // Importante: no establezcas el tipo de contenido
                processData: false, // Importante: no proceses los datos
                success: function(response) {
                    // Muestra SweetAlert2 en caso de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Reporte actualizado exitosamente',
                        showConfirmButton: true, // Muestra el botón de confirmación
                        confirmButtonText: 'Aceptar' // Personaliza el texto del botón de confirmación
                    }).then((result) => {
                        // Si el usuario hace clic en el botón "Aceptar"
                        if (result.isConfirmed) {
                            // Recarga la página
                            location.reload(); // Recarga la página
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
    // Obtener datos desde PHP
    fetch('getData.php')
        .then(response => response.json())
        .then(data => {
            // Preparar datos para Chart.js
            var configuracionGrafica = function(canvasId, data) {
                var labels = Object.keys(data);
                var values = Object.values(data);

                // Configurar Chart.js
                var ctx = document.getElementById(canvasId).getContext('2d');
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: values,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(182, 182, 255, 0.7)', // Lavanda
                                // 'rgba(75, 0, 130, 0.7)',   // Indigo
                                'rgba(139, 69, 19, 0.7)', // Café
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(182, 182, 255, 1)', // Lavanda
                                // 'rgba(75, 0, 130, 1)',   // Indigo
                                'rgba(139, 69, 19, 1)', // Café
                            ],
                            borderWidth: 1
                        }]
                    }
                });
            };

            configuracionGrafica('chartAsignado', data.asignado);
            configuracionGrafica('chartEstado', data.estado);
        })
        .catch(error => console.error('Error al obtener datos:', error));
</script>

<script>
    // Espera a que se cargue el DOM
    $(document).ready(function() {
        // Captura el evento submit del formulario
        $('#formcrearreporte').submit(function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de la manera convencional


            // Agregar el folio al formulario
            $(this).append('<input type="hidden" name="folio_js">');

            // Muestra el Sweet Alert con el folio generado
            Swal.fire({
                title: '¡Éxito!',
                text: 'Tu reporte se ha generado exitosamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                // Verifica si el botón "Aceptar" fue presionado
                if (result.isConfirmed) {
                    // Recarga la página
                    location.reload();
                }
            });

            // Realiza la petición AJAX
            $.ajax({
                type: 'POST',
                url: 'enviar_formulario.php', // Ruta a tu script PHP
                data: $(this).serialize(), // Serializa los datos del formulario
                success: function(response) {
                    // Maneja la respuesta del servidor
                    console.log(response);
                },
                error: function(error) {
                    // Maneja el error en caso de que la petición AJAX falle
                    console.log('Error:', error);
                }
            });
        });
    });
</script>
<script>
    // Función para obtener la fecha y hora actual en la zona horaria de México
    function obtenerFechaHoraActual() {
        var fechaHora = new Date();
        var opcionesFechaHora = {
            timeZone: 'America/Mexico_City',
            hour12: false,
            hour: 'numeric',
            minute: 'numeric'
        };
        var formatoHora = fechaHora.toLocaleTimeString('es-MX', opcionesFechaHora);
        var formatoFechaHora = fechaHora.toISOString().slice(0, 10) + 'T' + formatoHora;
        document.getElementById("fecha").value = formatoFechaHora;
    }

    // Función para actualizar la fecha y hora cada 5 segundos
    function actualizarFechaHora() {
        obtenerFechaHoraActual();
    }

    // Iniciar la actualización automática al cargar la página
    window.onload = function() {
        actualizarFechaHora();
        setInterval(actualizarFechaHora, 5000); // 5000 milisegundos = 5 segundos
    };

    // Manejar la actualización cuando se hace clic en el botón
    document.getElementById("btnActualizarHora").addEventListener("click", function() {
        actualizarFechaHora();
    });
</script>
<script>
    function abrirImagen(imagen) {
        if (imagen) {
            var rutaCompleta = 'DCR/' + imagen; // Concatena la ruta base 'DCR/' con la ruta de la imagen
            window.open(rutaCompleta, '_blank');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se encontró imagen',
            });
        }
    }
</script>
<script>
    const puesto = "<?php echo $puesto; ?>";
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Solo ejecuta el script si el puesto es "Auxiliar"
        if (puesto === 'Auxiliar') {
            // Selecciona todas las filas con la clase "completado"
            const completados = document.querySelectorAll('tr.completado');

            completados.forEach(function(row) {
                // Selecciona todas las celdas dentro de la fila, excepto la primera, segunda y última columna
                const cells = row.querySelectorAll('td:not(:nth-child(1)):not(:nth-child(2)):not(:last-child)');

                cells.forEach(function(cell) {
                    // Deshabilita la celda (puedes ajustar según tus necesidades)
                    cell.style.pointerEvents = 'none';
                    cell.style.opacity = '0.5'; // Opcional: añade un estilo visual para indicar que está deshabilitado
                });
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Solo ejecuta el script si el puesto es "Gerente"
        if (puesto === 'Gerente') {
            // Selecciona todas las filas con la clase "finalizado"
            const finalizado = document.querySelectorAll('tr.finalizado');

            finalizado.forEach(function(row) {
                // Selecciona todas las celdas dentro de la fila, excepto la primera, segunda y última columna
                const cells = row.querySelectorAll('td:not(:nth-child(1)):not(:nth-child(2)):not(:last-child)');

                cells.forEach(function(cell) {
                    // Deshabilita la celda (puedes ajustar según tus necesidades)
                    cell.style.pointerEvents = 'none';
                    cell.style.opacity = '0.5'; // Opcional: añade un estilo visual para indicar que está deshabilitado
                });
            });
        }
    });
</script>

<script>
    document.getElementById('addObservationBtn').addEventListener('click', function() {
        document.getElementById('additionalObservation').style.display = 'block';
    });
</script>