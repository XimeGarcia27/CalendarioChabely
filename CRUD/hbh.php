<?php
include("./config.php");

$id = $_GET['id'];

$consulta = "SELECT * FROM agenda WHERE id='$id'";
$query = mysqli_query($conexion, $consulta);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Doctores | Fundación Chabely</title>
    <!--Custom styles-->
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
        <div class="insertarRegistro">
            <form action="./update_cita.php" method="POST">
                <h2>Editar Cita</h2>
        </div>
        <input type="hidden" value="<?php echo $row['id'] ?>" id="id" name="id">

        <label for="expediente">Expediente</label>
        <input value="<?php echo $row['expediente'] ?>" type="text" required autocomplete="on" name="expediente" class="form-control" id="expediente" placeholder="Expediente">

        <br>

        <label for="title">Nombre Completo</label>
        <input value="<?php echo $row['title'] ?>" type="text" required autocomplete="on" name="title" class="form-control" id="title" placeholder="Nombre Completo">

        <br>

        <label for="tel">Teléfono</label>
        <input value="<?php echo $row['tel'] ?>" type="text" required autocomplete="on" name="tel" class="form-control" id="tel" placeholder="Teléfono">

        <br>

        <label for="cel">Número Alternativo</label>
        <input value="<?php echo $row['cel'] ?>" type="text" required autocomplete="on" name="cel" class="form-control" id="cel" placeholder="Número Alternativo">

        <br>

        <label for="registro">Registró</label>
        <input value="<?php echo $row['registro'] ?>" type="text" required autocomplete="on" name="registro" class="form-control" id="registro" placeholder="Registró">

        <br>

        <label for="tipo">Tipo de Paciente</label>
        <select value="<?php echo $row['class'] ?>" class="form-control" name="class" id="tipo">
            <option value="event-info">Chabely Comp</option>
            <option value="event-success">Externos</option>
            <option value="event-important">Primera Vez</option>
            <option value="event-warning">Subsecuente</option>
            <option value="event-special">Ex-os</option>
            <option value="event-mediumorchid">Morado</option>
            <option value="event-forestgreen">Verde</option>
            <option value="event-palevioletred">Rosa</option>
        </select>

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

        <label for="lugar">Lugar</label>
        <input value="<?php echo $row['lugar'] ?>" type="text" required autocomplete="on" name="lugar" class="form-control" id="lugar" placeholder="Lugar">

        <label for="lugar">Accion</label>
        <input value="<?php echo $row['accion'] ?>" type="text" required autocomplete="on" name="accion" class="form-control" id="accion" placeholder="Accion Registrada o Cancelada">

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
        <button type="submit" value="Actualizar" class="btn btn-success"> Agregar</button>
        </form>
        <p class="mt-3 mb-3 text-muted foot">&copy; SERVICIOS | FUNDACIÓN CHABELY</p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>