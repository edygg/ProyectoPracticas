
<div class="profile-body">



               
           <?php     $bandera= 0 ;  ?>
<?php foreach($Cursos as $Curso):?>



<?php if( ($bandera % 2) == 0):?>
    <div class="row margin-bottom-15">
       <div class="col-sm-6 sm-margin-bottom-20">                <!--Profile Blog-->

<?php endif ?>

<?php if( ($bandera % 2) == 1):?>
       <div class="col-sm-6   ">                <!--Profile Blog-->

<?php endif ?>

                             <div class="service-block-v3 service-block-blue">
                                
                                <span class="service-heading"><?php echo $Curso->Nombre; ?></span>

                                <span class="counter"><?php echo AlumnosPorCurso::model()->ContarAlumnosPorCurso($Curso->IdCurso); ?>  </span> 
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>Código</small>
                                        <h4 ><?php echo $Curso->Codigo; ?></h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>Sección</small>
                                        <h4 class="counter"><?php echo $Curso->Seccion; ?> </h4>
                                    </div>
                                </div>
                                <div class="statistics">
                                <h3 class="heading-xs">Periodo Académico: <?php echo $Curso->periodoAcademico->PeriodoConcatenado; ?> <span class="pull-right"><?php echo CHtml::link('Mis Alumnos',array('UsuarioUnitec/MisAlumnos',  'Seccion'=>$Curso->IdCurso), array('style'=>"color: #FFFFFF "));?></span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">
                                        </div>
                                    </div>
                                    <small><?php echo CarrerasPorCurso::model()->CarrerasPorCursoToString($Curso->IdCurso); ?></small>
                                </div>            
                            </div>

<?php if( ($bandera % 2) == 1):?>
       </div> <!--/end row-->   

       </div><!--/end row-->



<?php endif ?>

<?php if( ($bandera % 2) == 0):?>
        
       </div> <!--/end row-->   

           

<?php endif ?>

<?php  $bandera = $bandera + 1; ?>



<?php endforeach;?>


</div><!--/end row-->   







