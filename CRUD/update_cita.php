<?php

// Definimos nuestra zona horaria
date_default_timezone_set("America/Santiago");

// incluimos el archivo de funciones
include ('../funciones.php');
// incluimos el archivo de configuracion
include("../config.php");

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

        $id = $_POST['id'];
        $title = $_POST['title'];
        $expediente = $_POST['expediente'];
        $lugar = $_POST['lugar'];
        $registro = $_POST['registro'];
        $class = $_POST['class'];
        $tel = $_POST['tel'];
        $cel = $_POST['cel'];
        $accion = $_POST['accion'];

        // actualizamos la cita
        $consulta = "UPDATE agenda SET  title='$title', inicio_normal='$inicio_normal', final_normal='$inicio_normal', expediente='$expediente', lugar='$lugar', 
        registro='$registro', class='$class', tel='$tel', cel='$cel', start='$inicio', end='$final', accion='$accion' WHERE id='$id'";

        $query=mysqli_query($conexion,$consulta) or die('<script type="text/javascript">alert("Horario No Disponible ")</script>'); 

        if($query){
            echo "<script>
            alert('SE A ACTUALIZADO CORRECTAMENTE');
        </script>";
        }
    }
}

?>
