<?php
/* @var $this UsuarioEstudianteController */
/* @var $data UsuarioEstudiante */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioEstudiante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdUsuarioEstudiante), array('view', 'id'=>$data->IdUsuarioEstudiante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PrimerApellido')); ?>:</b>
	<?php echo CHtml::encode($data->PrimerApellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SegundoApellido')); ?>:</b>
	<?php echo CHtml::encode($data->SegundoApellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Usuario')); ?>:</b>
	<?php echo CHtml::encode($data->Usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Contrasena')); ?>:</b>
	<?php echo CHtml::encode($data->Contrasena); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('NumeroDeCuenta')); ?>:</b>
	<?php echo CHtml::encode($data->NumeroDeCuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreadoPor')); ?>:</b>
	<?php echo CHtml::encode($data->CreadoPor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ModificadoPor')); ?>:</b>
	<?php echo CHtml::encode($data->ModificadoPor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activo')); ?>:</b>
	<?php echo CHtml::encode($data->Activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCreacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaCreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaModificacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaModificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rol_IdRol')); ?>:</b>
	<?php echo CHtml::encode($data->Rol_IdRol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Carrera_IdCarrera')); ?>:</b>
	<?php echo CHtml::encode($data->Carrera_IdCarrera); ?>
	<br />

	*/ ?>

</div>