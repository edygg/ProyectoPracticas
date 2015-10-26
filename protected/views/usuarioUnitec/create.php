<?php
/* @var $this UsuarioUnitecController */
/* @var $model UsuarioUnitec */

$this->breadcrumbs=array(
	'Usuario Unitecs'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List UsuarioUnitec', 'url'=>array('index')),
	array('label'=>'Manage UsuarioUnitec', 'url'=>array('admin')),
); 
*/


?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>