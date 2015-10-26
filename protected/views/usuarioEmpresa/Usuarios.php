  <!--Profile Body-->
               <div class="profile-body margin-bottom-20">   
           <?php     $bandera= 0 ;  ?>
<?php foreach($Usuarios as $usuario):?>



<?php if( ($bandera % 2) == 0):?>
       <div class="row margin-bottom-20">                  <!--Profile Blog-->

<?php endif ?>

                            <div class="col-sm-6 sm-margin-bottom-20">
                                <div class="profile-blog">

                                       <!--       <img class="rounded-x" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/testimonials/img1.jpg" alt=""> -->
                                    <?php if($usuario->Imagen != ""):?>

                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$usuario->Imagen,"image",array("class"=>'rounded-x')); ?>
                                    
                                     <?php endif ?>  

                                     <?php if($usuario->Imagen == ""):?>

                                     <?php $a = array("userUnitec.png", "userUnitec2.png") ; echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/team/'. $a[rand(0,1)] ,"image",array("class"=>'rounded-x')); ?>

                                     <?php endif ?>  

                                    <div class="name-location">
                                        <strong><?php echo $usuario->NombreCompleto;?> </strong>
                                        <span><i class="fa fa-map-marker"></i><?php echo $usuario->PuestoEmpresa;?> - <a href="#">US</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>    
                                    <?php if ( $usuario->ObjetivoProfesional == "" ) :?>
                                    <p align="justify">Me siento contento de ser parte del Sistema de Gestión de Prácticas Profesionales, pronto publicaré algunas plazas para los estudiantes de UNITEC.</p>
                                        <?php endif; ?>

                                         <?php if ( $usuario->ObjetivoProfesional != "" ) :?>
                                    <p align="justify"> <?php  echo substr($usuario->ObjetivoProfesional,0,150) . "..." ;?> </p>
                                        <?php endif; ?>

                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-phone"></i><a href="#"><?php echo $usuario->TelefonoFijo ;?></a></li>
                                        <li><i class="fa fa-mobile fa-lg"></i><a href="#"><?php echo $usuario->TelefonoCelular;?></a></li>
                                        <li><i class="fa fa-envelope"></i><a href="#">Enviar Correo</a></li>
                                    </ul>
                                </div>
                            </div>  

<?php if( ($bandera % 2) == 1):?>
       </div> <!--/end row-->       

<?php endif ?>
<?php  $bandera = $bandera + 1; ?>



<?php endforeach;?>

   </div><!--/end row-->

   <div class="row ">   
   <div class="col-sm-6 sm-margin-bottom-20">
 <button type="button" class="btn-u btn-u-default btn-block text-center">Crear Práctica</button>   
     </div>
  <div class="col-sm-6 sm-margin-bottom-20">
      <button type="button" class="btn-u btn-u-default btn-block text-center">Crear Práctica</button>   
     </div>

   </div>

                      
                        <!--End Profile Blog-->
              
                    <!--End Profile Body-->