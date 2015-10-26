

 <!--Profile Body-->
                    <div class="profile-body margin-bottom-20">
                        <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#profile">Editar Perfil</a></li>
                                <!-- <li><a data-toggle="tab" href="#passwordTab">Cambiar Contraseña</a></li> -->
                                <li><a data-toggle="tab" href="#payment">Información Adicional</a></li>
                                <li><a data-toggle="tab" href="#settings">Invitar Empresas / usuarios</a></li>
                            </ul>          
                            <div class="tab-content">
                                <div id="profile" class="profile-edit tab-pane fade in active">
                                    <h2 class="heading-md">Perfil de la empresa, intenta mantener actualizada la información.</h2>
                                    <p>Abajo se encuentra la información de la empresa</p>
                                    </br>
                                    <dl class="dl-horizontal">
                                        <dt><strong>Nombre de la empresa </strong></dt>
                                        <dd>
                                          <?php echo  $modelEmpresa->NombreEmpresa; ?>
                                            <span>
                                                <a class="pull-right" href="#">
                                                    <i class="fa fa-pencil " data-toggle="modal" data-target=".bs-example-modal-sm"></i>
                                                </a>
                                            </span>
                                        </dd>
          
                                        <hr>
                                        <dt><strong>Teléfono Fijo </strong></dt>
                                        <dd>
                                             <?php echo  $modelEmpresa->TelefonoEmpresa; ?>
                                            <span>
                                                <a class="pull-right" href="#">
                                                    <i class="fa fa-pencil " data-toggle="modal" data-target=".cambiarPrimerApellido"></i>
                                                </a>
                                            </span>
                                        </dd>
                                        <hr>


                                        <dt><strong>Rubro</strong></dt>
                                        <dd>
                                             <?php echo  $modelEmpresa->RubroEmpresa; ?>                                            <span>
                                                <a class="pull-right" href="#">
                                                       <i class="fa fa-pencil " data-toggle="modal" data-target=".cambiarUsuario"></i>
                                                </a>
                                            </span>
                                        </dd>
                                        
                                        <hr>


                                        <dt><strong>Correo Electrónico </strong></dt>
                                        <dd>
                                             <?php echo  $modelEmpresa->CorreoEmpresa; ?>
                                            <span>
                                                <a class="pull-right" href="#">
                                                        <i class="fa fa-pencil " data-toggle="modal" data-target=".cambiarSegundoApellido"></i>
                                                </a>
                                            </span>
                                        </dd>
                                        <hr>
                                        <dt><strong>Sitio Web</strong></dt>
                                        <dd>
                                             <?php echo  $modelEmpresa->SitioWebEmpresa; ?>
                                            <span>
                                                <a class="pull-right" href="#">
                                                     <i class="fa fa-pencil " data-toggle="modal" data-target=".correoElectronicoUsuario"></i>
                                                </a>
                                            </span>
                                        </dd>
           
                                        <hr>
                                    </dl>
                                  <!--   <button type="button" class="btn-u btn-u-default">Cancel</button> -->
                                    <!-- <button type="button" class="btn-u">Ver mi perfil</button> -->
                                    <?php echo CHtml::link('Mi perfil público',array('usuarioEmpresa/perfilEmpresa'),array('class'=>'btn-u')); ?>

                                </div>

                                <div id="payment" class="profile-edit tab-pane fade">
                                     <h2 class="heading-md">Panel de información de perfil</h2>
                                    <p>Estos campos ayudarán a los demas a conocer tu empresa .</p>
                                    </br>



                                      <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'ActualizarInfoAdicional',
                                        'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/ActualizarInfoAdicionalEmpresa"), 
                                        'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                   <!--  <form class="sky-form" id="sky-form4" action=""> -->
                                   <label class="label">Misión</label>
                                <label class="textarea">
                                <i class="icon-append fa fa-comment"></i>
                                 <?php echo $form->textArea($modelEmpresa,'Mision',array('placeholder'=>"Ejemplo : ",'rows'=>"4"  ,'type'=>"text",'name'=>"Mision",'maxlength'=>230)); ?>
                                        <b class="tooltip tooltip-bottom-right">Para completar su perfil </b>    
                               </label>

                                     <label class="label">Visión</label>

                                <label class="textarea">
                                <i class="icon-append fa fa-comment"></i>
                                 <?php echo $form->textArea($modelEmpresa,'Vision',array('placeholder'=>"Ejemplo : ",'rows'=>"4"  ,'type'=>"text",'name'=>"Vision",'maxlength'=>230)); ?>
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

                                <div id="settings" class="profile-edit tab-pane fade">
                                    <h2 class="heading-md">Aqui va un formulario para invitar a amigos a la plataforma</h2>
                                    <p>Los amigos reciben un link a registro.</p>
                                    </br>
                                    <form class="sky-form" id="sky-form" action="">
                                       <!--  <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i></i>Email notification</label>
                                        <hr>
                                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i></i>Send me email notification when a user comments on my blog</label>
                                        <hr>
                                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i></i>Send me email notification for the latest update</label>
                                        <hr>
                                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i></i>Send me email notification when a user sends me message</label>
                                        <hr>
                                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i></i>Receive our monthly newsletter</label>
                                        <hr>    
                                        <button type="button" class="btn-u btn-u-default">Reset</button>
                                        <button class="btn-u" type="submit">Save Changes</button> -->
                                    </form>    
                                </div>
                            </div>
                        </div>    
                    </div>
                    <!--End Profile Body-->

                                            <!-- Small modal -->
                       <!--  <button class="btn-u" data-toggle="modal" data-target=".bs-example-modal-sm">Small Modal</button> -->

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
                                    'id'=>'NE',
                                    'action' =>  Yii::app()->createUrl("/UsuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($modelEmpresa); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($modelEmpresa,'NombreEmpresa',array('type'=>"text" ,'name'=>"NombreEmpresa", 'placeholder'=>"Ingrese su nombre ",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar el perfil de la empresa</b>
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
                                    'action' =>  Yii::app()->createUrl("/usuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($modelEmpresa); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($modelEmpresa,'TelefonoEmpresa',array('type'=>"text" ,'name'=>"TelefonoEmpresa", 'placeholder'=>"Ingrese su primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar el perfil de la empresa</b>
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
                                        <h4 id="myLargeModalLabel" class="modal-title">Editar correo electrónico</h4>
                                    </div>
                                    <div class="modal-body">
                                     <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'SAE',
                                    'action' =>  Yii::app()->createUrl("/usuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($modelEmpresa); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($modelEmpresa,'CorreoEmpresa',array('type'=>"text" ,'name'=>"CorreoEmpresa", 'placeholder'=>"Ingrese su primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar el correo electrónico de tu empresa</b>
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
                                        <h4 id="myLargeModalLabel" class="modal-title">Editar Rubro</h4>
                                    </div>
                                    <div class="modal-body">
                                     <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'usuario',
                                    'action' =>  Yii::app()->createUrl("/usuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($modelEmpresa); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($modelEmpresa,'RubroEmpresa',array('type'=>"text" ,'name'=>"RubroEmpresa", 'placeholder'=>"Ingrese su primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar el rubro de su empresa</b>
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
                                    'id'=>'emailUsuarioUnitec',
                                    'action' =>  Yii::app()->createUrl("/usuarioEmpresa/ActualizarDatos"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        <?php echo $form->errorSummary($modelEmpresa); ?>
                                     <fieldset>
                                        <div class="row">              
                                    <section  class="col col-12">
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <?php echo $form->textField($modelEmpresa,'SitioWebEmpresa',array('type'=>"text" ,'name'=>"SitioWebEmpresa", 'placeholder'=>"Ingrese su primer apellido",'size'=>60,'maxlength'=>500)); ?>
                                            <b class="tooltip tooltip-bottom-right">Para actualizar el sitio web de su empresa</b>
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