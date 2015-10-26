<?php
/* @var $this TipoEmpresaController */
/* @var $model TipoEmpresa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-empresa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreTipoEmpresa'); ?>
		<?php echo $form->textField($model,'NombreTipoEmpresa',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'NombreTipoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DescripcionTipoEmpresa'); ?>
		<?php echo $form->textField($model,'DescripcionTipoEmpresa',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'DescripcionTipoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo'); ?>
		<?php echo $form->error($model,'Activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->