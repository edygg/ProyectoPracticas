


 <!--Profile Body-->
                    <div class="profile-body">
                        <div class="profile-bio">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="img-responsive profile-img margin-bottom-20" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/<?php $a = array("empresa.png", "empresa2.png")  ; echo $a[rand(0,1)] ;?>"   alt="">
                                </div>
                                <div class="col-md-7">
                                    <h2><?php echo  $model->NombreEmpresa;   ?></h2>
                                    <span><strong>Teléfono :</strong> <?php echo  $model->TelefonoEmpresa;   ?> </span> 
                                    <span><strong>Rubro :</strong> <?php echo  $model->RubroEmpresa; ?></span>
                                    <span><strong>Correo  :</strong> <?php echo  $model->CorreoEmpresa; ?></span>
                                    <span><strong>Website :</strong> <?php echo  $model->SitioWebEmpresa; ?></span>
                                    <hr>
                                    

                                    <?php if ( ($model->Mision == "") or ($model->Vision == "" )) : ?>
                                    <p>Un poco acerca del estudiante, una breve reseña de si mismo o algo asi. Por ahora esta información se llena desde editar perfil. Integer nulla felis, porta suscipit nulla et, dignissim commodo nunc. Morbi a semper nulla.</p>
                                    <p>Proin mauris odio, pharetra quis ligula non, vulputate vehicula quam. Nunc in libero vitae nunc ultricies tincidunt ut sed leo. Sed luctus dui ut congue consequat. Cras consequat nisl ante, nec malesuada velit pellentesque ac. Pellentesque nec arcu in ipsum iaculis convallis.</p>
                                   <?php endif; ?>
                                   
                                  <?php if (($model->Mision != "" ) && ($model->Vision != "" )): ?>
                                   <p align="justify"> <?php echo $model->Mision ;?> </p>
                                    <p align="justify"> <?php echo $model->Vision ;?> </p>
                                  <?php endif; ?>

                                </div>
                            </div>    
                        </div><!--/end row-->
                                
                        <hr>

          <!--           <div class="row margin-bottom-20">

                        <div class="col-sm-6">
                            <div class="panel panel-profile no-bg">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Prácticas Archivadas </h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                <div id="scrollbar" class="panel-body contentHolder">
                                    <div class="profile-post color-one">
                                        <span class="profile-post-numb">22</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Asistente de RH</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres... </p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-two">
                                        <span class="profile-post-numb">21</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Diseñador Gráfico</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-three">
                                        <span class="profile-post-numb">20</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Analista Programador</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-four">
                                        <span class="profile-post-numb">19</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Supervisor de Calidad</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-five">
                                        <span class="profile-post-numb">18</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#"></a>Analista de Sistemas</h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-six">
                                        <span class="profile-post-numb">17</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Diseñador Web</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-seven">
                                        <span class="profile-post-numb">16</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Desarrollador de software</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>


                        <div class="col-sm-6">
                            <div class="panel panel-profile no-bg">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-cubes"></i>Proyectos Archivados </h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                <div id="scrollbar" class="panel-body contentHolder">
                                    <div class="profile-post color-one">
                                        <span class="profile-post-numb">08</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Sistema de Control de Asistencia</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-two">
                                        <span class="profile-post-numb">07</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Implementación de Servidores meraki</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-three">
                                        <span class="profile-post-numb">06</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Sistema de control de Inventario</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-four">
                                        <span class="profile-post-numb">05</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Sistema De Control De Activos</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-five">
                                        <span class="profile-post-numb">04</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Sistema de gestion Escolar</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-six">
                                        <span class="profile-post-numb">03</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Generador de Examenes </a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                    <div class="profile-post color-seven">
                                        <span class="profile-post-numb">02</span>
                                        <div class="profile-post-in">
                                            <h3 class="heading-xs"><a href="#">Sistema de control de rutas</a></h3>
                                            <p>Una descripción del puesto que despierte ineteres...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>

                        <hr>  
                        
                    </div> -->

                    
              
                    <!--End Profile Body-->

                    <!--Table Search v2-->
                    <div class="table-search-v2 margin-bottom-20">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Equipo </th>
                                        <th class="hidden-sm">Acerca De</th>
                                        <th>Puesto</th>
                                        <th>Contacto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($Usuarios as $usuario):?>
                                         <tr>
                                        <td>
                                            <img class="rounded-x" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img1.jpg" alt="">
                                        </td>
                                        <td class="td-width">
                                            <h3><a href="#"><?php  echo $usuario->NombreCompleto; ?></a></h3>
                                             <?php if ( $usuario->DescripcionPersonal == "")  : ?>
                                            <p align="justify">Me siento contento de ser parte del Sistema, pronto publicaré algunas plazas para los estudiantes de UNITEC.</p>
                                            <?php endif; ?>
                                   
                                  <?php if ($usuario->DescripcionPersonal != ""  ): ?>
                                   <p align="justify" > <?php echo substr($usuario->DescripcionPersonal,0,112) . "..." ;?> </p>
        
                                  <?php endif; ?>

                                           
                                            <small class="hex">Registrado Desde: <?php echo  date("F j, Y, g:i a", strtotime($usuario->FechaVerificacion));  ?></small>
                                        </td>
                                        <td>
                                            <span class="label label-success"><?php echo $usuario->PuestoEmpresa; ?></span>
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
                                            <span><a href="#"><?php echo $usuario->CorreoElectronico; ?></a></span>
                                            <span><a href="#"><?php echo $usuario->PuestoEmpresa; ?></a></span>
                                        </td>
                                    </tr>



                                    <?php endforeach;?>

                                 
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!--End Table Search v2-->

                      </div>
 