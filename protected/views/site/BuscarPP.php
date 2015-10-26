
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
                                     'action' =>  Yii::app()->createUrl("Site/resultadoBusquedaPP"), 
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
                                                'data' => CHtml::listData(Carrera::model()->findAll("Activo=?",array(1)),'IdCarrera','NombreCarrera'),
                                                'htmlOptions' => array(
                                                'placeholder'=>'Seleccione su Carrera',
                                                 "ajax"=>array(
                                                "url" =>$this->createUrl("BuscarPracticas") ,
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
                    <i class="icon-custom icon-color-light rounded-x fa fa-building"></i>
                    <h2 class="heading-md">Busca  Empresas</h2>
                    <p style="color:white">Según tu carrera, ya sea desde la barra de búsqueda o desde más abajo en Carreras.</p>                        
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-block service-block-red service-or">
                    <div class="service-bg"></div>                
                    <i class="icon-custom icon-color-light rounded-x icon-line icon-target"></i>
                    <h2 class="heading-md">Selecciona tú Práctica</h2>
                    <p style="color:white" >Agrega las mejores opciones a tu escritorio, luego estarán en tu perfil público. </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="service-block service-block-blue service-or">
                    <div class="service-bg"></div>                
                    <i class="icon-custom icon-color-light rounded-x icon-line icon-graduation"></i>
                    <h2 class="heading-md">Matricula con tu Jefe académico</h2>
                    <p style="color:white">Ellos tienen acceso a tu escritorio, podrán realizar el proceso de vinculación.</p>
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
                <?php  echo CHtml::link($nombre . "</a> <small class='hex'>( $cantidad Prácticas)</small></li>",array('Site/resultadoBusquedaPPFiltro',  'Busqueda'=>$Carrerita->IdCarrera));?>
            </li>


           



             <?php if($bandera == 5 ):?>
                    
                    </ul>
                    </div>
             <?php  $bandera = 0; ?>

            <?php endif ?>

            <?php  $bandera = $bandera + 1; ?>

            



    <?php endforeach;?>

      <?php if(count($Carreras) != 24) :?>
       </ul>
       </div>
     <?php endif ?>


</div>    


          
  
    </div>
    <!--=== End Content Part ===-->


