
    

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
                                    'htmlOptions'=>array('class'=>'sky-form'),
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
                    <div class="col-sm-5 ld-margin-bottom-10">
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




        <div class="container content"> 
        <!-- Portfolio Sorting Blocks -->
        <div class="sorting-block">
           


            <div class="bg-grey  ">

                 <ul class="sorting-nav sorting-nav-v1 text-center">
                <li class="filter active" data-filter="all">#Todos</li>

                <?php foreach($Empresas as $empresa):?>
                <li class="filter" data-filter='<? echo  "panel_". $empresa->UsuarioEmpresa_IdUsuarioEmpresa; ?>' >
                <? echo "#".  preg_replace('/\s+/','',ucwords( strtolower($empresa->empresa->NombreEmpresa)));   ; ?></li>

                <?php endforeach;?>
                
            </ul>
            
            <ul class="row  sorting-grid  ">

       <?php foreach($Practicas as $practica):?>
       <div class="form">
<?php echo CHtml::beginForm(); ?>

                       <li class="col-md-4 md-margin-bottom-30 mix <? echo  "panel_". $practica->UsuarioEmpresa_IdUsuarioEmpresa; ?> mix_all" data-cat="1" style="display: inline-block; opacity: 1;">
                    <div class="content-boxes-v3 block-grid-v1  bg-grey rounded">
                           
                          
                        <?php if($practica->practica->asesor->Imagen != ""):?>

                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'. $practica->practica->asesor->Imagen,"image",array("class"=>'rounded-x pull-left block-grid-v1-img')); ?>
                                    
                                     <?php endif ?>  

                                     <?php if($practica->practica->asesor->Imagen == ""):?>

                                     <?php $a = array("userUnitec.png", "userUnitec2.png") ; echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/team/'. $a[rand(0,1)] ,"image",array("class"=>'rounded-x pull-left block-grid-v1-img')); ?>

                                     <?php endif ?>    

                        <div class="content-boxes-in-v3 ">
                            <h3>
                                <?php $Cargo = substr($practica->practica->PuestoDesempeniar ,0,21) . "..." ;?>

                                 <?php  echo CHtml::link($Cargo ,array('Site/detallePractica',  'Cor'=>$practica->practica->IdPracticaProfesional));?>
               

                            </h3>
                            <ul class="star-vote">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <ul class="list-inline margin-bottom-5">
                                <li>Por: <a class="color-green" href="#"><?php echo substr(ucwords( strtolower($practica->practica->asesor->NombreCompleto )) ,0,14). "."    ;?></a></li>
                                
                                <li><i class="fa fa-clock-o"></i> <?php echo date("F j", strtotime($practica->practica->FechaVencimientoPlaza)) ;?></li>
                            </ul>
                            <p><?php echo substr(ucwords( strtolower($practica->practica->ObjetivoDelCargo )) ,0,105) . "..."  ; ?></p>

                            <ul class="list-inline block-grid-v1-add  pull-right ">
                            
     

                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                               
                            </ul>    
                        </div>
                    </div>
                </li>


<?php echo CHtml::endForm(); ?>
</div><!-- form -->


                <?php endforeach;?>

        
            </ul>
        
            <div class="clearfix"></div>
        </div>
        <!-- End Portfolio Sorting Blocks -->
    </div>
       </div>
        