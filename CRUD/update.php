<?php
 include("../config.php");

 $id=$_POST['id'];
 $nombre_servicio=$_POST['nombre_servicio'];
 $apellido=$_POST['apellido'];
 $servicio=$_POST['servicio'];
 $estado=$_POST['estado'];

 $consulta="UPDATE servicios SET nombre_servicio='$nombre_servicio',apellido='$apellido',servicio='$servicio',estado='$estado' WHERE id='$id'";
 $query=mysqli_query($conexion,$consulta);

 if($query && ($servicio=="Doctor") || ($servicio=="Doctora")){
    echo "<script>
    alert('SE A ACTUALIZADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/listaDoct.php'
</script>";
 }elseif($query && ($servicio=="Nutriologo") || ($servicio=="Nutriologa")){
    echo "<script>
    alert('SE A ACTUALIZADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/listaNutri.php'
</script>";
 }elseif($query && ($servicio=="Podologo") || ($servicio=="Podologa")){
    echo "<script>
    alert('SE A ACTUALIZADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/listaPodol.php'
</script>";
 }elseif($query && ($servicio=="Psicologo") || ($servicio=="Psicologa")){
    echo "<script>
    alert('SE A ACTUALIZADO CORRECTAMENTE');
    window.location= 'http://localhost/Chabely/servicios/listaPsi.php'
</script>";
 }

?>