<?php
/* @var $this UsuarioUnitecController */
/* @var $model UsuarioUnitec */
/* @var $form CActiveForm */
?>





    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">UNITEC</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Pages</a></li>
                <li class="active">Registration</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

  <div class="container content">
        <div class="row">
     <!-- Begin Content -->
            <div class="col-md-12 col-md-offset-3">
                <div class="row margin-bottom-40">
                    <div class="col-md-6">
                        <!-- Reg-Form -->
                      <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'usuario-unitec-form',
    'htmlOptions'=>array('class'=>'sky-form'),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>
    <?php echo $form->errorSummary($model); ?>


               
                      <header>  <h4><i class="fa fa-users"></i>REGISTRO DE ASESORES Y JEFES ACADÉMICOS </h4></header>
          
                            <fieldset>    
                                <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($model,'Nombre',array('type'=>"text" ,'name'=>"NombreJefeAsesor", 'placeholder'=>"PrimerNombre SegundoNombre",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para crear su perfil de Asesor o Jefe Académico</b>
                                        </label>
                                    </section>
                                    </div>
                                 <div class="row">    
                                    <section class="col col-6">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                              <?php echo $form->textField($model,'PrimerApellido',array('type'=>"text" ,'name'=>"PrimerApellido", 'placeholder'=>"Primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                         <!--  <input type="email" name="email" placeholder="Email address"> -->
                                            <b class="tooltip tooltip-bottom-right">Apellido Materno</b>
                                        </label>
                                    </section>
                               
                                    <section class="col col-6">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                              <?php echo $form->textField($model,'SegundoApellido',array('type'=>"text" ,'name'=>"SegundoApellido", 'placeholder'=>"Segundo Apellido",'size'=>60,'maxlength'=>500)); ?>
                                         <!--  <input type="email" name="email" placeholder="Email address"> -->
                                            <b class="tooltip tooltip-bottom-right">Apellido Paterno</b>
                                        </label>
                                    </section>
                                     </div>
                                    
                                    <div class="row">
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-envelope"></i>
                                            <?php echo $form->textField($model,'Email',array('type'=>"text" ,'name'=>"email", 'placeholder'=>"Correo Electrónico",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para recibir notificaciones del sistema</b>
                                        </label>
                                    </section>
                                    </div>
                                    <div class="row">
                                      <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-users"></i>
                                            <?php echo $form->textField($model,'Usuario',array('type'=>"text" ,'name'=>"username", 'placeholder'=>"Usuario",'size'=>60,'maxlength'=>500,'ajax'=>array(
                    'type'=>'POST',
                    'url'=>$this->createUrl("UsuarioEstudiante/verificarUsuarioDuplicado"),
                    'update'=>'#errorUsuario',
                    'beforeSend' => 'function() { $( "#errorUsuario" ).empty();
        }',
                ))); ?>
                                            <b class="tooltip tooltip-bottom-right">Para que ingrese al sistema cuando este registrado</b>
                                        </label>
                                    </section>
                                    
                                    </div>

                                     <div id="errorUsuario">

                                         </div>



                                     <div class="row">
                                    <section class="col col-6" >
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                              <?php echo $form->passwordField($model,'Contrasena',array('name'=>"password",'placeholder'=>"Contraseña",'type'=>"password",'size'=>60,'maxlength'=>500)); ?>
                                            <!--input type="password" name="password" placeholder="Password" id="password"> -->
                                            <b class="tooltip tooltip-bottom-right">No olvide su contraseña</b>
                                        </label>
                                    </section>
                                    
                                    <section class="col col-6">
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="passwordConfirm" placeholder="Confirme su contraseña">
                                            <b class="tooltip tooltip-bottom-right">Confirmando contraseña</b>
                                        </label>
                                    </section>
                                    </div>
                                    
                                    <div class="row">
                                    <section class="col col-6">
                                        <label class="select">
                                            <select >
                                                <option value="0" selected disabled> ¿Jefe o Asesor ?</option>
                                                <option value="1">Jefe Académico</option>
                                                <option value="2">Asesor</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="select">
                                            <select >
                                                <option value="0" selected disabled> ¿Jefe o Asesor ?</option>
                                                <option value="1">Jefe Académico</option>
                                                <option value="2">Asesor</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    </div>

                                
                            </fieldset>
                                
                            <fieldset>
                                
                                <section>
                                    
                                    <label class="checkbox"><input type="checkbox" name="terms" id="terms"><i></i>Acepto Terminos y Condiciones</label>
                                </section>
                               
                            </fieldset>
                            <footer>
                                <div class="  col-sm-offset-4">
                                      <?php echo CHtml::submitButton('REGISTRARME ' , array('class'=>"btn-u btn-u-lg ")); ?>
                            <!--    <button type="submit" class="btn-u">Submit</button> -->
                                 </div>
                            </footer>
                         
                        <!-- End Reg-Form -->
                        <?php $this->endWidget(); ?>
                    </div>

                </div><!--/end row-->

                </div>
</div>
</div>





