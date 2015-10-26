<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdCurso'); ?>
		<?php echo $form->textField($model,'IdCurso'); ?>
		<?php echo $form->error($model,'IdCurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Codigo'); ?>
		<?php echo $form->textField($model,'Codigo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Seccion'); ?>
		<?php echo $form->textField($model,'Seccion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Seccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CreadoPor'); ?>
		<?php echo $form->textField($model,'CreadoPor',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CreadoPor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ModificadoPor'); ?>
		<?php echo $form->textField($model,'ModificadoPor',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ModificadoPor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PeriodoAcademico_IdPeriodoAcademico'); ?>
		<?php echo $form->textField($model,'PeriodoAcademico_IdPeriodoAcademico'); ?>
		<?php echo $form->error($model,'PeriodoAcademico_IdPeriodoAcademico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UsuarioUnitec_IdUsuarioUnitec'); ?>
		<?php echo $form->textField($model,'UsuarioUnitec_IdUsuarioUnitec'); ?>
		<?php echo $form->error($model,'UsuarioUnitec_IdUsuarioUnitec'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->