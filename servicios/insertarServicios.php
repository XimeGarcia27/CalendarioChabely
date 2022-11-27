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
            <form action="insertar.php" method="POST">
                <h2>Registrar Servicios</h2>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text"  name="nombre_servicio" class="form-control" placeholder="Nombre" required="required"></div>
                <div class="col"><input type="text" name="apellido" class="form-control" placeholder="Apellidos" required="required"></div>
            </div>
        </div>
        <label for="servicio">Selecciona tipo de servicio</label>
                        <select class="form-control" name="servicio" id="servicio">
                            <option>Podologo</option>
                            <option>Podologa</option>
                            <option>Psicologo</option>
                            <option>Psicologa</option>
                            <option>Doctor</option>
                            <option>Doctora</option>
                            <option>Nutriologo</option>
                            <option>Nutriologa</option>
                        </select>
       <!-- <div class="form-group">
            <input type="text" name="estado" class="form-control" placeholder="Estado" required="required">
        </div>
         <div class="estado">
            <label>Estado</label>
            <select class="form-control">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
            <br>
        </div> -->
        <label for="estado">Estado</label>
                        <select type="number" class="form-control" name="estado" id="estado">
                            <option  value="1">Activo</option>
                            <option  value="0">Inactivo</option>
                        </select>

                        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Registrar</button>
        </div>
        </form>
        <p class="mt-3 mb-3 text-muted foot">&copy; SERVICIOS | FUNDACIÓN CHABELY</p>
    </div>
</body>

</html>