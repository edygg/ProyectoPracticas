<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>UNITEC - PGPP</title>



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
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/scrollbar/src/perfect-scrollbar.css">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/pages/profile.css">

    <!-- CSS Theme -->    
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/css/theme-colors/dark-blue.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/pages/feature_timeline2.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/custom.css">
</head> 

<body>
<div class="wrapper">
  
     <!--=== Header ===-->    
    <div class="header">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
               <!-- Topbar Navigation -->
                <ul class="loginbar pull-right">
                  
                   <?php if (Yii::app()->user->isGuest): ?>
                    <li>
                        <i class="fa fa-globe"></i>
                        <a>Registrate</a>
                        <ul class="languages">

                            <li><?php echo CHtml::link('Estudiantes',array('UsuarioEstudiante/create')); ?></li>
                            <li><?php echo CHtml::link('UNITEC',array('UsuarioUnitec/create'));?></li>
                            <li><?php echo CHtml::link('Empresa',array('UsuarioEmpresa/create')); ?></li>

                        </ul>
                    </li>


                    <li class="topbar-devider"></li>  
                        <li>
                        <i class="fa fa-power-off"></i>
                        <a>Iniciar Sesión</a>
                        <ul class="languages">

                            <li><?php echo CHtml::link('Estudiantes',array('site/loginEstudiante')); ?></li>
                            <li><?php echo CHtml::link('UNITEC',array('site/login'));?></li>
                            <li><?php echo CHtml::link('Empresa',array('site/loginEmpresa')); ?></li>         
                        </ul>
                    </li>
                    <?php endif; ?>
                       <?php if (!Yii::app()->user->isGuest): ?> 
                        <li>
                        <i class="fa  fa-sign-out"></i>
                            <li><?php echo CHtml::link('Cerrar Sesión '.Yii::app()->user->name ,array('/site/logout')); ?></li>
                        <ul class="languages">

                      
                                   
                        </ul>
                    </li>
                    <?php endif; ?>
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

                    <a class="navbar-brand" href="#">
                        <img id="logo-header"  src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/unitecLogo.png" alt="Logo">
                    </a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                       
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                      <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=> array("class"=>"nav navbar-nav",  ),
                    'items'=>array(
                        array('label'=>'Prácticas','encodeLabel' => false, 'url'=>array('UsuarioUnitec/ViculacionAlumnosPracticas'), 'active'=>$this->action->id=='ViculacionAlumnosPracticas',array('class'=>'nav navbar-nav')),
                        array('label'=>'Mi Perfil','encodeLabel' => false, 'url'=>array('usuarioUnitec/editarPerfil'), 'active'=>$this->action->id=='editarPeril',array('class'=>'nav navbar-nav')),
                   
                    ),
                )); ?> 

                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header ===-->    

    <!--=== Profile ===-->
    <div class="profile container content">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">

                <img class="img-responsive profile-img margin-bottom-20" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/team/<?php $a = array("userUnitec.png", "userUnitec2.png")  ; echo $a[rand(0,1)] ;?>"   alt="">

   

                    <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i> Acerca de Mi</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>

                    <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=> array("class"=>"list-group sidebar-nav-v1 margin-bottom-20", 'id'=>"sidebar-nav-1" ),
                   
                    'items'=>array(
                        
                        array('label'=>'<i class="fa fa-user"></i> Mi Perfil  ','encodeLabel' => false, 'url'=>array('usuarioUnitec/perfil'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='perfil', 'itemOptions'=>array('class' => 'list-group-item')),
                       array('label'=>'<i class="fa fa-cogs"></i> Editar Perfil ','encodeLabel' => false, 'url'=>array('usuarioUnitec/editarPerfil'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='editarPerfil', 'itemOptions'=>array('class' => 'list-group-item'))
                    ),
                )); ?> 

                  <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i>Acciones de Asesor </h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>

                  <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=> array("class"=>"list-group sidebar-nav-v1 margin-bottom-20", 'id'=>"sidebar-nav-1" ),
                   
                    'items'=>array(
                        array('label'=>'<i class="fa fa-users"></i> Mis Cursos','encodeLabel' => false, 'url'=>array('usuarioUnitec/misCursos'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='misCursos', 'itemOptions'=>array('class' => 'list-group-item')),
                        array('label'=>'<i class="fa fa-table"></i> Reportes','encodeLabel' => false, 'url'=>array('usuarioUnitec/perfil'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='', 'itemOptions'=>array('class' => 'list-group-item'))
                    ),
                )); ?> 
                 

                        <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i>Acciones de Jefe Académico</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>

                  <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=> array("class"=>"list-group sidebar-nav-v1 margin-bottom-20", 'id'=>"sidebar-nav-1" ),
                   
                    'items'=>array(
                        array('label'=>'<i class="fa fa-check-square-o"></i> Verificar Usuarios / Prácticas','encodeLabel' => false, 'url'=>array('usuarioUnitec/verificarUsuarios'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='verificarUsuarios', 'itemOptions'=>array('class' => 'list-group-item')),
                        array('label'=>'<i class="fa fa-search-plus"></i> Administrar Estudiantes','encodeLabel' => false, 'url'=>array('usuarioUnitec/matricularAlumnos'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='matricularAlumnos', 'itemOptions'=>array('class' => 'list-group-item')),
                        array('label'=>'<i class="fa fa-table"></i> Reportes','encodeLabel' => false, 'url'=>array('usuarioUnitec/perfil'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='', 'itemOptions'=>array('class' => 'list-group-item'))
                        
                    ),
                )); ?> 

                             <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i>Configuración del Sistema</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>

                  <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=> array("class"=>"list-group sidebar-nav-v1 margin-bottom-20", 'id'=>"sidebar-nav-1" ),
                   
                    'items'=>array(
                        array('label'=>'<i class="fa fa-university"></i> Parametrizacion de Campos','encodeLabel' => false, 'url'=>array('usuarioUnitec/parametrizarCampos'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='parametrizarCampos', 'itemOptions'=>array('class' => 'list-group-item')),
                        array('label'=>'<i class="fa fa-calendar"></i> Periodos  Académicos','encodeLabel' => false, 'url'=>array('usuarioUnitec/PeriodoAcademico'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='PeriodoAcademico', 'itemOptions'=>array('class' => 'list-group-item')),
                        array('label'=>'<i class="fa fa-folder"></i> Cursos','encodeLabel' => false, 'url'=>array('usuarioUnitec/Cursos'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>$this->action->id=='Cursos', 'itemOptions'=>array('class' => 'list-group-item'))
                       
                       
                        
                    ),
                )); ?> 
                 

            </div>
            <!--End Left Sidebar-->
            



            <div class="col-md-9">
           <!--  aqui iva todo el contenido -->


<?php if(($mensajesFlashes=Yii::app()->user->getFlashes())!==null):?>
 <!-- <div class="tab-v2 margin-bottom-10"> -->
<?php foreach($mensajesFlashes as $type => $mensaje):?>
 <!-- <div class="margin-bottom-15"></div> -->
 <div class="alert alert-<?php echo $type ?> fade in alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <?php echo  $mensaje  ?>
 </div>

<?php endforeach ?>
<!-- </div> -->
<?php endif ?>



            <?php echo $content; ?>

            </div>



        </div><!--/end row-->
    </div><!--/container-->    
    <!--=== End Profile ===-->





   
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
 <!-- <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jquery/jquery.min.js"></script>  -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jquery/jquery-migrate.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script> --> 
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/counter/jquery.counterup.min.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/circles-master/circles.js"></script>
<!-- Scrollbar -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/scrollbar/src/jquery.mousewheel.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/scrollbar/src/perfect-scrollbar.js"></script>
<!-- Validation Form -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/sky-forms/version-2.0.1/js/jquery.validate.min.js"></script>
<!-- Datepicker Form -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js"></script>
<!-- Scrollbar -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/scrollbar/src/jquery.mousewheel.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/scrollbar/src/perfect-scrollbar.js"></script>
<!-- Checkout Form -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/sky-forms/version-2.0.1/js/jquery.maskedinput.min.js"></script>



<!-- JS Customization -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/custom.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/app.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/forms/reg.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/forms/checkout.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/datepicker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/circles-master.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/19a7b876/jquery.ba-bbq.js"></script>
<script type="text/javascript">

    jQuery(document).ready(function() {
         App.init();
         App.initCounter();
        RegForm.initRegForm();
        Datepicker.initDatepicker();      
        CheckoutForm.initCheckoutForm(); 
        CirclesMaster.initCirclesMaster1(); 
             
    });

</script>
<script>
    jQuery(document).ready(function ($) {
        "use strict";
        $('.contentHolder').perfectScrollbar();
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
<![endif]-->

</body>
</html> 