<?php
/* @var $this PeriodoAcademicoController */
/* @var $model PeriodoAcademico */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdPeriodoAcademico'); ?>
		<?php echo $form->textField($model,'IdPeriodoAcademico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Año'); ?>
		<?php echo $form->textField($model,'Año',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Semestre'); ?>
		<?php echo $form->textField($model,'Semestre',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Trimestre'); ?>
		<?php echo $form->textField($model,'Trimestre',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo',array('size'=>45,'maxlength'=>45)); ?>
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
		<?php echo $form->label($model,'FechaCreacion'); ?>
		<?php echo $form->textField($model,'FechaCreacion',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->