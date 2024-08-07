<?php
session_start(); // Iniciar sesión si no está iniciada
require 'conexion.php';
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // Redireccionar si no hay sesión activa
    exit();
}

$tipo_usuario = $_SESSION['tipo_usuario'];
$depto = $_SESSION['depto'];
?>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <link href="datatables/DataTables-1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <!-- Incluir otros estilos de DataTables -->

        <script src="datatables/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
        <script src="datatables/DataTables-1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="datatables/DataTables-1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <!-- Incluir otros scripts de DataTables -->
        <script src="main.js"></script>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Resultados de Evaluación para Vigilantes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Menú administrador</a></li>
                <li class="breadcrumb-item active">Resultados de Evaluación</li>
            </ol>

            <div class="card mx-4 mb-4">
                <div class="card-body">
                    <table id="examplepre" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Resultado</th>
                                <th>Aptitud</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Conectar a la base de datos (modificar según tu configuración)
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "sistema3";

                            // Crear conexión
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verificar la conexión
                            if ($conn->connect_error) {
                                die("Conexión fallida: " . $conn->connect_error);
                            }

                            // Consulta SQL para obtener los datos
                            $sql = "SELECT name, age, question4, question14, question20 
            FROM survey_pref";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Calcular el porcentaje de aptitud
                                    $totalQuestions = 3;
                                    $positiveAnswers = 0;

                                    if ($row['question4'] == 1) {
                                        $positiveAnswers++;
                                    }
                                    if ($row['question14'] == 1) {
                                        $positiveAnswers++;
                                    }
                                    if ($row['question20'] == 1) {
                                        $positiveAnswers++;
                                    }

                                    $aptitudePercentage = ($positiveAnswers / $totalQuestions) * 100;

                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['age'] . "</td>";
                                    echo "<td>" . ($aptitudePercentage == 100 ? 'Apto' : 'No apto') . "</td>";
                                    echo "<td>" . $aptitudePercentage . "%</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay resultados para mostrar.</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#tabla_resultados').DataTable();
            });
        </script>
    </main>
</div>