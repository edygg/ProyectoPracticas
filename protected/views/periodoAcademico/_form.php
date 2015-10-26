<?php
/* @var $this PeriodoAcademicoController */
/* @var $model PeriodoAcademico */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'periodo-academico-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdPeriodoAcademico'); ?>
		<?php echo $form->textField($model,'IdPeriodoAcademico'); ?>
		<?php echo $form->error($model,'IdPeriodoAcademico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Año'); ?>
		<?php echo $form->textField($model,'Año',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'Año'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Semestre'); ?>
		<?php echo $form->textField($model,'Semestre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Semestre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Trimestre'); ?>
		<?php echo $form->textField($model,'Trimestre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Trimestre'); ?>
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
		<?php echo $form->labelEx($model,'FechaCreacion'); ?>
		<?php echo $form->textField($model,'FechaCreacion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'FechaCreacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->