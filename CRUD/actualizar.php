<?php
include("../config.php");

$id = $_GET['id'];

$consulta = "SELECT * FROM servicios WHERE id='$id'";
$query = mysqli_query($conexion, $consulta);

$row = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Doctores | Fundación Chabely</title>
    <!--Custom styles-->
    <link rel="stylesheet" href="http://localhost/Chabely/css_pag/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Chabely/css/styles_Registros.css">

</head>

<header>
    <div class="container">
        <h1>Fundación Chabely</h1>
        <div class="inicio"><a href="http://localhost/Chabely/indexPrin.php">Página Principal</a></div>
    </div>

</header>
<br>
<br>
<br>

<body>

    <div class="container">
        <div class="insertarRegistro">
            <form action="update.php" method="POST">
                <h2>Editar Servicios</h2>
        </div>
        <input type="hidden" value="<?php echo $row['id'] ?>" id="id" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col"><input value="<?php echo $row['nombre_servicio'] ?>" type="text" id="nombre_servicio" name="nombre_servicio" class="form-control" placeholder="Nombre" required="required"></div>
                <div class="col"><input value="<?php echo $row['apellido'] ?>" type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellidos" required="required"></div>
            </div>
        </div>

        <div class="form-group">
            <input value="<?php echo $row['servicio'] ?>" type="text" id="servicio" name="servicio" class="form-control" placeholder="Servicio" required="required">
        </div>
        <label for="estado">Estado</label>
        <select type="number" class="form-control" name="estado" value="<?php echo $row['estado'] ?>" id="estado">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>

        <br>
        <div class="form-group">
            <button type="submit" value="Actualizar" class="btn btn-success btn-lg btn-block">Editar</button>
        </div>
    </div>
    <p class="mt-3 mb-3 text-muted foot">&copy; SERVICIOS | FUNDACIÓN CHABELY</p>
    </form>
    </div>
</body>

</html>