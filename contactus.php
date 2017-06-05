<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Contactenos - IPUC Pasoancho</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="assets/libs/iconmoon/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- LESS FILE <link href="assets/css/style.less" rel="stylesheet/less" type="text/css" /> -->
        <!-- Extra CSS Libraries Start -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- Extra CSS Libraries End -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" /> 
        <?php include 'partials/ads/facebookAds.php'; ?>
    </head>
    <body class=""><div id="wrapper"> 

            <?php include 'partials/plugins/facebook/pagePlugin.php'; ?>
            <header>
                <?php include 'partials/topbar.php'; ?>            
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                                <span class="icon-navicon"></span>
                            </button>
                            <a class="navbar-brand" href="index.html">
                                <img src="images/logo/logo.png" data-dark-src="images/logo/logo.png" alt="ipuc Pasoancho Frontend Template" class="logo">
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="main-navigation">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.php">INICIO</a></li>
                                <li><a href="about.php">ORGANIZACION</a></li>
                                <li><a href="ministeries.php" >MINISTERIOS</a></li>
                                <li><a href="memories.php">RECUERDOS</a></li>
                                <li><a href="contactus.php" class="active">CONTACTENOS</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-->
                </nav>        
                <section class="main-slider" data-stellar-background-ratio="0.5" style="background-image: url(images/main/contactenos.png)">
                    <div class="slider-caption">
<!--                        <h2 data-animate="fadeInDown" data-delay="1000" data-duration="2s">We are happy to answer<br>your questions and to be in <br><span class="invert bg-danger">contact</span> with you!</h2>
                        <a data-animate="fadeInUp" data-duration="2s" data-delay="1300" href="#contact-form" class="btn btn-primary btn-lg">CONTACT US</a>	</div>
                        -->
                </section> 
            </header>
            <section class="hero-banner">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h2 class="page-header" style="color: #FFF">CONTACTENOS!</h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    Nos placeria escuchar de usted. Favor de usar cualquier medio para comunicarse con nosotros.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4   contact-phone">
                            <span class="text-lg " style=" color: #F39C12"><i class="fa fa-phone"></i> LLAMANOS! </span><br><small> +57 (2) 388 - 3384 </small>
                        </div>
                        <div class="col-sm-4  contact-phone ">
                            <span class="text-lg" style=" color: #F39C12"><i class="fa fa-envelope-o"></i> CORREO ELECTRONICO</span><br><small style="font-size:18px "> ipucpasoanchocali@gmail.com</small>
                        </div>
                        <div class="col-sm-4  contact-phone">
                            <span class="text-lg" style=" color: #F39C12"><i class="icon-location4"></i> NUESTRA UBICACION!</span><br><small> CARRERA 56#12A-125</small>
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact-form" class="contact-form block">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="contact.php" name="sentMessage" id="contactForm" novalidate>
                                <legend class="text-center" style=" color: #0a3063"><i class="fa fa-envelope-o" aria-hidden="true"></i> ESCRIBENOS TU PETICION O MENSAJE</legend>
                                <div id="success"></div> <!-- For success/fail messages -->
                                </br>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Ingresar tu nombre" id="name" name="name">
                                        <p class="help-block"></p>
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <div class="controls">
                                        <input type="email" class="form-control" placeholder="Ingresar tu Email" id="email" name="email">
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <div class="controls">
                                        <textarea rows="10" cols="100" class="form-control" id="message" placeholder="Ingresa tu peticio o mensaje" name="message" style="resize:none"></textarea>
                                    </div>
                                </div>        

                                <div class="text-right">
                                    <button type="reset" class="btn btn-danger">RESET</button>
                                    <button type="submit" class="btn btn-primary">ENVIAR</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="well transparent">
                                        <h4 class="page-header" style=" color: #F39C12">IPUC -SEDE PASOANCHO</h4>
                                        <ul class="list-unstyled company-info">
                                            <li><i class="icon-map-marker"></i> CARRERA 56#12A-125<br>SANTIAGO DE CALI, VALLE DEL CAUCA</li>
                                            <li><i class="icon-phone3"></i> +57 (2) 388 - 3384</li>
                                            <li><i class="icon-envelope"></i> <a href="mailto:ipucpasoanchocali@gmail.com">ipucpasoanchocali@gmail.com</a></li>
                                            <li><i class="icon-alarm2"></i> Martes - Jueves - Sabado - Domingo: <strong>7:00 pm</strong><br>Domingo<strong>9:30 am & 6:00 pm</strong></li>
                                        </ul>
                                        <div class="page-header" ><h3 style="color: #0a3063"><i class="fa fa-commenting" aria-hidden="true"></i> Contactanos a travez de Messenger </h3></div>
                                        <div class="col-sm-8">
                                            <img src="images/facebook/messenger_code_703523436453812.png" width="300px" height="300px" class="image-sized" data-animate="fadeInRight">
                                        </div>
                                    </div>

                                    <!--                                    <div class="well transparent">
                                                                            <h4>FLORIDA OFFICE</h4>
                                                                            <b>ADDRESS</b>
                                                                            <p>1836 Arrowood Drive<br>Jacksonville, FL 32216 </p>
                                                                            <b>PHONE</b>
                                                                            <p>904-436-9048</p>
                                                                        </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-map">
                <div id="gmap" style="height:500px"></div>
            </section>
            <?php include 'partials/footer.php'; ?>
            <a class="tothetop" href="javascript:;"><i class="icon-angle-up"></i></a>
        </div>

        <script>
            var resizefunc = [];
        </script>
        <script src="assets/libs/less-js/less-1.7.5.min.js"></script>
        <script src="assets/libs/pace/pace.min.js"></script>
        <script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/libs/jquery-browser/jquery.browser.min.js"></script>
        <script src="assets/libs/fastclick/fastclick.js"></script>
        <script src="assets/libs/stellarjs/jquery.stellar.min.js"></script>
        <script src="assets/libs/jquery-appear/jquery.appear.js"></script>
        <script src="assets/js/init.js"></script>
        <!-- Page Specific JS Libraries -->
        <script src="assets/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="assets/libs/jquery-gmap3/gmap3.min.js"></script>
        <script src="assets/js/pages/contact.js"></script>
        <!-- Page Specific JS Libraries End -->
    </body>
</html>
