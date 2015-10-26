<?php
/* @var $this ContactoEmpresaController */
/* @var $model ContactoEmpresa */

$this->breadcrumbs=array(
	'Contacto Empresas'=>array('index'),
	$model->IdContactoEmpresa,
);

$this->menu=array(
	array('label'=>'List ContactoEmpresa', 'url'=>array('index')),
	array('label'=>'Create ContactoEmpresa', 'url'=>array('create')),
	array('label'=>'Update ContactoEmpresa', 'url'=>array('update', 'id'=>$model->IdContactoEmpresa)),
	array('label'=>'Delete ContactoEmpresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdContactoEmpresa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContactoEmpresa', 'url'=>array('admin')),
);
?>

<h1>View ContactoEmpresa #<?php echo $model->IdContactoEmpresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdContactoEmpresa',
		'NombreCompleto',
		'TelefonoFijo',
		'TelefonoCelular',
		'CorreoElectronico',
		'PuestoEmpresa',
		'UsuarioEmpresa_IdUsuarioEmpresa',
		'UsuarioEmpresa_Rol_IdRol',
		'UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa',
		'Activo',
		'FechaCreacion',
		'FechaModificacion',
	),
)); ?>
