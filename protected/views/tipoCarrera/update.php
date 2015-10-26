<?php
/* @var $this TipoCarreraController */
/* @var $model TipoCarrera */

$this->breadcrumbs=array(
	'Tipo Carreras'=>array('index'),
	$model->idTipoCarrera=>array('view','id'=>$model->idTipoCarrera),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoCarrera', 'url'=>array('index')),
	array('label'=>'Create TipoCarrera', 'url'=>array('create')),
	array('label'=>'View TipoCarrera', 'url'=>array('view', 'id'=>$model->idTipoCarrera)),
	array('label'=>'Manage TipoCarrera', 'url'=>array('admin')),
);
?>

<h1>Update TipoCarrera <?php echo $model->idTipoCarrera; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>