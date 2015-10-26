<?php
/* @var $this CursoController */
/* @var $data Curso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCurso), array('view', 'id'=>$data->IdCurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Codigo')); ?>:</b>
	<?php echo CHtml::encode($data->Codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Seccion')); ?>:</b>
	<?php echo CHtml::encode($data->Seccion); ?>
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
	<b><?php echo CHtml::encode($data->getAttributeLabel('PeriodoAcademico_IdPeriodoAcademico')); ?>:</b>
	<?php echo CHtml::encode($data->PeriodoAcademico_IdPeriodoAcademico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UsuarioUnitec_IdUsuarioUnitec')); ?>:</b>
	<?php echo CHtml::encode($data->UsuarioUnitec_IdUsuarioUnitec); ?>
	<br />

	*/ ?>

</div>