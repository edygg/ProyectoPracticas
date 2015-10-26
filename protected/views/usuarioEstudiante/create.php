<?php
/* @var $this UsuarioEstudianteController */
/* @var $model UsuarioEstudiante */

$this->breadcrumbs=array(
	'Usuario Estudiantes'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List UsuarioEstudiante', 'url'=>array('index')),
	array('label'=>'Manage UsuarioEstudiante', 'url'=>array('admin')),
); */
?>


<?php $this->renderPartial('_form', array('model'=>$model,'modelTipoCarrera'=>$modelTipoCarrera,)); ?>