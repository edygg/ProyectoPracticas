


<div class="profile-body margin-bottom-20">


                        <!-- Icons and Placeholders -->
                        <div class="tab-pane fade active in" id="º">
                             <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'CrearAsesoramientoParaAlumno',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/CrearNuevoAsesoramiento"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>

                                <header > Registro de Asesoramiento </header>
<div class="margin-bottom-20"></div>

    <div class="row  ">
            <div class="col-sm-6">
                <div class="tag-box tag-box-v3">
                    <h2>Estudiante</h2>
                    <ul class="list-unstyled">
                        <li><strong>Nombre:</strong> <?php echo $Estudiante->NombreCompleto ;?></li>
                        <li><strong>Cuenta:</strong> <?php echo $Estudiante->NumeroDeCuenta ;?></li>
                        <li><strong>Carrera:</strong> <?php echo $Estudiante->carrera->tipoCarrera->Nombre  . " - " .  $Estudiante->carrera->NombreCarrera ; ?></li>
                        <li><strong>Correo: </strong> <?php echo $Estudiante->Email ;?></li>
                    </ul>
                </div>        
            </div>
            <div class="col-sm-6">
                <div class="tag-box tag-box-v3">
                    <h2>Empresa</h2>        
                    <ul class="list-unstyled">
                        <li><strong>Cargo del Estudiane:</strong> <?php echo $Practica->PuestoDesempeniar ;?></li>
                        <li><strong>Departamento:</strong>  <?php echo $Practica->AreaODepartamento ;?></li>
                        <li><strong>Jefe Inmediato: </strong> <?php echo $Practica->asesor->NombreCompleto ;?></li>
                        <li><strong>Empresa:</strong> <?php echo $Practica->asesor->usuarioEmpresa->NombreEmpresa ;?></li>
                    </ul>
                </div>
            </div>
        </div>


                   

                <ul class="timeline-v2">
                    
    <?php foreach($model as $Asesoramiento):?>


                    <li>
                        <time class="cbp_tmtime" datetime=""><span><?php echo  date("F", strtotime($Asesoramiento->FechaCreacionAsesoramiento));  ; ?></span> <span><?php echo  date("jS, Y", strtotime($Asesoramiento->FechaCreacionAsesoramiento));  ; ?></span></time>
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <h2>Asesoramiento # <?php  echo $CantidadAsesoramientos ; $CantidadAsesoramientos = $CantidadAsesoramientos - 1;?></h2>
                            <p align="justify"><?php echo $Asesoramiento->Comentario ;?></p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="list-unstyled">
                                        <?php $puntos =  explode(",", $Asesoramiento->PuntosAcordados); ?>

                                            <?php foreach($puntos as $punto):?>

                                        <li><i class="fa fa-check color-green"></i> <?php echo $punto;?></li>
                                        <div class="margin-bottom-5"></div>

                                        <?php endforeach;?>

                                    


                                        
                                    </ul>
                                </div>
                                
                            </div>
                             <div class="note"><strong>Creado Por:</strong> <?php echo  ucwords(strtolower($Asesoramiento->usuarioUnitec->PrimerNombrePrimerApellido))  ; ?></div>
                            
                        </div>
                    </li>
            
<?php endforeach;?>
 
 
                </ul>
                      
                                  
                      
                                  
                                
                                     <?php $this->endWidget(); ?>
                            
                        </div>


 </div>