<?php
/* @var $this ContactoEmpresaController */
/* @var $model ContactoEmpresa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacto-empresa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreCompleto'); ?>
		<?php echo $form->textField($model,'NombreCompleto',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'NombreCompleto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TelefonoFijo'); ?>
		<?php echo $form->textField($model,'TelefonoFijo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TelefonoFijo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TelefonoCelular'); ?>
		<?php echo $form->textField($model,'TelefonoCelular',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TelefonoCelular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CorreoElectronico'); ?>
		<?php echo $form->textField($model,'CorreoElectronico',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'CorreoElectronico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PuestoEmpresa'); ?>
		<?php echo $form->textField($model,'PuestoEmpresa',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'PuestoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UsuarioEmpresa_IdUsuarioEmpresa'); ?>
		<?php echo $form->textField($model,'UsuarioEmpresa_IdUsuarioEmpresa'); ?>
		<?php echo $form->error($model,'UsuarioEmpresa_IdUsuarioEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UsuarioEmpresa_Rol_IdRol'); ?>
		<?php echo $form->textField($model,'UsuarioEmpresa_Rol_IdRol'); ?>
		<?php echo $form->error($model,'UsuarioEmpresa_Rol_IdRol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa'); ?>
		<?php echo $form->textField($model,'UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa'); ?>
		<?php echo $form->error($model,'UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo'); ?>
		<?php echo $form->error($model,'Activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaCreacion'); ?>
		<?php echo $form->textField($model,'FechaCreacion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'FechaCreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaModificacion'); ?>
		<?php echo $form->textField($model,'FechaModificacion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'FechaModificacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->