<?php
/* @var $this CarrerasPorCursoController */
/* @var $model CarrerasPorCurso */

$this->breadcrumbs=array(
	'Carreras Por Cursos'=>array('index'),
	$model->IdCarrerasPorCurso,
);

$this->menu=array(
	array('label'=>'List CarrerasPorCurso', 'url'=>array('index')),
	array('label'=>'Create CarrerasPorCurso', 'url'=>array('create')),
	array('label'=>'Update CarrerasPorCurso', 'url'=>array('update', 'id'=>$model->IdCarrerasPorCurso)),
	array('label'=>'Delete CarrerasPorCurso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCarrerasPorCurso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CarrerasPorCurso', 'url'=>array('admin')),
);
?>

<h1>View CarrerasPorCurso #<?php echo $model->IdCarrerasPorCurso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdCarrerasPorCurso',
		'Carrera_IdCarrera',
		'Curso_IdCurso',
	),
)); ?>
