


 <!--Profile Body-->
                    <div class="profile-body">

                        <div class="shadow-wrapper">
            <div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
                <h2 align="center">Prácticas Profesionales En Curso</h2>
                <p align="center">En esta sección se detallan las vacantes a Prácticas Profesionales ya vinculadas con estudiantes o esperando vinculación. Sí las vacantes a  prácticas están proximas a vencerse pasarán a 
                    el panel de <strong>Prácticas Archivadas</strong>, cambia la fecha y volverán a estar disponibles para los estudiantes de UNITEC.</p>
            </div>
        </div>

               
           <?php     $bandera= 0 ;  ?>
<?php foreach($practicas as $practica):?>
<?php date_default_timezone_set('America/Tegucigalpa');  $nowtime = date('Y-m-d H:i:s') ;?>
<?php if(( ($practica->Activo == 1) and ($practica->FechaVencimientoPlaza > $nowtime )) or   (($practica->Activo == 1) and ($practica->UsuarioEstudiante_IdUsuarioEstudiante != 0)  and ($practica->FechaVencimientoPlaza < $nowtime ))) :?>

<?php if( ($bandera % 2) == 0):?>
       <ul class="row list-row margin-bottom-20">
        <li class="col-md-6 md-margin-bottom-20">

<?php endif ?>

<?php if( ($bandera % 2) == 1):?>
       <li class="col-md-6">             <!--Profile Blog-->

<?php endif ?>

                             
               
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                        
                        <div class="content-boxes-in-v3">
                            <h3><?php  echo CHtml::link($practica->PuestoDesempeniar,array('Site/detallePractica',  'Cor'=>$practica->IdPracticaProfesional));?> </h3>
                            
                            <ul class="list-inline margin-bottom-5">
                                <li> <i class="fa fa-building "></i>  <strong class="color-green" > Dept: </strong>  <?php echo $practica->AreaODepartamento; ?> </li>
                                <li><i class="fa fa-clock-o"></i> <strong class="color-red" >Vence: </strong> <?php echo  date("F j, Y", strtotime($practica->FechaVencimientoPlaza));  ; ?> </li>
                            </ul>

                            <p align="justify"><?php echo substr($practica->ObjetivoDelCargo,0,150) . "..." ;?></p>
                            <small class="color-green" > <?php echo CarrerasPorPractica::model()->CarrerasPorPracticaToString($practica->IdPracticaProfesional);?> </small>
                            <ul class="list-inline block-grid-v1-add-info">
                                <?php if($practica->Activo == 1) :?>
                                <li><?php echo CHtml::link(' Ver',array('Site/detallePractica',  'Cor'=>$practica->IdPracticaProfesional), array('class'=>"fa fa-eye"));?></li>
                                <?php if($practica->UsuarioEstudiante_IdUsuarioEstudiante != 0):?> 
                                <li><a href="#" style = "color:green"><i  style= "color:green" class="fa fa fa-user"></i> <?php  echo "Vinculada con - " . ucwords(strtolower($practica->usuarioEstudiante->Nombre ." " .$practica->usuarioEstudiante->PrimerApellido))     ;?> </a></li>
                                <?php endif ?>
                                <?php if($practica->UsuarioEstudiante_IdUsuarioEstudiante == 0):?> 
                                <li><a href="#" style = "color:red"><i  style= "color:red" class="fa fa fa-user"></i> Esperando Vinculación con Estudiante </a></li>
                                <?php endif ?>

                                 <?php endif ?> 

                                <?php if($practica->Activo == 0):?>
                                <li><?php echo CHtml::link(' Editar',array('UsuarioEmpresa/editarPP',  'cpp'=>$practica->IdPracticaProfesional), array('class'=>"fa fa-pencil-square-o"));?></li>
                                <li><a href="#" style = "color:red"><i  style= "color:red" class="fa fa-rss"></i> Solicitar Aprobación</a></li>
                                <?php endif ?>
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


<?php endif ?>
<?php endforeach;?>



                        
            </div><!--/end row-->
  