<!-- 
@var $this UsuarioUnitecController 
 @var $model UsuarioUnitec  -->




<!--  @var $this UsuarioEstudianteController 
@var $model UsuarioEstudiante 
 -->

 <!--Profile Body-->
                    <div class="profile-body margin-bottom-20">
                        <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs" id="myTab">
                                <li class="active"><a data-toggle="tab" href="#tipoCarrera">Tipo Carreras</a></li>
                                <li><a data-toggle="tab" href="#Carreras">Carreras</a></li>
                                <li><a data-toggle="tab" href="#tipoEmpresa">Tipo Empresa</a></li>
                                
                            </ul>          
                            <div class="tab-content">
                                <div id="tipoCarrera" class="profile-edit tab-pane fade in active">
                                    <h2 class="heading-md">Administra los tipos de carreras</h2>
                                    <p>Crea nuevos tipos y luego asignalos a las carreras,  estudiantes y  jefes necesitaran de ellas.</p>
                                    <!-- </br>
                                    <dl class="dl-horizontal">
                                    </dl> -->

    <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                    'id'=>'TableTipoCarrrera',
                    'type'         => 'striped bordered',
                    'dataProvider' => $tipoCarrera->BusquedaTiposCarreras(),
                    'filter'       => $tipoCarrera,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                        array(
                            'name' => 'Nombre',
                            'header' => 'Nombre',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                 'name' => 'login',
                                'type' => 'text',
                                'pk' => '$data->idTipoCarrera',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarNombreTipoCarrera')
                            )
                        ),
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado', 
                             'value'    =>'($data->Activo=="1")?("Activo"):("Inactivo")',
                             'filter'   =>array('1'=>'Activo','0'=>'Inactivo'),

                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->idTipoCarrera',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoTipoCarrera'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("TableCarreras"); $.fn.yiiGridView.update("TiposDeEmpresa");$.fn.yiiGridView.update("TableTipoCarrrera");}' ,
                                 
                               )
                             )
                         ,  
                         array(
                            'name' => 'CreadoPor',
                            'filter'=> false,
                             'header' => 'Creado Por',

                             ),
                         array(
                            'name' => 'ModificadoPor',
                            'filter'=> false,
                             'header' => 'Modificado Por',

                             ),
                          array(
                            'name' => 'FechaModificacion',
                            'filter'=> false,
                             'header' => 'Ultima Modificación',

                             )
                    )
                )
            );
        ?>


<br>




                                  <!--   <button type="button" class="btn-u btn-u-default">Cancel</button> -->
                                    <!-- <button type="button" class="btn-u">Ver mi perfil</button> -->
                                   <button class="btn-u" data-toggle="modal" data-target="#AgregarTipoCarrera">Agregar </button>

                                </div>

                                <div id="Carreras" class="profile-edit tab-pane fade">
                                    <h2 class="heading-md">Administra carrreras</h2>
                                    <p>Crea y Edita nuevas carreras. Estas estarán disponibles en los formularios de registro  y otros...</p>
    <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                    'id'=>'TableCarreras',
                    'type'         => 'striped bordered',
                    'dataProvider' => $Carrera->BusquedaCarreras(),
                    'filter'       => $Carrera,
                    'responsiveTable' => true,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                        array(
                            'name' => 'NombreCarrera',
                            'header' => 'Carrera',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                 'name' => 'login',
                                'type' => 'text',
                                'pk' => '$data->IdCarrera',
                                'title'=> 'Editando nombre de carrera...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarNombreCarrera')
                            )
                        ),
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado', 
                             'value'    =>'($data->Activo=="1")?("Activo"):("Inactivo")',
                             'filter'   =>array('1'=>'Activo','0'=>'Inactivo'),

                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->IdCarrera',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoCarrera'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("TableCarreras");}' ,

                                )
                             )
                         ,  
                         array(
                            'class'    => 'booster.widgets.TbEditableColumn',
                            'name' => 'TipoCarrera_idTipoCarrera',
                            'value'    =>'$data->tipoCarrera->Nombre',
                            'filter'=>CHtml::listData(TipoCarrera::model()->findAll("Activo=?",array(1)),"idTipoCarrera","Nombre"),
                            'header' => 'Tipo Carrera',
                                'editable' => array(
                                    'type'   => 'select2',
                                    'pk'     => '$data->IdCarrera',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarTipoCarrera'),
                                    'title'  => 'Seleccione Tipo de Carrera...',
                                    'source' => CHtml::listData(TipoCarrera::model()->findAll("Activo=?",array(1)),"idTipoCarrera","Nombre"),
                      
                                )

                             ),
                         array(
                            'name' => 'ModificadoPor',
                            'filter'=> false,
                             'header' => 'Modificado Por',

                             ),
                          array(
                            'name' => 'FechaModificacion',
                            'filter'=> false,
                             'header' => 'Ultima Modificación',

                             )
                    )
                )
            );
        ?>
        <br>
        <button class="btn-u" data-toggle="modal" data-target="#AgregarCarrera">Agregar </button>
                                   
                                </div>

                                <div id="tipoEmpresa" class="profile-edit tab-pane fade">
                                    <h2 class="heading-md">Administra Tipos de Empresas</h2>
                                    <p>Este campo le es útil a las empresas en el formulario de registro y en otras cositas... </p>
                                    
                            <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                    'id'=>'TableTiposDeEmpresa',
                    'type'         => 'striped bordered',
                    'dataProvider' => $TipoEmpresa->BusquedaTipoEmpresa(),
                    'filter'       => $TipoEmpresa,
                    'responsiveTable' => true,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                        array(
                            'name' => 'NombreTipoEmpresa',
                            'header' => 'Tipo de Empresa',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                 'name' => 'login',
                                'type' => 'text',
                                'pk' => '$data->idTipoCarrera',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarNombreTipoEmpresa')
                            )
                        ),
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado', 
                             'value'    =>'($data->Activo=="1")?("Activo"):("Inactivo")',
                             'filter'   =>array('1'=>'Activo','0'=>'Inactivo'),

                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->idTipoCarrera',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoTipoEmpresa'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("TableTiposDeEmpresa");}' ,
                                 
                               )
                             )
                         ,  
                         array(
                            'name' => 'CreadoPor',
                            'filter'=> false,
                             'header' => 'Creado Por',

                             ),
                         array(
                            'name' => 'ModificadoPor',
                            'filter'=> false,
                             'header' => 'Modificado Por',

                             ),
                          array(
                            'name' => 'FechaModificacion',
                            'filter'=> false,
                             'header' => 'Ultima Modificación',

                             )
                    )
                )
            );
        ?>


