<?php
$publish = "published";

if ($publish == "unpublished") {

    header("Location: ./maintenance/index.html");
} else {
    ?>
    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> 
    <html class="no-js"> <!--<![endif]-->
        <head>
            <meta charset="utf-8">
            <title>Inicio - IPUC Pasoancho </title>  
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="description" content="Nuestra familia IPUC Pasoancho esta interesada y lista para servirle. Nuestra Oracion es que usted sea bendecido y fortalecido por el poder del Señor Jesus, y que pueda vivir una vida de abundancia en la comunion y libertad espiritual. No somos simplemente una iglesia; somos una comunidad de creyentes para declarar la gloria del señor, celebrando a Jesus como Rey de Reyes y Señor de Señores, que vela y se interesa por el bienestar integral de la Familia y la sociedad por medio del estudio de la palabra, ponemos en practica de lo que aprendemos , de esta manera crecemos juntos como el cuerpo de Cristo. Que el Señor te Bendiga y te Guarde!. Esperamos verte pronto.">
            <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
            <meta name="author" content="Huban Creative">

            <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
            <link href="assets/libs/pace/pace.css" rel="stylesheet" />
            <link href="assets/libs/animate-css/animate.min.css" rel="stylesheet" />
            <link href="assets/libs/iconmoon/style.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

            <!-- LESS FILE <link href="assets/css/style.less" rel="stylesheet/less" type="text/css" /> -->
            <!-- Extra CSS Libraries Start -->
            <link href="assets/libs/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
            <link href="assets/libs/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css" />
            <link href="assets/libs/owl-carousel/owl.transitions.css" rel="stylesheet" type="text/css" />
            <link href="assets/libs/jquery-magnific/magnific-popup.css" rel="stylesheet" type="text/css" />
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
                                <a class="navbar-brand" href="index.php">
                                    <img src="images/logo/logo.png" data-dark-src="images/logo/logo.png" alt="ipuc Pasoancho Frontend Template" class="logo">
                                </a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="main-navigation">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.php" class="active">INICIO</a></li>
                                    <li><a href="about.php">ORGANIZACION </a></li>
                                    <li><a href="ministeries.php">MINISTERIOS</a></li>
                                    <li><a href="memories.php">RECUERDOS</a></li>
                                    <li><a href="contactus.php">CONTACTENOS</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-->
                    </nav>
    <!--                                        <section class="main-slider fullsize" data-stellar-background-ratio="0.5" style="background-image: url(images/main/main_2.jpg)">-->
                    <section class="main-slider fullsize" data-stellar-background-ratio="0.5" style="background-image: url(images/main/main_2.jpg)">


                    </section>


                </header>

        <!--                <section class=" maintitle">
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="slider-caption">
                                        <h1 data-animate="fadeInDown" data-delay="1000" data-duration="2s" style="color: #FFF;">IPUC Pasoancho </br>Comprometidos con la Verdad!</h1></br>
                                        <a data-animate="fadeInUp" data-duration="2s" data-delay="1300" href="contactus.php" class="btn btn-success btn-lg"> CONTACTENOS</a>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>-->
                <section class="hero-banner">
                    <div class="container text-center">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h2 style="color: #FFF">Bienvenidos A <span class="invert bg-info">NUESTRO</span> Sitio Web</h2>
                                <p>
                                    Nuestra familia IPUC Pasoancho esta interesada y lista para servirle. Nuestra Oracion es que usted sea bendecido y fortalecido por el poder 
                                    del Señor Jesus, y que pueda vivir una vida de abundancia en la comunion y libertad espiritual. No somos simplemente una iglesia; somos una comunidad
                                    de creyentes para declarar la gloria del señor, celebrando a Jesus como Rey  de Reyes y Señor de Señores, que vela y se interesa por el bienestar integral
                                    de la Familia y la sociedad por medio del estudio de la palabra, ponemos en practica de lo que aprendemos , de esta manera crecemos juntos como el cuerpo de Cristo.
                                    Que el Señor te Bendiga y te Guarde!. Esperamos verte pronto.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>


<!--                <section class="video-block text-center">
                    <div class="video-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <h1>CONOCE NUESTRA MARAVILLOSA COMUNIDAD</h1>
                                <p><h3 style="color: #FFF">Bienvenidos a la Iglesia Pentecostal Unida de Colombia Pasoancho
                                    "Una Iglesia con Fundamento Firme, que ama y crece en el Señor".</h3></p><br>
                                <p>
                                    <a href="javascript:;" class="btn btn-default btn-bordered btn-pill">VER VIDEO</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </section>-->

                    <!--                <section class="features-block">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-4" data-animate="fadeInLeft" data-delay="0">
                                                    <h4><i class="fa fa-microphone fa-2x"></i>  RADIO IPUC </h4></br>
                                                    <a href="http://www.radioipuc.org/">
                                                        <img src="images/main/section4/RADIOIPUC.jpg">
                                                    </a>
                                                    <p></p>
                                                </div>
                                                <div class="col-sm-4" data-animate="fadeInLeft" data-delay="300">
                                                    <h4><i class="fa fa-envelope-o fa-2x"></i>  PETICIONES </h4></br>
                                                    <a href="contactus.php">
                                                        <img src="images/main/section4/linea_oracion.jpg" width="215px" height="258px">
                                                    </a>
                                                    <p></p>
                                                </div>
                                                <div class="col-sm-4" data-animate="fadeInLeft" data-delay="600">
                                                    <h4><i class="fa fa-video-camera fa-2x"></i>  TRANSMISIONES EN VIVO</h4></br>
                                                    <img src="images/main/section4/trans_vivo.jpg" width="215px" height="258px">
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>-->

                <section class="product-block">
                    <div class="container">
                        <div class="row stacked">
                            <div class="col-sm-4">
                                <h2 style=" color: #0a3063" class="page-header text-center"><b>COMPROMETIDOS</b> CON LA VERDAD</h2>
                                <p style="text-align: justify; margin-right: 2%;">Cantad alegres a Dios, habitantes de toda la tierra.
                                    Servid a Jehová con alegría; Venid ante su presencia con regocijo.
                                </p>
                                <p style="text-align: justify; margin-right: 2%;">
                                    Por cuanto es la voluntad de Dios sacar del mundo un pueblo salvo para la Gloria de su Nombre, pueblo que constituye la iglesia de Jesucristo, la cual debe estar edificada sobre el fundamento de los apóstoles y profetas, siendo la principal piedra del ángulo Jesucristo mismo. (Ef. 2.20; 1 Co. 3.11).
                                </p>
                                <p class="text-muted text-sm"><b>
                                        Reconoced que Jehová es Dios; El nos hizo, y no nosotros a nosotros mismos; Pueblo suyo somos, y ovejas de su prado. Salmos 100: 1-5 
                                    </b></p>
    <!--                            <p><a href="http://hubancreative.com/projects/templates/presenter" target="_blank" class="btn btn-success btn-bordered btn-pill">Live Demo</a> <a class="btn btn-success btn-pill" href="http://themeforest.net/item/coco-responsive-bootstrap-admin-template/9110062" target="_blank">READ MORE</a></p>-->
                            </div>
                            <div class="col-sm-8">
                                <img src="images/mainphoto.png" height="500px" class="image-sized" data-animate="fadeInRight">
                            </div>
                        </div>
                    </div>
                </section>

                <section class="testimonials-block parallax-bg text-center" data-stellar-background-ratio="0.6">

                    <div id="testimonial" class="owl-carousel owl-theme">
                        <div class="item">
                            <h2>"Un Señor, una fe, un bautismo,<br> un Dios y Padre de todos,<br> el cual es sobre todos y por todos y en todos."</h2>
                            <p><b>(Ef. 4.3-6)</b><br></p>
                        </div>
                        <div class="item">
                            <h2>"All their work are awesome and they are <br>really sensitive about customer happiness.<br> Never seen a support like this before."</h2>
                            <p><b>William Winfrey</b><br>Marketing Manager, DONTDROPBOX</p>
                        </div>
                        <div class="item">
                            <h2>"We really loved working with HubanCreative.<br>They know what they are doing and make<br> you feel that on every step."</h2>
                            <p><b>Micheal Lichtenstein</b><br>CEO, WELLFUND CORPORATION</p>
                        </div>                      

                    </div>
                </section>
                <?php include 'partials/footer.php'; ?>
                <a class="tothetop" href="javascript:;"><i class="icon-angle-up"></i></a>
            </div>

            <script>
                var resizefunc = [];
            </script>
            <script src="assets/libs/less-js/less-1.7.5.min.js"></script>

            <script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
            <script src="assets/libs/pace/pace.js"></script>
            <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/libs/jquery-browser/jquery.browser.min.js"></script>
            <script src="assets/libs/fastclick/fastclick.js"></script>
            <script src="assets/libs/stellarjs/jquery.stellar.min.js"></script>
            <script src="assets/libs/jquery-appear/jquery.appear.js"></script>
            <script src="assets/js/init.js"></script>
            <!-- Page Specific JS Libraries -->
            <script src="assets/libs/owl-carousel/owl.carousel.min.js"></script>
            <script src="assets/libs/jquery-magnific/jquery.magnific-popup.min.js"></script>
            <script src="assets/js/pages/index.js"></script>
            <!-- Page Specific JS Libraries End -->
        </body>
    </html>
<?php } ?>