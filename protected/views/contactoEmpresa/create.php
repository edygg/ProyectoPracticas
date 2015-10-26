<?php
/* @var $this ContactoEmpresaController */
/* @var $model ContactoEmpresa */

$this->breadcrumbs=array(
	'Contacto Empresas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContactoEmpresa', 'url'=>array('index')),
	array('label'=>'Manage ContactoEmpresa', 'url'=>array('admin')),
);
?>

<h1>Create ContactoEmpresa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>