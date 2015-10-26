<?php
/* @var $this TipoEmpresaController */
/* @var $data TipoEmpresa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTipoEmpresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdTipoEmpresa), array('view', 'id'=>$data->IdTipoEmpresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreTipoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->NombreTipoEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DescripcionTipoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->DescripcionTipoEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activo')); ?>:</b>
	<?php echo CHtml::encode($data->Activo); ?>
	<br />


</div>