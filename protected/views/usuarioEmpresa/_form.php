<?php
/* @var $this UsuarioEmpresaController */
/* @var $model UsuarioEmpresa */
/* @var $form CActiveForm */
?>



    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">EMPRESA</h1>
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
            <div class="col-md-10  col-sm-offset-1">
 <!-- Order Form -->

 <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'usuario-empresa-form',
    'htmlOptions'=>array('class'=> "sky-form" ),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>



               


                    <header>  <h4><i class="fa   fa-building-o"></i>INFO EMPRESA</h4></header>
                        
                    <fieldset>                  
                        <div class="row">
                            <section class="col col-4">
                                <label class="input">
                                    <i class="icon-append fa fa-building-o"></i>
                                 <?php echo $form->textField($model,'NombreEmpresa',array('placeholder'=>"Nombre de la Empresa", 'type'=>"text",'name'=>"NombreEmpresa",'size'=>60,'maxlength'=>500)); ?>
                                   <b class="tooltip tooltip-bottom-right">Para verificación de datos generales</b>  
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="input">
                                    <i class="icon-append fa fa-phone"></i>
                                     <?php echo $form->textField($model,'TelefonoEmpresa',array('placeholder'=>"Teléfono Fijo", 'type'=>"tel",'name'=>"number",'id'=>"telefonoFijoHonduras",'size'=>60,'maxlength'=>500)); ?>
                                     <b class="tooltip tooltip-bottom-right">Para llamarle de un momento a otro</b> 
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                        <?php echo $form->textField($model,'CorreoEmpresa',array('placeholder'=>"Email", 'type'=>"email",'name'=>"emailEmpresa",'size'=>60,'maxlength'=>500)); ?>
                                        <b class="tooltip tooltip-bottom-right">Para mantener una comunicación constante </b> 
                                </label>
                            </section>
                        </div> 

                        <div class="row">
                            <section class="col col-4">
                                <label class="input">
                                    <i class="icon-append fa  fa-globe"></i>
                                 <?php echo $form->textField($model,'SitioWebEmpresa',array('placeholder'=>"Sitio Web", 'type'=>"text",'name'=>"url",'size'=>60,'maxlength'=>500)); ?>
                                 <b class="tooltip tooltip-bottom-right">Para saber un poco más de su empresa </b>    
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="input">
                                    <i class="icon-append fa fa-suitcase"></i>
                                     <?php echo $form->textField($model,'RubroEmpresa',array('placeholder'=>"Rubro de la Empresa", 'type'=>"text",'name'=>"rubroEmpresa",'size'=>60,'maxlength'=>500)); ?>
                                     <b class="tooltip tooltip-bottom-right">Para información a nuestros alumnos </b>   
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="select">
                                        <?php echo $form->dropDownList($modelTipoEmpresa,'IdTipoEmpresa',$modelTipoEmpresa->getMenuTipoEmpresa(),array('name'=>"tipoEmpresa","empty"=>"Seleccione tipo de empresa")); ?>
                                         <i></i>
                                </label>
                            </section>
                        </div>     

                      <section>
                            <label class="textarea">
                                <i class="icon-append fa fa-comment"></i>
                                       <?php echo $form->textArea($model,'Mision',array('placeholder'=>"Misión :",'rows'=>"3"  ,'type'=>"text",'name'=>"Mision",'size'=>60,'maxlength'=>500)); ?>
                                        <b class="tooltip tooltip-bottom-right"> Para  completar el perfi público de la empresa </b>   
                            </label>
                        </section>  

                           <section>
                            <label class="textarea">
                                <i class="icon-append fa fa-comment"></i>
                                       <?php echo $form->textArea($model,'Vision',array('placeholder'=>"Vision :",'rows'=>"3"  ,'type'=>"text",'name'=>"Vision",'size'=>60,'maxlength'=>500)); ?>
                                        <b class="tooltip tooltip-bottom-right"> Para  completar el perfi público de la empresa </b>   
                            </label>
                        </section>  

                   
                    </fieldset>


                    <header>  <h4><i class="fa  fa-spin fa-spinner"></i>INFORMACIÓN DE CONTACTO PRINCIPAL</h4></header>
                        
                    <fieldset>


                             <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                                 <?php echo $form->textField($modelContactoEmpresa,'NombreCompleto',array('placeholder'=>"Nombre completo", 'type'=>"text",'name'=>"nombreContactoEmpresa",'size'=>60,'maxlength'=>500)); ?>
                                 <b class="tooltip tooltip-bottom-right">Para mantener una comunicación constante y efectiva</b>      
                                </label>
                            </section>
                            <section class="col col-3">
                                <label class="input">
                                    <i class="icon-append fa fa-phone"></i>
                                     <?php echo $form->textField($modelContactoEmpresa,'TelefonoFijo',array('placeholder'=>"Teléfono Fijo", 'type'=>"tel",'name'=>"telefonoFijoContacto",'id'=>"telefonoFijoContacto",'size'=>60,'maxlength'=>500)); ?>
                                     <b class="tooltip tooltip-bottom-right">Para confirmar cuando su cuenta este verificada</b>      
                                </label>
                            </section>
                            <section class="col col-3">
                                <label class="input">
                                    <i class="icon-append fa  fa-mobile"></i>
                                        <?php echo $form->textField($modelContactoEmpresa,'TelefonoCelular',array('placeholder'=>"Teléfono Celular", 'type'=>"tel",'name'=>"telefonoCelularContacto",'id'=>"telefonoCelularContacto",'size'=>60,'maxlength'=>500)); ?>
                                         <b class="tooltip tooltip-bottom-right">Por si la linea fija esta ocupada</b>      
                                </label>
                            </section>
                        </div> 


                             <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                 <?php echo $form->textField($modelContactoEmpresa,'CorreoElectronico',array('placeholder'=>"Email", 'type'=>"email",'name'=>"emailContacto",'size'=>60,'maxlength'=>500)); ?>
                                 <b class="tooltip tooltip-bottom-right">Para que usted ingrese a su cuenta </b>      
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa  fa-thumb-tack"></i>
                                     <?php echo $form->textField($modelContactoEmpresa,'PuestoEmpresa',array('placeholder'=>"Puesto en la empresa", 'type'=>"text",'name'=>"puestoEmpresa",'size'=>60,'maxlength'=>500)); ?>
                                     <b class="tooltip tooltip-bottom-right">Para saber un poco más de usted</b>      
                                </label>
                            </section>
                            
                        </div> 

                          <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-users"></i>
                                 <?php echo $form->textField($modelContactoEmpresa,'Usuario',array('placeholder'=>"Usuario", 'type'=>"text",'name'=>"UsuarioContactoEmpresa",'size'=>60,'maxlength'=>500,'ajax'=>array(
                    'type'=>'POST',
                    'url'=>$this->createUrl("verificarUsuarioDuplicado"),
                    'update'=>'#errorUsuario',
                    'beforeSend' => 'function() { $( "#errorUsuario" ).empty();
        }',
                ))); ?>
                                 <b class="tooltip tooltip-bottom-right">Para ingresar al sistema</b>      
                                </label>
                            </section>
                            <section class="col col-3">
                                <label class="input">
                                    <i class="icon-append fa fa-lock"></i>
                                     <?php echo $form->passwordField($modelContactoEmpresa,'Contrasena',array('placeholder'=>"Contrasena", 'type'=>"tel",'name'=>"ContrasenaContactoEmpresa",'size'=>60,'maxlength'=>500)); ?>
                                     <b class="tooltip tooltip-bottom-right"> No olvide su contraseña =P </b>      
                                </label>
                            </section>
                            <section class="col col-3">
                                <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="passwordConfirm" placeholder="Confirme contraseña">
                                            <b class="tooltip tooltip-bottom-right">Confirmando contraseña</b>
                                </label>
                            </section>
                        </div> 

                          <div id="errorUsuario">

                                         </div>

                        
                       
                                
                    </fieldset>

      




                    <footer>
                        <div class="  col-sm-offset-4">

                         <?php echo CHtml::submitButton('REGISTRAR MI EMPRESA ' , array('class'=>"btn-u btn-u-lg ")); ?>
                       
                        </div>
                    </footer>               
                 


          <?php $this->endWidget(); ?>      
                <!-- End Order Form -->
</div>
</div>
</div>


