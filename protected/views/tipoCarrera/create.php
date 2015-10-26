<?php
/* @var $this TipoCarreraController */
/* @var $model TipoCarrera */

$this->breadcrumbs=array(
	'Tipo Carreras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoCarrera', 'url'=>array('index')),
	array('label'=>'Manage TipoCarrera', 'url'=>array('admin')),
);
?>

<h1>Create TipoCarrera</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>