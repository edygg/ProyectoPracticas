


<!--  @var $this UsuarioEstudianteController 
@var $model UsuarioEstudiante 
 -->


 <!--Profile Body-->
                    <div class="profile-body margin-bottom-20">
                        <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                                <li class          ="active"><a data-toggle="tab" href="#profile">Editar Perfil</a></li>
                                <li><a data-toggle ="tab" href="#passwordTab">Cambiar Contraseña</a></li>
                                <li><a data-toggle ="tab" href="#payment">Información Adicional</a></li>
                                <li><a data-toggle ="tab" href="#imagen">Subir Foto</a></li>
                            </ul>          
                            <div class="tab-content">
                                <div id="profile" class="profile-edit tab-pane fade in active">
                                    <h2 class ="heading-md">Administra tu perfil, intenta mantener actualizada tu información.</h2>
                                    <p>Abajo se encuentra tu información personal y  de contacto</p>
                                    </br>
                                    <dl class ="dl-horizontal">
                                        <dt><strong>Nombre </strong></dt>
                                        <dd>
                                          <?php echo  $model->NombreCompleto; ?>
                                            <span>
                                                    <a class ="pull-right" href="#">
                                                    <i class ="fa fa-pencil " data-toggle="modal" data-target=".bs-example-modal-sm"></i>
                                                    </a>
                                            </span>
                                        </dd>
          
                                        <hr>
                                        <dt><strong>Primer Apellido </strong></dt>
                                        <dd>
                                             <?php echo  $model->TelefonoFijo; ?>

                                            <span>
                                                    <a class ="pull-right" href="#">
                                                    <i class ="fa fa-pencil " data-toggle="modal" data-target=".cambiarPrimerApellido"></i>
                                                    </a>
                                            </span>
                                        </dd>
                                        <hr>

                                        <dt><strong>Segundo Apellido </strong></dt>
                                        <dd>
                                             <?php echo  $model->TelefonoCelular; ?>
                                            <span>
                                                <a class="pull-right" href="#">
                                                        <i class="fa fa-pencil " data-toggle="modal" data-target=".cambiarSegundoApellido"></i>
                                                </a>
                                            </span>
                                        </dd>

                                        <hr>
                                        <dt><strong>Correo Electrónico</strong></dt>
                                        <dd>
                                             <?php echo  $model->CorreoElectronico; ?>
                                            <span>
                                                <a class="pull-right" href="#">
                                                     <i class="fa fa-pencil " data-toggle="modal" data-target=".correoElectronicoUsuario"></i>
                                                </a>
                                            </span>
                                        </dd>
                                        <hr>

                                        <dt><strong>Usuario</strong></dt>
                                        <dd>
                                             <?php echo  $model->Usuario; ?>                                            <span>
                                                
                                                    <?php if($model->Activo == "0"):?>
                                                    <a class="pull-right"  href="#">
                                                      <i class="fa fa-pencil " data-toggle="modal" data-target=".cambiarUsuario"></i>
                                                       </a>
                                                     <?php endif ?>

                                                      <?php if($model->Activo == "1"):?>
                                                      <a class="pull-right" >
                                                     <i class="fa fa-pencil "  style="color: black;" ></i>
                                                      </a>
                                                     <?php endif ?>

                                                </a>
                                            </span>
                                        </dd>
                                        <hr>
                               
                                    </dl>
                                  <!--   <button type="button" class="btn-u btn-u-default">Cancel</button> -->
                                    <!-- <button type="button" class="btn-u">Ver mi perfil</button> -->
                                    <?php echo CHtml::link('Mi perfil público',array('UsuarioEmpresa/perfil'),array('class'=>'btn-u')); ?>

                                </div>

                                <div id="passwordTab" class="profile-edit tab-pane fade">
                                    <h2 class="heading-md">Seguridad de la cuenta</h2>
                                    <p>Cambia tu contraseña</p>
                                    </br>

                                      <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'usuario-estudiante-form',
                                        'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/CambiarContrasena"), 
                                        'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($model); ?>

                                   <!--  <form class="sky-form" id="sky-form4" action=""> -->
                                        <dl class="dl-horizontal">
                                            <dt>Nueva contraseña</dt>
                                            <dd>
                                                <section>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-lock"></i>
                                                        <input type="password" id="password" name="password" placeholder="Ingresa tu nueva contraseña">
                                                        <b class="tooltip tooltip-bottom-right">No olvides tu contraseña =P</b>
                                                    </label>
                                                </section>
                                            </dd>
                                            <dt>Confirme su contraseña</dt>
                                            <dd>
                                                <section>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-lock"></i>
                                                        <input type="password" name="passwordConfirm" placeholder="Confirma tu nueva contraseña">
                                                        <b class="tooltip tooltip-bottom-right">No olvides tu contraseña =O</b>
                                                    </label>
                                                </section>
                                            </dd>    
                                        </dl>
                                        <!-- <label class="toggle toggle-change"><input type="checkbox" checked="" name="checkbox-toggle-1"><i></i>Remember password</label> -->
                                        </br>
                                      <!--   <section>
                                            <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>
                                        </section> -->
                                        
                                      <button class="btn-u" type="submit">Modificar Contraseña</button>

                                  
                                              <?php $this->endWidget(); ?>

                                   
                                </div>

                                <div id="payment" class="profile-edit tab-pane fade">
                                   <h2 class="heading-md">Panel de información de perfil</h2>
                                    <p>Estos campos ayudarán a los demas a conocerte mediante tu perfil público.</p>
                                    </br>
                                    
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'ActualizarInfoAdicional',
                                        'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/ActualizarInfoAdicional"), 
                                        'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                   <!--  <form class="sky-form" id="sky-form4" action=""> -->
                                   <label class="label">Objetivo Prefesional</label>
                                <label class="textarea">
                                <i class="icon-append fa fa-comment"></i>
                                 <?php echo $form->textArea($model,'ObjetivoProfesional',array('placeholder'=>"Ejemplo : ",'rows'=>"4"  ,'type'=>"text",'name'=>"ObjetivoProfesional",'maxlength'=>230)); ?>
                                        <b class="tooltip tooltip-bottom-right">Para completar su perfil </b>    
                               </label>

                                     <label class="label">Descripción Personal</label>

                                <label class="textarea">
                                <i class="icon-append fa fa-comment"></i>
                                 <?php echo $form->textArea($model,'DescripcionPersonal',array('placeholder'=>"Ejemplo : ",'rows'=>"4"  ,'type'=>"text",'name'=>"DescripcionPersonal",'maxlength'=>230)); ?>
                                        <b class="tooltip tooltip-bottom-right">Para completar su perfil </b>    
                               </label>
                     
                                       
                                        <!-- <label class="toggle toggle-change"><input type="checkbox" checked="" name="checkbox-toggle-1"><i></i>Remember password</label> -->
                                        </br>
                                      <!--   <section>
                                            <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>
                                        </section> -->
                                        
                                      <button class="btn-u" type="submit">Actualizar mi perfil</button>

                                  
                                              <?php $this->endWidget(); ?>

                                    
                                      
      

                                
                                </div>

                                <div id="imagen" class="profile-edit tab-pane fade">
                                    <h2 class="heading-md">Imagen de Perfil</h2>
                                    <p>Es importante subir tú foto para que se actualice en su perfil público.</p>
                                    </br>
                                    
                                        


