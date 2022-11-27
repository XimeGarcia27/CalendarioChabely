<?php

include('./conexion.php');

$obj = new Conexion;

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

//mandar llamar ela funcion para identificar por id
$res =  $obj->getNameById($params['id']);
$temp = array();

$temp = $res;

$resC =  $obj->cita();
$tempC = array();

$tempC = $resC;

// Definimos nuestra zona horaria
date_default_timezone_set("America/Santiago");

// incluimos el archivo de funciones
include './funciones.php';
// incluimos el archivo de configuracion
include './config.php';

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['from'])) {

    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['from'] != "") {

        // Recibimos el fecha de inicio y la fecha final desde el form
        $Datein                    = date('d/m/Y H:i:s', strtotime($_POST['from']));
        $Datefi                    = date('d/m/Y H:i:s', strtotime($_POST['from']));
        $inicio = _formatear($Datein);
        // y la formateamos con la funcion _formatear

        $final  = _formatear($Datefi);

        // Recibimos el fecha de inicio y la fecha final desde el form
        $orderDate                      = date('d/m/Y H:i:s', strtotime($_POST['from']));
        $inicio_normal = $orderDate;

        // y la formateamos con la funcion _formatear
        $orderDate2                      = date('d/m/Y H:i:s', strtotime($_POST['from']));
        $final_normal  = $orderDate2;

        $inicio_normal = $final_normal;

        $titulo = $_POST['title'];
        $nomSer  = $_POST['nomSer'];
        $servic  = $_POST['servic'];
        $id_ser  = $_POST['id_ser'];

        // insertamos la cita
        $query = "INSERT INTO agenda VALUES(null,'$titulo','$inicio_normal','$final_normal','1','null','null','event-palevioletred','1','1','$inicio','$final','','$nomSer','$servic','$id_ser','')";

        $conexion->query($query) or die('<script type="text/javascript">alert("Horario No Disponible ")</script>');

        header("Location: http://localhost/Chabely/index.php?id=".$params['id']."&nombre_servicio=".$params['nombre_servicio']); 

        // Obtenemos el ultimo id insetado.
        $im = $conexion->query("SELECT MAX(id) AS id FROM agenda");
        $row = $im->fetch_row();
        $id = trim($row[0]);

        // para generar el link de la cita
        $link = "$base_url" . "descripcion_notas.php?id=$id";

        // y actualizamos su link
        $query = "UPDATE agenda SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query);
    }
}

?>

<!DOCTYPE html>
<html lang="en">


<header>
        <!--Custom styles-->
        <link rel="stylesheet" href="http://localhost/Chabely/css_pag/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Chabely/css/styles_Registros.css">
    <div class="container">
        <h1>Fundación Chabely</h1><br>
        <a href=<?php print "http://localhost/Chabely/index.php?id=".$params['id'];?>><img style="width: 30px; height:30px; margin:4px;" src="./assets/flecha-izquierda.png" alt=""></a>
        
    </div>

</header>
<br>
<br>
<br>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=initial-scale=1.0">
    <title>Insertar Notas</title>
    <link rel="stylesheet" href="<?= $base_url ?>css/calendar.css">
    <link href="<?= $base_url ?>css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?= $base_url ?>js/es-ES.js"></script>
    <script src="<?= $base_url ?>js/jquery.min.js"></script>
    <script src="<?= $base_url ?>js/moment.js"></script>
    <script src="<?= $base_url ?>js/bootstrap.min.js"></script>
    <script src="<?= $base_url ?>js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="<?= $base_url ?>css/bootstrap-datetimepicker.min.css" />

    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <form accion="" method="POST">
        <label for="title">Nota</label>
        <textarea for="title" name="title" class="form-control" id="title" placeholder="Nota" rows="10" cols="40"></textarea>

        <br>
        <label for="from">Fecha y Hora</label>
        <div class='input-group date' id='from'>
            <input type='text' id="from" name="from" class="form-control" readonly />
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        </div>

        <script type="text/javascript">
            $(function() {
                $('#from').datetimepicker({
                    language: 'es',
                    minDate: new Date()
                });
            });
        </script>

        <label for="">Nombre</label>
        <input value="<?php print $temp[0]['nombre_servicio']; ?>" type="text" required autocomplete="on" name="nomSer" class="form-control" id="nomSer" placeholder="Nombre" readonly="readonly">

        <label for="">Servicio</label>
        <input value="<?php print $temp[0]['servicio']; ?>" type="text" required autocomplete="on" name="servic" class="form-control" id="servic" placeholder="Servicio" readonly="readonly">

        <label for="">Id Servicio</label>
        <input value="<?php print $params['id'] ?>" type="text" required autocomplete="on" name="id_ser" class="form-control" id="id_ser" placeholder="Id Servicio" readonly="readonly">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
    </form>
    </div>
    </div>

</body>

</html>