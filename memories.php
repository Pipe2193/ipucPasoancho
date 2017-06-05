<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Recuerdos - IPUC Pasoancho</title>  
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
   
    </head>
    <body class=""><div id="wrapper"> 
            <?php include 'partials/plugins/facebook/pagePlugin.php'; ?>
            <header >
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
                                <li><a href="memories.php" class="active">RECUERDOS</a></li>
                                <li><a href="contactus.php">CONTACTENOS</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-->
                </nav> 
                <section class="main-slider" data-stellar-background-ratio="0.5" style="background-image: url(images/main/banner3.jpg)">
<!--                    <div class="slider-caption">
                        </br></br>
                        </br></br>
                        </br></br>
                        <h2 data-animate="fadeInDown" data-delay="1000" data-duration="2s">We are here to provide you<br>our <span class="invert bg-danger">awesome</span> service with<br>our amazing team!</h2>
                        <a data-animate="fadeInUp" data-duration="2s" data-delay="1300" href="#theteam" class="btn btn-primary btn-lg">MEET THE TEAM</a>	</div>-->
                </section>
            </header>

            <section class="hero-banner" style="background-image: url(images/main/section-bg.jpg)">
                <div class="container text-center">

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h2 class="text-white-1">WEB ARTISANS FOR YOUR PROJECTS!</h2><hr>
                            <div class="row">
                                <div class="col-sm-12 text-white-1">
                                    <iframe width="300" height="400" src="http://www.radioipuc.org/" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="portfolio-block block">
                <div class="container">
                    <div class="text-center" style="">
                        <div class="portfolio-filter btn-group">
                            <a href="javascript:;" class="btn btn-default active" data-filter="*" data-target=".portfolio-container">All</a>
                            <a href="javascript:;" class="btn btn-default" data-filter=".design" data-target=".portfolio-container">Design</a>
                            <a href="javascript:;" class="btn btn-default" data-filter=".development" data-target=".portfolio-container">Development</a>
                            <a href="javascript:;" class="btn btn-default" data-filter=".logo" data-target=".portfolio-container">Logo</a>
                            <a href="javascript:;" class="btn btn-default" data-filter=".photo" data-target=".portfolio-container">Photo</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="portfolio-container zoom-gallery">

                        <div class="project development design">
                            <a href="images/portfolio/image1.jpg" data-source="images/portfolio/image1.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image1.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Development, Design
                            </p>
                            <p class="text-sm text-muted">
                                HTML5, CSS3, Wordpress
                            </p>
                        </div>

                        <div class="project photo">
                            <a href="images/portfolio/image2.jpg" data-source="images/portfolio/image2.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image2.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Photo
                            </p>
                            <p class="text-sm text-muted">
                                Adobe Illustrator
                            </p>
                        </div>

                        <div class="project development design">
                            <a href="images/portfolio/image3.jpg" data-source="images/portfolio/image3.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image3.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Development, Design
                            </p>
                            <p class="text-sm text-muted">
                                HTML5, CSS3, Wordpress, Adobe Illustrator
                            </p>
                        </div>

                        <div class="project photo design">
                            <a href="images/portfolio/image4.jpg" data-source="images/portfolio/image4.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image4.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Photo, Design
                            </p>
                            <p class="text-sm text-muted">
                                HTML5, CSS3, Wordpress
                            </p>
                        </div>

                        <div class="project logo design">
                            <a href="images/portfolio/image5.jpg" data-source="images/portfolio/image5.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image5.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Design, Logo
                            </p>
                            <p class="text-sm text-muted">
                                HTML5, CSS3, Wordpress
                            </p>
                        </div>

                        <div class="project photo design">
                            <a href="images/portfolio/image6.jpg" data-source="images/portfolio/image6.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image6.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Photo, Design
                            </p>
                            <p class="text-sm text-muted">
                                HTML5, CSS3, Wordpress
                            </p>
                        </div>

                        <div class="project logo design">
                            <a href="images/portfolio/image7.jpg" data-source="images/portfolio/image7.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image7.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Logo, Design
                            </p>
                            <p class="text-sm text-muted">
                                HTML5, CSS3, Wordpress
                            </p>
                        </div>

                        <div class="project development design">
                            <a href="images/portfolio/image8.jpg" data-source="images/portfolio/image8.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image8.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Development, Design
                            </p>
                            <p class="text-sm text-muted">
                                Android, IOS
                            </p>
                        </div>

                        <div class="project development design">
                            <a href="images/portfolio/image9.jpg" data-source="images/portfolio/image9.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image9.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Development, Design
                            </p>
                            <p class="text-sm text-muted">
                                HTML5, CSS3, Drupal, jQuery
                            </p>
                        </div>

                        <div class="project design">
                            <a href="images/portfolio/image10.jpg" data-source="images/portfolio/image10.jpg" title="Some Project Information" class="gallery-item effect-milo">
                                <img src="images/portfolio/thumbs/image10.jpg">
                            </a>
                            <div class="btn-group pull-right"><a class="btn btn-link"><i class="icon-link2"></i></a></div>
                            <a href="javascript:;" class="gallery-item-title">SOMETHING CORPORATION</a>
                            <p class="gallery-item-descr">
                                <i class="icon-tag4"></i> Design
                            </p>
                            <p class="text-sm text-muted">
                                Adobe Photoshop
                            </p>
                        </div>

                    </div>
                </div>
            </section>

            <?php include 'partials/suscription.php'; ?>       
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
        <script src="assets/libs/isotope/isotope.pkgd.min.js"></script>
        <script src="assets/libs/jquery-magnific/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/pages/portfolio.js"></script>
        <!-- Page Specific JS Libraries End -->
    </body>
</html>
