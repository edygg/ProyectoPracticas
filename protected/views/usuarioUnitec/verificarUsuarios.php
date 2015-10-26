

 <!--Profile Body-->
                    <div class="profile-body margin-bottom-20">
                        <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs" id="myTab">
                                <li class="active"><a data-toggle="tab" href="#profile">Empresas</a></li>
                                <li><a data-toggle="tab" href="#usuariosEmpresasTab">Usuario Empresa</a></li>
                                <li><a data-toggle="tab" href="#passwordTab">Estudiante</a></li>
                                <li><a data-toggle="tab" href="#payment">Unitec</a></li>
                                <li><a data-toggle="tab" href="#settings">Rol</a></li>
                                <li><a data-toggle="tab" href="#practicas">Prácticas </a></li>
                            </ul>  

  <div class="tab-content">
                                  
                <div id="profile" class="profile-edit tab-pane fade in active ">
                <h2 class="heading-md">Panel de Verificación de Empresas</h2>
                <p>Abajo se encuentran las empresas pendientes de confirmación. UTILIZA LOS FILTROS para realizar búsquedas.</p>
                </br>


<!--                 <?php 

                $this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
         'dataProvider' => $model->search(),
        'filter' => $model,
        'fixedHeader' => true,
        'headerOffset' => 40,
        'type' => 'striped bordered',
       
        'template' => "{items}",
        'columns' => array(

            array(
                'name' => 'RubroEmpresa',
                'header' => 'Rubro',
                'class' => 'booster.widgets.TbEditableColumn',
                'headerHtmlOptions' => array('style' => 'width:200px'),
                'editable' => array(
                    'type' => 'text',
                    'url' => 'Yii::app()->createUrl("UsuarioEstudiante/ActualizarDatos")'
                )
            )
        )
    )
);


                ?>
 -->



              <?php 
                  $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(  
                        'name'  => 'NombreEmpresa',
                        'type'  => 'raw',
                        'value' => 'CHtml::encode($data->NombreEmpresa)',
                //         'class' => 'booster.widgets.TbEditableColumn',

                //          'editable' => array(
                //     'type' => 'text',
                //     'url' => 'Yii::app()->createUrl("UsuarioEstudiante/ActualizarDatos")'
                // )
                    ),
                    array(
                        'name'  => 'TelefonoEmpresa',
                        'type'  => 'raw',
                        'value' => 'CHtml::encode($data->TelefonoEmpresa)'
                    ),  array(
                        'name'  => 'RubroEmpresa',
                        'type'  => 'raw',
                        'value' => 'CHtml::encode($data->RubroEmpresa)'
                    )
                    ,  
                      
              array(
                   'class'       => 'CButtonColumn',
                   'template'    => '{WebSite} ',
                   'header'      => 'Website',
                   'htmlOptions' =>  array('encodeLabel' => false ),
                   'buttons'     =>  array(
                   'WebSite'     =>  array(
                   'url'         =>'Yii::app()->createUrl("UsuarioUnitec/AbrirSitioWeb", array("WebSite"=>$data->SitioWebEmpresa))',           
                   'label'       =>'<div class="row text-center">   <i class="fa fa-globe"  ></i> </div> ',
                    'options'     => array(
                                              'rel'         => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Visitar sitio web',
                                              "target"=>"_blank"
                                           ),
                                           ),
                                           ),
                    ),

              array(
                  'class'       => 'CButtonColumn',
                  'template'    => '{Email} ',
                  'header'      => 'Email',
                  'htmlOptions' => array('encodeLabel' => false ),
                  'buttons'     => array(
                  'Email'       => array(
                  'url'         => 'Yii::app()->createUrl("UsuarioUnitec/EnviarCorreoEmpresa", array("CorreoEmpresa"=>$data->CorreoEmpresa))',           
                  'label'       => ' <div class="row text-center">  <i class="fa fa-envelope"  ></i>    </div> ',    
                  'options'     => array(
                                               'rel'         => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Enviar Correo Electrónico'
                                        ),
                                        ),
                                        ),
                    ),

              array(
                'class'       => 'CButtonColumn',
                'template'    => '{Verificar} ',
                'header'      => 'Verificar',
                'htmlOptions' => array('encodeLabel' => false ),
                'buttons'     => array(
                'Verificar'   => array(
                'url'         => 'Yii::app()->createUrl("UsuarioUnitec/VerificarEmpresa", array("Activar"=>$data->IdUsuarioEmpresa))',
                'label'       => ' <div class="row text-center"> <i class="fa fa-check-square-o"  ></i> Verificar </div>',
                'options'     => array(
                                               'rel' => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Verificar Empresa',    
                                               'confirm'=>'¿Seguro que desea verificar esta empresa?'
                                        ),
                                        ),
                                        ),
                    ),

                ),
            ));
          ?>


  </div>



    <div id   ="usuariosEmpresasTab" class="profile-edit tab-pane fade">
    <h2 class ="heading-md">Panel de Verificación de usuarios Empresariales</h2>
    <p>Abajo se encuentran nuevos usuarios de empresas ya creadas. UTILIZA LOS FILTROS para realizar búsquedas.</p>
    </br>



                                                <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  "id"=>'test4',
                    'type'         => 'striped bordered',
                    'dataProvider' => $modelUsuarioEmpresa->BusquedaUsuariosEmpresaInactivos(),
                    'filter'       => $modelUsuarioEmpresa,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                            array(
                        'name'  => 'NombreCompleto',
                        'type'  => 'raw',

                        'value' =>  'CHtml::encode($data->NombreCompleto) ',
                    ),
                      array(
                        'name'  => 'UsuarioEmpresa_IdUsuarioEmpresa',
                        'type'  => 'raw',
                        'header'      => 'Empresa',
                        'filter'=>  ContactoEmpresa::model()->EmpresasContactoEmpresaInactivos(),
                        'value' =>  'CHtml::Link($data->usuarioEmpresa->NombreEmpresa)',


                    ),
                    array(
                        'name'  => 'TelefonoCelular',
                        'type'  => 'raw',
                        'value' => 'CHtml::encode($data->TelefonoCelular)'
                    ),  
                     array(
                        'name'  => 'PuestoEmpresa',
                        'type'  => 'raw',
                        'value' => 'CHtml::encode($data->PuestoEmpresa)'
                    ),  

              array(
                  'class'       => 'CButtonColumn',
                  'template'    => '{Email} ',
                  'header'      => 'Email',
                  'htmlOptions' => array('encodeLabel' => false ),
                  'buttons'     => array(
                  'Email'       => array(
                  'url'         => 'Yii::app()->createUrl("UsuarioUnitec/EnviarCorreoEmpresa", array("CorreoEmpresa"=>$data->CorreoElectronico))',           
                  'label'       => ' <div class="row text-center">  <i class="fa fa-envelope"  ></i>    </div> ',    
                  'options'     => array(
                                               'rel'         => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Enviar Correo Electrónico'
                                        ),
                                        ),
                                        ),
                    ),

              array(
                'class'       => 'CButtonColumn',
                'template'    => '{Verificar} ',
                'header'      => 'Verificar',
                'htmlOptions' => array('encodeLabel' => false ),
                'buttons'     => array(
                'Verificar'   => array(
                'url'         => 'Yii::app()->createUrl("UsuarioUnitec/VerificarUsuarioEmpresa", array("Activar"=>$data->IdContactoEmpresa))',
                'label'       => ' <div class="row text-center"> <i class="fa fa-check-square-o"  ></i> Verificar </div>',
                'options'     => array(
                                               'rel' => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Verificar Empresa',    
                                               'confirm'=>'¿Seguro que desea verificar esta usuario?'
                                        ),
                                        ),
                                        ),
                    ),
                    )
                )
            );
        ?>



