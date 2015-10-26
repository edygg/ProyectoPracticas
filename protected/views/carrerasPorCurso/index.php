<?php
/* @var $this CarrerasPorCursoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carreras Por Cursos',
);

$this->menu=array(
	array('label'=>'Create CarrerasPorCurso', 'url'=>array('create')),
	array('label'=>'Manage CarrerasPorCurso', 'url'=>array('admin')),
);
?>

<h1>Carreras Por Cursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
