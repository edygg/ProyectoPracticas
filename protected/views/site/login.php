<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login UNITEC';
$this->breadcrumbs=array(
	'Login UNITEC',
);
?>

   <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">UNITEC</h1>
            <ul class="pull-right breadcrumb">
                <li><?php echo CHtml::link('Inicio',Yii::app()->getBaseUrl(true)); ?></li>
                <li class="active">Login UNITEC</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->



<!--=== Content Part ===-->
    <div class="container content">		
    	<div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
       

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'htmlOptions'=>array('class'=>'reg-page'),
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

                    <div class="reg-header">            
                        <h2>Ingresa a tu cuenta </h2>
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <?php echo $form->textField($model,'username',array('class'=>"form-control",'placeholder'=>"Username",'size'=>60,'maxlength'=>500)); ?>
                     
                    </div>                    
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                         <?php echo $form->passwordField($model,'password',array('class'=>"form-control",'placeholder'=>"password",'size'=>60,'maxlength'=>500)); ?>
                        
                    </div>                    

                    <div class="row">
                        <div class="col-md-6 checkbox">

                            <label><?php echo $form->checkBox($model,'rememberMe', array('checked'=>"checked")); ?>Mantenerme online</label>                        
                        </div>
                        <div class="col-md-6">
                              <?php echo CHtml::submitButton('Iniciar Sessión' , array('class'=>"btn-u pull-right")); ?>
                                              
                        </div>
                    </div>

                    <hr>

                    <h4>Se te olvido tu constraseña? </h4>

                    <p>No te preocupes, <a class="color-green" href="#">click aquí</a> para reiniciar</p>

<?php $this->endWidget(); ?>

       
                    



                 
            </div>
        </div><!--/row-->
    </div><!--/container-->		
    <!--=== End Content Part ===-->




