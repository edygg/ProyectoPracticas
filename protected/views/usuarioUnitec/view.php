<?php
/* @var $this UsuarioUnitecController */
/* @var $model UsuarioUnitec */

$this->breadcrumbs=array(
	'Usuario Unitecs'=>array('index'),
	$model->IdUsuarioUnitec,
);

$this->menu=array(
	array('label'=>'List UsuarioUnitec', 'url'=>array('index')),
	array('label'=>'Create UsuarioUnitec', 'url'=>array('create')),
	array('label'=>'Update UsuarioUnitec', 'url'=>array('update', 'id'=>$model->IdUsuarioUnitec)),
	array('label'=>'Delete UsuarioUnitec', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdUsuarioUnitec),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuarioUnitec', 'url'=>array('admin')),
);
?>

<h1>View UsuarioUnitec #<?php echo $model->IdUsuarioUnitec; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdUsuarioUnitec',
		'Nombre',
		'PrimerApellido',
		'SegundoApellido',
		'Usuario',
		'Contrasena',
		'Email',
		'CreadoPor',
		'ModificadoPor',
		'Activo',
		'FechaCreacion',
		'FechaModificacion',
	
	),
)); ?>
