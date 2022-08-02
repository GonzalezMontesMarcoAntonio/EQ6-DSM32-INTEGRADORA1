<?php 

require '../../config/ConexionDB.php';
session_start();


if ($_POST) { 
    if ($_POST['asignatura'] =='' || $_POST['asignatura'] ==' ') {
        echo json_encode('error-asignatura');
    }elseif($_POST['HorarioIn'] =='' || $_POST['HorarioIn'] ==' '){
        echo json_encode('error-HorarioIn');
    }elseif ($_POST['HorarioFin'] =='' || $_POST['HorarioFin'] ==' ') {
        echo json_encode('error-HorarioFin');
    }elseif ($_POST['laboratorio'] =='' || $_POST['laboratorio'] ==' ') {
        echo json_encode('error-laboratorio');
    }elseif ($_POST['material'] =='' || $_POST['material'] ==' ') {
        echo json_encode('error-material');
    }else{

        /**Datos recibidos de parte del formulario */
        $horarioIn = $_POST['HorarioIn'];
        $horarioFin = $_POST['HorarioFin'];
        $idLaboratorio = $_POST['laboratorio'];
        $material = $_POST['material'];


        

        /**Datos recibidos de la session */
        $idProfesor = $_SESSION['matricula'];
        $idAsignatura = $_SESSION['idAsignatura'];

        $insertarSolicitud = "INSERT INTO `laboratorio_solicitud`(`idProfesor`, `idAsignatura`, `horarioIn`, `horarioFin`, `idLaboratorio`, `material`, `dateCreacion`, `dateModificacion`, `dateEliminacion`, `statusSolicitud`, `statusEliminacion`) 
        VALUES ('$idProfesor','$idAsignatura','$horarioIn','$horarioFin','$idLaboratorio','$material','$date',NULL,NULL,0,NULL)";
        $solicitud = mysqli_query($conexion, $insertarSolicitud);
        if ($solicitud) {
            echo json_encode('success');
        }else{
            echo json_encode('error_insertar');
        }
    }
}