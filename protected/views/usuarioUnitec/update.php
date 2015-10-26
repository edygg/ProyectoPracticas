<?php
/* @var $this UsuarioUnitecController */
/* @var $model UsuarioUnitec */

$this->breadcrumbs=array(
	'Usuario Unitecs'=>array('index'),
	$model->IdUsuarioUnitec=>array('view','id'=>$model->IdUsuarioUnitec),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioUnitec', 'url'=>array('index')),
	array('label'=>'Create UsuarioUnitec', 'url'=>array('create')),
	array('label'=>'View UsuarioUnitec', 'url'=>array('view', 'id'=>$model->IdUsuarioUnitec)),
	array('label'=>'Manage UsuarioUnitec', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioUnitec <?php echo $model->IdUsuarioUnitec; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>