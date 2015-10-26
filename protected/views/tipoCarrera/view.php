<?php
/* @var $this TipoCarreraController */
/* @var $model TipoCarrera */

$this->breadcrumbs=array(
	'Tipo Carreras'=>array('index'),
	$model->idTipoCarrera,
);

$this->menu=array(
	array('label'=>'List TipoCarrera', 'url'=>array('index')),
	array('label'=>'Create TipoCarrera', 'url'=>array('create')),
	array('label'=>'Update TipoCarrera', 'url'=>array('update', 'id'=>$model->idTipoCarrera)),
	array('label'=>'Delete TipoCarrera', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTipoCarrera),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoCarrera', 'url'=>array('admin')),
);
?>

<h1>View TipoCarrera #<?php echo $model->idTipoCarrera; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTipoCarrera',
		'Nombre',
	),
)); ?>
