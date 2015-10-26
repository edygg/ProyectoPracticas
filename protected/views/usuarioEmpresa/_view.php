<?php
/* @var $this UsuarioEmpresaController */
/* @var $data UsuarioEmpresa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioEmpresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdUsuarioEmpresa), array('view', 'id'=>$data->IdUsuarioEmpresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->NombreEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TelefonoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->TelefonoEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CorreoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->CorreoEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RubroEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->RubroEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SitioWebEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->SitioWebEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DescripcionEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->DescripcionEmpresa); ?>
	<br />

	<?php /*
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('TipoEmpresa_IdTipoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->TipoEmpresa_IdTipoEmpresa); ?>
	<br />

	*/ ?>

</div>