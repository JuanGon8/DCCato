<?php


$tipo_usuario = $_SESSION['tipo_usuario'];
$depto = $_SESSION['depto'];
$puesto = $_SESSION['puesto'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="author" content="" />
    <title>DCSVM</title>
    <link rel="icon" type="image/x-icon" href="assets/img/DCSVM.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/scripts.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ml-2" style="margin-left: 15px;" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="registro_nominas.php"><img src="assets/img/dcsvmb.png" class="logonav" alt=""></a>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
            </div>
        </form>
        <!-- Navbar-->
        <!-- <a href="reporte_form.php"><button class="btn btn-success mr-2">Alta de reportes</button></a> -->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Módulos de registro</div>
                        <a class="nav-link" href="reportes.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-table"></i>
                            </div>
                            Reportes
                        </a>
                        <a class="nav-link" href="quejas.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            Quejas
                        </a>
                        <div class="sb-sidenav-menu-heading">Módulos de encuestas</div>
                        <a class="nav-link" href="survey.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-table"></i>
                            </div>
                            Encuesta permanencia
                        </a>
                        <a class="nav-link" href="survey_q.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-table"></i>
                            </div>
                            Encuesta calida de servicio
                        </a>
                        <!-- <a class="nav-link" href="prefilter.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-table"></i>
                            </div>
                            Encuesta
                        </a> -->

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Sesión iniciada como:</div>
                    <?php echo $_SESSION['nombre']; ?> <br>
                    <span class="badge bg-secondary color-white">V 2.7</span>
                </div>
            </nav>
        </div>
        <!-- </div>
    </body>
</html> -->