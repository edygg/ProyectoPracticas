<?php
/* @var $this UsuarioEmpresaController */
/* @var $model UsuarioEmpresa */

$this->breadcrumbs=array(
	'Usuario Empresas'=>array('index'),
	$model->IdUsuarioEmpresa=>array('view','id'=>$model->IdUsuarioEmpresa),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioEmpresa', 'url'=>array('index')),
	array('label'=>'Create UsuarioEmpresa', 'url'=>array('create')),
	array('label'=>'View UsuarioEmpresa', 'url'=>array('view', 'id'=>$model->IdUsuarioEmpresa)),
	array('label'=>'Manage UsuarioEmpresa', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioEmpresa <?php echo $model->IdUsuarioEmpresa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>