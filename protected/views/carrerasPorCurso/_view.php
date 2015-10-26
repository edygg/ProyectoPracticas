<?php
/* @var $this CarrerasPorCursoController */
/* @var $data CarrerasPorCurso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCarrerasPorCurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCarrerasPorCurso), array('view', 'id'=>$data->IdCarrerasPorCurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Carrera_IdCarrera')); ?>:</b>
	<?php echo CHtml::encode($data->Carrera_IdCarrera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Curso_IdCurso')); ?>:</b>
	<?php echo CHtml::encode($data->Curso_IdCurso); ?>
	<br />


</div>