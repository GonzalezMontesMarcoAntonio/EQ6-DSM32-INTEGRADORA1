<?php
$pagina_admin = 0;
$pagina_modificacion = 0;
$pagina = 0;
$video = 0;
$nombre_pagina = "Login";
require_once '../includes/header.php';

$tickets = 'SELECT * FROM laboratorio_reportes WHERE idProfesor =' . $_SESSION['matricula'];
$sentencia = $PDO->prepare($tickets);
$sentencia->execute();

$resultado = $sentencia->fetchAll();

$tickets_x_pagina = 8;

//contar articulos de nuestra base de datos

$total_tickets_db = $sentencia->rowCount();
$paginas = $total_tickets_db / 8;
$paginas = ceil($paginas);

$asignatura = "SELECT * FROM asignaturas_laboratorios WHERE idAsignatura = " . $_SESSION['idAsignatura'];
$queryAsig = mysqli_query($conexion, $asignatura);
$row_asignaturas = mysqli_fetch_assoc($queryAsig);

if ($row_asignaturas['idAsignatura'] != 2) {
    $laboratorios = "SELECT * FROM laboratorios WHERE idAsignatura IN (1,3,4)";
    $querylab = mysqli_query($conexion, $laboratorios);
    $row_lab = mysqli_fetch_assoc($querylab);

    $docencia = "SELECT * FROM docencias WHERE idDocencia = " . $row_lab['idDocencia'];
    $queryDocencia = mysqli_query($conexion, $docencia);
} else {
    $laboratorios = "SELECT * FROM laboratorios WHERE idAsignatura = 2";
    $querylab = mysqli_query($conexion, $laboratorios);
    $row_lab = mysqli_fetch_assoc($querylab);

    $docencia = "SELECT * FROM docencias WHERE idDocencia = " . $row_lab['idDocencia'];
    $queryDocencia = mysqli_query($conexion, $docencia);
}



?>
<!-- Modal -->
<div class="modal modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-receipt"></i> Crear reporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="location.reload()"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id="fomrulario-reporte" novalidate>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nombre" value="<?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellidoPat'] . ' ' . $_SESSION['apellidoMat'] ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Asignatura</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="apellidos" value="<?php echo $row_asignaturas['nombre'] ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Seleccione el Laboratorio <span class="text-danger">*</span></label>
                        <select name="laboratorio" class="form-select" aria-label="Default select example" required>
                            <option value="" selected>Cliente</option>
                            <?php while ($row_lab_docencia = mysqli_fetch_assoc($queryDocencia)) { ?>
                                <option value="<?php echo $row_lab_docencia['idDocencia'] ?>"><?php echo $row_lab_docencia['nombreDC'] ?></option>
                            <?php }
                            mysqli_free_result($queryDocencia); ?>
                        </select>
                    </div>
                    <div class=" col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Nombre del reporte <span class="text-danger">*</span></label>
                        <input type="text" name="reporteNom" id="" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Fecha de emision</label>
                        <input type="datetime-local" class="form-control" id="exampleInputPassword1" name="dateCreacion" value="<?php echo $date; ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Seleccione el status del laboratorio <span class="text-danger">*</span></label>
                        <select name="statusLaboratorio" id="" class="form-select" aria-label="Default select example" required>
                            <option value="">Seleccione</option>
                            <option value="1">Impecable</option>
                            <option value="2">Dañado</option>
                            <option value="3">Sin acceso a internet</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Introduccion del reporte <span class="text-danger">*</span> </label>
                        <textarea name="introduccion" id="" cols="30" rows="2" class="form-control" id="exampleInputPassword1" required></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputPassword1" class="form-label">MarcoTeorico <span class="text-danger">*</span></label>
                        <textarea name="marcoTeorico" id="" cols="30" rows="2" class="form-control" id="exampleInputPassword1" required></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputPassword1" class="form-label">Materiales <span class="text-danger">*</span></label>
                        <textarea name="materiales" id="" cols="30" rows="2" class="form-control" id="exampleInputPassword1" required></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputPassword1" class="form-label">Procedimientos <span class="text-danger">*</span></label>
                        <textarea name="procedimientos" id="" cols="30" rows="2" class="form-control" id="exampleInputPassword1" required></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputPassword1" class="form-label">Resultados <span class="text-danger">*</span></label>
                        <textarea name="resultados" id="" cols="30" rows="2" class="form-control" id="exampleInputPassword1" required></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputPassword1" class="form-label">Conclusiones <span class="text-danger">*</span></label>
                        <textarea name="conclusiones" id="" cols="30" rows="2" class="form-control" id="exampleInputPassword1" required></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputPassword1" class="form-label">Material de la escuela <span class="text-danger">*</span></label>
                        <textarea name="materialEscuela" id="" cols="30" rows="2" class="form-control" id="exampleInputPassword1" required></textarea>
                    </div>
                    <div class="col-12" style="text-align: center;">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<h1 style="text-align: center; color: #21a64f;">Crear reporte de labaratorio</h1>

