

 <!--Profile Body-->
                    <div class="profile-body margin-bottom-20">
                        <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs" id="myTab">
                                <li class="active"><a data-toggle="tab" href="#PeriodosActivos">En Curso - Activos</a></li>
                                <li><a data-toggle="tab" href="#PeriodosAnteriores">Anteriores - Inactivos</a></li>
                                  <li><a data-toggle="tab" href="#CarrerasPorCurso">Carreras x Curso </a></li>
                                
                                
                            </ul>  

  <div class="tab-content">
                                  
                <div id="PeriodosActivos" class="profile-edit tab-pane fade in active ">
                <h2 class="heading-md">Cursos Activos</h2>
                <p>Son utilizados para vincular asesores con alumno y alumnos con prácticas y/o proyectos</p>


                <div class="row container">
                <h5 class="color-red" id="carreras">   </h5>
                </div>


                
           
                   <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  'id'=> 'test',
                    'type'         => 'striped bordered',
                    'selectableCells'=>true,
                    'dataProvider' => $Curso->BusquedaCursosActivos(),
                    'filter'       => $Curso,
                    'responsiveTable' => true,
                    'selectableRows' => 1,  
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                      array(
                          'class'=>'CCheckBoxColumn',   
                          'id'=>'$data->IdCurso',

                ),     
                       
                        array(
                            'name' => 'Nombre',
                            'header' => 'Nombre',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:250px'),
                            'editable' => array(
                                 'name' => 'NombreCurso',
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarNombreCurso')
                            )
                        ),
                         array(
                            'name' => 'Codigo',
                            'header' => 'Código',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'htmlOptions' => array('nowrap'=>'nowrap'),
                            'editable' => array(
            
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarCodigoCurso')
                            )
                        ),
                          array(
                            'name' => 'Seccion',
                            'header' => 'Sección',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'htmlOptions' => array('nowrap'=>'nowrap'),
                            'editable' => array(

                                // 'type' => 'select2',
                               
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarSeccionCurso')
                            )
                        ),
                          array(
                            'name' => 'periodoConcatenado',

                            'header' => 'Año/Sem/Tri',
                            'value'    =>'$data->periodoAcademico->PeriodoConcatenado',
                            'class' => 'booster.widgets.TbEditableColumn',

                            'htmlOptions' => array('nowrap'=>'nowrap'),
                            'editable' => array(
                                'name' => 'PeriodoAcademico',
                                'type' => 'select2',
                               'source' => CHtml::listData(PeriodoAcademico::model()->findAll("Activo=?",array(1)),'IdPeriodoAcademico','PeriodoConcatenado'),
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarPeriodoCurso')
                            )
                        )
                          ,
                          array(
                            'name' => 'asesor',
                            'header' => 'Asesor',
                            'value'    =>'$data->usuarioUnitec->PrimerNombrePrimerApellido',
                            // 'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:150px'),
                           /* 'editable' => array(
                                'name' => 'Asesor',
                                 'type' => 'select2',
                               'source' =>CHtml::listData(UsuarioUnitec::model()->findAll("Activo=?",array(1)),'IdUsuarioUnitec','NombreCompleto'),
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarAsesorCurso')
                            )*/
                        )
                          ,
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado',    
                             'filter'   =>false,

                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->IdCurso',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoCurso'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                                    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("test"); $.fn.yiiGridView.update("test2");$.fn.yiiGridView.update("test3");}' ,
                                 
                               )
                             ), 


                    )
                )
            );
        ?>

                <br>

              

               <button class="btn-u" data-toggle="modal" data-target="#AgregarPeriodoAcademico">Agregar Nuevo </button>

                <?php
