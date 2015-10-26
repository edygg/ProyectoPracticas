


 <!--Profile Body-->
                    <div class="profile-body">
                        <div class="profile-bio">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="img-responsive md-margin-bottom-10" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/team/5.jpg" alt="">
                                    <a class="btn-u btn-u-sm" href="#">Cambiar Foto</a>
                                </div>
                                <div class="col-md-7">
                                    <h2><?php echo  $model->Nombre . " ".$model->PrimerApellido;   ?></h2>
                                    <span><strong>Asesorando :</strong> </span> 
                                    <span><strong>Correo:</strong> <?php echo  $model->Email; ?></span>
                                    <hr>
                                    <?php if ( ($model->ObjetivoProfesional == "") or ($model->DescripcionPersonal == "" )) : ?>
                                    <p>Un poco acerca del estudiante, una breve reseña de si mismo o algo asi. Por ahora esta información se llena desde editar perfil. Integer nulla felis, porta suscipit nulla et, dignissim commodo nunc. Morbi a semper nulla.</p>
                                    <p>Proin mauris odio, pharetra quis ligula non, vulputate vehicula quam. Nunc in libero vitae nunc ultricies tincidunt ut sed leo. Sed luctus dui ut congue consequat. Cras consequat nisl ante, nec malesuada velit pellentesque ac. Pellentesque nec arcu in ipsum iaculis convallis.</p>
                                   <?php endif; ?>
                                   
                                  <?php if (($model->ObjetivoProfesional != "" ) && ($model->DescripcionPersonal != "" )): ?>
                                   <p align="justify"> <?php echo $model->ObjetivoProfesional ;?> </p>
                                    <p align="justify"> <?php echo $model->DescripcionPersonal ;?> </p>
                                  <?php endif; ?>

                                </div>
                            </div>    
                        </div><!--/end row-->
                                
                        <hr>

                        <div class="row">
                            <!--Social Icons v3-->
                        <!--     <div class="col-sm-6 sm-margin-bottom-30">
                                <div class="panel panel-profile">
                                    <div class="panel-heading overflow-h">
                                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Social Contacts <small>(option 1)</small></h2>
                                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                    </div>
                                    <div class="panel-body">
                                         <ul class="list-unstyled social-contacts-v2">
                                            <li><i class="rounded-x tw fa fa-twitter"></i> <a href="#">edward.rooster</a></li>
                                            <li><i class="rounded-x fb fa fa-facebook"></i> <a href="#">Edward Rooster</a></li>
                                            <li><i class="rounded-x sk fa fa-skype"></i> <a href="#">edwardRooster77</a></li>
                                            <li><i class="rounded-x gp fa fa-google-plus"></i> <a href="#">rooster77edward</a></li>
                                            <li><i class="rounded-x gm fa fa-envelope"></i> <a href="#">edward77@gmail.com</a></li>
                                        </ul>
                                    </div>       
                                </div>
                            </div> -->
                            <!--End Social Icons v3-->


                            <!--Skills-->
                            <div class="col-sm-6 sm-margin-bottom-30">
                                <div class="panel panel-profile">
                                    <div class="panel-heading overflow-h">
                                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Idiomas</h2>
                                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        <small>Español</small>
                                        <small>100%</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>

                                        <small>Inles</small>
                                        <small>75%</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 77%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>

                                        <small>Frances</small>
                                        <small>40%</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>

                                        <small>Mandarín</small>
                                        <small>20%</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 81%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>    
                            <!--End Skills-->            

                            <!--Skills-->
                            <div class="col-sm-6 sm-margin-bottom-30">
                                <div class="panel panel-profile">
                                    <div class="panel-heading overflow-h">
                                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Habilidades</h2>
                                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        <small>HTML/CSS</small>
                                        <small>92%</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>

                                        <small>Photoshop</small>
                                        <small>77%</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 77%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="77" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>

                                        <small>PHP</small>
                                        <small>85%</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>

                                        <small>Javascript</small>
                                        <small>81%</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 81%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="81" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>    
                            <!--End Skills-->            
                        </div><!--/end row-->    

                        <hr>                                

                        <!--Timeline-->
                        <!-- <div class="panel panel-profile">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> Experience</h2>
                                <a href="#"><i class="fa fa-cog pull-right"></i></a>
                            </div>
                            <div class="panel-body margin-bottom-40">
                                <ul class="timeline-v2 timeline-me">
                                    <li>
                                        <time datetime="" class="cbp_tmtime"><span>Mobile Design</span> <span>2012 - Current</span></time>
                                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                        <div class="cbp_tmlabel">
                                            <h2>BFC NYC Partners</h2>
                                            <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p> 
                                        </div>
                                    </li>
                                    <li>
                                        <time datetime="" class="cbp_tmtime"><span>Web Designer</span> <span>2007 - 2012</span></time>
                                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                        <div class="cbp_tmlabel">
                                        <h2>Freelance</h2>
                                            <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <time datetime="" class="cbp_tmtime"><span>Photodesigner</span> <span>2003 - 2007</span></time>
                                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                        <div class="cbp_tmlabel">
                                        <h2>Toren Condo</h2>
                                            <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>    
                        </div>
 -->                        <!--End Timeline-->

                        <!--Timeline-->
                        <div class="panel panel-profile">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Educación</h2>
                                <a href="#"><i class="fa fa-cog pull-right"></i></a>
                            </div>
                            <div class="panel-body">
                                <ul class="timeline-v2 timeline-me">
                                    <li>
                                        <time datetime="" class="cbp_tmtime"><span>Ing. En Sistemas</span> <span>2012 - 2015</span></time>
                                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                        <div class="cbp_tmlabel">
                                            <h2>UNITEC</h2>
                                            <p>Algun comentario que el estudiante quiera recalcar durante su tiempo estudiando en esta institución</p> 
                                        </div>
                                    </li>
                                    <li>
                                        <time datetime="" class="cbp_tmtime"><span>Informática</span> <span>2008 - 2012</span></time>
                                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                        <div class="cbp_tmlabel">
                                        <h2>CEUTEC</h2>
                                            <p>Algun comentario que el estudiante quiera recalcar durante su tiempo estudiando en esta institución</p>
                                        </div>
                                    </li>
                                    <li>
                                        <time datetime="" class="cbp_tmtime"><span>Computación</span> <span>2005 - 2008</span></time>
                                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                        <div class="cbp_tmlabel">
                                        <h2>NIDO DE ÁGUILAS</h2>
                                            <p>Algun comentario que el estudiante quiera recalcar durante su tiempo estudiando en esta institución</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>    
                        </div>
                        <!--End Timeline--> 

                        <hr>

                         <!--Table Search v2-->
                    <div class="table-search-v2 margin-bottom-20">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>User Image</th>
                                        <th class="hidden-sm">About</th>
                                        <th>Status</th>
                                        <th>Contacts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                                        </td>
                                        <td class="td-width">
                                            <h3><a href="#">Sed nec elit arcu</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <small class="hex">Joined February 28, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-success">Success</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#">info@example.com</a></span>
                                            <span><a href="#">www.htmlstream.com</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
                                        </td>
                                        <td>
                                            <h3><a href="#">Donec at aliquam est, a mattis mauris</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <small class="hex">Joined March 2, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-info"> Pending</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#">info@example.com</a></span>
                                            <span><a href="#">www.htmlstream.com</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                                        </td>
                                        <td>
                                            <h3><a href="#">Pellentesque semper tempus vehicula</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <small class="hex">Joined March 3, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-warning">Expiring</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#">info@example.com</a></span>
                                            <span><a href="#">www.htmlstream.com</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
                                        </td>
                                        <td>
                                            <h3><a href="#">Alesuada fames ac turpis egestas</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <small class="hex">Joined March 4, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-danger">Error!</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#">info@example.com</a></span>
                                            <span><a href="#">www.htmlstream.com</a></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!--End Table Search v2-->

                    </div>
                    <!--End Profile Body-->
                </div>
            </div><!--/end row-->
        </div><!--/container-->    
    </div>		
    <!--=== End Profile ===-->