<?php   $form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'uploadform',
        'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/SubirImagen"), 
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        
    )
);
echo $form->fileField($model, 'Imagen');
echo CHtml::submitButton('Actualizar Foto',array('class'=>'btn-u'));




$this->endWidget(); ?>



                                      
                                </div>
                            </div>
                        </div>    
                    </div>
                    <!--End Profile Body-->







                        <!-- MODAL DE CAMBIAR NOMBRE -->
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 id="myLargeModalLabel" class="modal-title">Editar nombre</h4>
                                    </div>
                                    <div class="modal-body">
                                     <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'NEForm',
                                    'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($model,'NombreCompleto',array('type'=>"text" ,'name'=>"NombreContacto", 'placeholder'=>"Ingrese su nombre ",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar su perfil de estudiante</b>
                                        </label>
                                    </section>
                                    </div>
                                    </fieldset>

                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                                        <button class="btn-u" type="submit">Salvar Cambios</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                </div>

                            </div>
                        </div>
                        <!-- End Small Modal -->
                        <!-- TERMINA MODAL CAMBIAR NOMBRE-->

                        <!-- MODAL DE CAMBIAR PRIMER APELLIDO -->
                        <div class="modal fade cambiarPrimerApellido" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 id="myLargeModalLabel" class="modal-title">Editar primer apellido</h4>
                                    </div>
                                    <div class="modal-body">
                                     <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'PAE',
                                    'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($model,'TelefonoFijo',array('type'=>"text" ,'name'=>"TelefonoFijoo", 'placeholder'=>"Ingrese su primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar su perfil de estudiante</b>
                                        </label>
                                    </section>
                                    </div>
                                    </fieldset>

                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                                        <button class="btn-u" type="submit">Salvar Cambios</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                </div>

                            </div>
                        </div>
                        <!-- End Small Modal -->
                        <!-- TERMINA MODAL CAMBIAR PRIMER APELLIDO-->

                         <!-- MODAL DE CAMBIAR SEGUNDO APELLIDO -->
                        <div class="modal fade cambiarSegundoApellido" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 id="myLargeModalLabel" class="modal-title">Editar segundo apellido</h4>
                                    </div>
                                    <div class="modal-body">
                                     <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'SAE',
                                    'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($model,'TelefonoCelular',array('type'=>"text" ,'name'=>"TelefonoCelularContacto", 'placeholder'=>"Ingrese su primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar su perfil de estudiante</b>
                                        </label>
                                    </section>
                                    </div>
                                    </fieldset>

                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                                        <button class="btn-u" type="submit">Salvar Cambios</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                </div>

                            </div>
                        </div>
                        <!-- End Small Modal -->
                        <!-- TERMINA MODAL CAMBIAR SEGUNDO APELLIDO-->
                 

                 <!-- MODAL DE CAMBIAR USUARIO -->
                        <div class="modal fade cambiarUsuario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 id="myLargeModalLabel" class="modal-title">Editar usuario</h4>
                                    </div>
                                    <div class="modal-body">
                                     <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'usuario',
                                    'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($model,'Usuario',array('type'=>"text" ,'name'=>"usuario", 'placeholder'=>"Ingrese su primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar su perfil de estudiante</b>
                                        </label>
                                    </section>
                                    </div>
                                    </fieldset>

                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                                        <button class="btn-u" type="submit">Salvar Cambios</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                </div>

                            </div>
                        </div>
                        <!-- End Small Modal -->
                        <!-- TERMINA MODAL CAMBIAR USUARIO-->


                        

               

                        <!-- MODAL DE EMAIL ESTUDIANTE -->
                        <div class="modal fade correoElectronicoUsuario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 id="myLargeModalLabel" class="modal-title">Editar correo electronico</h4>
                                    </div>
                                    <div class="modal-body">
                                     <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'emailUsuarioEstudiante',
                                    'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($model,'CorreoElectronico',array('type'=>"text" ,'name'=>"correoContacto", 'placeholder'=>"Ingrese su primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar su perfil de estudiante</b>
                                        </label>
                                    </section>
                                    </div>
                                    </fieldset>

                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                                        <button class="btn-u" type="submit">Salvar Cambios</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                </div>

                            </div>
                        </div>
                        <!-- End Small Modal -->
                        <!-- TERMINA MODAL EMAIL ESTUDIANTE-->
   



