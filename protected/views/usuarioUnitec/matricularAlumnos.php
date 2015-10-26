

 <!--Profile Body-->
                    <div class="profile-body margin-bottom-20">
                        <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs" id="myTab">
                                <li class="active"><a data-toggle="tab" href="#Matricula">Asociar Estudiante con Curso</a></li>
                                <li><a data-toggle="tab" href="#CursosPorAlumno">Cursos Por Alumno</a></li>
                                <li><a data-toggle="tab" href="#BusquedaEdicionEstudiante"> Búsqueda / Edición de Estudiantes</a></li> 
                            </ul>  
                        </div>

  <div class="tab-content">
                                  
                <div id="Matricula" class="profile-edit tab-pane fade in active ">
                <h2 class="heading-md">Panel de asociación Estudiante - Curso</h2>
                <p>Utiliza los filtros para buscar alumnos, luego puedes vincular uno o varios alumnos con un curso... Siempre y cuando seas Jefe Académico de las carreras vinculadas con ese curso.</p>
                </br>


                      <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  "id"=>'test2',
                    'type'         => 'striped bordered',
                    'dataProvider' => $modelEstudiantes->BusquedaAlumnosActivos(),
                    'filter'       => $modelEstudiantes,
                    'emptyText'    => 'No se encontraron registros',
                    'selectableRows' => 2,
    'bulkActions' => array(
    'actionButtons' => array(
        array(
            'id'=> 'prueba',
            'buttonType' => 'button',
            'context' => 'primary',
            'size' => 'small',
            'label' => 'Matricular Alumnos',
            'click' => 'js:function(values){console.log(values);  $("#MatricularAlumnos").modal("show"); document.getElementById("trans").value =values; document.getElementById("Carrera").value = document.getElementById("UsuarioEstudiante_Carrera_IdCarrera").value ;  $(CursosPorCarrera).empty();}'
            )
        ),
        // if grid doesn't have a checkbox column type, it will attach
        // one and this configuration will be part of it
        'checkBoxColumnConfig' => array(
            'name' => 'id'
        ),  
    ),
                    'columns'      => array(
                         array(
                          'class'=>'CCheckBoxColumn',   
                          
                          'id'=>'$data->IdCurso'
                ),     
                         array(
                            'name' => 'Carrera_IdCarrera',
                            'header' => 'Carrera',
                            'filter'=>   UsuarioUnitec::model()->CarrerasPorJefe(),  
                            'value'=>'$data->carrera->NombreCarrera',
                            'htmlOptions' => array('nowrap'=>'nowrap'),
                            
                        ),
                       
                        array(
                            'name' => 'Nombre',
                            'header' => 'Estudiante',
                            'value' => '$data->NombreCompleto',
                            'htmlOptions' => array('nowrap'=>'nowrap'),
                           
                        ),
                         array(
                            'name' => 'NumeroDeCuenta',
                            'header' => 'Nº Cuenta',
                            'value'=>'$data->NumeroDeCuenta',
                            'htmlOptions' => array('nowrap'=>'nowrap'),
                            
                        )

                    )
                )
            );
        ?>


  </div>







    <div id   ="CursosPorAlumno" class="profile-edit tab-pane fade">
    <h2 class ="heading-md">Cursos Por Estudiante</h2>
    <p>Abajo se encuentran la información de los cursos vinculados con estudiantes activos en el sistema, puedes realizar búsquedas y cambiar el estado de los cursos.</p>
    </br>



                      <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  "id"=>'test3',
                    'type'         => 'striped bordered',
                    'dataProvider' => $modelAlumnosPorCurso->BusquedaAlumnosPorCurso(),
                    'filter'       => $modelAlumnosPorCurso,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                        array(
                            'name' => 'NCuenta',
                            'header' => 'Nº De Cuenta',
                            'value' => '$data->userEstudiante->NumeroDeCuenta',
                        ),

                         array(
                            'name' => 'UsuarioEstudiante_IdUsuarioEstudiante',
                            'header' => 'Estudiante',
                            'value'=>'$data->userEstudiante->NombreCompleto',

                        ),
                          array(
                            'name' => 'carrera',
                            'header' => 'Carrera',
                            'value' => '$data->userEstudiante->carrera->NombreCarrera',
                            'filter'   =>false,
                           
                        ),
                       
                        array(
                            'name' => 'Curso_IdCurso',
                            'header' => 'Curso - Seccion - Código',
                            'value' => '$data->curso->CursoCompleto2',
                           
                        )
                           ,
                          array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado',    
                             'filter'   => array(1=>'Activo',0=>'Inactivo'),

                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->userEstudiante->IdUsuarioEstudiante',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoCurso2'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red", 2:"purple"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                                    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("test"); $.fn.yiiGridView.update("test2");}' ,
                                 
                               )
                             )
                      ,              array(
                   'class'       => 'CButtonColumn',
                   'template'    => '{Ver} ',
                   'header'      => 'PP',
                   'htmlOptions' =>  array('encodeLabel' => false ),
                   'buttons'     =>  array(
                   'Ver'     =>  array(
                   'visible'=>'AlumnosPorCurso::model()->EstudianteTienePractica($data->userEstudiante->IdUsuarioEstudiante,$data->curso->IdCurso)',
                   'url'         =>'Yii::app()->createUrl("UsuarioUnitec/detallePractica", array("Cor"=>AlumnosPorCurso::model()->codigoPractica($data->userEstudiante->IdUsuarioEstudiante,$data->curso->IdCurso)))',           
                   'label'       =>'<div class="row text-center">   <i class="fa fa-eye"  ></i>  </div> ',
                    'options'     => array(
                                              'rel'         => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Visitar sitio web',
                                              "target"=>"_blank"
                                           ),
                                           ),
                                           ),
                    )
