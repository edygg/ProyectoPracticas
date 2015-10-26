<?php
/* @var $this UsuarioEstudianteController */
/* @var $model UsuarioEstudiante */

$this->breadcrumbs=array(
	'Usuario Estudiantes'=>array('index'),
	$model->IdUsuarioEstudiante=>array('view','id'=>$model->IdUsuarioEstudiante),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioEstudiante', 'url'=>array('index')),
	array('label'=>'Create UsuarioEstudiante', 'url'=>array('create')),
	array('label'=>'View UsuarioEstudiante', 'url'=>array('view', 'id'=>$model->IdUsuarioEstudiante)),
	array('label'=>'Manage UsuarioEstudiante', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioEstudiante <?php echo $model->IdUsuarioEstudiante; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>