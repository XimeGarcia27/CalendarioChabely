<?php

//incluir el archivo para las funciones 
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
        $exped   = $_POST['expediente'];
        $lug  = $_POST['lugar'];
        $regis  = $_POST['registro'];
        $clase  = $_POST['class'];
        $te  = $_POST['tel'];
        $ce  = $_POST['cel'];
        $nomSer  = $_POST['nomSer'];
        $servic  = $_POST['servic'];
        $id_ser  = $_POST['id_ser'];

        // insertamos la cita
        $query = "INSERT INTO agenda VALUES(null,'$titulo','$inicio_normal','$final_normal','$exped','$lug','$regis','$clase','$te','$ce','$inicio','$final','','$nomSer','$servic','$id_ser')";

        $conexion->query($query) or die('<script type="text/javascript">alert("Horario No Disponible ")</script>');
        
        header("Location: http://localhost/Chabely/index.php?id=".$params['id']."&nombre_servicio=".$params['nombre_servicio']); 

        // Obtenemos el ultimo id insetado.
        $im = $conexion->query("SELECT MAX(id) AS id FROM agenda");
        $row = $im->fetch_row();
        $id = trim($row[0]);

        // para generar el link de la cita
        $link = "$base_url" . "descripcion_citas.php?id=$id";

        // y actualizamos su link
        $query = "UPDATE agenda SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query);
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>AGENDA Fundación Chabely</title>
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>css/calendar.css">
    <link href="<?= $base_url ?>css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?= $base_url ?>js/es-ES.js"></script>
    <script src="<?= $base_url ?>js/jquery.min.js"></script>
    <script src="<?= $base_url ?>js/moment.js"></script>
    <script src="<?= $base_url ?>js/bootstrap.min.js"></script>
    <script src="<?= $base_url ?>js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="<?= $base_url ?>css/bootstrap-datetimepicker.min.css" />
</head>

