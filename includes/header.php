<?php
session_start();
if ($pagina == 1) {
  require_once 'config/parameters.php';
  require_once 'config/ConexionDB.php';
} elseif ($pagina_admin == 2) {
  require_once '../config/parameters.php';
  require_once '../config/ConexionDB.php';
  require_once '../admin/operaciones/crear_boleto.php';
  require_once '../admin/operaciones/crear_cliente.php';
  require_once '../admin/operaciones/crear_escuela.php';
} elseif ($pagina_modificacion == 1) {
  require_once '../../config/parameters.php';
} elseif ($pagina_admin == 1) {
  require_once '../../config/parameters.php';
  require_once '../../config/ConexionDB.php';
} else {
  require_once '../config/parameters.php';
  require_once '../config/ConexionDB.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Universidad Tecnologica del Valle de Toluca</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= base_url ?>"><img src="https://seeklogo.com/images/U/universidad-tecnologica-del-valle-de-toluca-logo-82F16BF313-seeklogo.com.png" alt="" width="40" height="24"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url ?>">Home</a>
          </li>
          <?php if (isset($_SESSION['login']) == 1 && $_SESSION['rol'] < 5) { ?>
            <?php if ($_SESSION['rol'] == 2) {?>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Solicitudes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?=base_url?>user/reportes.php">Crear Reportes</a></li>
                <li><a class="dropdown-item" href="<?=base_url?>user/solicitud.php">Solicitud de Laboratorio</a></li>
              </ul>
            </li>
            <?php }else{?>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Solicitudes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?=base_url?>user/reportes.php?pagina=1">Crear Reportes</a></li>
                <li><a class="dropdown-item" href="<?=base_url?>user/solicitud.php?pagina=1">Solicitud de Laboratorio</a></li>
              </ul>
            </li>
            <?php } ?>
            
          <?php } ?>
        </ul>
        <?php if (isset($_SESSION['login']) == 1) { ?>
          <li class="nav-item dropdown" style="list-style: none;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if ($_SESSION['rol'] == 1) { ?>
                <img class="rounded-circle" width="50px" height="auto" alt="">
                <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellidoPat']; ?>
              <?php } else { ?>
                <img class="rounded-circle" width="50px" height="auto" alt="">
                <?php echo $_SESSION['nombre']; ?>
              <?php } ?>
            </a>
            <!-- Hacer validacion que identifique los tipos de roles para mostrar determinados servicios -->
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (isset($_SESSION['login']) == 1 && $_SESSION['rol'] < 5) { ?>

                <li><a class="dropdown-item" href="<?= base_url ?>user/settings.php"><i class="bi bi-gear"></i>
                    Setting</a>
                </li>
                <li><a class="dropdown-item" href="<?= base_url ?>ususario/facturas"><i class="bi bi-question-circle"></i>
                    Help</a>
                </li>
                <li><a class="dropdown-item" href="<?= base_url ?>user/panel.php"><i class="bi bi-person-circle"></i>
                    Your Profile</a>
                </li>
                <hr class="dropdown-divider">
              <?php } elseif ($_SESSION['rol'] == 5) { ?>

                <li><a class="dropdown-item" href="<?= base_url ?>/settings.php"><i class="bi bi-gear"></i>
                    Setting</a>
                </li>
                <li><a class="dropdown-item" href="<?= base_url ?>ususario/facturas"><i class="bi bi-question-circle"></i>
                    Help</a>
                </li>
                <li><a class="dropdown-item" href="<?= base_url ?>user/panel.php"><i class="bi bi-person-circle"></i>
                    Your Profile</a>
                </li>

                <hr class="dropdown-divider">
          </li>
        <?php } ?>
        <li><a class="dropdown-item" href="<?=base_url?>user/procesos/salir.php"><i class="bi bi-door-open"></i> Sign out</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
      <?php } else { ?>
        <div class="sesion">
          <a href="<?= base_url ?>user/login.php"><i class="bi bi-person-circle"></i>Iniciar Sesion</a>
        </div>
      <?php } ?>
      </div>
    </div>
  </nav>