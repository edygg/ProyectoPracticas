
 <!--Profile Body-->
                    <div id="hola" class="profile-body">


           <?php     $bandera= 0 ;  ?>
<?php foreach($CursosPorEstudiante as $Curso):?>


<form>
<?php if( ($bandera % 2) == 0):?>
    <div class="row margin-bottom-15">
       <div class="col-sm-6 sm-margin-bottom-20">                <!--Profile Blog-->

<?php endif ?>

<?php if( ($bandera % 2) == 1):?>
       <div class="col-sm-6   ">                <!--Profile Blog-->

<?php endif ?>

                             <div class="service-block-v3 service-block-blue">
                                
                                <span class="service-heading"><?php echo $Curso->curso->Nombre; ?></span>

                                <span class="counter"> <?php echo AlumnosPorCurso::model()->ContarAlumnosPorCurso($Curso->Curso_IdCurso); ?>   </span> 
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>Código</small>
                                        <h4 ><?php echo $Curso->curso->Codigo; ?></h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>Sección</small>
                                        <h4 class="counter"><?php echo $Curso->curso->Seccion; ?> </h4>
                                    </div>
                                </div>
                                <div class="statistics">
                                <h3 class="heading-xs"> <?php echo CHtml::link('Mis Compañeros',array('UsuarioEstudiante/MisCompanieros',  'Seccion'=>$Curso->Curso_IdCurso), array('style'=>"color: #FFFFFF "));?>

                                     <?php if(PracticasPorAlumno::model()->obtenerEmpresaDePracticaBoolean($Curso->Curso_IdCurso,$Curso->UsuarioEstudiante_IdUsuarioEstudiante)) :?>
                                    <span class="pull-right"><?php echo CHtml::link('Registro de Asesoramiento',array('UsuarioEstudiante/verAsesoramientos', 'curso'=>$Curso->Curso_IdCurso,'Practica'=>PracticasPorAlumno::model()->obtenerCodigoDePractica($Curso->Curso_IdCurso,$Curso->UsuarioEstudiante_IdUsuarioEstudiante),'Estudiante'=>$Curso->UsuarioEstudiante_IdUsuarioEstudiante),array('style'=>"color: #FFFFFF ")); ?></span></h3>
                                     <?php endif ?>
                                       <?php if(!PracticasPorAlumno::model()->obtenerEmpresaDePracticaBoolean($Curso->Curso_IdCurso,$Curso->UsuarioEstudiante_IdUsuarioEstudiante)) :?>
                                    <span style="color:black"class="pull-right">Centro de Práctica Pendiente</span></h3>
                                     <?php endif ?>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">
                                        </div>
                                    </div>


                                    <small> ASESOR: <?php echo $Curso->curso->usuarioUnitec->PrimerNombrePrimerApellido; ?></small>
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

</form>

<?php endforeach;?>






                    </div>
                    </div>


