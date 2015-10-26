
    <!--=== Job Img ===-->
    <div class="job-img margin-bottom-30">
        <div class="job-banner">
            <h2> Descubre las empresas donde te gustaria hacer tu práctica profesional</h2>
        </div>   
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'BuscarFilter',
                                     'action' =>  Yii::app()->createUrl("UsuarioEstudiante/resultadoBusquedaPP"), 
                                        'enableAjaxValidation'=>false,
                                    )); ?>
   
                    <div class="col-sm-10 ld-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-spinner fa-spin"></i></span>
                                        <?php    

                                        $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Empresas',
                                                'data' => UsuarioEstudiante::model()->BuscarPracticas(),
                                                'htmlOptions' => array(
                                                'multiple' => 'multiple',
                                                'placeholder'=>'Seleccione Empresas',
                                                ),
                                                'options'=>array('width' => '100%'),                                                  
                                               
                                            )
                                        );


  
                                  ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn-u btn-block btn-u-dark">Buscar</button>
                    </div>

<?php $this->endWidget(); ?>

                </div>
            </div>    
        </div>    
    </div>    
    <!--=== End Job Img ===-->

    <!--=== Content Part ===-->
    <div class="container content">

<div class="row margin-bottom-40">
            <div class="col-md-4 col-sm-6">
                <div class="service-block service-block-sea service-or">
                    <div class="service-bg"></div>                
                    <i class="icon-custom icon-color-light rounded-x fa fa-building"></i>
                    <h2 class="heading-md">Busca  Empresas</h2>
                    <p style="color:white">Según tu carrera, desde la barra de búsqueda o desde más abajo en nuevas opciones.</p>                        
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-block service-block-red service-or">
                    <div class="service-bg"></div>                
                    <i class="icon-custom icon-color-light rounded-x icon-line icon-target"></i>
                    <h2 class="heading-md">Selecciona tú Práctica</h2>
                    <p style="color:white" >Agrega las mejores opciones a tu escritorio, luego estarán en tu perfil.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="service-block service-block-blue service-or">
                    <div class="service-bg"></div>                
                    <i class="icon-custom icon-color-light rounded-x icon-line icon-graduation"></i>
                    <h2 class="heading-md">Matricula con tu Jefe académico</h2>
                    <p style="color:white">Ellos te vincularán con una práctica profesional y luego a trabajar.</p>
                </div>
            </div>
 </div>




</div>
