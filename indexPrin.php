<?php
	 include('conexion.php');

	 $obj = new Conexion;

     $res =  $obj->getNameByService('"%Doc%"');
 
     $temp = array();
 
     $temp = $res;

     $resN =  $obj->getNameByService('"%Nutri%"');
 
     $tempN = array();
 
     $tempN =$resN;

     $resPo =  $obj->getNameByService('"%Pod%"');
 
     $tempPo = array();
 
     $tempPo =$resPo;

     $resPs =  $obj->getNameByService('"%Psico%"');
 
     $tempPs = array();
 
     $tempPs =$resPs;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Fundación Chabely</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css_pag/styles.css" rel="stylesheet" />
    <link href="css/menu.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Fundación Chabely</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div id="header">
                <ul class="nav">
                    <li><a href="">Inicio</a></li>
                    <li><a href="">Servicios</a>
                        <ul>
                            <li><a href="http://localhost/Chabely/servicios/listaDoct.php">Doctores</a>
                           
                                <ul>
                                <?php
                                foreach($res as $temp){
                                    ?>
                                    <li><a href=<?php print "http://localhost/Chabely/index.php?id=".$temp['id']."&nombre_servicio=".$temp['nombre_servicio'];?>><?php print $temp['nombre_servicio'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            

                            <li><a href="http://localhost/Chabely/servicios/listaNutri.php">Nutriologos</a>
                                <ul>
                                <?php
                                foreach($resN as $tempN){
                                    ?>
                                    <li><a href=<?php print "http://localhost/Chabely/index.php?&id=".$tempN['id']."&nombre_servicio=".$tempN['nombre_servicio'];?>><?php print $tempN['nombre_servicio'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li><a href="http://localhost/Chabely/servicios/listaPodol.php">Podologos</a>
                                <ul>
                                <?php
                                foreach($resPo as $tempPo){
                                    ?>
                                     <li><a href=<?php print "http://localhost/Chabely/index.php?&id=".$tempPo['id']."&nombre_servicio=".$tempPo['nombre_servicio'];?>><?php print $tempPo['nombre_servicio'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li><a href="http://localhost/Chabely/servicios/listaPsi.php">Psicologos</a>
                                <ul>
                                <?php
                                foreach($resPs as $tempPs){
                                    ?>
                                    <li><a href=<?php print "http://localhost/Chabely/index.php?&id=".$tempPs['id']."&nombre_servicio=".$tempPs['nombre_servicio'];?>><?php print $tempPs['nombre_servicio'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            
                            <li><a href="http://localhost/Chabely/servicios/insertarServicios.php">+Añadir</a>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Fundación Chabely <br>Educación en Diabetes</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Asociación Civil que se enfoca en la prevención y educación sobre Diabetes.</p>

                </div>
            </div>
        </div>
    </header>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Servicios</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <a href="http://localhost/Chabely/servicios/listaPodol.php"><img src="assets/img/pies.png" alt=""></a>
                        </div>
                        <h3 class="h4 mb-2">Podologo</h3>
                        <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <a href="http://localhost/Chabely/servicios/listaDoct.php"><img src="assets/img/doctor.png" alt=""></a>
                            </i>
                        </div>
                        <h3 class="h4 mb-2">Doctor</h3>
                        <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <a href="http://localhost/Chabely/servicios/listaNutri.php"><img src="assets/img/nutri.png" alt=""></a>
                            </i>
                        </div>
                        <h3 class="h4 mb-2">Nutriologo</h3>
                        <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <a href="http://localhost/Chabely/servicios/listaPsi.php"><img src="assets/img/psicologo.png" alt=""></a>
                            </i>
                        </div>
                        <h3 class="h4 mb-2">Psicólogo</h3>
                        <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/imagen1.png" title="Diabetes">
                        <img class="img-fluid" src="assets/img/imagen1.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Diabetes</div>
                            <div class="project-name">Diabetes</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/imagen2.png" title="Diabetes">
                        <img class="img-fluid" src="assets/img/imagen2.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Diabetes</div>
                            <div class="project-name">Diabetes</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/imagen3.png" title="Diabetes">
                        <img class="img-fluid" src="assets/img/imagen3.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Diabetes</div>
                            <div class="project-name">Diabetes</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/imagen4.png" title="Diabetes">
                        <img class="img-fluid" src="assets/img/imagen4.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Diabetes</div>
                            <div class="project-name">Diabetes</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/imagen5.png" title="Diabetes">
                        <img class="img-fluid" src="assets/img/imagen5.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Diabetes</div>
                            <div class="project-name">Diabetes</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/imagen6.png" title="Diabetes">
                        <img class="img-fluid" src="assets/img/imagen6.png" alt="..." />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-category text-white-50">Diabetes</div>
                            <div class="project-name">Diabetes</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2021 - Fundación Chabely</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js_pag/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>