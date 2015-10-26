


 <!--Profile Body-->
                    <div class="profile-body">
                     
                                             <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'SolicitudPracticaProfesional',
    'htmlOptions'=>array('class'=>'sky-form'),
    'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/CrearPP"), 
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>


                    <header>Solicitud de Práctica Profesional</header>
                        
                    <fieldset>                  
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-building-o"></i>
                                     <?php echo $form->textField($practicaProfesional,'AreaODepartamento',array('type'=>"text" ,'name'=>"AreaODepartamento", 'placeholder'=>"Area o departamento:",'size'=>60,'maxlength'=>500)); ?>
                                <b class="tooltip tooltip-bottom-right">Ejemplo: Departamento de Mercadeo</b>
                                </label>

                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-briefcase"></i>
                                <?php echo $form->textField($practicaProfesional,'PuestoDesempeniar',array('type'=>"text" ,'name'=>"PuestoDesempeniar", 'placeholder'=>"Cargo a desempeñar por el estudiante:",'size'=>60,'maxlength'=>500)); ?>
                                <b class="tooltip tooltip-bottom-right">Ejemplo: Diseñador Gráfico</b>
                                </label>
                            </section>
                        </div>

                      
                        <div class="row">

                            <section class="col col-4">
                                 <label class="label">Hora de Entrada</label> 
                                <label class="input">
                                    <i class="icon-append fa fa-clock-o"></i>
                                     <?php echo $form->timeField($practicaProfesional,'HoraEntrada',array('name'=>"HoraEntrada")); ?>
                                <b class="tooltip tooltip-bottom-right">Ejemplo: 08:00 a.m.</b>
                                </label>
                            </section>
                            <section class="col col-4">
                                 <label class="label">Hora de Salida</label> 
                                <label class="input">
                                    <i class="icon-append  fa fa-clock-o"></i>
                                     <?php echo $form->timeField($practicaProfesional,'HoraSalida',array('name'=>"HoraSalida")); ?>
                                <b class="tooltip tooltip-bottom-right">Ejemplo: 05:00 p.m.</b>
                                </label>
                            </section>

                              <section class="col col-4">
                                        <label class="label">Fecha de vencimiento de la vacante</label> 
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                             <?php echo $form->dateField($practicaProfesional,'FechaVencimientoPlaza',array('name'=>"FechaVencimientoPlaza")); ?>
                                        <b class="tooltip tooltip-bottom-right">Cuando esta fecha llegue, esta vacante se desabilitará automaticamente. </b>
                                        </label>
                                    </section>
                        </div>

                         <section>
                            <label class="textarea">
                                <i class="icon-append fa fa-check-square-o"></i>
                                <?php echo $form->textArea($practicaProfesional,'ObjetivoDelCargo',array('placeholder'=>"Objetivo del cargo:",'rows'=>"5"  ,'name'=>"ObjetivoDelCargo")); ?>
                            <b class="tooltip tooltip-bottom-right">Se refiere a detallar de manera clara y precisa las características del cargo/puesto a ser ocupado por el estudiante.  </b>
                            </label>
                        </section>       

                         <section>
                            <label class="textarea">
                                <i class="icon-append fa fa-list"></i>
                                 <?php echo $form->textArea($practicaProfesional,'Reponsabilidades',array('placeholder'=>"Responsabilidades separadas por coma: Reponsabilidad 1, Responsabilidad 2, Responsabilidad 3:",'rows'=>"5"  ,'name'=>"Reponsabilidades")); ?>
                                 <b class="tooltip tooltip-bottom-right">Asigne las responsabilidades o las funciones del estudiante dentro de la empresa. RECUERDE SEPARAR POR COMAS CADA ITEM.  </b>
                            </label>
                        </section>      

                        <section>
                            <label class="textarea">
                                <i class="icon-append fa fa-comment"></i>
                                <?php echo $form->textArea($practicaProfesional,'Observaciones',array('placeholder'=>"Observaciones o comentarios adicionales:",'rows'=>"5"  ,'name'=>"Observaciones")); ?>
                                <b class="tooltip tooltip-bottom-right"> Cualquier observación que sea de utilidad para el estudiante o asesor académico. </b>
                            </label>
                        </section> 


                        <div class="row">
                            <section class="col col-4">

                                
                               <label class="toggle"><?php echo $form->checkBox($practicaProfesional,'PosibilidadEmpleo',array('name'=>"PosibilidadEmpleo")); ?><i class="rounded-4x"></i>Posibilidad de Empleo</label>
                               
                            </section>
                            
                        
                            
                            <section class="col col-4">             
                                
                                <label class="toggle"><?php echo $form->checkBox($practicaProfesional,'RequierePromedio',array('name'=>"RequierePromedio")); ?><i class="rounded-4x"></i>Requerie Promedio</label>
                             
                            </section>

                              <section class="col col-4">             
                                
                                <label class="toggle"><?php echo $form->checkBox($practicaProfesional,'HorarioFlexible',array('name'=>"HorarioFlexible")); ?><i class="rounded-4x"></i>Horario Flexible</label>
                                 
                            </section>


                                                <section class="col col-12">   



                    
                    <?php  

                            $this->widget(
    'booster.widgets.TbSelect2',
    array(
        'name' => 'carrerasPracticaProfesional',
        'data' =>  Carrera::model()->getCarreras(),
        'options' => array(
            'width' => '100%',
        ),
        'htmlOptions' => array(
                            'multiple' => 'multiple',
                            'placeholder'=>'Seleccionar Carreras *',
                               )
    )
);
 
                            ?>
                            </section>
                          
                        </div> 

                        
                        <div class="row">



                        </div>




                          
                       
                    </fieldset>
                   <fieldset>
                                
                                <section>
                                    
                                    <label class="checkbox"><input type="checkbox" name="terms" id="terms"><i></i>Acepto Terminos y Condiciones</label>
                                </section>
                               
                            </fieldset>
      
                
                    <footer>
                        <button type="submit" class="btn-u">Enviar Solicitud</button>
                        <div class="progress"></div>
                    </footer>               





                    </div>

                       <?php $this->endWidget(); ?>
