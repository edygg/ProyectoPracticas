<?php
/* @var $this ContactoEmpresaController */
/* @var $model ContactoEmpresa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdContactoEmpresa'); ?>
		<?php echo $form->textField($model,'IdContactoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreCompleto'); ?>
		<?php echo $form->textField($model,'NombreCompleto',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TelefonoFijo'); ?>
		<?php echo $form->textField($model,'TelefonoFijo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TelefonoCelular'); ?>
		<?php echo $form->textField($model,'TelefonoCelular',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CorreoElectronico'); ?>
		<?php echo $form->textField($model,'CorreoElectronico',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PuestoEmpresa'); ?>
		<?php echo $form->textField($model,'PuestoEmpresa',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UsuarioEmpresa_IdUsuarioEmpresa'); ?>
		<?php echo $form->textField($model,'UsuarioEmpresa_IdUsuarioEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UsuarioEmpresa_Rol_IdRol'); ?>
		<?php echo $form->textField($model,'UsuarioEmpresa_Rol_IdRol'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa'); ?>
		<?php echo $form->textField($model,'UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaCreacion'); ?>
		<?php echo $form->textField($model,'FechaCreacion',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaModificacion'); ?>
		<?php echo $form->textField($model,'FechaModificacion',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->