<?php
/* @var $this UsuarioEmpresaController */
/* @var $model UsuarioEmpresa */

$this->breadcrumbs=array(
	'Usuario Empresas'=>array('index'),
	$model->IdUsuarioEmpresa,
);

$this->menu=array(
	array('label'=>'List UsuarioEmpresa', 'url'=>array('index')),
	array('label'=>'Create UsuarioEmpresa', 'url'=>array('create')),
	array('label'=>'Update UsuarioEmpresa', 'url'=>array('update', 'id'=>$model->IdUsuarioEmpresa)),
	array('label'=>'Delete UsuarioEmpresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdUsuarioEmpresa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuarioEmpresa', 'url'=>array('admin')),
);
?>

<h1>View UsuarioEmpresa #<?php echo $model->IdUsuarioEmpresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdUsuarioEmpresa',
		'NombreEmpresa',
		'TelefonoEmpresa',
		'CorreoEmpresa',
		'RubroEmpresa',
		'SitioWebEmpresa',
		'DescripcionEmpresa',
		'CreadoPor',
		'ModificadoPor',
		'Activo',
		'FechaCreacion',
		'FechaModificacion',
		'Rol_IdRol',
		'TipoEmpresa_IdTipoEmpresa',
	),
)); ?>
