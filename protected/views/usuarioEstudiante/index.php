<?php
/* @var $this UsuarioEstudianteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Estudiantes',
);

$this->menu=array(
	array('label'=>'Create UsuarioEstudiante', 'url'=>array('create')),
	array('label'=>'Manage UsuarioEstudiante', 'url'=>array('admin')),
);
?>

<h1>Usuario Estudiantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
