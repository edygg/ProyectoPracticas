<?php
/* @var $this CarrerasPorCursoController */
/* @var $model CarrerasPorCurso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carreras-por-curso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Carrera_IdCarrera'); ?>
		<?php echo $form->textField($model,'Carrera_IdCarrera'); ?>
		<?php echo $form->error($model,'Carrera_IdCarrera'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Curso_IdCurso'); ?>
		<?php echo $form->textField($model,'Curso_IdCurso'); ?>
		<?php echo $form->error($model,'Curso_IdCurso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->