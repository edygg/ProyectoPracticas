<!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Descripción del Cargo</h1>
            <ul class="pull-right breadcrumb">
                <li><?php echo CHtml::link('Inicio',Yii::app()->getBaseUrl(true)); ?></li>
                <li><?php echo CHtml::link('Buscar Prácticas',array('UsuarioUnitec/BuscarPP')); ?></li>
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
                <h4 class="hex color-green"><?php echo CarrerasPorPractica::model()->CarrerasPorPracticaToString($Practica->IdPracticaProfesional);?> </h4>

                
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
                         <!--  <li><i class="fa fa-home"></i> Col. El Pedregal, 1/2 Arriba Textiles Rio Lindo</li> -->
                        <li><a href="#"><i class="fa fa-envelope"></i><?php echo $Practica->asesor->CorreoElectronico;?></a></li>
                        <li><i class="fa fa-phone"></i><?php echo $Practica->asesor->TelefonoFijo;?></li>
                        <li><a href="#"><i class="fa fa-globe"></i><?php echo $Practica->asesor->usuarioEmpresa->SitioWebEmpresa;?></a></li>
                    </ul>

                  
                </div>

                <hr>

                    <?php if ($Practica->Activo == 1 and $Practica->UsuarioEstudiante_IdUsuarioEstudiante != 0): ?>
                    <h3>Información de Vinculación con Estudiante</h3>
                    <?php  $estudiante =  UsuarioEstudiante::model()->findByPk($Practica->UsuarioEstudiante_IdUsuarioEstudiante);?>

                    <div class="people-say margin-bottom-20">

                            <?php if ($estudiante->Imagen != ""): ?>
                          <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'. $estudiante->Imagen); ?> 
                          <?php endif; ?>
                          <?php if ($estudiante->Imagen == ""): ?>
                          <?php echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/unitecUser.png'); ?> 
                          <?php endif; ?>

                            <div class="overflow-h">
                                <span><?php echo ucwords(strtolower($estudiante->NombreCompleto))  ;?></span>
                                <small class="hex pull-right">Vinculado Desde: <?php echo  date("F j, Y", strtotime($Practica->FechaVinculacion));  ; ?> </small>
                                <p>Vinculado Por: <?php echo $Practica->VinculadoPor ;?></p>
                            </div>    
                        </div>

                         <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'VerificarPractica',
                                     'action' =>  Yii::app()->createUrl("UsuarioUnitec/EliminarVinculacion"), 
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                      <?php echo  $form->hiddenField($Practica,'UsuarioEstudiante_IdUsuarioEstudiante', array('name' => 'Estudiante')); ?>
                                      <?php echo  $form->hiddenField($Practica,'IdPracticaProfesional', array('name' => 'Practica')); ?>
                         <button type="submit" class="btn-u btn-block" >Eliminar Vinculación</button>

                         <?php $this->endWidget(); ?>

                    <?php endif; ?>

                    <?php if ($Practica->Activo == 1 and $Practica->UsuarioEstudiante_IdUsuarioEstudiante == 0): ?>
                        <h3>Vinculación Estudiante</h3>
                        
                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'VincularAlumnos',
                                     'action' =>  Yii::app()->createUrl("UsuarioUnitec/VincularAlumnoConPractica"), 
                                        'enableAjaxValidation'=>false,
                                    )); ?>

                              <hr style="visibility: hidden">     

                                    <?php echo  $form->hiddenField($Practica,'IdPracticaProfesional', array('name' => 'Practica')); ?>

                        <?php                                   
                                        $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Carrera',
                                                'id'=>'Carrera',
                                                'data' => CarrerasPorPractica::model()->ListaCarrerasPorPractica($Practica->IdPracticaProfesional),
                                                'htmlOptions' => array(
                                                'placeholder'=>'Seleccione la  Carrera del Estudiante', 
                                                 "ajax"=>array(
                                                "url" =>$this->createUrl("usuarioUnitec/CargarCursosPorCarrera") ,
                                                "type"=>"POST",
                                                "update"=>"#Cursos",
                                                'beforeSend' => 'function() {           
                                                 $("#Cursos").empty();$("#Alumno").empty();
                                                }',
                                                ),
                                                ),
                                                'options'=>array('width' => '100%'),
                                                'events'=> array( "change" => 'js:function(){ $("#Cursos").select2("val", "");$("#Alumno").select2("val", "");}')
                                            )
                                        );
                                  ?>
                            
                                <hr style="visibility: hidden">
         <?php 
                                  

                                        $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Cursos',
                                                'htmlOptions' => array(
                                                'placeholder'=>'Seleccione el Curso',
                                                "ajax"=>array(
                                                "url" =>$this->createUrl("usuarioUnitec/ListaAlumnosPorCurso") ,
                                                "type"=>"POST",
                                                "update"=>"#Alumno",
                                                ),
                                                ),
                                                'options'=>array('width' => '100%'),                                                  
                                                'events'=> array( "change" => 'js:function(){ $("#Alumno").select2("val", "");}')
                                            )
                                        );  
                                  ?>

                                   <?php 
                                      echo CHtml::ajaxLink(
                                          $text = 'Cargar Estudiantes', 
                                          $url = CController::createUrl('ListaAlumnosPorCurso'),
                                          $ajaxOptions=array (
                                              'type'=>'POST',
                                              'update'=>'#Alumno',
                                              'events'=> array( "change" => 'js:function(){ $("#Alumno").select2("val", "");}')
                                              ), 
                                          $htmlOptions=array ()
                                          );
                                      ?>
                                                                  <hr style="visibility: hidden">

                                     

                                    <?php 
                                  

                                        $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Alumno',
                                                'htmlOptions' => array(
                                                'placeholder'=>'Seleccione el Estudiante',
                                                ),
                                                'options'=>array('width' => '100%'),                                                  
                                               
                                            )
                                        );
                                  ?>


                        <hr> 
                        <?php if (!Yii::app()->user->isGuest): ?>
                        <button type="submit" class="btn-u btn-block">Vincular</button>
                    
                        <?php endif; ?>

                              <?php $this->endWidget(); ?>

                         <?php endif; ?>     

                         <?php if ($Practica->Activo == 0): ?> 

                        

                           <h3 align="center">Verificar Práctica Profesional</h3>
                        
                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'VerificarPractica',
                                     'action' =>  Yii::app()->createUrl("UsuarioUnitec/VerificarPractica"), 
                                        'enableAjaxValidation'=>false,
                                    )); ?>

                                      <?php echo  $form->hiddenField($Practica,'IdPracticaProfesional', array('name' => 'Practica')); ?>
                         <button type="submit" class="btn-u btn-block">Verificar</button>

                         <?php $this->endWidget(); ?>

                        <?php endif; ?> 
                        
                    </div>   
                </div>
                <!-- End Right Inner -->
            </div>    
        </div>   
    </div>   
    <!--=== End Job Description ===-->