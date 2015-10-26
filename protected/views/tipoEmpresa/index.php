<?php
/* @var $this TipoEmpresaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Empresas',
);

$this->menu=array(
	array('label'=>'Create TipoEmpresa', 'url'=>array('create')),
	array('label'=>'Manage TipoEmpresa', 'url'=>array('admin')),
);
?>

<h1>Tipo Empresas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
