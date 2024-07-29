<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$tipo_usuario = $_SESSION['tipo_usuario'];
$depto = $_SESSION['depto'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema3";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$query = "SELECT age, answered, question1, question2, question3 FROM survey_employee";
$result = mysqli_query($conexion, $query);

$columns = ['age', 'answered', 'question1', 'question2', 'question3'];
$data = [];

// Inicializar el array de datos
foreach ($columns as $column) {
    $data[$column] = [];
}

while ($row = mysqli_fetch_assoc($result)) {
    foreach ($columns as $column) {
        if (isset($row[$column])) {
            $answers = explode(",", $row[$column]);
            foreach ($answers as $answer) {
                if (!isset($data[$column][$answer])) {
                    $data[$column][$answer] = 0;
                }
                $data[$column][$answer]++;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Encuestas</title>
    <link rel="stylesheet" href="datatables/DataTables-1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .charts-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .chart-item {
            width: 100%;
            height: 400px;
            /* Ajusta la altura según sea necesario */
            box-sizing: border-box;
        }

        @media (min-width: 1200px) {
            .chart-item {
                height: 500px;
                /* Aumenta la altura para pantallas más grandes */
            }
        }
    </style>
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
                    <div class="charts-container">
                        <?php foreach ($columns as $column) : ?>
                            <div class="chart-item">
                                <canvas id="chart-<?php echo $column; ?>"></canvas>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to generate friendly colors
            function getFriendlyColors(count) {
                const colors = [
                    '#FF9999', '#66B2FF', '#99FF99', '#FFCC99', '#FFB3E6',
                    '#FFD700', '#FF6347', '#40E0D0', '#9370DB', '#FF69B4',
                    '#FFA07A', '#D3D3D3', '#FF4500', '#DA70D6', '#F0E68C',
                    '#90EE90', '#FF1493', '#E6E6FA', '#B0E0E6', '#D8BFD8'
                ];
                return colors.slice(0, count);
            }

            <?php
            $titles = [
                'age' => 'Edad',
                'answered' => 'Respondido',
                'question1' => 'Sentido de pertinencia',
                'question2' => 'Permanencia en la empresa',
                'question3' => 'Ausentismo'
            ];

            $age_labels = [
                0 => 'Sin datos',
                1 => '18-24',
                2 => '25-35',
                3 => '36-45',
                4 => '46-54',
                5 => '55 o más'
            ];

            $answered_labels = [
                0 => 'Sin datos',
                1 => 'Sí',
                2 => 'No'
            ];

            foreach ($titles as $column => $title) : ?>
                // Prepare data for the chart
                var ctx = document.getElementById('chart-<?php echo $column; ?>').getContext('2d');
                var labels = [
                    <?php if ($column == 'age') : ?>
                        <?php foreach ($data[$column] as $value => $count) : ?> '<?php echo $age_labels[$value]; ?>',
                        <?php endforeach; ?>
                    <?php elseif ($column == 'answered') : ?>
                        <?php foreach ($data[$column] as $value => $count) : ?> '<?php echo $answered_labels[$value]; ?>',
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($data[$column] as $value => $count) : ?> '<?php echo $value; ?>',
                        <?php endforeach; ?>
                    <?php endif; ?>
                ];

                var datasetData = [
                    <?php foreach ($data[$column] as $count) : ?>
                        <?php echo $count; ?>,
                    <?php endforeach; ?>
                ];

                var colors = getFriendlyColors(labels.length);
                var backgroundColors = colors.map(color => color + '80'); // Add transparency
                var borderColors = colors.map(color => color);

                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '<?php echo $title; ?>',
                            data: datasetData,
                            backgroundColor: backgroundColors,
                            borderColor: borderColors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        var label = tooltipItem.label || '';
                                        var value = tooltipItem.raw || 0;
                                        return label + ': ' + value;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: '<?php echo $title; ?>',
                                font: {
                                    size: 18
                                },
                                padding: {
                                    top: 10,
                                    bottom: 30
                                }
                            }
                        }
                    }
                });
            <?php endforeach; ?>
        });
    </script>
   <script>
    document.getElementById('copyButton').addEventListener('click', function() {
        // Crear un elemento de texto temporal
        var tempInput = document.createElement('input');
        tempInput.value = 'https://dccato.dyndns.org:84/DCCato-survey/';
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