<?php
/* @var $this UsuarioEstudianteController */
/* @var $model UsuarioEstudiante */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdUsuarioEstudiante'); ?>
		<?php echo $form->textField($model,'IdUsuarioEstudiante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PrimerApellido'); ?>
		<?php echo $form->textField($model,'PrimerApellido',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SegundoApellido'); ?>
		<?php echo $form->textField($model,'SegundoApellido',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Usuario'); ?>
		<?php echo $form->textField($model,'Usuario',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Contrasena'); ?>
		<?php echo $form->textField($model,'Contrasena',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumeroDeCuenta'); ?>
		<?php echo $form->textField($model,'NumeroDeCuenta',array('size'=>45,'maxlength'=>45)); ?>
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
		<?php echo $form->label($model,'Carrera_IdCarrera'); ?>
		<?php echo $form->textField($model,'Carrera_IdCarrera'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->