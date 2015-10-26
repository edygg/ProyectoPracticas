
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Descripción del Cargo</h1>
            <ul class="pull-right breadcrumb">
                <li><?php echo CHtml::link('Inicio',Yii::app()->getBaseUrl(true)); ?></li>
                <li><?php echo CHtml::link('Buscar Prácticas',array('site/BuscarPP')); ?></li>
                <li class="active">Detalle Práctica</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Job Description ===-->
    <div class="job-description">
        <div class="container content">
            <div class="title-box-v2">
                <h2><?php echo $Practica->PuestoDesempeniar;?></h2>
                <h4><strong> </strong><?php echo $Practica->AreaODepartamento; ?></h4>
                
            </div>    
            <div class="row">
                <!-- Left Inner -->
                <div class="col-md-7">
                    <div class="left-inner">
                        
                        <h3><?php echo $Practica->asesor->usuarioEmpresa->NombreEmpresa . " "; ?><small><?php echo ucfirst (strtolower($Practica->asesor->usuarioEmpresa->RubroEmpresa));?> </small></h3>
                        <a href="#"><i class="position-top fa fa-print"></i></a>
                        <div class="overflow-h">
                            <p class="hex color-green"> <?php echo "#HoraEntrada #". date('g:ia', strtotime($Practica->HoraEntrada))  . " #HoraSalida: #" . date('g:ia', strtotime($Practica->HoraSalida)) ." #Empresa".$Practica->asesor->usuarioEmpresa->tipoEmpresa->NombreTipoEmpresa . " #Rubro". ucfirst (strtolower($Practica->asesor->usuarioEmpresa->RubroEmpresa)) ;?></p>
                            
                        </div>    
                        
                        <hr class="devider devider-db-dashed">
                    

                         <?php if($Practica->PosibilidadEmpleo == 1){$posibilidadDeEmpeleo = "98%" ;
                         } else { $posibilidadDeEmpeleo="10%"; }  ;  
                         ?>

                         <?php if($Practica->RequierePromedio == 1){$requierePromedio = "98%" ;
                         } else { $requierePromedio="10%"; }  ;  
                         ?>

                         <?php if($Practica->HorarioFlexible == 1){$HorarioFlexible = "98%" ;
                         } else { $HorarioFlexible="10%"; }  ;  
                         ?>
                
                
            

                        <div class="progression">
                            <span>Posibilidad de Empleo</span>
                            <div class="progress progress-u progress-xs">
                                <div style='width: <?php echo $posibilidadDeEmpeleo ;?>' aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar" class="progress-bar progress-bar-u">
                                </div>
                            </div>

                            <span>Requiere Promedio</span>
                            <div class="progress progress-u progress-xs">
                                <div style='width: <?php echo $requierePromedio ;?>' aria-valuemax="100" aria-valuemin="0" aria-valuenow="76" role="progressbar" class="progress-bar progress-bar-u">
                                </div>
                            </div>

                            <span>Horario Flexible</span>
                            <div class="progress progress-u progress-xs">
                                <div style='width: <?php echo $HorarioFlexible ;?>' aria-valuemax="100" aria-valuemin="0" aria-valuenow="97" role="progressbar" class="progress-bar progress-bar-u">
                                </div>
                            </div>
                        </div>
                        
                        <hr>

                        <h2>Objetivo del Cargo</h2>
                        <p align="justify"><?php echo $Practica->ObjetivoDelCargo;?></p>

                        <hr>

                        <h2>Responsabilidades</h2>
                        <?php $responsabilidades = explode(',', $Practica->Reponsabilidades) ;$contador=0;?>
                        <p>A continuación se resumen las reponsabilidades del cargo que el estudiante desempeñará a lo largo de su práctica profesional:</p>
                        <ul class="list-unstyled">
                            <?php foreach($responsabilidades as $reponsabilidad):?>
                            <li><i class="fa fa-check color-green"></i> <?php echo $reponsabilidad ;?> </li>
                            <?php endforeach;?>
                        </ul>

                        <hr>

                      

                      
                    </div>
                </div>
                <!-- End Left Inner -->
                
                <!-- Right Inner -->
                <div class="col-md-5"> 
                    <div class="right-inner">
                        <h3>Posteado Por:</h3>     
                        <!-- <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img1.jpg" alt=""> -->
                        <?php if($Practica->asesor->Imagen != ""):?>

                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$Practica->asesor->Imagen,"image"); ?>
                                    
                                     <?php endif ?>  

                                     <?php if($Practica->asesor->Imagen == ""):?>

                                     <?php $a = array("userUnitec.png", "userUnitec2.png") ; echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/team/'. $a[rand(0,1)] ,"image"); ?>

                                     <?php endif ?>  

                        <div class="overflow-h">
                            <span class="font-s"><?php echo ucwords (strtolower($Practica->asesor->NombreCompleto));?></span>
                            <p class="color-green"><strong>Puesto:  </strong><span class="hex"> <? echo ucfirst( strtolower($Practica->asesor->PuestoEmpresa));?></span></p>
                            <ul class="social-icons">
                                <li><a class="social_facebook" data-original-title="Facebook" href="#"></a></li>
                                <li><a class="social_googleplus" data-original-title="Google Plus" href="#"></a></li>
                                <li><a class="social_tumblr" data-original-title="Tumblr" href="#"></a></li>
                                <li><a class="social_twitter" data-original-title="Twitter" href="#"></a></li>
                            </ul>
                        </div>    
                        
                    

                        <hr class="devider devider-db-dashed">

                        

                        <div >


                    <!-- Contacts -->
                    <h3>Contáctame </h3>
                    <ul class="list-unstyled who">
                     <!--   <li><i class="fa fa-home"></i> Col. El Pedregal, 1/2 Arriba Textiles Rio Lindo</li> -->
                        <li><a href="#"><i class="fa fa-envelope"></i><?php echo $Practica->asesor->CorreoElectronico;?></a></li>
                        <li><i class="fa fa-phone"></i><?php echo $Practica->asesor->TelefonoFijo;?></li>
                        <li><a href="#"><i class="fa fa-globe"></i><?php echo $Practica->asesor->usuarioEmpresa->SitioWebEmpresa;?></a></li>
                    </ul>

                  
                </div>

                <hr>

                        <h3>Otras Practicas Similares</h3>
                        <div class="people-say margin-bottom-20">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img2.jpg" alt="">
                            <div class="overflow-h">
                                <span>Opción #1 - Empresa</span>
                                <small class="hex pull-right">5 - hours ago</small>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Duis varius hendrerit nisl id condimentum.</p>
                            </div>    
                        </div>

                        <div class="people-say margin-bottom-20">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/user.jpg" alt="">
                            <div class="overflow-h">
                                <span>Opción #1 - Empresa</span>
                                <small class="hex pull-right">2 - days ago</small>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Duis varius hendrerit nisl id condimentum.</p>
                            </div>    
                        </div>



                        <hr> 
                        <?php if (Yii::app()->user->isGuest): ?>
                    <?php echo CHtml::link('Volver',Yii::app()->request->urlReferrer, array("class"=>"btn-u btn-block")); ?>
                        <?php endif; ?>

                          <?php if (!Yii::app()->user->isGuest): ?>
                        <div class="row">
                              <div class="col-md-6"> 
                            <?php if (!Yii::app()->user->isGuest): ?>
                            <?php echo CHtml::ajaxLink(
                            $text = '<i class="fa fa-eye"></i> Guardar y Volver', 
                            $url = array('UsuarioEstudiante/AgregarPracticaAEscritorio'), 
                            $ajaxOptions=array (
                                'type'=>'POST',
                                'data'=> array('idPractica'=>$Practica->IdPracticaProfesional),
                                 'complete' => 'function() {$(location).attr("href",document.referrer);}',   
                                ), 
                            $htmlOptions=array ("class"=>"btn-u btn-block")
                            ); ?>
                            <?php endif; ?>
                        </div>

                          <div class="col-md-6"> 
                        
                        
                            <?php echo CHtml::link('Volver',Yii::app()->request->urlReferrer, array("class"=>"btn-u btn-block")); ?>
                             
                        </div>
                        </div>
                         <?php endif; ?>
                        
                    </div>   
                </div>
                <!-- End Right Inner -->
            </div>    
        </div>   
    </div>   
    <!--=== End Job Description ===