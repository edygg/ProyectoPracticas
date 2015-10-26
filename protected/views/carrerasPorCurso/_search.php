<?php
/* @var $this CarrerasPorCursoController */
/* @var $model CarrerasPorCurso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdCarrerasPorCurso'); ?>
		<?php echo $form->textField($model,'IdCarrerasPorCurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Carrera_IdCarrera'); ?>
		<?php echo $form->textField($model,'Carrera_IdCarrera'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Curso_IdCurso'); ?>
		<?php echo $form->textField($model,'Curso_IdCurso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->