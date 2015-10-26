
 <!--Profile Body-->
                    <div class="profile-body">
                        <div class="profile-bio">
                            <div class="row">
                                <div class="col-md-5">


                                    <?php if($model->Imagen != ""):?>

                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$model->Imagen,"image",array("class"=>'img-responsive md-margin-bottom-10')); ?>
                                    
                                     <?php endif ?>  

                                     <?php if($model->Imagen == ""):?>

                                     <?php echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/unitecUser.png',"image",array("class"=>'img-responsive md-margin-bottom-10')); ?>

                                     <?php endif ?>  

                                    
                                </div>
                                <div class="col-md-7">
                                    <h2><?php echo  ucwords(strtolower($model->Nombre . " ".$model->PrimerApellido)) ;   ?></h2>
                                    <span><strong>Carrera:</strong> <?php echo $model->carrera->tipoCarrera->Nombre  . " - " .  $model->carrera->NombreCarrera ; ?> </span> 
                                    <span><strong>Correo:</strong> <?php echo  $model->Email; ?></span>
                                    <hr>
                                    

                                    <?php if ( ($model->ObjetivoProfesional == "") or ($model->DescripcionPersonal == "" )) : ?>
                                    <p align="justify">Hola, mi nombre es <?php  echo  ucwords(strtolower($model->NombreCompleto))  ;?> estudiante de la carrera de <?php echo $model->carrera->NombreCarrera ; ?>  en UNITEC. He estado viendo opciones de prácticas y proyectos en el portal, les invito que busquen opciones para ustedes.</p>
                                    <p>Tengo pendiente actualizar mi perfil público con mi descripción personal y objetivo profesional, estoy planeando hacerlo lo más pronto posible, si me ves por un pasillo deberias de recordarme, he estado un poco ocupado ultimamente.</p>
                                   <?php endif; ?>
                                   
                                  <?php if (($model->ObjetivoProfesional != "" ) && ($model->DescripcionPersonal != "" )): ?>
                                   <p align="justify"> <?php echo $model->ObjetivoProfesional ;?> </p>
                                    <p align="justify"> <?php echo $model->DescripcionPersonal ;?> </p>
                                  <?php endif; ?>
                                  
                                </div>
                            </div>    
                        </div><!--/end row-->

            
                    <hr class="margin-bottom-20 margin-top-15">

                    <div class="row margin-bottom-20">
                        <!--Profile Post-->
                      <div class="col-sm-6 ">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-send"></i>Notificaciones</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                <div id="scrollbar3" class="panel-body contentHolder ps-container">
                                    <div class="alert-blocks alert-blocks-pending alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <img class="rounded-x" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img3.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong class="color-yellow">Jefe Académico<small class="pull-right"><em>Just now</em></small></strong> 
                                            <p>Te ha dejado un mensaje</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-blocks-success alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <img class="rounded-x" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img2.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong class="color-green">Edición de Asesoramiento<small class="pull-right"><em>1 min ago</em></small></strong> 
                                            <p>Tu asesor ha editado un registro de asesoramiento</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-blocks-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <i class="icon-custom rounded-x icon-bg-blue fa fa-bolt"></i>
                                        <div class="overflow-h">
                                            <strong class="color-blue">Registro de Asesoramiento<small class="pull-right"><em>3 min ago</em></small></strong> 
                                            <p>Tu asesor ha creado un registro de asesoramientox</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-blocks-error alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <img class="rounded-x" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img6.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong class="color-red">Empresa <small class="pull-right"><em>5 min ago</em></small></strong> 
                                            <p>Tienes un curso que no tiene vinculación con una empresa.</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <i class="icon-custom rounded-x icon-bg-dark fa fa-magic"></i>
                                        <div class="overflow-h">
                                            <strong class="color-dark">Nuevo Curso <small class="pull-right"><em>Hace 18 horas</em></small></strong> 
                                            <p><strong>Henry Arévalo </strong> te agregó a un curso</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-blocks-pending alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <i class="icon-custom rounded-x icon-bg-yellow fa fa-info"></i>
                                        <div class="overflow-h">
                                            <strong class="color-yellow">Tu cuenta ha sido verificada <small class="pull-right"><em>Hace 1 día</em></small></strong> 
                                            <p><strong>Henry Arévalo</strong> verifico tu cuenta</p>
                                        </div>    
                                    </div>
                                <div class="ps-scrollbar-x-rail" style="width: 459px; display: none; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 320px; display: inherit; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 237px;"></div></div></div>
                            </div>
                        </div>
                        <!--End Profile Post-->

                        <!--Profile Event-->
                        <div class="col-sm-6 md-margin-bottom-20">
                            <div class="panel panel-profile no-bg">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Practicas Interesantes</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                <div id="scrollbar2" class="panel-body contentHolder">

                            <?php foreach($Practicas as $practica):?>
                                <?php echo CHtml::beginForm(); ?>

                                    <div class="profile-event">

                                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
                                        

                                        <div class="date-formats">
                                            <span><?php echo date("M", strtotime($practica->practica->FechaVencimientoPlaza)) ;?></span>
                                            <small><?php echo date("d, Y", strtotime($practica->practica->FechaVencimientoPlaza)) ;?></small>
                                        </div>
                                        <div class="overflow-h">
                                           
                                            <h3 class="heading-xs"><?php echo CHtml::link(substr($practica->practica->PuestoDesempeniar,0,20) . ".." ,array('UsuarioEstudiante/detallePractica',  'Cor'=>$practica->practica->IdPracticaProfesional)) ;?> <small> <?php echo substr($practica->practica->asesor->usuarioEmpresa->NombreEmpresa,0,17) . "...";  ?></small></h3>
                                            <p> <?php echo substr($practica->practica->ObjetivoDelCargo ,0,80) . "..."   ;?> </p>
                                        </div>    
                                    </div>
                                    <?php echo CHtml::endForm(); ?>

                            <?php endforeach;?>


                            
                                  
                                </div>    
                            </div>
                        </div>
                        <!--End Profile Event-->
                    </div><!--/end row-->
        
   
        
                </div>
                <!--End Profile Body-->


              

                
