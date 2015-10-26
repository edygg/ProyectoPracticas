<?php
/* @var $this UsuarioEmpresaController */
/* @var $model UsuarioEmpresa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdUsuarioEmpresa'); ?>
		<?php echo $form->textField($model,'IdUsuarioEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreEmpresa'); ?>
		<?php echo $form->textField($model,'NombreEmpresa',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TelefonoEmpresa'); ?>
		<?php echo $form->textField($model,'TelefonoEmpresa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CorreoEmpresa'); ?>
		<?php echo $form->textField($model,'CorreoEmpresa',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RubroEmpresa'); ?>
		<?php echo $form->textField($model,'RubroEmpresa',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SitioWebEmpresa'); ?>
		<?php echo $form->textField($model,'SitioWebEmpresa',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DescripcionEmpresa'); ?>
		<?php echo $form->textField($model,'DescripcionEmpresa',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreadoPor'); ?>
		<?php echo $form->textField($model,'CreadoPor',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ModificadoPor'); ?>
		<?php echo $form->textField($model,'ModificadoPor',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaCreacion'); ?>
		<?php echo $form->textField($model,'FechaCreacion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaModificacion'); ?>
		<?php echo $form->textField($model,'FechaModificacion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rol_IdRol'); ?>
		<?php echo $form->textField($model,'Rol_IdRol'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TipoEmpresa_IdTipoEmpresa'); ?>
		<?php echo $form->textField($model,'TipoEmpresa_IdTipoEmpresa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->