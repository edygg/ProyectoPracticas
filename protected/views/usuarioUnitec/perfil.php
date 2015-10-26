
                    <div class="profile-body">
                        <div class="profile-bio">
                            <div class="row">
                                <div class="col-md-5">
                                    
                                    <?php if($model->Imagen != ""):?>

                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$model->Imagen,"image",array("class"=>'img-responsive md-margin-bottom-10')); ?>
                                    
                                     <?php endif ?>  

                                     <?php if($model->Imagen == ""):?>

                                     <?php $a = array("userUnitec.png", "userUnitec2.png") ; echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/team/'. $a[rand(0,1)] ,"image",array("class"=>'img-responsive md-margin-bottom-10')); ?>

                                     <?php endif ?>  
                                </div>
                                <div class="col-md-7">
                                    <h2><?php echo   ucwords(strtolower($model->Nombre . " ".$model->PrimerApellido)) ;   ?></h2>
                                    <!-- <span><strong>Asesorando :</strong> </span>  -->
                                    <span><strong>Correo:</strong> <?php echo  $model->Email; ?></span>
                                    <hr>
                                    <?php if ( ($model->ObjetivoProfesional == "") or ($model->DescripcionPersonal == "" )) : ?>
                                    <p align="justify">Hola, mi nombre es <?php echo  ucwords(strtolower($model->NombreCompleto));  ?>, he estado ocupado asesorando a mis estudiantes, proximamente voy a actualizar mi perfil público.</p>
                                    <p align="justify">¿Ya has buscado opciones para hacer su práctica o proyecto de graduación?, no esperen más! Podes ir al opción Práctica o Proyecto en la barra superior y realizar filtros por empresas. Te felicito, si estas aqui es por que ya casi terminas la universidad, Exitos!</p>
                                   <?php endif; ?>
                                   
                                  <?php if (($model->ObjetivoProfesional != "" ) && ($model->DescripcionPersonal != "" )): ?>
                                   <p align="justify"> <?php echo $model->ObjetivoProfesional ;?> </p>
                                    <p align="justify"> <?php echo $model->DescripcionPersonal ;?> </p>
                                  <?php endif; ?>

                                </div>
                            </div>    
                        </div>
                      
    </div>		
    