echo CHtml::ajaxSubmitButton('Modificar Carreras',$this->createUrl('UsuarioUnitec/NoHaceNada') ,array(
   'type'=>'POST',
   'beforeSend' => 'function() {      
        document.getElementById("trans").value = $.fn.yiiGridView.getChecked("test","$data->IdCurso").toString();
           $("#EditarCarrerasPorCurso").modal("show");
        }',
        // 'success'=>'
   
),
array('class'=>'btn-u')
);
?>  
<hr>
<form> 
<?php echo CHtml::hiddenField('name' , 'value', array('id' => 'trans2')); ?>

<?php  
echo CHtml::ajaxLink(
    'Ver Carreras',          // the link body (it will NOT be HTML-encoded.)
    array('UsuarioUnitec/NoHaceNada'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
       
    array(
        'type'=>'POST',
          'beforeSend' => 'function() {      
        document.getElementById("trans2").value = $.fn.yiiGridView.getChecked("test","$data->IdCurso").toString();
        }',

          'update'=>'#carreras',
    )
    ,
array('class'=>'btn-u','style'=>' color: white')
);

?>


</form>



                </div>





    <div id   ="PeriodosAnteriores" class="profile-edit tab-pane fade">
    <h2 class ="heading-md">Cursos Inactivos</h2>
    <p>Fueron utilizados para la vinaculación de asesores con alumnos y alumnos con prácticas y/o proyectos, si deseas realizar cambios en periodos pasados tendras que activarlos.</p>
    </br>

              <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  "id"=>'test2',
                    'type'         => 'striped bordered',
                    'dataProvider' => $Curso->BusquedaCursosInactivos(),
                    'filter'       => $Curso,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                        array(
                            'name' => 'Nombre',
                            'header' => 'Nombre',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:250px'),
                            'editable' => array(
                                 'name' => 'NombreCurso',
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarNombreCurso')
                            )
                        ),
                         array(
                            'name' => 'Codigo',
                            'header' => 'Código',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:90px'),
                            'editable' => array(
            
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarCodigoCurso')
                            )
                        ),
                          array(
                            'name' => 'Seccion',
                            'header' => 'Sección',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:90px'),
                            'editable' => array(

                                // 'type' => 'select2',
                               
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarSeccionCurso')
                            )
                        ),
                          array(
                            'name' => 'PeriodoAcademico_IdPeriodoAcademico',
                            'header' => 'Año/Sem/Tri',
                            'value'    =>'$data->periodoAcademico->PeriodoConcatenado',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:90px'),
                            'editable' => array(
                                'name' => 'PeriodoAcademico',
                                'type' => 'select2',
                               'source' => CHtml::listData(PeriodoAcademico::model()->findAll("Activo=?",array(1)),'IdPeriodoAcademico','PeriodoConcatenado'),
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarPeriodoCurso')
                            )
                        )
                          ,
                          array(
                            'name' => 'UsuarioUnitec_IdUsuarioUnitec',
                            'header' => 'Asesor',
                            'value'    =>'$data->usuarioUnitec->PrimerNombrePrimerApellido',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:150px'),
                            'editable' => array(
                                'name' => 'Asesor',
                                 'type' => 'select2',
                               'source' =>CHtml::listData(UsuarioUnitec::model()->findAll("Activo=?",array(1)),'IdUsuarioUnitec','NombreCompleto'),
                                'pk' => '$data->IdCurso',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarAsesorCurso')
                            )
                        )
                          ,
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado',    
                             'filter'   =>false,
                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->IdCurso',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoCurso'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("test"); $.fn.yiiGridView.update("test2"); $.fn.yiiGridView.update("test3");}' ,

                                 
                               )
                             )

                    )
                )
            );
        ?>


    

    </div>


    <div id   ="CarrerasPorCurso" class="profile-edit tab-pane fade">
    <h2 class ="heading-md">Carreras Por Curso</h2>
    <p>La asignación de carreras a cursos sirve para poder vincular los alumnos por carrera por curso =P Vamos a actualizar la descripción despues.</p>
    </br>

              <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  'id' => 'test3',
                    'type'         => 'striped bordered',
                    'dataProvider' => $CarrerasPorCurso->BusquedaCarrerasPorCurso(),
                    'filter'       => $CarrerasPorCurso,
                    'responsiveTable' => true,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                        array(
                            'name' => 'Carrera_IdCarrera',
                            'header' => 'Carrera',
                            'value'    =>'$data->carrera->NombreCarrera',
                            'filter'=> Carrera::model()->getCarreras(),

                        ),
                         array(
                            'name' => 'Curso_IdCurso',
                            'header' => 'Nombre del Curso / Sección / Código',
                            'value'    =>'$data->curso->CursoCompleto',
                            // 'htmlOptions' => array('nowrap'=>'nowrap'),

                        ),
                         array(
                            'name' => 'prueba',
                            'header' => 'Asesor',
                            'filter' => CHtml::listData(UsuarioUnitec::model()->findAll("Activo=?",array(1)),'IdUsuarioUnitec','NombreCompleto'),
                            'value'    =>'$data->curso->usuarioUnitec->PrimerNombrePrimerApellido',
              
                        )
                    )
                )
            );
        ?>


    

    </div>

    



                            </div>
                        </div>    
                    </div>
                    <!--End Profile Body-->

                                            


  <div class="modal fade" id="AgregarPeriodoAcademico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-'title'" id="myModalLabel">Nuevo Curso</h4>
                                    </div>
                                    <div class="modal-body">
                                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'CrenadoCursosCarrerasPorCurso',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/CrearCurso"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                    <div class="modal-body">
                                    <fieldset>
                                             <div class="row">         
                                            <section  class="col col-12">
                                                <label class="input">
                                                    <i class="icon-append fa fa-tag"></i>
                                                    <?php echo $form->textField($Curso,'Nombre',array('type'=>"text" ,'name'=>"NombreCurso", 'placeholder'=>"Nombre",'size'=>60,'maxlength'=>500)); ?>
                                                    <b class="tooltip tooltip-bottom-right">Creando nueva Carrera </b>
                                                </label>
                                            </section>
                                      </div>
            
                                                <div class="row">                    
                                            <section  class="col col-6">
                                                <label class="input">
                                                    <i class="icon-append fa fa-tag"></i>
                                                    <?php echo $form->textField($Curso,'Codigo',array('type'=>"text" ,'name'=>"CodigoCurso", 'placeholder'=>"Codigo ",'size'=>60,'maxlength'=>500)); ?>
                                                    <b class="tooltip tooltip-bottom-right">Creando nueva Carrera </b>
                                                </label>
                                            </section>

                                             <section  class="col col-6">
                                                <label class="input">
                                                    <i class="icon-append fa fa-tag"></i>
                                                    <?php echo $form->textField($Curso,'Seccion',array('type'=>"text" ,'name'=>"SeccionCurso", 'placeholder'=>"Sección",'size'=>60,'maxlength'=>500)); ?>
                                                    <b class="tooltip tooltip-bottom-right">Creando nueva Carrera </b>
                                                </label>
                                            </section>
                                            </div>






                                  <?php 
                                  

                                        $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Carreras',
                                                'data' => CHtml::listData(Carrera::model()->findAll("Activo=?",array(1)),'IdCarrera','NombreCarrera'),
                                                'htmlOptions' => array(
                                                'multiple' => 'multiple',
                                                'placeholder'=>'Seleccione Carreras*',
                                                 "ajax"=>array(
                                                "url" =>$this->createUrl("AsesoresPorCarrera") ,
                                                "type"=>"POST",
                                                "update"=>"#AsesorCurso",
                                                'beforeSend' => 'function() {           
                                               $("#AsesorCurso").empty();
                                                }',
                                                ),
                                                ),
                                                'options'=>array('width' => '100%'),
                                                  'events'=> array( "change" => 'js:function(){ $("#AsesorCurso").select2("val", "");}')
                                               
                                            )
                                        );


  
                                  ?>



