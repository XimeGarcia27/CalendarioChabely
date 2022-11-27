<?php

//Obtener url
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];

//obtener parametros de la url
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

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
    $titulo=$row['title'];

    $clase=$row['class'];

     // Fecha inicio
     $inicio=$row['inicio_normal'];

      // Fecha Termino
    $final=$row['final_normal'];

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

?>

<!DOCTYPE html>
<html lang="en">
<head class="modal-context"> 
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
          <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/calendar.css">
</head>
<body class="page-header text-center">
<h2 class="<?=$clase?>">NOTA</h2>

	 <hr>
   <p><?=$titulo?></p>
</body>
<form action="" method="post">
     <div class="modal-footer">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</div>
</form>
</html>