<div class="contenido-solicitud">
    <div class="container">
        <div class="row shadow-lg p-3 mb-5 bg-body rounded">
            <div class="crear">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Crear Solicitud
                </button>
            </div>
            <div class="tablaGeneral">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre del Reporte</th>
                            <th scope="col">Fecha de Creacion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    
                    <?php

                                

                    /**Se valida que si no se esta recibiendo nada por metodo get nos rediriga al apartado que es al apartado de la paginacion */
                    if (!$_GET) {
                        header('location: http://localhost/EQ2-DSM32-INTEGRADORA1/admin/boletos.php?pagina=1');
                    }
                    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                        header('location: http://localhost/EQ2-DSM32-INTEGRADORA1/admin/boletos.php?pagina=1');
                    }

                    /** Aqui se realiza una operacion sencilla, esta operacion quiere decir
                     * 
                     * Lo que este recibiendo la variable pagina le voy a resta uno despues lo multiplico por la cantidad de datos que quiero 
                     * mostrar por pantalla.
                     * 
                     * Despues de esa sencilla operacion realizamos una consulta donde usamos limit para limitar los resultados que nos va a retornar la
                     * consulta. las variables :iniciar, :narticulos son metodos de la sentencia PDO, esto para poder estar actualizando la consulta conforme
                     * vamos navegando en el paginado.
                     * 
                     * Despues de realizar la consulta usamos la sentencia execute para poder ejecutar la consulta y poder obtener los datos de la tabla consultada
                     * y todo eso lo extraemos con la palabra reservada fetchAll, y realizamos un foreach para poder mostrar todos los datos.
                     *
                     */

                    $iniciar = ($_GET['pagina'] - 1) * $tickets_x_pagina;
                    // echo '<h1>'.$iniciar.'</h1>';

                    $sql_tickets = 'SELECT * FROM laboratorio_reportes WHERE idProfesor =' . $_SESSION['matricula'].' LIMIT :iniciar,:narticulos';

                    $sentencia_tickets = $PDO->prepare($sql_tickets);
                    $sentencia_tickets->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                    $sentencia_tickets->bindParam(':narticulos', $tickets_x_pagina, PDO::PARAM_INT);
                    $sentencia_tickets->execute();

                    $resultado_tickets = $sentencia_tickets->fetchAll();
                    foreach ($resultado_tickets as $tickets) : 
                       
                    ?>

                        <tr>
                            <th scope="row"><?php echo $tickets['nombreReporte'] ?></th>

                            <th scope="row"><?php echo $tickets['dateCreate'] ?></th>
                            <td>
                                <a href="<?= base_url ?>user/editar.php?operacion=<?php echo $tickets['idReporte']; ?>" class="btn btn-success "><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="<?= base_url ?>admin/operaciones/consulta.php?operacion=<?php echo $tickets['idReporte']; ?>" class="btn btn-primary"><i class="bi bi-search"></i></a>
                                <a href="" class="btn btn-danger <?php echo $tickets['statusReporte'] == 0 ? 'disabled' : '' ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="bi bi-file-earmark-pdf"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= base_url ?>user/boletos.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Previous</a>
                    </li>

                    <?php for ($i = 0; $i < $paginas; $i++) : ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="<?= base_url ?>user/boletos.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                    <?php endfor ?>

                    <li class=" page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
                        <a class=" page-link" href="<?= base_url ?>user/boletos.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>