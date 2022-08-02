<?php 
    if(isset($_SESSION['login']) == 1){
        //echo $_SESSION['login'];
        header('Location: panel.php');
    }
    $pagina_admin = 0;
    $pagina_modificacion = 0;
    $pagina = 0;
    $video = 0;
    $nombre_pagina = "Login";
    require_once '../includes/header.php';

    $bienvenida;

    if ($_SESSION['sexo'] == 'M') {
        $bienvenida = "Bienvenido ".$_SESSION['nombre'].' '.$_SESSION['apellidoPat'].' '.$_SESSION['apellidoMat'];
    }else{
        $bienvenida = "Bienvenida ".$_SESSION['nombre'].' '.$_SESSION['apellidoPat'].' '.$_SESSION['apellidoMat'];
    }
?>



<h1 style="text-align: center;"><?php echo $bienvenida ?></h1>

<div class="contenido">
    <div class="container">
        <div class="row">
            <div class="solicitudes">

            </div>
            <div class="reportes">
                
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>