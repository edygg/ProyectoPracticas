<?php
/* @var $this TipoEmpresaController */
/* @var $model TipoEmpresa */

$this->breadcrumbs=array(
	'Tipo Empresas'=>array('index'),
	$model->IdTipoEmpresa,
);

$this->menu=array(
	array('label'=>'List TipoEmpresa', 'url'=>array('index')),
	array('label'=>'Create TipoEmpresa', 'url'=>array('create')),
	array('label'=>'Update TipoEmpresa', 'url'=>array('update', 'id'=>$model->IdTipoEmpresa)),
	array('label'=>'Delete TipoEmpresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdTipoEmpresa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoEmpresa', 'url'=>array('admin')),
);
?>

<h1>View TipoEmpresa #<?php echo $model->IdTipoEmpresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdTipoEmpresa',
		'NombreTipoEmpresa',
		'DescripcionTipoEmpresa',
		'Activo',
	),
)); ?>
