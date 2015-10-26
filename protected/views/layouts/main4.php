<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
  

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/revolution-slider/rs-plugin/css/settings.css" type="text/css" media="screen">


      <!-- CSS Estilo del Login -->    
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/pages/page_log_reg_v1.css">    

    <!-- Estilo de registro de empresa order form -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css">

    <!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/revolution-slider/rs-plugin/css/settings-ie8.css" type="text/css" media="screen"><![endif]-->

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/theme-colors/default.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/custom.css">
</head>	

<body>
<div class="wrapper page-option-v1">
    <!--=== Header ===-->    
    <div class="header">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
               <!-- Topbar Navigation -->
                <ul class="loginbar pull-right">
                    <li>
                        <i class="fa fa-globe"></i>
                        <a>REGISTRATE</a>
                        <ul class="languages">

                            <li><?php echo CHtml::link('Estudiantes',array('UsuarioEstudiante/create')); ?></li>
                            <li><?php echo CHtml::link('Empresa',array('UsuarioEmpresa/create')); ?></li>
                            <li><?php echo CHtml::link('Jefes',array('UsuarioUnitec/create'));?></li>
                            <li><?php echo CHtml::link('Asesores',array('UsuarioUnitec/create'));?></li>
                        </ul>
                    </li>
                    <li class="topbar-devider"></li>   
                    <li><?php echo CHtml::link('Acceso a Empresas',array('site/loginEmpresa'));?></li>  
                    <li class="topbar-devider"></li>   
                    <li><?php echo CHtml::link('Acceso a Estudiantes',array('site/loginEstudiante')); ?></li>   
                    <li class="topbar-devider"></li>   
                    <li><?php echo CHtml::link('Acceso UNITEC',array('site/login')); ?></li>   
             
                </ul>
                <!-- End Topbar Navigation -->
            </div>
        </div>
        <!-- End Topbar -->
    
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                       
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Home -->
                        <li class="dropdown active">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                INICIO
                            </a>
                           
                        </li>
                        <!-- End Home -->

                        <!-- Pages -->                        
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                PROYECTO
                            </a>
                            
                        </li>
                        <!-- End Pages -->

                        <!-- Features -->
                        <li class="dropdown mega-menu-fullwidth">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                PRÁCTICA
                            </a>
                            
                        </li>
                        <!-- End Features -->

                        <!-- Portfolio -->
                        <li class="dropdown mega-menu-fullwidth">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                ASESORES
                            </a>
                            
                        </li>
                        <!-- Ens Portfolio -->

                        <!-- Blog -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                JEFES
                            </a>
                            
                        </li>
                        <!-- End Blog -->

                        <!-- Contacts -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                FAQ
                            </a>
                           
                        </li>                    
                        <!-- End Contacts -->

                        <!-- Search Block -->
                        <li>
                            <i class="search fa fa-search search-btn"></i>
                            <div class="search-open">
                                <div class="input-group animated fadeInDown">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn-u" type="button">Go</button>
                                    </span>
                                </div>
                            </div>    
                        </li>
                        <!-- End Search Block -->
                    </ul>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header ===-->    
<?php echo $content; ?>

    <!--=== Footer Version 1 ===-->
    <div class="footer-v1">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>OBJETIVO</h2></div>
                        <p>El gestor de proyectos y practicas profesionales de UNITEC fue creado por alumnos para alumnos. </p>
                        <p>Jefes académicos y asesores trabajan en equipo con sus alumnos con el objetivo de culminar la estapa universitaria.</p>    
                    </div><!--/col-md-3-->
                    <!-- End About -->

                    <!-- Latest -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>PROYECTO</h2></div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">Acerca Del Proyecto</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Objetivo Del Proyecto</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Presentación a Terna </a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Acerca del Desarrollo</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Recomendaciones</a><i class="fa fa-angle-right"></i></li>
                        </ul>
                    </div><!--/col-md-3-->  
                    <!-- End Latest --> 
                    
                    <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>UNITEC</h2></div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">Sitio Web</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Carreras</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">Portal</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">CRAI</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">CAP</a><i class="fa fa-angle-right"></i></li>
                        </ul>
                    </div><!--/col-md-3-->
                    <!-- End Link List -->                    

                    <!-- Address -->
                    <div class="col-md-3 map-img md-margin-bottom-40">
                        <div class="headline"><h2>CONTACTANOS </h2></div>                         
                        <address class="md-margin-bottom-40">
                            Campus Tegucigalpa<br />
                            Campus San Pedro Sula<br />
                            Sede La Ceiba <br />
                            CEUTEC Los Proceres y El Pdrado <br />
                            Email: <a href="mailto:admisionesteg@unitec.edu" class="">admisionesteg@unitec.edu</a>
                        </address>
                    </div><!--/col-md-3-->
                    <!-- End Address -->
                </div>
            </div> 
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">                     
                        <p>
                            2015 &copy; Todos los derechos reservados
                           <a href="#">Henry Arévalo</a> | <a href="#">Proyecto de Graduación</a>
                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-6">
                        <ul class="footer-socials list-inline">
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Social Links -->
                </div>
            </div> 
        </div><!--/copyright-->
    </div>
    <!--=== End Footer Version 1 ===-->
</div><!--/wrapper-->

<!-- JS Global Compulsory -->			
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jquery.parallax.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/custom.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/fancy-box.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/owl-carousel.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/revolution-slider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/forms/order.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/flexslider/jquery.flexslider-min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initParallaxBg();
        App.initSliders();      
        FancyBox.initFancybox();
        OwlCarousel.initOwlCarousel();        
        RevolutionSlider.initRSfullWidth();
        OrderForm.initOrderForm();   
        
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>