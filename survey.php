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
$dbname = "sistema";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}


$query = "SELECT age, answered, question1, question2, question3, question4, question5, question6, question7, question8, question9, question10 FROM survey_employee";
$result = mysqli_query($conexion, $query);

$columns = ['age', 'answered', 'question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10'];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    foreach ($columns as $column) {
        if (!isset($data[$column])) {
            $data[$column] = [];
        }
        if (isset($row[$column])) {
            if (!isset($data[$column][$row[$column]])) {
                $data[$column][$row[$column]] = 0;
            }
            $data[$column][$row[$column]]++;
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
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-bundle.min.js"></script>
    <style>
        .charts-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .chart-item {
            width: 100%;
            height: 400px; /* Ajusta la altura según sea necesario */
            box-sizing: border-box;
        }
        @media (min-width: 1200px) {
            .chart-item {
                height: 500px; /* Aumenta la altura para pantallas más grandes */
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
                    <div class="charts-container">
                        <?php foreach ($columns as $column): ?>
                            <div class="chart-item" id="chart-container-<?php echo $column; ?>"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php 
            $titles = [
                'age' => 'Edad',
                'answered' => 'Respondido',
                'question1' => 'Pregunta 1',
                'question2' => 'Pregunta 2',
                'question3' => 'Pregunta 3',
                'question4' => 'Pregunta 4',
                'question5' => 'Pregunta 5',
                'question6' => 'Pregunta 6',
                'question7' => 'Pregunta 7',
                'question8' => 'Pregunta 8',
                'question9' => 'Pregunta 9',
                'question10' => 'Pregunta 10'
            ];

            $age_labels = [
                1 => '18-24',
                2 => '25-35',
                3 => '36-45',
                4 => '46-54',
                5 => '55 o más'
            ];

            $answered_labels = [
                1 => 'Sí',
                0 => 'No'
            ];

            $question_labels = [
                'question1' => [
                    1 => 'Muy satisfecho',
                    2 => 'Satisfecho',
                    3 => 'Neutral',
                    4 => 'Insatisfecho',
                    5 => 'Muy insatisfecho'
                ],
                'question2' => [
                    1 => 'Muy valorado',
                    2 => 'Valorado',
                    3 => 'Neutral',
                    4 => 'Poco valorado',
                    5 => 'Muy poco valorado'
                ],
                'question3' => [
                    1 => 'Muy satisfecho',
                    2 => 'Satisfecho',
                    3 => 'Neutral',
                    4 => 'Insatisfecho',
                    5 => 'Muy insatisfecho'
                ],
                'question4' => [
                    1 => 'Muy motivado',
                    2 => 'Motivado',
                    3 => 'Neutral',
                    4 => 'Poco motivado',
                    5 => 'Muy poco motivado'
                ],
                'question5' => [
                    1 => 'Muy satisfecho',
                    2 => 'Satisfecho',
                    3 => 'Neutral',
                    4 => 'Insatisfecho',
                    5 => 'Muy insatisfecho'
                ],
                'question6' => [
                    1 => 'Excelente',
                    2 => 'Bueno',
                    3 => 'Regular',
                    4 => 'Malo',
                    5 => 'Muy malo'
                ],
                'question7' => [
                    1 => 'Muy satisfecho',
                    2 => 'Satisfecho',
                    3 => 'Neutral',
                    4 => 'Insatisfecho',
                    5 => 'Muy insatisfecho'
                ],
                'question8' => [
                    1 => 'Muy apoyado',
                    2 => 'Apoyado',
                    3 => 'Neutral',
                    4 => 'Poco apoyado',
                    5 => 'Muy poco apoyado'
                ],
                'question9' => [
                    1 => 'Muy satisfecho',
                    2 => 'Satisfecho',
                    3 => 'Neutral',
                    4 => 'Insatisfecho',
                    5 => 'Muy insatisfecho'
                ],
                'question10' => [
                    1 => 'Definitivamente sí',
                    2 => 'Probablemente sí',
                    3 => 'No estoy seguro',
                    4 => 'Probablemente no',
                    5 => 'Definitivamente no'
                ]
            ];

            foreach ($columns as $column): 
                $title = $titles[$column];
            ?>
                // Prepare data for the chart
                var data = [
                    <?php if ($column == 'age'): ?>
                        <?php foreach ($data[$column] as $value => $count): ?>
                            {x: '<?php echo $age_labels[$value]; ?>', value: <?php echo $count; ?>},
                        <?php endforeach; ?>
                    <?php elseif ($column == 'answered'): ?>
                        <?php foreach ($data[$column] as $value => $count): ?>
                            {x: '<?php echo $answered_labels[$value]; ?>', value: <?php echo $count; ?>},
                        <?php endforeach; ?>
                    <?php elseif (isset($question_labels[$column])): ?>
                        <?php foreach ($data[$column] as $value => $count): ?>
                            {x: '<?php echo $question_labels[$column][$value]; ?>', value: <?php echo $count; ?>},
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php foreach ($data[$column] as $value => $count): ?>
                            {x: '<?php echo $value; ?>', value: <?php echo $count; ?>},
                        <?php endforeach; ?>
                    <?php endif; ?>
                ];

                // Create a chart and set the data
                var chart = anychart.pie(data);
                chart.title('<?php echo $title; ?>');
                chart.container('chart-container-<?php echo $column; ?>');
                chart.draw();
            <?php endforeach; ?>
        });
    </script>
</body>
</html>




