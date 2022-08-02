<?php 

require '../../config/ConexionDB.php';
session_start();


if ($_POST) { 
    if ($_POST['laboratorio'] =='' || $_POST['laboratorio'] ==' ') {
        echo json_encode('error-laboratorio');
    }elseif($_POST['reporteNom'] =='' || $_POST['reporteNom'] ==' '){
        echo json_encode('error-reporteNom');
    }elseif ($_POST['dateCreacion'] =='' || $_POST['dateCreacion'] ==' ') {
        echo json_encode('error-dateCreacion');
    }elseif ($_POST['statusLaboratorio'] =='' || $_POST['statusLaboratorio'] ==' ') {
        echo json_encode('error-statusLaboratorio');
    }elseif ($_POST['introduccion'] =='' || $_POST['introduccion'] ==' ') {
        echo json_encode('error-introduccion');
    }elseif ($_POST['marcoTeorico'] =='' || $_POST['marcoTeorico'] ==' ') {
        echo json_encode('error-marcoTeorico');
    }elseif ($_POST['materiales'] =='' || $_POST['materiales'] ==' ') {
        echo json_encode('error-materiales');
    }elseif ($_POST['procedimientos'] =='' || $_POST['procedimientos'] ==' ') {
        echo json_encode('error-procedimientos');
    }elseif ($_POST['resultados'] =='' || $_POST['resultados'] ==' ') {
        echo json_encode('error-resultados');
    }elseif ($_POST['conclusiones'] =='' || $_POST['conclusiones'] ==' ') {
        echo json_encode('error-conclusiones');
    }elseif ($_POST['materialEscuela'] =='' || $_POST['materialEscuela'] ==' ') {
        echo json_encode('error-materialEscuela');
    }else{

        /**Datos recibidos de parte del formulario */
        $laboratorio = $_POST['laboratorio'];
        $nombreReporte = $_POST['reporteNom'];
        $introduccion = $_POST['introduccion'];
        $marcoTeorico = $_POST['marcoTeorico'];
        $materiales = $_POST['materiales'];
        $procedimientos = $_POST['procedimientos'];
        $resultados = $_POST['resultados'];
        $conclusiones = $_POST['conclusiones'];
        $materialEscuela = $_POST['materialEscuela'];
        $statusLaboratorio = $_POST['statusLaboratorio'];
        $dateCreacion = $_POST['dateCreacion'];

        /**Datos recibidos de la session */
        $idProfesor = $_SESSION['matricula'];
        $idAsignatura = $_SESSION['idAsignatura'];

        $insertarReporte = "INSERT INTO `laboratorio_reportes`(`idProfesor`, `idAsignatura`, `idLaboratorio`, `nombreReporte`, `introduccion`, `marcoTeorico`, `materiales`, `procedimientos`, `resultados`, `conclusiones`, `materialEscuela`, `statusLaboratorio`, `dateCreate`, `dateModificacion`, `dateEliminacion`, `statusEliminacion`, `observaciones`, `statusReporte`) VALUES ('$idProfesor','$idAsignatura','$laboratorio','$nombreReporte','$introduccion','$marcoTeorico','$materiales','$procedimientos','$resultados','$conclusiones','$materialEscuela','$statusLaboratorio','$dateCreacion',NULL,NULL,NULL,NULL,NULL)";
        $reporet = mysqli_query($conexion, $insertarReporte);
        if ($reporet) {
            echo json_encode('success');
        }else{
            echo json_encode('error_insertar');
        }
    }
}