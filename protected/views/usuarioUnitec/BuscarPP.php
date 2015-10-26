
    <!--=== Job Img ===-->
    <div class="job-img margin-bottom-30">
        <div class="job-banner">
            <h2> Busca empresas para vincular a los estudiante con su práctica profesional.</h2>
        </div>   
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'BuscarFilter',
                                     'action' =>  Yii::app()->createUrl("UsuarioUnitec/resultadoBusquedaPP"), 
                                        'enableAjaxValidation'=>false,
                                    )); ?>


                    <div class="col-sm-4 md-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-cog fa-spin"></i></span>
                                        <?php                                   
                                        $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Carrera',
                                                'id'=>'Carrera',
                                                'data' => UsuarioUnitec::model()->CarrerasPorJefe(),
                                                'htmlOptions' => array(
                                                'placeholder'=>'Seleccione su Carrera', 
                                                 "ajax"=>array(
                                                "url" =>$this->createUrl("site/BuscarPracticas") ,
                                                "type"=>"POST",
                                                "update"=>"#Empresas",
                                                'beforeSend' => 'function() {           
                                               $("#Empresas").empty();
                                                }',
                                                ),
                                                ),
                                                'options'=>array('width' => '100%'),
                                                'events'=> array( "change" => 'js:function(){ $("#Empresas").select2("val", "");}')
                                            )
                                        );
                                  ?>
                        </div>
                    </div>    
                    <div class="col-sm-6 ld-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-spinner fa-spin"></i></span>
                                        <?php 
                                  

                                        $this->widget(
                                            'booster.widgets.TbSelect2',
                                            array(
                                                'name' => 'Empresas',
                                                // 'data' => CHtml::listData(Carrera::model()->findAll("Activo=?",array(1)),'IdCarrera','NombreCarrera'),
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
                    <i class="icon-custom icon-color-light rounded-x fa fa-university"></i>               
                    
                    <h2 class="heading-md">Selecciona la Carrera</h2>
                    <p style="color:white">En la barra superior podrás filtrar por las carreras de las cuales sos Jefe Académico.</p>                        
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-block service-block-red service-or">
                    <div class="service-bg"></div>                
                    <i class="icon-custom icon-color-light rounded-x icon-line icon-target"></i>
                    <h2 class="heading-md">Filtra por Empresas</h2>
                    <p style="color:white" >Cuando selecciones la carrera a filtrar, filtra por una o varias empresas. </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="service-block service-block-blue service-or">
                    <div class="service-bg"></div>                
                    <i class="icon-custom icon-color-light rounded-x fa fa-user"></i>
                    <h2 class="heading-md">Vincula los Estudiantes</h2>
                    <p style="color:white">Una vez esten frente al panel de resultados, ingresar a la vacante práctica y vicula alumnos.</p>
                </div>
            </div>
 </div>

<div class="headline"><h2>Carreras</h2></div>
<div class="row job-content margin-bottom-40">

<?php     $bandera= 1 ;  ?>
    <?php foreach($Carreras as $Carrerita):?>

            <?php if( $bandera == 1):?>

            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
            <ul class="list-unstyled categories">
            <?php endif ?>  

            <li> 
            <?php $nombre=""; if(strlen($Carrerita->NombreCarrera)<= 26){$nombre = $Carrerita->NombreCarrera ;

            } else { $nombre=


            substr($Carrerita->NombreCarrera,0,26) . "..." ; }  ;  

            ?>
            <?php
            $criteria=new CDbCriteria;
            $criteria->with = 'practica' ;
            $criteria->compare('Carrera_IdCarrera',$Carrerita->IdCarrera,false);
            $criteria->compare('practica.Activo',1,false);
            $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
            $now = new CDbExpression("NOW()");
            $criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
            

            $cantidad = count(CarrerasPorPractica::model()->findAll($criteria));

            ?>
                <?php  echo CHtml::link($nombre . "</a> <small class='hex'>( $cantidad Prácticas)</small></li>",array('UsuarioUnitec/resultadoBusquedaPPFiltro',  'Busqueda'=>$Carrerita->IdCarrera));?>
            </li>


           <?php if($divisor <= 4 ):?>

             <?php if($bandera == 1 ):?>
                    
                    </ul>
                    </div>
             <?php  $bandera = 0; ?>

            <?php endif ?>

           <?php endif ?>


             <?php if($divisor > 4 ):?>


               <?php if($bandera == floor($divisor/4) ):?>
                    
                    </ul>
                    </div>
             <?php  $bandera = 0; ?>

            <?php endif ?>
           <?php endif ?>

           

            <?php  $bandera = $bandera + 1; ?>

            



    <?php endforeach;?>

      <?php if(count($Carreras) != 24) :?>
       </ul>
       </div>
     <?php endif ?>



    
    </div>
    <!--=== End Content Part ===-->

