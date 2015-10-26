<?php
/* @var $this CarrerasPorCursoController */
/* @var $model CarrerasPorCurso */

$this->breadcrumbs=array(
	'Carreras Por Cursos'=>array('index'),
	$model->IdCarrerasPorCurso=>array('view','id'=>$model->IdCarrerasPorCurso),
	'Update',
);

$this->menu=array(
	array('label'=>'List CarrerasPorCurso', 'url'=>array('index')),
	array('label'=>'Create CarrerasPorCurso', 'url'=>array('create')),
	array('label'=>'View CarrerasPorCurso', 'url'=>array('view', 'id'=>$model->IdCarrerasPorCurso)),
	array('label'=>'Manage CarrerasPorCurso', 'url'=>array('admin')),
);
?>

<h1>Update CarrerasPorCurso <?php echo $model->IdCarrerasPorCurso; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>