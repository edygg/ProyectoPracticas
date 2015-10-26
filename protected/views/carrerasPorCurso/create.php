<?php
/* @var $this CarrerasPorCursoController */
/* @var $model CarrerasPorCurso */

$this->breadcrumbs=array(
	'Carreras Por Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CarrerasPorCurso', 'url'=>array('index')),
	array('label'=>'Manage CarrerasPorCurso', 'url'=>array('admin')),
);
?>

<h1>Create CarrerasPorCurso</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>