<?php
/* @var $this UsuarioEmpresaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Empresas',
);

$this->menu=array(
	array('label'=>'Create UsuarioEmpresa', 'url'=>array('create')),
	array('label'=>'Manage UsuarioEmpresa', 'url'=>array('admin')),
);
?>

<h1>Usuario Empresas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
