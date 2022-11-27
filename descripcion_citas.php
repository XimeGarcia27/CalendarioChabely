<?php
//incluimos nuestro archivo config
include './config.php';

// Incluimos nuestro archivo de funciones
include './funciones.php';

// Obtenemos el id del evento
$id  = evaluar($_GET['id']);

// y lo buscamos en la base de dato
$bd  = $conexion->query("SELECT * FROM agenda WHERE id=$id");

// Obtenemos los datos
$row = $bd->fetch_assoc();

// titulo 
$titulo = $row['title'];
$exped = $row['expediente'];
$regis = $row['registro'];
$lug = $row['lugar'];
$te = $row['tel'];
$ce = $row['cel'];
$acc = $row['accion'];

$clase = $row['class'];

// Fecha inicio
$inicio = $row['inicio_normal'];

// Fecha Termino
$final = $row['final_normal'];

// Eliminar evento
if (isset($_POST['eliminar_evento'])) {
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM agenda WHERE id = $id";
    if ($conexion->query($sql)) {
        echo "<script>
    alert('LA CITA SE A ELIMINADO CORRECTAMENTE');
</script>";
    } else {
        echo "<script>
    alert('LA CITA NO SE PUDO ELIMINAR');
</script>";
    }
}

 //Modificar evento
if (isset($_POST['modificar_evento'])) {


    include "./CRUD/actualizar_cita.php";
}
?> 

<!DOCTYPE html>
<html lang="en">

<head class="modal-context">
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>css/calendar.css">
</head>

<body class="page-header text-center">
    <h3 class="<?= $clase ?>">----------</h3>
    <h2><?= $titulo ?></h2>

    <hr>
    <b>Fecha y Hora:</b> <?= $inicio ?> <br>
    <b>Expediente:</b>
    <p><?= $exped ?></p>
    <b>Teléfono:</b>
    <p><?= $te ?></p>
    <b>Número Alternativo:</b>
    <p><?= $ce ?></p>
    <b>Lugar:</b>
    <p><?= $lug ?></p>
    <b>Registro:</b>
    <p><?= $regis ?></p>
    <b>Accion:</b>
    <p><?= $acc ?></p>

</body>
<form action="" method="post">
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
        <button name="modificar_evento" type="submit" class="btn btn-success" >Modificar</button>
    </div>
</form>

</html>