<br>




                                  <!--   <button type="button" class="btn-u btn-u-default">Cancel</button> -->
                                    <!-- <button type="button" class="btn-u">Ver mi perfil</button> -->
                                   <button class="btn-u" data-toggle="modal" data-target="#AgregarTipoEmpresa">Agregar </button>
                     





                                </div>

                             
                            </div>
                        </div>    
                    </div>
                    <!--End Profile Body-->

                                            <!-- Small modal -->
                       <!--  <button class="btn-u" data-toggle="modal" data-target=".bs-example-modal-sm">Small Modal</button> -->



                       <div class="modal fade" id="AgregarTipoCarrera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-'title'" id="myModalLabel">Agregar Tipo de Carrera</h4>
                                    </div>
                                    <div class="modal-body">
                                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'TDC',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/CrearTipoCarrera"), 
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
                                                    <i class="icon-append fa fa-tag"></i>
                                                    <?php echo $form->textField($tipoCarrera,'Nombre',array('type'=>"text" ,'name'=>"Nombre", 'placeholder'=>"Ingrese Tipo de Carrera",'size'=>60,'maxlength'=>500)); ?>
                                                    <b class="tooltip tooltip-bottom-right">Para  alimentar el sistema </b>
                                                </label>
                                            </section>
                                    </div>
                                    </fieldset>

                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                                        <button class="btn-u" type="submit">Crear Nuevo</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                    </div>
                                    
                                </div>
                            </div>
                       <!--  </div> -->



                          <div class="modal fade" id="AgregarCarrera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-'title'" id="myModalLabel">Nueva Carrera</h4>
                                    </div>
                                    <div class="modal-body">
                                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'CrearCarrera',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/CrearCarrera"), 
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
                                            <section  class="col col-6">
                                                <label class="input">
                                                    <i class="icon-append fa fa-tag"></i>
                                                    <?php echo $form->textField($Carrera,'NombreCarrera',array('type'=>"text" ,'name'=>"NombreCarrera", 'placeholder'=>"Nombre de la Carrera",'size'=>60,'maxlength'=>500)); ?>
                                                    <b class="tooltip tooltip-bottom-right">Creando nueva Carrera </b>
                                                </label>
                                            </section>


                                              <section  class="col col-6">
                                                <label class="select">
                                                    
                                                    <?php echo $form->dropDownList($Carrera,'TipoCarrera_idTipoCarrera',CHtml::listData(TipoCarrera::model()->findAll("Activo=?",array(1)),"idTipoCarrera","Nombre"),array('prompt'=>'Seleccione tipo de Carrera','name'=>'TipoCarreraId')); ?>
                                                      <i></i>
                                                   
                                                </label>

                                               

                                            
                                            </section>

                                    </div>
                                    </fieldset>

                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                                        <button class="btn-u" type="submit">Crear Nuevo</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                    </div>
                                    
                                </div>
                            </div>
                       <!--  </div> -->


                        <div class="modal fade" id="AgregarTipoEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-'title'" id="myModalLabel">Nuevo Tipo de Empresa</h4>
                                    </div>
                                    <div class="modal-body">
                                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'CrearTipoEmpresaa',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/CrearTipoEmpresa"), 
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
                                                    <i class="icon-append fa fa-tag"></i>
                                                    <?php echo $form->textField($TipoEmpresa,'NombreTipoEmpresa',array('type'=>"text" ,'name'=>"NombreTipoEmpresa", 'placeholder'=>"Nombre Tipo Empresa",'size'=>60,'maxlength'=>500)); ?>
                                                    <b class="tooltip tooltip-bottom-right">Creando nueva Carrera </b>
                                                </label>
                                            </section>



                                    </div>
                                    </fieldset>

                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>
                                        <button class="btn-u" type="submit">Crear Nuevo</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                    </div>
                                    
                                </div>
                            </div>


 <!-- <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jquery/jquery.min.js"></script>  -->


<script type="text/javascript">

  $(function ( ) {

    if(window.location.hash  == "#Carreras"){
   
    $('#myTab a[href="#Carreras"]').tab('show')
    }
    else  if(window.location.hash  == "#tipoEmpresa")
    
    {

  $('#myTab a[href="#tipoEmpresa"]').tab('show')

    }
    else if (window.location.hash  == "#usuariosEmp") {
 $('#myTab a[href="#usuariosEmpresasTab"]').tab('show')

    }
    else

    {
      $('#myTab a[href="#tipoCarrera"]').tab('show')
    }
  })
</script>

