<?php
include_once '../../config/ConexionDB.php';

session_start();
if (isset($_REQUEST['email'])) {
    if (isset($_REQUEST['password'])) {
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        $query0 = "SELECT * FROM profesores WHERE email = '$email'";
        $result0 = mysqli_query($conexion, $query0);
        $conteo0 = $result0->num_rows;

        if ($conteo0) {
            // echo $conteo0.'<br>';
            $querycliente = "SELECT * FROM profesores WHERE email= '$email'";
            $cliente = mysqli_query($conexion, $querycliente);
            $row = mysqli_fetch_assoc($cliente);
            if (password_verify($pass, $row['password'])) {
                echo json_encode('success');
                $querycliente = "SELECT * FROM profesores WHERE email='$email'";
                $cliente = mysqli_query($conexion, $querycliente);
                $row = mysqli_fetch_assoc($cliente);
                $_SESSION['login'] = 1;
                $_SESSION['matricula'] = $row['matricula'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellidoPat'] = $row['apellidoPat'];
                $_SESSION['apellidoMat'] = $row['apellidoMat'];
                $_SESSION['idAsignatura'] = $row['idAsignatura'];
                $_SESSION['fechaNac'] = $row['fechaNac'];
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['status'] = $row['statusCuenta'];
                $_SESSION['sexo'] = $row['sexo'];
                $_SESSION['dateCreacion'] = $row['dateCreacion'];
            } else if ($pass == $row['password']) {
                $querycliente = "SELECT * FROM profesores WHERE email= '$email'";
                $cliente = mysqli_query($conexion, $querycliente);
                $row = mysqli_fetch_assoc($cliente);
                echo json_encode('success');
                $_SESSION['login'] = 1;
                $_SESSION['matricula'] = $row['matricula'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellidoPat'] = $row['apellidoPat'];
                $_SESSION['apellidoMat'] = $row['apellidoMat'];
                $_SESSION['idAsignatura'] = $row['idAsignatura'];
                $_SESSION['fechaNac'] = $row['fechaNac'];
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['status'] = $row['statusCuenta'];
                $_SESSION['sexo'] = $row['sexo'];
                $_SESSION['dateCreacion'] = $row['dateCreacion'];
            } else {
                echo json_encode('error');
            }
        }else{
            echo json_encode('error');
        }
    }
}
