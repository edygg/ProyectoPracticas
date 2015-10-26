<?php
/* @var $this UsuarioUnitecController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Unitecs',
);

$this->menu=array(
	array('label'=>'Create UsuarioUnitec', 'url'=>array('create')),
	array('label'=>'Manage UsuarioUnitec', 'url'=>array('admin')),
);
?>

<h1>Usuario Unitecs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
