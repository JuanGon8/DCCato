<?php
session_start();
require 'conexion2.php';
require 'conexion.php';
$sql1 = "SELECT * FROM survey_emp2";
$resultado1 = $mysqli->query($sql1);

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$tipo_usuario = $_SESSION['tipo_usuario'];
$depto = $_SESSION['depto'];


// Función para contar las respuestas
function getCounts($conn, $question)
{
    $query = "SELECT $question, COUNT(*) as count FROM survey_emp2 GROUP BY $question";
    $result = mysqli_query($conn, $query);
    $counts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $counts[$row[$question]] = $row['count'];
    }
    return $counts;
}

// Obtén los conteos de cada pregunta
$counts_question1 = getCounts($conn, 'question1');
$counts_question2 = getCounts($conn, 'question2');
$counts_question3 = getCounts($conn, 'question3');
$counts_question4 = getCounts($conn, 'question4');
$counts_question5 = getCounts($conn, 'question5');

// Codifica los datos en formato JSON para usar en JavaScript
$data_json = json_encode([
    'question1' => $counts_question1,
    'question2' => $counts_question2,
    'question3' => $counts_question3,
    'question4' => $counts_question4,
    'question5' => $counts_question5,
]);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Encuestas</title>
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
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Gráficas de Encuestas</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="">Menú administrador</a></li>
                    <li class="breadcrumb-item active">Gráficas de Encuestas</li>
                </ol>
            </div>

            <div class="card mx-4 mb-4">
                <div class="card-body">
                <button class="btn btn-primary mb-1" id="copyButton">Copiar enlace de encuesta</button>
                    <div id="alertContainer" class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
                        <!-- Alert will be appended here -->
                    </div>
                    <table class="table table-striped table-bordered" id="example6" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr class="tdh">
                                <th>Nombre</th>
                                <th>Ubicación</th>
                                <th>Cumplimiento de consignas</th>
                                <th>Supervisión</th>
                                <th>Actitud de servicio</th>
                                <th>Cobertura</th>
                                <th>Presentación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado1->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['nombreCliente']; ?></td>
                                    <td><?php echo $row['ubicacion']; ?></td>
                                    <td><?php echo $row['question1']; ?></td>
                                    <td><?php echo $row['question2']; ?></td>
                                    <td><?php echo $row['question3']; ?></td>
                                    <td><?php echo $row['question4']; ?></td>
                                    <td><?php echo $row['question5']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                    
                    <h2>CUMPLIMIENTO DE CONSIGNAS</h2>
                    <canvas id="chartQuestion1" width="3vh" height="1vh"></canvas>

                    <h2>SUPERVISIÓN</h2>
                    <canvas id="chartQuestion2" width="3vh" height="1vh"></canvas>

                    <h2>ACTITUD DE SERVICIO</h2>
                    <canvas id="chartQuestion3" width="3vh" height="1vh"></canvas>

                    <h2>COBERTURA</h2>
                    <canvas id="chartQuestion4" width="3vh" height="1vh"></canvas>

                    <h2>PRESENTACIÓN</h2>
                    <canvas id="chartQuestion5" width="3vh" height="1vh"></canvas>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Obtén los datos de PHP
        const data = <?php echo $data_json; ?>;

        // Función para generar los datos de los gráficos a partir de los conteos
        function generateChartData(counts) {
            const labels = Object.keys(counts);
            const values = Object.values(counts);
            // Genera colores únicos para cada valor
            const colors = labels.map(() => 'rgba(' + [
                Math.floor(Math.random() * 256),
                Math.floor(Math.random() * 256),
                Math.floor(Math.random() * 256),
                0.2
            ].join(',') + ')');
            const borderColors = colors.map(color => color.replace('0.2', '1'));
            return {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: colors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            };
        }

        // Configuración de los gráficos
        const ctx1 = document.getElementById('chartQuestion1').getContext('2d');
        const chartQuestion1 = new Chart(ctx1, {
            type: 'bar',
            data: generateChartData(data.question1),
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });

        const ctx2 = document.getElementById('chartQuestion2').getContext('2d');
        const chartQuestion2 = new Chart(ctx2, {
            type: 'bar',
            data: generateChartData(data.question2),
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });

        const ctx3 = document.getElementById('chartQuestion3').getContext('2d');
        const chartQuestion3 = new Chart(ctx3, {
            type: 'bar',
            data: generateChartData(data.question3),
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });

        const ctx4 = document.getElementById('chartQuestion4').getContext('2d');
        const chartQuestion4 = new Chart(ctx4, {
            type: 'bar',
            data: generateChartData(data.question4),
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });

        const ctx5 = document.getElementById('chartQuestion5').getContext('2d');
        const chartQuestion5 = new Chart(ctx5, {
            type: 'bar',
            data: generateChartData(data.question5),
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
    <script>
        document.getElementById('copyButton').addEventListener('click', function() {
            // Crear un elemento de texto temporal
            var tempInput = document.createElement('input');
            tempInput.value = 'https://dccato.dyndns.org:84/DCCato-survey/survey_q.php';
            document.body.appendChild(tempInput);

            // Seleccionar el texto del elemento
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Para dispositivos móviles

            // Copiar el texto al portapapeles
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Mostrar alerta de Bootstrap
            var alertContainer = document.getElementById('alertContainer');
            var alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.role = 'alert';
            alert.innerHTML = '¡Copiado!';

            var closeButton = document.createElement('button');
            closeButton.type = 'button';
            closeButton.className = 'btn-close';
            closeButton.setAttribute('data-bs-dismiss', 'alert');
            closeButton.setAttribute('aria-label', 'Close');
            alert.appendChild(closeButton);

            alertContainer.appendChild(alert);

            // Auto-cerrar la alerta después de 3 segundos
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(function() {
                        alert.remove();
                    }, 150);
                });
            }, 3000);
        });
    </script>
</body>

</html>