<!-- 
        <?php 


                  $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider' => $modelUsuarioEmpresa->BusquedaUsuariosEmpresaInactivos(),
                'filter' => $modelUsuarioEmpresa,
                'htmlOptions' => array('class' => 'table-responsive'),
                'columns' => array(
                    array(
                        'name'  => 'NombreCompleto',
                        'type'  => 'raw',

                        'value' =>  'CHtml::encode($data->NombreCompleto) ',
                    ),
                      array(
                        'name'  => 'UsuarioEmpresa_IdUsuarioEmpresa',
                        'type'  => 'raw',
                        'header'      => 'Empresa',
                        'filter'=>  CHtml::listData(UsuarioEmpresa::model()->findAll(array('order'=>'NombreEmpresa')),'IdUsuarioEmpresa','NombreEmpresa'),
                        'value' =>  'CHtml::Link($data->usuarioEmpresa->NombreEmpresa)',


                    ),
                    array(
                        'name'  => 'TelefonoCelular',
                        'type'  => 'raw',
                        'value' => 'CHtml::encode($data->TelefonoCelular)'
                    ),  
                     array(
                        'name'  => 'PuestoEmpresa',
                        'type'  => 'raw',
                        'value' => 'CHtml::encode($data->PuestoEmpresa)'
                    ),  

              array(
                  'class'       => 'CButtonColumn',
                  'template'    => '{Email} ',
                  'header'      => 'Email',
                  'htmlOptions' => array('encodeLabel' => false ),
                  'buttons'     => array(
                  'Email'       => array(
                  'url'         => 'Yii::app()->createUrl("UsuarioUnitec/EnviarCorreoEmpresa", array("CorreoEmpresa"=>$data->CorreoElectronico))',           
                  'label'       => ' <div class="row text-center">  <i class="fa fa-envelope"  ></i>    </div> ',    
                  'options'     => array(
                                               'rel'         => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Enviar Correo Electrónico'
                                        ),
                                        ),
                                        ),
                    ),

              array(
                'class'       => 'CButtonColumn',
                'template'    => '{Verificar} ',
                'header'      => 'Verificar',
                'htmlOptions' => array('encodeLabel' => false ),
                'buttons'     => array(
                'Verificar'   => array(
                'url'         => 'Yii::app()->createUrl("UsuarioUnitec/VerificarUsuarioEmpresa", array("Activar"=>$data->IdContactoEmpresa))',
                'label'       => ' <div class="row text-center"> <i class="fa fa-check-square-o"  ></i> Verificar </div>',
                'options'     => array(
                                               'rel' => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Verificar Empresa',    
                                               'confirm'=>'¿Seguro que desea verificar esta usuario?'
                                        ),
                                        ),
                                        ),
                    ),

                ),
            ));
          ?>
 -->

    </div>


    <div id   ="passwordTab" class="profile-edit tab-pane fade">
    <h2 class ="heading-md">Panel de Verificación de Alumnos</h2>
    <p>Abajo se encuentran los alumnos de las carreras que tu asesoras. UTILIZA LOS FILTROS para realizar búsquedas.</p>
    </br>



                                                <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  "id"=>'PanelVerificacionAlumnos',
                    'type'         => 'striped bordered',
                    'dataProvider' => $modelEstudiantes->BusquedaAlumnosInactivos(),
                    'filter'       => $modelEstudiantes,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                              array(
            'name' => 'Nombre',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->NombreCompleto)',

        ),
         array(
            'name' => 'NumeroDeCuenta',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->NumeroDeCuenta)'
        ),
         array(
            'name' => 'Carrera_IdCarrera',
            'type' => 'raw',
            'filter'=>  UsuarioUnitec::model()->CarrerasPorJefe(),
            'value' => 'CHtml::encode($data->carrera->NombreCarrera)'
        )
              ,  


                          array(
  'class'=>'CButtonColumn',
  'template'=>'{Verificar} ',
  'header' => 'Verificar',

  'htmlOptions'=>array('encodeLabel' => false ),
  'buttons'=>array(
  'Verificar' => array(
  'url'=>'Yii::app()->createUrl("UsuarioUnitec/VerificarAlumnos", array("Activar"=>$data->IdUsuarioEstudiante))',
  'label'=>' <div class="row text-center"> <i class="fa fa-check-square-o"  ></i> Verificar </div>',
  'options' => array(

                                         'rel' => 'tooltip',
                                         'data-toggle' => 'tooltip', 
                                         'title'       => 'Verificar Empresa',

                                        'confirm'=>'¿Seguro que desea verificar este alumno?',
  
                                       ),


   ),


  ),
 ),


                    )
                )
            );
        ?>




                                        <!-- <label class="toggle toggle-change"><input type="checkbox" checked="" name="checkbox-toggle-1"><i></i>Remember password</label> -->
                                        </br>
                                      <!--   <section>
                                            <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>
                                        </section> -->
                                        
                                    

                                  
                                            

                                   
                                </div>

                                <div id="payment" class="profile-edit tab-pane fade">
                                    <h2 class="heading-md">Panel de Verificación de Jefes y Asesores de UNITEC </h2>
                                    <p>Abajo se encuentran solicitudes de Jefes y Asesores que desean ser parte del sistema. UTILIZA LOS FILTROS para realizar búsquedas.</p>
                                    </br>


                                                                               <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  "id"=>'PanelVerificacionUsuarioUnitec',
                    'type'         => 'striped bordered',
                    'dataProvider' => $modelUnitec->BusquedaUnitecInactivos(),
                    'filter'       => $modelUnitec,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                           array(
            'name' => 'Nombre',
            'header' =>'Nombre del Asesor o Jefe Académico',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->NombreCompleto)',

        )
        ,  
 
              array(
  'class'=>'CButtonColumn',
   'template'=>'{Email} ',
    'header' => 'Email',
   'htmlOptions'=>array('encodeLabel' => false ),
  'buttons'=>array(
   'Email' => array(
    'url'=>'Yii::app()->createUrl("UsuarioUnitec/EnviarCorreoEmpresa", array("CorreoEmpresa"=>$data->Email))',
    
    'label'=>' <div class="row text-center">  <i class="fa fa-envelope"  ></i>    </div> ',

    'options' => array(
                                         'rel' => 'tooltip',
                                         'data-toggle' => 'tooltip', 
                                         'title'       => 'Enviar Correo Electrónico'
                     
 
                                       ),

   ),


  ),
 ),

                          array(
  'class'=>'CButtonColumn',
  'template'=>'{Verificar} ',
  'header' => 'Verificar',
  'htmlOptions'=>array('encodeLabel' => false ),
  'buttons'=>array(
  'Verificar' => array(
  'url'=>'Yii::app()->createUrl("UsuarioUnitec/VerifcarUnitec", array("Activar"=>$data->IdUsuarioUnitec))',
  'label'=>' <div class="row text-center"> <i class="fa fa-check-square-o"  ></i> Verificar </div>',
  'options' => array(
                                         'rel' => 'tooltip',
                                         'data-toggle' => 'tooltip', 
                                         'title'       => 'Verificar Empresa',

                                        'confirm'=>'¿Seguro que desea verificar este usuario?'
                                       ),
   ),
  ),
 )

                    )
                )
            );
        ?>



                                   



                         
                                </div>

                                <div id="settings" class="profile-edit tab-pane fade">
                                    <h2 class="heading-md">Panel de verificación de Asesores y Jefes Por Carrera</h2>
                                    <p>Puedes verificar solicitudes de usuarios que desean ser Asesores o Jefes Académicos... </p>
                                    </br>
                                    


                                                <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  "id"=>'test2',
                    'type'         => 'striped bordered',
                    'dataProvider' => $carrerasPorUsuarioUnitec->BusquedaPrueba(),
                    'filter'       => $carrerasPorUsuarioUnitec,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                       
                        array(
                            'name' => 'UsuarioUnitec_IdUsuarioUnitec',
                            'header' => 'Usuario',
                            'value' => '$data->userUnitec->NombreCompleto',
                            
                           
                        ),
                         array(
                            'name' => 'Carrera_IdCarrera',
                            'header' => 'Carrera',
                            'filter'=> Carrera::model()->getCarreras(),
                            'value'=>'$data->carrera->NombreCarrera',
                            
                            
                        ),
                          array(
                            'name' => 'TipoUsuarioUnitec_IdTipoUsuarioUnitec',
                            'header' => 'Asesor/Jefe',
                            'filter'=>  CHtml::listData(TipoUsuarioUnitec::model()->findAll(),'IdTipoUsuarioUnitec','Nombre'),
                            'value'=>'$data->tipoUsuarioUnitec->Nombre',
                            
                          
                        )
                          ,
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado',    
                             'filter'   =>false,
                             'editable' => array(
                                    'type'   => 'select',
                                    'pk' => '$data->IdCarreraPorUsuarioUnitec',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoCarreraPorUsuario'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Pendiente'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("PanelVerificacionAlumnos"); $.fn.yiiGridView.update("test2");}' ,

                                 
                               )
                             )

                    )
                )
            );
        ?>





                                </div>

                                    <div id="practicas" class="profile-edit tab-pane fade">
                                    <h2 class="heading-md">Panel de verificación de Prácticas Profesionales</h2>
                                    <p>Puedes verificar las requisiciones de prácticas profesionales según las carreras a tu cargo.</p>
                                    </br>
                                    


                                                <?php 

        $this->widget(
            'booster.widgets.TbExtendedGridView',
                array(
                  'id'=>'PracticasInactivas',
                    'type'         => 'striped bordered',
                    'dataProvider' => $Practicas->BusquedaPracticasInactivas(),
                    'filter'       => $Practicas,
                    'emptyText'    => 'No se encontraron registros',
                    'columns'      => array(
                        array(
                            'name' => 'ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa',
                            'header' => 'Empresa',
                            'value' => '$data->asesor->usuarioEmpresa->NombreEmpresa',
                        ),
                        array(
                            'name' => 'AreaODepartamento',
                            'header' => 'Departamento',
                            'value' => '$data->AreaODepartamento',
                        ),
                         array(
                            'name' => 'PuestoDesempeniar',
                            'header' => 'Puesto',
                            'value'=>'$data->PuestoDesempeniar',
                        )                         ,              array(
                   'class'       => 'CButtonColumn',
                   'template'    => '{Ver} ',
                   'header'      => 'Ver',
                   'htmlOptions' =>  array('encodeLabel' => false ),
                   'buttons'     =>  array(
                   'Ver'     =>  array(
                   'url'         =>'Yii::app()->createUrl("UsuarioUnitec/detallePractica", array("Cor"=>$data->IdPracticaProfesional))',           
                   'label'       =>'<div class="row text-center">   <i class="fa fa-eye"  ></i> </div> ',
                    'options'     => array(
                                              'rel'         => 'tooltip',
                                               'data-toggle' => 'tooltip', 
                                               'title'       => 'Visitar sitio web',
                                              "target"=>"_blank"
                                           ),
                                           ),
                                           ),
                    )
                   /*       ,
                         array(
                             'class'    => 'booster.widgets.TbEditableColumn',
                             'name'     => 'Activo',
                             'header'   => 'Estado',    
                             'filter'   =>false,
                             'editable' => array(
                                    'type'   => 'select',
                                    'pk' => '$data->IdPracticaProfesional',
                                    'url'    =>  $this->createUrl('UsuarioUnitec/ActualizarEstadoCarreraPorUsuario'),
                                    'title'  => 'Seleccione Estado...',
                                    'source' => array(1=>'Activo', 0=>'Pendiente'),
                                   'display' => 'js: function(value, sourceData) {
                                     var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                                     colors = {1: "green", 0: "red"};
                                    $(this).text(selected[0].text).css("color", colors[value]);    
                      }',
                      'success'   =>'js: function() {$.fn.yiiGridView.update("PanelVerificacionAlumnos"); $.fn.yiiGridView.update("test2");}' ,

                                 
                               )
                             )*/

                    )
                )
            );
        ?>
                                </div>


                            </div>
                        </div>    
                    </div>
                    <!--End Profile Body-->



                                            <!-- Small modal -->  
                       <!--  <button class="btn-u" data-toggle="modal" data-target=".bs-example-modal-sm">Small Modal</button> -->
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
