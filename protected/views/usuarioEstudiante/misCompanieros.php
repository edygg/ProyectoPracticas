
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
                                        <th>Contacto</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($Companieros as $Estudiante):?>

                                    <tr>
                                        <td>
                                            <!-- <img class="rounded-x" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img1.jpg" alt=""> -->

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
                                            <p align="justify"> <?php echo substr($Estudiante->userEstudiante->DescripcionPersonal ,0,140). ".." ;?> </p>
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
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#"><?php echo $Estudiante->userEstudiante->Email ?></a></span>
                                            <span><a href="#"><?php echo PracticasPorAlumno::model()->obtenerEmpresaDePractica($IdCurso,$Estudiante->userEstudiante->IdUsuarioEstudiante) ;?></a></span>
                                        </td>
                                    </tr>
                                   
                           <?php endforeach;?>             
                                    
                                </tbody>
                            </table>
                        </div>    
                    </div>


                </div>
   