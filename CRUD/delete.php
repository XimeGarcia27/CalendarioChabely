<?php
include("../config.php");

$id=$_GET['id'];
$servicio=$_GET['servicio'];

$consulta="DELETE FROM servicios WHERE id='$id'";
$query=mysqli_query($conexion,$consulta);

if($query && ($servicio=="Doctor") || ($servicio=="Doctora")){
    echo "<script>
    alert('SE A ELIMINADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/listaDoct.php'
</script>";
 }elseif($query && ($servicio=="Nutriologo") || ($servicio=="Nutriologa")){
    echo "<script>
    alert('SE A ELIMINADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/listaNutri.php'
</script>";
 }elseif($query && ($servicio=="Podologo") || ($servicio=="Podologa")){
    echo "<script>
    alert('SE A ELIMINADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/listaPodol.php'
</script>";
 }elseif($query && ($servicio=="Psicologo") || ($servicio=="Psicologo")){
    echo "<script>
    alert('SE A ELIMINADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/listaPsi.php'
</script>";
 }
?>