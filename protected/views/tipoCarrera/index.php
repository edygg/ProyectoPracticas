<?php
/* @var $this TipoCarreraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Carreras',
);

$this->menu=array(
	array('label'=>'Create TipoCarrera', 'url'=>array('create')),
	array('label'=>'Manage TipoCarrera', 'url'=>array('admin')),
);
?>

<h1>Tipo Carreras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
