<?php
// incluimos el archivo de configuracion
include("../config.php");

$nombre_servicio=$_POST["nombre_servicio"];
$apellido=$_POST["apellido"];
$servicio=$_POST["servicio"];
$estado=$_POST["estado"]; 

$consulta="INSERT INTO servicios (id,nombre_servicio,apellido,servicio,estado) VALUES ('null','$nombre_servicio','$apellido','$servicio','$estado')";
$query= mysqli_query($conexion,$consulta);

if ($query) {
    echo "<script>
    alert('SE A INSERTADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/insertarServicios.php'
</script>";
}
?>