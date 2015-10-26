<?php
/* @var $this CarreraController */
/* @var $model Carrera */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdCarrera'); ?>
		<?php echo $form->textField($model,'IdCarrera'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreCarrera'); ?>
		<?php echo $form->textField($model,'NombreCarrera',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TipoCarrera_idTipoCarrera'); ?>
		<?php echo $form->textField($model,'TipoCarrera_idTipoCarrera'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->