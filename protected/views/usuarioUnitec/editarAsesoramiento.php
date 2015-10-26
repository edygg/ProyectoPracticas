


<div class="profile-body margin-bottom-20">
<div class="tab-content">


                        <!-- Icons and Placeholders -->
                        <div class="tab-pane fade active in" id="home-1">
                             <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'CrearAsesoramientoParaAlumno',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/actualizarDatosAsesoramiento"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>

                                <header>Editando Registro de Asesoramiento  -  <?php echo ucwords(strtolower(UsuarioEstudiante::model()->findbyPk($model->UsuarioEstudiante_IdUsuarioEstudiante)->NombreCompleto))   ?> </header>

                                
                                <fieldset> 
         
                                 
                            <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Empresa</label>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                           <?php echo $form->textField($practica->asesor->usuarioEmpresa,'NombreEmpresa',array('disabled' => true,'readonly' => true)); ?>
                                        </label>
                                     
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">Nombre del Puesto</label>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>  
                                        <?php echo $form->textField($practica,'PuestoDesempeniar',array('disabled' => true)); ?>
                                        </label>
                                    </section>
                             </div>

                       <div class="table-search-v2 margin-bottom-20">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Jefe Inmediato</th>
                                        <th class="hidden-sm">Información Básica</th>
                                        <th>Contácto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                              <?php if($practica->asesor->Imagen != ""):?>

                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$practica->asesor->Imagen,"image",array("class"=>'rounded-x')); ?>
                                    
                                     <?php endif ?>  

                                     <?php if($practica->asesor->Imagen == ""):?>

                                     <?php $a = array("userUnitec.png", "userUnitec2.png") ; echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/team/'. $a[rand(0,1)] ,"image",array("class"=>'rounded-x')); ?>

                                     <?php endif ?>  
                                        </td>
                                        <td class="td-width">
                                            <h3><a href="#"><?php echo $practica->asesor->NombreCompleto;?></a></h3>
                                           
                                        <?php if ( $practica->asesor->DescripcionPersonal == "")  : ?>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <?php endif; ?>
                                   
                                  <?php if ($practica->asesor->DescripcionPersonal != ""  ): ?>
                                   <p > <?php echo substr($practica->asesor->DescripcionPersonal,0,112) . "..." ;?> </p>
        
                                  <?php endif; ?>
                                           


                                            <small class="hex">Registrado desde:  <?php echo " " .  date(" M j, Y", strtotime($practica->asesor->FechaVerificacion));  ; ?>    </small>
                                        </td>
                                      
                                        <td>
                                            <span><?php echo " +(504) ". $practica->asesor->TelefonoCelular; ?></span>
                                            <span><?php echo $practica->asesor->CorreoElectronico; ?></span>
                                            <span><?php echo $practica->asesor->usuarioEmpresa->SitioWebEmpresa; ?> </span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>    
                    </div>
                         
                                </fieldset>
                                    
                                <fieldset>  
                                     <section>
                                        <label class="label">Comentarios</label>
                                        <label class="textarea">
                                            <i class="icon-append fa fa-comment"></i>
                                              <?php echo $form->textArea($model,'Comentario',array('placeholder'=>"Ingrese una critica constructiva sobre el informe presentado por el estudiante",'rows'=>"5"  ,'type'=>"text",'name'=>"comentarios")); ?>
                                            
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">Recomendaciones | Puntos Acordados</label>
                                        <label class="textarea">
                                            <i class="icon-append fa fa-comment"></i>
                                              <?php echo $form->textArea($model,'PuntosAcordados',array('placeholder'=>"Ingrese los puntos acordados separados por coma. Ejemplo:    Punto1, Punto2, Punto3, Punto4, Punto5",'rows'=>"7"  ,'type'=>"text",'name'=>"asesoramiento")); ?>
                                            
                                        </label>
                                    </section>
                                    
                                  <div class="note"><strong>Nota:</strong> Cuando guardas un asesoramiento este estará disponible para el estudiante.</div>
                                </fieldset>
                                
                                <footer>
                                    <button type="submit" class="btn-u">Guardar</button>
                                    

                                </footer>
                            
                        </div>
                        <!-- End Icons and Placeholders -->
                            
                        <?php echo $form->hiddenField($model,'IdAsesoramientoAlumno',array('name'=>'IdAsesoramiento')); ?>
                        <?php echo $form->hiddenField($model,'Curso_IdCurso',array('name'=>'IdCurso')); ?>
                        <?php echo $form->hiddenField($model,'UsuarioEstudiante_IdUsuarioEstudiante',array('name'=>'IdEstudiante')); ?>
                        <?php echo $form->hiddenField($practica,'IdPracticaProfesional',array('name'=>'IdPracticaProfesional')); ?>

                   

                        <!-- Tooltips -->
                        <div class="tab-pane fade" id="profile-1">
                            
                                <header>Form Tooltips</header>
                                
                                <fieldset>
                                    <section>
                                        <label class="label">Text input with top-right tooltip</label>
                                        <label class="input">
                                            <i class="icon-append fa fa-question-circle"></i>
                                            <input type="text" placeholder="Focus to view the tooltip">
                                            <b class="tooltip tooltip-top-right">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Text input with top-left tooltip</label>
                                        <label class="input">
                                            <i class="icon-prepend fa fa-question-circle"></i>
                                            <input type="text" placeholder="Focus to view the tooltip">
                                            <b class="tooltip tooltip-top-left">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Text input with bottom-right tooltip</label>
                                        <label class="input">
                                            <i class="icon-append fa fa-question-circle"></i>
                                            <input type="text" placeholder="Focus to view the tooltip">
                                            <b class="tooltip tooltip-bottom-right">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Text input with bottom-left tooltip</label>
                                        <label class="input">
                                            <i class="icon-prepend fa fa-question-circle"></i>
                                            <input type="text" placeholder="Focus to view the tooltip">
                                            <b class="tooltip tooltip-bottom-left">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Text input with right tooltip</label>
                                        <label class="input">
                                            <i class="icon-append fa fa-question-circle"></i>
                                            <input type="text" placeholder="Focus to view the tooltip">
                                            <b class="tooltip tooltip-right">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Text input with left tooltip</label>
                                        <label class="input">
                                            <i class="icon-prepend fa fa-question-circle"></i>
                                            <input type="text" placeholder="Focus to view the tooltip">
                                            <b class="tooltip tooltip-left">Some helpful information</b>
                                        </label>
                                    </section>
                                </fieldset>
                                    
                                <fieldset>  
                                    <section>
                                        <label class="label">Textarea with top-right tooltip</label>
                                        <label class="textarea">
                                            <i class="icon-append fa fa-question-circle"></i>
                                            <textarea rows="3" placeholder="Focus to view the tooltip"></textarea>
                                            <b class="tooltip tooltip-top-right">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Textarea with top-left tooltip</label>
                                        <label class="textarea">
                                            <i class="icon-prepend fa fa-question-circle"></i>
                                            <textarea rows="3" placeholder="Focus to view the tooltip"></textarea>
                                            <b class="tooltip tooltip-top-left">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Textarea with bottom-right tooltip</label>
                                        <label class="textarea">
                                            <i class="icon-append fa fa-question-circle"></i>
                                            <textarea rows="3" placeholder="Focus to view the tooltip"></textarea>
                                            <b class="tooltip tooltip-bottom-right">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Textarea with bottom-left tooltip</label>
                                        <label class="textarea">
                                            <i class="icon-prepend fa fa-question-circle"></i>
                                            <textarea rows="3" placeholder="Focus to view the tooltip"></textarea>
                                            <b class="tooltip tooltip-bottom-left">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Textarea with right tooltip</label>
                                        <label class="textarea">
                                            <i class="icon-append fa fa-question-circle"></i>
                                            <textarea rows="3" placeholder="Focus to view the tooltip"></textarea>
                                            <b class="tooltip tooltip-right">Some helpful information</b>
                                        </label>
                                    </section>
                                    
                                    <section>
                                        <label class="label">Textarea with left tooltip</label>
                                        <label class="textarea">
                                            <i class="icon-prepend fa fa-question-circle"></i>
                                            <textarea rows="3" placeholder="Focus to view the tooltip"></textarea>
                                            <b class="tooltip tooltip-left">Some helpful information</b>
                                        </label>
                                    </section>
                                </fieldset>
                                
                                <footer>
                                    <button type="submit" class="btn-u btn-u-default">Submit</button>
                                    <button type="button" class="btn-u" onclick="window.history.back();">Back</button>
                                </footer>
                                 <?php $this->endWidget(); ?>
                        </div>
                        <!-- End Tooltips -->
                    </div>
                    </div>

 </div>
                    </div>



