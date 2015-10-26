

 <!--Profile Body-->
                    <div class="profile-body margin-bottom-20">
                        <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs" id="myTab">
                                <li class="active"><a data-toggle="tab" href="#PeriodosActivos">En Curso - Activos</a></li>
                                <li><a data-toggle="tab" href="#PeriodosAnteriores">Anteriores - Inactivos</a></li>
                                
                                
                            </ul>  

  <div class="tab-content">
                                  
                <div id="PeriodosActivos" class="profile-edit tab-pane fade in active ">
                <h2 class="heading-md">Periodos académicos en curso </h2>
                <p>Son utilizados para vincular asesores con alumno y alumnos con prácticas y/o proyectos</p>
                </br>

                   <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                    'type'         => 'striped bordered',
                    'dataProvider' => $PeriodoAcademico->BusquedaPeriodosActivos(),
                    'filter'       => $PeriodoAcademico,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                        array(
                            'name' => 'Anio',
                            'header' => 'Año',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                 'name' => 'login',
                                'type'   => 'select2',
                                'source' => array(2015 => '2015', 2016 => '2016', 2017 => '2017', 2018 => '2018', 2019 => '2019', 2020 => '2020'),
                                'pk' => '$data->IdPeriodoAcademico',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarAnioPeriodo')
                            )
                        ),
                         array(
                            'name' => 'Semestre',
                            'header' => 'Semestre',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                 
                                'type' => 'select2',
                                'source' => array('1' => '1', '2' => '2'),
                                'pk' => '$data->IdPeriodoAcademico',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarSemestrePeriodo')
                            )
                        ),
                          array(
                            'name' => 'Trimestre',
                            'header' => 'Trimestre',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(

                                'type' => 'select2',
                                'source' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4'),
                                'pk' => '$data->IdPeriodoAcademico',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarTrimestrePeriodo')
                            )
                        ),
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado',    
                             'filter'   =>false,
                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->IdPeriodoAcademico',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoPeriodo'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                      }'
                                 
                               )
                             )

                    )
                )
            );
        ?>

                <br>

               <button class="btn-u" data-toggle="modal" data-target="#AgregarPeriodoAcademico">Agregar Nuevo </button>

                </div>



    <div id   ="PeriodosAnteriores" class="profile-edit tab-pane fade">
    <h2 class ="heading-md">Periodos académicos anteriores</h2>
    <p>Fueron utilizados para la vinaculación de asesores con alumnos y alumnos con prácticas y/o proyectos, si deseas realizar cambios en periodos pasados tendras que activarlos.</p>
    </br>

                       <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                    'type'         => 'striped bordered',
                    'dataProvider' => $PeriodoAcademico->BusquedaPeriodosInactivos(),
                    'filter'       => $PeriodoAcademico,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                        array(
                            'name' => 'Anio',
                            'header' => 'Año',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                 'name' => 'login',
                                'type'   => 'select2',
                                'source' => array(2015 => '2015', 2016 => '2016', 2017 => '2017', 2018 => '2018', 2019 => '2019', 2020 => '2020'),
                                'pk' => '$data->IdPeriodoAcademico',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarAnioPeriodo')
                            )
                        ),
                         array(
                            'name' => 'Semestre',
                            'header' => 'Semestre',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(
                                 
                                'type' => 'select2',
                                'source' => array('1' => '1', '2' => '2'),
                                'pk' => '$data->IdPeriodoAcademico',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarSemestrePeriodo')
                            )
                        ),
                          array(
                            'name' => 'Trimestre',
                            'header' => 'Trimestre',
                            'class' => 'booster.widgets.TbEditableColumn',
                            'headerHtmlOptions' => array('style' => 'width:200px'),
                            'editable' => array(

                                'type' => 'select2',
                                'source' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4'),
                                'pk' => '$data->IdPeriodoAcademico',
                                'title'=> 'Editando...',
                                'url' =>  $this->createUrl('UsuarioUnitec/ActualizarTrimestrePeriodo')
                            )
                        ),
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado',    
                             'filter'   =>false,
                             'editable' => array(
                                    'type'   => 'select',
                                    'pk'     => '$data->IdPeriodoAcademico',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoPeriodo'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Inactivo'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                      }'
                                 
                               )
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
                                        <h4 class="modal-'title'" id="myModalLabel">Agregar Periodo Académico</h4>
                                    </div>
                                    <div class="modal-body">
                                                  <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'PeriodoAcademicoCrear',
                                    'action' =>  Yii::app()->createUrl("/UsuarioUnitec/CrearPeriodoAcademico"), 
                                    'htmlOptions'=>array('class'=>'sky-form'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                    )); ?>
                                        
                                     <fieldset>
                                        <div class="row">                            
                                            <section  class="col col-4">
                                            <?php 
                                            $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Anio',
                                                'data' => array('2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020'),
                                                'options' => array(
                                                    'placeholder' => 'Año',
                                                    'width' => '40%',
                                                )
                                            )
                                        );

                                    ?>
                                            </section>

                                            <section  class="col col-4">
                                            <?php 
                                            $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Semestre',
                                                'data' => array('1' => '1', '2' => '2'),
                                                'options' => array(
                                                    'placeholder' => 'Semestre',
                                                    'width' => '40%',
                                                )
                                            )
                                        );

                                    ?>
                                            </section>
                                            <section  class="col col-4">
                                            <?php 
                                            $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Trimestre',
                                                'data' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4'),
                                                'options' => array(
                                                    'placeholder' => 'Trimestre',
                                                    
                                                )
                                            )
                                        );

                                    ?>
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