<?php if ($temp[0]['estado'] == 1) { ?>

    <body <?php
            if (($temp[0]['servicio'] == "Doctor") || ($temp[0]['servicio'] == "Doctora")) { ?> style="background: #d6dbe6" <?php } elseif (($temp[0]['servicio'] == "Nutriologo") || ($temp[0]['servicio'] == "Nutriologa")) { ?> style="background: #e3ffda" <?php } elseif (($temp[0]['servicio'] == "Psicologo") || ($temp[0]['servicio'] == "Psicologa")) { ?> style="background: #fae1e1" <?php } elseif (($temp[0]['servicio'] == "Podologo") || ($temp[0]['servicio'] == "Podologa")) { ?> style="background: #fadabe" <?php } ?>>
        <div class="container">
        <a href="http://localhost/Chabely/indexPrin.php"><img style="width: 30px; height:30px; margin:4px;" src="./assets/flecha-izquierda.png" alt=""></a>
                
            <div class="row">
                <div <?php
                        if (($temp[0]['servicio'] == "Doctor") || ($temp[0]['servicio'] == "Doctora")) { ?> style="background: #7b868f" <?php } elseif (($temp[0]['servicio'] == "Nutriologo") || ($temp[0]['servicio'] == "Nutriologa")) { ?> style="background: #5ba343" <?php } elseif (($temp[0]['servicio'] == "Psicologo") || ($temp[0]['servicio'] == "Psicologa")) { ?> style="background: #bc8f8f" <?php } elseif (($temp[0]['servicio'] == "Podologo") || ($temp[0]['servicio'] == "Podologa")) { ?> style="background: #f4a460" <?php } ?> class="page-header text-center">
                    <h2><?php print $temp[0]['nombre_servicio'] . " " . $temp[0]['apellido']; ?></h2> 
                </div>
                
                <div class="pull-left form-inline"><br>
                    <div class="btn-group">
                        <button class="btn btn-success" data-calendar-nav="prev"><i class="fa fa-arrow-left"></i> </button>
                        <button class="btn" data-calendar-nav="today">Hoy</button>
                        <button class="btn btn-success" data-calendar-nav="next"><i class="fa fa-arrow-right"></i> </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-info" data-calendar-view="year">Año</button>
                        <button class="btn btn-info active" data-calendar-view="month">Mes</button>
                        <button class="btn btn-info" data-calendar-view="week">Semana</button>
                        <button class="btn btn-info" data-calendar-view="day">Dia</button>
                    </div>
                </div>
                <div class="pull-right form-inline"><br>
                   <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Añadir Cita</button>
                </div>
            </div>
            <br><br><br>
            <div <?php
                    if (($temp[0]['servicio'] == "Doctor") || ($temp[0]['servicio'] == "Doctora")) { ?> style="background: #7b868f" <?php } elseif (($temp[0]['servicio'] == "Nutriologo") || ($temp[0]['servicio'] == "Nutriologa")) { ?> style="background: #5ba343" <?php } elseif (($temp[0]['servicio'] == "Psicologo") || ($temp[0]['servicio'] == "Psicologa")) { ?> style="background: 	#bc8f8f" <?php } elseif (($temp[0]['servicio'] == "Podologo") || ($temp[0]['servicio'] == "Podologa")) { ?> style="background: #f4a460" <?php } ?> class="row">
                <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->

            </div>
            <!--ventana modal para el calendario-->
            <div class="modal fade" id="events-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="#" data-dismiss="modal" style="float: right;"> <i class="glyphicon glyphicon-remove "></i> </a>
                            <br>
                        </div>
                        <div class="modal-body" style="height: 400px">
                            <p>One fine body&hellip;</p>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>

        <script src="<?= $base_url ?>js/underscore-min.js"></script>
        <script src="<?= $base_url ?>js/calendar.js"></script>
        <script type="text/javascript">
            (function($) {
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
                var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que la agenda se mostraran en ventana modal
                    modal: '#events-modal',

                    // dentro de un iframe
                    modal_type: 'iframe',

                    //obtenemos los agenda de la base de datos
                    events_source: '<?= $base_url ?>obtener_citas.php?id=<?= $params['id'] ?>',

                    // mostramos el calendario en el mes
                    view: 'month',

                    // y dia actual
                    day: yyyy + "-" + mm + "-" + dd,

                    // definimos el idioma por defecto
                    language: 'es-ES',

                    //Template de nuestro calendario
                    tmpl_path: '<?= $base_url ?>tmpls/',
                    tmpl_cache: false,

                    // Hora de inicio
                    time_start: '08:00',

                    // y Hora final de cada dia
                    time_end: '22:00',

                    // intervalo de tiempo entre las hora, en este caso son 30 minutos
                    time_split: '30',

                    // Definimos un ancho del 100% a nuestro calendario
                    width: '100%',

                    onAfterEventsLoad: function(events) {
                        if (!events) {
                            return;
                        }
                        var list = $('#eventlist');
                        list.html('');

                        $.each(events, function(key, val) {
                            $(document.createElement('li'))
                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                .appendTo(list);
                        });
                    },
                    onAfterViewLoad: function(view) {
                        $('#page-header').text(this.getTitle());
                        $('.btn-group button').removeClass('active');
                        $('button[data-calendar-view="' + view + '"]').addClass('active');
                    },
                    classes: {
                        months: {
                            general: 'label'
                        }
                    }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options);

                $('.btn-group button[data-calendar-nav]').each(function() {
                    var $this = $(this);
                    $this.click(function() {
                        calendar.navigate($this.data('calendar-nav'));
                    });
                });

                $('.btn-group button[data-calendar-view]').each(function() {
                    var $this = $(this);
                    $this.click(function() {
                        calendar.view($this.data('calendar-view'));
                    });
                });

                $('#first_day').change(function() {
                    var value = $(this).val();
                    value = value.length ? parseInt(value) : null;
                    calendar.setOptions({
                        first_day: value
                    });
                    calendar.view();
                });
            }(jQuery));
        </script>

        <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Agregar nueva cita</h4>
                    </div>
                    <div class="modal-body">
                        <form accion="" method="post">

                            <label for="expediente">Expediente</label>
                            <input type="text" name="expediente" class="form-control" id="expediente" placeholder="Expediente">

                            <br>

                            <label for="title">Nombre Completo</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Nombre Completo">

                            <br>

                            <label for="tel">Teléfono</label>
                            <input type="text" name="tel" class="form-control" id="tel" placeholder="Teléfono">

                            <br>

                            <label for="cel">Número Alternativo</label>
                            <input type="text" name="cel" class="form-control" id="cel" placeholder="Número Alternativo">

                            <br>

                            <label for="registro">Registró</label>
                            <input type="text" required autocomplete="on" name="registro" class="form-control" id="registro" placeholder="Registró">

                            <br>

                            <label for="tipo">Tipo de Paciente</label>
                            <select class="form-control" name="class" id="tipo">
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

                            <br>

                            <label for="lugar">Lugar</label>
                            <input type="text" required autocomplete="on" name="lugar" class="form-control" id="lugar" placeholder="Lugar">

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
            </div>
        </div>
    </body>
<?php } else { ?>
    <link rel="stylesheet" href="<?= $base_url ?>css/ausentes.css" />
    <header>
        <div class="container">
            <h1>Fundación Chabely</h1>
            <div style="margin-left: 80% "><a href="http://localhost/Chabely/indexPrin.php">Página Principal</a></div>
        </div>
    </header>
    <br>
    <br>

    <body>
        <div class="container">
            <div class="texto">
                <h1 style="color:black">NO ESTA DISPONIBLE</h1>
            </div>
        </div>
    <?php } ?>

</html>