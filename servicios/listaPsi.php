<?php
include('../conexion.php');

$obj = new Conexion;

$res =  $obj->getListaByServi('"%Psic%"');

$temp = array();

$temp = $res;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <!--Custom styles-->
    <link rel="stylesheet" href="http://localhost/Chabely/css_pag/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Chabely/css/styles_ListDoct.css">
</head>

<header>
    <div class="container">
        <h1>Fundación Chabely</h1>
        <div class="inicio"><a href="http://localhost/Chabely/indexPrin.php">Página Principal</a></div>
    </div>
</header>
<br>
<br>

<body>
<div class="container">
    <div class="table-responsive text-center">
        <table class="table table-bordered">
        <thead>
            <tr class="table-success">
                <th scope="col">Nombre</th>
                <th scope="col">Servicio</th>
                <th scope="col">Estado</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            </thead>

            <?php
            foreach ($res as $temp) {
            ?>
 <tbody>
                <tr>
                    <td><?php echo $temp['nombre_servicio']." ".$temp['apellido']; ?></td>
                    <td><?php echo $temp['servicio']; ?></td>
                    <td><?php if($temp['estado'] == 1){?>
                        <button class="btn btn-success">Activo
                    </button> 
                    <?php
                    }else {?>
                        <button class="btn btn-danger">Inactivo
                        </button> 
                    <?php
                    }
                    ?></td>
                    <td>
                    <a href="http://localhost/Chabely/CRUD/actualizar.php?id=<?php echo $temp['id'] ?>&servicio=<?php echo $temp['servicio']; ?>"><button class="btn btn-info">
                            Editar
                        </button></a>
                </td>
                <td>
                    <a href="http://localhost/Chabely/CRUD/delete.php?id=<?php echo $temp['id'] ?>&servicio=<?php echo $temp['servicio']; ?>"> <button class="btn btn-danger">
                            Borrar
                        </button></a>
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>