<br>
<br>



                                            <div class="row ">

                                       <section  class="col col-6">

                                            <?php 
                                            $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'AsesorCurso',
                                                'options' => array(
                                                    'placeholder' => 'Seleccione el asesor *',
                                                    'width' => '100%',
                                                )
                                            )
                                        );

                                    ?>
                                             </section>
                                             <section  class="col col-6">

                                             
                                            <?php 
                                            $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'PeriodoAcademicoCurso',
                                                'data' => CHtml::listData(PeriodoAcademico::model()->findAll("Activo=?",array(1)),'IdPeriodoAcademico','PeriodoConcatenado'),
                                                'options' => array(
                                                    'placeholder' => 'Periodo Académico *',
                                                    'width' => '100%',
                                                )
                                            )
                                        );

                                    ?>
                                             </section>
                                             </div>  

                                         

                                        <!--     <div class="col-md-12 col-md-offset-0">    -->
                                                    
                           

                                
                                    
                                  <!--    </div>   -->
                                           

                          
                             

                          </fieldset>


                              </div>
        


                                     

                       
                                       
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




  <div class="modal fade" id="EditarCarrerasPorCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-'title'" id="myModalLabel">Editar Carreras Por Curso</h4>
                                    </div>
                                    <div class="modal-body">
                                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'EditandoCursosCarrerasPorCurso',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/ActualizarCarrerasPorCurso"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                    <div class="modal-body">
                                    <fieldset>
                            
