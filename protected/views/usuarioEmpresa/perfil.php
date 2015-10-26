

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
                                    <h2><?php echo  $model->NombreCompleto ;   ?></h2>
                                    <span><strong>Puesto:</strong> <?php echo  $model->PuestoEmpresa ?> </span> 
                                    <span><strong>Tel. Fijo:</strong> <?php echo  $model->TelefonoFijo; ?></span>
                                    <span><strong>Tel. Celular:</strong> <?php echo  $model->TelefonoCelular; ?></span>
                                    <span><strong>Correo:</strong> <?php echo  $model->CorreoElectronico; ?></span>
                                    <hr>
                                    <p>Un poco acerca del estudiante, una breve reseña de si mismo o algo asi. Por ahora esta información se llena desde editar perfil. Integer nulla felis, porta suscipit nulla et, dignissim commodo nunc. Morbi a semper nulla.</p>
                                    <p>Proin mauris odio, pharetra quis ligula non, vulputate vehicula quam. Nunc in libero vitae nunc ultricies tincidunt ut sed leo.</p>
                                </div>
                            </div>    
                        </div><!--/end row-->
                    </div>
                                
     


   
