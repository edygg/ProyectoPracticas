<?php
/* @var $this ContactoEmpresaController */
/* @var $data ContactoEmpresa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdContactoEmpresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdContactoEmpresa), array('view', 'id'=>$data->IdContactoEmpresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreCompleto')); ?>:</b>
	<?php echo CHtml::encode($data->NombreCompleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TelefonoFijo')); ?>:</b>
	<?php echo CHtml::encode($data->TelefonoFijo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TelefonoCelular')); ?>:</b>
	<?php echo CHtml::encode($data->TelefonoCelular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CorreoElectronico')); ?>:</b>
	<?php echo CHtml::encode($data->CorreoElectronico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PuestoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->PuestoEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UsuarioEmpresa_IdUsuarioEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->UsuarioEmpresa_IdUsuarioEmpresa); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UsuarioEmpresa_Rol_IdRol')); ?>:</b>
	<?php echo CHtml::encode($data->UsuarioEmpresa_Rol_IdRol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa); ?>
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

	*/ ?>

</div>