// <?php $bool = AlumnosPorCurso::model()->EstudianteTienePractica($data->userEstudiante->IdUsuarioEstudiante,$data->curso->IdCurso);
                    )
                )
            );
        ?>



    </div>



    <div id   ="BusquedaEdicionEstudiante" class="profile-edit tab-pane fade">
    <h2 class ="heading-md">Panel de Búsqueda y Edición de Estudiantes</h2>
    <p align="justify">A continuación se muestra  la información de todos los estudiantes registrados en el sistema, puedes realizar búsquedas según los filtros mostrados en la tabla para 
        luego editar cierta Información</p>
    </br>



                      <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  "id"=>'test4',
                    'type'         => 'striped bordered',
                    'dataProvider' => $todosLosEstudiantes->TodosLosEstudiantes(),
                    'filter'       => $todosLosEstudiantes,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                        array(
                            'name' => 'NumeroDeCuenta',
                            'header' => 'Nº De Cuenta',
                            'value' => '$data->NumeroDeCuenta',
                        ), 
                       
                          array(
                            'name' => 'Carrera_IdCarrera',
                            'header' => 'Carrera',
                            'value' => '$data->carrera->NombreCarrera',
                            'filter'=>Carrera::model()->getCarreras(),
                           
                        )
                          ,

                         array(
                            'name' => 'Nombre',
                            'header' => 'Nombre',
                            'value'=>'$data->Nombre',

                        ),
                          array(
                            'name' => 'PrimerApellido',
                            'header' => 'Primer Apellido',
                            'value' => '$data->PrimerApellido',
                           
                        ), 
                       
                          array(
                            'name' => 'SegundoApellido',
                            'header' => 'Segundo Apellido',
                            'value' => '$data->SegundoApellido',
                           
                        )
                           ,
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado',    
                             'filter'   => array(1=>'Activo',0=>'Inactivo',2=>'Archivado'),

                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->IdUsuarioEstudiante',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoEstudiante'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo',2=>'Archivado', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red", 2:"purple"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                                    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("test"); $.fn.yiiGridView.update("test2");}' ,
                                 
                               )
                             ), 


                    )
                )
            );
        ?>



    </div>




    

                    
                            </div>
                        </div>    


                    </div>
                    <!--End Profile Body-->



                    <div class="modal fade" id="MatricularAlumnos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-'title'" id="myModalLabel">Eligir Curso - Matricular alumnos</h4>
                                    </div>
                                    <div class="modal-body">
                                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'CrenadoCursosCarrerasPorCurso',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/MatricularAlumnosEnMasa"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                    <div class="modal-body">

                                <fieldset>


                  <?php echo CHtml::hiddenField('name' , 'value', array('id' => 'trans')); ?>
                   <?php echo CHtml::hiddenField('Carrera' , 'value', array('id' => 'Carrera')); ?>
                                

<?php 


echo CHtml::ajaxLink(
    $text = 'Cargar Cursos', 
    $url = CController::createUrl('CargarCursosPorCarrera'),
    $ajaxOptions=array (
        'type'=>'POST',
        
        'update'=>'#CursosPorCarrera',
        ), 
    $htmlOptions=array ()
    );
?>





                                     <?php 
                                            $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'CursosPorCarrera',
                                                'options' => array(
                                                    'placeholder' => 'Seleccione el Curso',
                                                    'width' => '100%',
                                                )
                                            )
                                        );

                                    ?>

                            

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




<script type="text/javascript">

 


  $(function ( ) {

  




    if(window.location.hash  == "#estudiantes"){
   
    $('#myTab a[href="#passwordTab"]').tab('show')
    }
    else  if(window.location.hash  == "#unitec")
    {

  $('#myTab a[href="#payment"]').tab('show')

    }
    else if (window.location.hash  == "#usuariosEmp") {
 $('#myTab a[href="#usuariosEmpresasTab"]').tab('show')

    }
    else

    {
      $('#myTab a[href="#profile"]').tab('show')
    }
  })
</script>