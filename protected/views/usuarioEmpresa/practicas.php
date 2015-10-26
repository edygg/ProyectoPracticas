


 <!--Profile Body-->
                    <div class="profile-body">



               
           <?php     $bandera= 0 ;  ?>
<?php foreach($practicas as $practica):?>



<?php if( ($bandera % 2) == 0):?>
       <ul class="row list-row margin-bottom-20">
        <li class="col-md-6 md-margin-bottom-20">

<?php endif ?>

<?php if( ($bandera % 2) == 1):?>
       <li class="col-md-6">             <!--Profile Blog-->

<?php endif ?>

                             
               
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                                    
                                    <?php if($practica->asesor->Imagen != ""):?>

                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$practica->asesor->Imagen,"image",array("class"=>'rounded-x pull-left block-grid-v1-img')); ?>
                                    
                                     <?php endif ?>  

                                     <?php if($practica->asesor->Imagen == ""):?>

                                     <?php $a = array("userUnitec.png", "userUnitec2.png") ; echo CHtml::image(Yii::app()->request->baseUrl.'/assets/img/team/'. $a[rand(0,1)] ,"image",array("class"=>'rounded-x pull-left block-grid-v1-img')); ?>

                                     <?php endif ?>                          <div class="content-boxes-in-v3">
                            <h3><?php  echo CHtml::link($practica->PuestoDesempeniar,array('Site/detallePractica',  'Cor'=>$practica->IdPracticaProfesional));?> </h3>
                            
                            <ul class="list-inline margin-bottom-5">
                                <li> <i class="fa fa-building "></i>  <strong class="color-green" > Dept: </strong>  <?php echo $practica->AreaODepartamento; ?> </li>
                               
                            </ul>

                            <p align="justify"><?php echo substr($practica->ObjetivoDelCargo,0,130) . "..." ;?></p>
                            <small class="color-green" > <?php echo  substr(CarrerasPorPractica::model()->CarrerasPorPracticaToString($practica->IdPracticaProfesional),0,65) . "..."  ;?> </small>
                            <ul class="list-inline block-grid-v1-add-info">
                                <li><?php echo CHtml::link('Ver',array('site/detallePractica',  'Cor'=>$practica->IdPracticaProfesional), array('class'=>"fa fa-eye"));?></li>
                            </ul>    
                        </div>
                    </div>
                </li>


<?php if( ($bandera % 2) == 1):?>
       </ul> <!--/end row-->   
       </li><!--/end row-->



<?php endif ?>

<?php if( ($bandera % 2) == 0):?>
       </li>

           

<?php endif ?>

<?php  $bandera = $bandera + 1; ?>



<?php endforeach;?>



                        
            </div><!--/end row-->
  