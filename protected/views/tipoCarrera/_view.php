<?php
/* @var $this TipoCarreraController */
/* @var $data TipoCarrera */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoCarrera')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTipoCarrera), array('view', 'id'=>$data->idTipoCarrera)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />


</div>