<?php
/* @var $this CarreraController */
/* @var $data Carrera */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCarrera')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCarrera), array('view', 'id'=>$data->IdCarrera)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreCarrera')); ?>:</b>
	<?php echo CHtml::encode($data->NombreCarrera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activo')); ?>:</b>
	<?php echo CHtml::encode($data->Activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TipoCarrera_idTipoCarrera')); ?>:</b>
	<?php echo CHtml::encode($data->TipoCarrera_idTipoCarrera); ?>
	<br />


</div>