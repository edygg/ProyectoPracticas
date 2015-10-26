<?php
/* @var $this ContactoEmpresaController */
/* @var $model ContactoEmpresa */

$this->breadcrumbs=array(
	'Contacto Empresas'=>array('index'),
	$model->IdContactoEmpresa=>array('view','id'=>$model->IdContactoEmpresa),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContactoEmpresa', 'url'=>array('index')),
	array('label'=>'Create ContactoEmpresa', 'url'=>array('create')),
	array('label'=>'View ContactoEmpresa', 'url'=>array('view', 'id'=>$model->IdContactoEmpresa)),
	array('label'=>'Manage ContactoEmpresa', 'url'=>array('admin')),
);
?>

<h1>Update ContactoEmpresa <?php echo $model->IdContactoEmpresa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>