<?php
/* @var $this PeriodoAcademicoController */
/* @var $data PeriodoAcademico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPeriodoAcademico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdPeriodoAcademico), array('view', 'id'=>$data->IdPeriodoAcademico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Año')); ?>:</b>
	<?php echo CHtml::encode($data->Año); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Semestre')); ?>:</b>
	<?php echo CHtml::encode($data->Semestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Trimestre')); ?>:</b>
	<?php echo CHtml::encode($data->Trimestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activo')); ?>:</b>
	<?php echo CHtml::encode($data->Activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreadoPor')); ?>:</b>
	<?php echo CHtml::encode($data->CreadoPor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ModificadoPor')); ?>:</b>
	<?php echo CHtml::encode($data->ModificadoPor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCreacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaCreacion); ?>
	<br />

	*/ ?>

</div>