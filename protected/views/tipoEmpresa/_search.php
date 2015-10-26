<?php
/* @var $this TipoEmpresaController */
/* @var $model TipoEmpresa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdTipoEmpresa'); ?>
		<?php echo $form->textField($model,'IdTipoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreTipoEmpresa'); ?>
		<?php echo $form->textField($model,'NombreTipoEmpresa',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DescripcionTipoEmpresa'); ?>
		<?php echo $form->textField($model,'DescripcionTipoEmpresa',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->