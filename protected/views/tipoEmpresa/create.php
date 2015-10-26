<?php
/* @var $this TipoEmpresaController */
/* @var $model TipoEmpresa */

$this->breadcrumbs=array(
	'Tipo Empresas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoEmpresa', 'url'=>array('index')),
	array('label'=>'Manage TipoEmpresa', 'url'=>array('admin')),
);
?>

<h1>Create TipoEmpresa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>