
 <!--Profile Body-->
                    <div class="profile-body">
                        


                        <div class="headline"><h2><?php echo Curso::model()->findByPk($IdCurso)->CursoCompleto2; ?></h2></div>

                        <div class="table-search-v2 margin-bottom-20">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Estudiante</th>
                                        <th class="hidden-sm">Info</th>
                                        <th>Estado</th>
                                        <th>Acciones  <?php echo CHtml::link('<i class="fa fa-download pull-right"></i>',array('UsuarioUnitec/ExcelEPC', 'Seccion'=>$IdCurso),array( 'style'=>'color:#c4161c')); ?></th>
                                       

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($Companieros as $Estudiante):?>
                                       <div class="form">
                                    <?php echo CHtml::beginForm(); ?>

                                    <?php if($Estudiante->userEstudiante->Activo == 1):?>

                                    <tr>
                                        <td>
                                      <!--       <img class="rounded-x" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img1.jpg" alt=""> -->
                                    <?php if($Estudiante->userEstudiante->Imagen != ""):?>

                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$Estudiante->userEstudiante->Imagen,"image",array("class"=>'rounded-x')); ?>
                                    
                                     <?php endif ?>  

                                     <?php if($Estudiante->userEstudiante->Imagen == ""):?>

                                     <?php $a = array("unitecUser.png", "unitecUser.png") ; echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/'. $a[rand(0,1)] ,"image",array("class"=>'rounded-x')); ?>

                                     <?php endif ?>  
                                        </td>
                                        <td class="td-width">
                                            <h3><a href="#"><?php echo $Estudiante->userEstudiante->NombreCompleto ?></a></h3>
                                            <?php if($Estudiante->userEstudiante->DescripcionPersonal =="") :?>
                                            <p align="justify">Hola, soy estudiante de la carrera de <?php echo $Estudiante->userEstudiante->carrera->NombreCarrera ; ?>  en UNITEC. Pronto actualizaré mi perfil público, he estado medio ocupado.</p>
                                            <?php endif ?>

                                            <?php if($Estudiante->userEstudiante->DescripcionPersonal !="") :?>
                                            <p align="justify"> <?php echo substr($Estudiante->userEstudiante->DescripcionPersonal ,0,133). ".." ;?> </p>
                                            <?php endif ?>

                                            <small class="hex">Registrado(a) desde: <?php echo  date("F j, Y, g:i a", strtotime($Estudiante->userEstudiante->FechaCreacion));  ; ?> </small>
                                        </td>
                                        <td>
                                            

                                            <?php if( UsuarioEstudiante::model()->EstadoVerificarEtiqueta($Estudiante->userEstudiante->IdUsuarioEstudiante,$IdCurso) == 0):?>

                                                
                                              <span class="label rounded-2x label-warning ">

                                            <?php endif ?>

                                             <?php if( UsuarioEstudiante::model()->EstadoVerificarEtiqueta($Estudiante->userEstudiante->IdUsuarioEstudiante,$IdCurso) == 1):?>

                                                
                                              <span class="label rounded-2x label-success ">

                                            <?php endif ?>


                                             <?php if( (UsuarioEstudiante::model()->EstadoVerificarEtiqueta($Estudiante->userEstudiante->IdUsuarioEstudiante,$IdCurso) != 1) and (UsuarioEstudiante::model()->EstadoVerificarEtiqueta($Estudiante->userEstudiante->IdUsuarioEstudiante,$IdCurso) != 0 )):?>

                                                
                                              <span class="label rounded-2x label-danger">

                                            <?php endif ?>




                                                 <?php echo UsuarioEstudiante::model()->EstadoToString($Estudiante->userEstudiante->IdUsuarioEstudiante,$IdCurso);?> </span>
                                        </td>
                                        <td>
                                            <?php if(PracticasPorAlumno::model()->obtenerEmpresaDePracticaBoolean($IdCurso,$Estudiante->userEstudiante->IdUsuarioEstudiante) == 0) :?>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                     <i style="color:#920637" class="fa fa-folder-open fa-lg"></i>

                                                </li>
                                                <li>
                                                    <i style="color:#920637" class="fa fa-pencil-square-o fa-lg"></i>

                                                </li>
                                                <li>                                                    
                                                        <i style="color:#920637" class="fa  fa-car fa-lg"></i>
                                                </li>
                                                
                                                <li>
                                                        <i style="color:#920637" class="fa fa-building fa-lg"></i>
                                                </li>
                                                <li>
                                                        <i style="color:#920637" class="fa fa fa-line-chart fa-lg"></i>
                                                </li>
                                                
                                            </ul>
                                             <?php endif ?>

                                                <?php if(PracticasPorAlumno::model()->obtenerEmpresaDePracticaBoolean($IdCurso,$Estudiante->userEstudiante->IdUsuarioEstudiante)) :?>
                                                          <ul class="list-inline s-icons">
                                                <li>
                                                    <?php if(PracticasPorAlumno::model()->obtenerEmpresaDePracticaBoolean($IdCurso,$Estudiante->userEstudiante->IdUsuarioEstudiante)) :?>
                                                     <?php echo CHtml::link('<i class="fa fa-folder-open fa-lg"></i>',array('UsuarioUnitec/VerAsesoramientos',  'curso'=>$IdCurso,'Practica'=>PracticasPorAlumno::model()->obtenerCodigoDePractica($IdCurso,$Estudiante->userEstudiante->IdUsuarioEstudiante),'Estudiante'=>$Estudiante->userEstudiante->IdUsuarioEstudiante),array('data-placement'=>'top', 'data-toggle'=>'tooltip', 'class'=>'tooltips', 'data-original-title'=>'Ver Asesoramientos' )); ?>
                                                     <?php endif ?>
                                                </li>
                                                <?php if( AlumnosPorCurso::model()->EstadoAlumnoEnCurso($IdCurso,$Estudiante->userEstudiante->IdUsuarioEstudiante) == true):?>
                                                <li>
                                                        <?php echo CHtml::link('<i class="fa fa-pencil-square-o fa-lg"></i>',array('UsuarioUnitec/CrearAsesoramiento',  'curso'=>$IdCurso,'Practica'=>PracticasPorAlumno::model()->obtenerCodigoDePractica($IdCurso,$Estudiante->userEstudiante->IdUsuarioEstudiante),'Estudiante'=>$Estudiante->userEstudiante->IdUsuarioEstudiante),array('data-placement'=>'top', 'data-toggle'=>'tooltip', 'class'=>'tooltips', 'data-original-title'=>'Crear Asesoramiento' )); ?>

                                                </li>
                                                <li>
                                                    <a 'data-placement'="top" data-toggle="tooltip" class="tooltips" data-original-title="Crear Visita" href="#">
                                                        <i class="fa  fa-car fa-lg"></i>
                                                    </a>
                                                </li>
                                                
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Ver Visitas" href="#">
                                                        <i class="fa fa-building fa-lg"></i>
                                                    </a>
                                                </li>
                                                <!-- <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Actividad a Nivel del Tiempo" href="#">
                                                        <i class="fa fa fa-line-chart fa-lg"></i>
                                                    </a>
                                                </li> -->
                                                
                                            </ul>
                                            <?php endif ?>
                                                                                                 <?php endif ?>



                                            <span><a href="#"><?php echo $Estudiante->userEstudiante->Email ?></a></span>
                                            <span><a href="#"><?php echo PracticasPorAlumno::model()->obtenerEmpresaDePractica($IdCurso,$Estudiante->userEstudiante->IdUsuarioEstudiante) ;?></a></span>
                                        </td>
                                    </tr>
                                       <?php endif ?> 
                              <?php echo CHtml::endForm(); ?>     
                              </div><!-- form -->

                           <?php endforeach;?>             
                                    
                                </tbody>
                            </table>
                        </div> 

                    </div>
   <?php echo CHtml::link('Mis Cursos',array('UsuarioUnitec/MisCursos'), array('class'=>'btn-u ')); ?>   

                </div>
   