<?php echo CHtml::hiddenField('name' , 'value', array('id' => 'trans')); ?>



                                  <?php 
                                  

                                        $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Carreras2',
                                                'data' => CHtml::listData(Carrera::model()->findAll("Activo=?",array(1)),'IdCarrera','NombreCarrera'),
                                                'htmlOptions' => array(
                                                'multiple' => 'multiple',
                                                'placeholder'=>'Seleccione Carreras*',
                                                 "ajax"=>array(
                                                "url" =>$this->createUrl("AsesoresPorCarrera2") ,
                                                "type"=>"POST",
                                                "update"=>"#AsesorCurso2",
                                                'beforeSend' => 'function() {           
                                               $("#AsesorCurso2").empty();
                                                }',
                                                ),
                                                ),
                                                'options'=>array('width' => '100%'),
                                                  'events'=> array( "change" => 'js:function(){ $("#AsesorCurso2").select2("val", "");}')
                                               
                                            )
                                        );


  
                                  ?>
<br>
<br>
                                            <div class="row ">

                                       <section  class="col col-6">
                                            <?php 
                                            $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'AsesorCurso2',
                                                'options' => array(
                                                    'placeholder' => 'Seleccione el asesor *',
                                                    'width' => '100%',
                                                )
                                            )
                                        );

                                    ?>
                                             </section>
                                             <section  class="col col-6">

                                             
                                            <?php 
                                            $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'PeriodoAcademicoCurso2',
                                                'data' => CHtml::listData(PeriodoAcademico::model()->findAll("Activo=?",array(1)),'IdPeriodoAcademico','PeriodoConcatenado'),
                                                'options' => array(
                                                    'placeholder' => 'Periodo Académico *',
                                                    'width' => '100%',
                                                )
                                            )
                                        );

                                    ?>
                                             </section>
                                             </div>  

                                         

                          
                             

                          </fieldset>


                              </div>
        


                                     

                       
                                       
                                    </div>
                                       <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Cancelar</button>


                                        


                                        <button class="btn-u" type="submit">Modificar Carreras</button>
                                        
                                    </div>

                                     <?php $this->endWidget(); ?>
                                    </div>
                                    
                                </div>
                            </div>





 
<script >
 // $(".js-example-placeholder-multiple").select2();
 //  data: []

 function obtenerSeleccion(){
alert("I am an alert box!");
 }
</script>


