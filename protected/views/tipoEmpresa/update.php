<?php
/* @var $this TipoEmpresaController */
/* @var $model TipoEmpresa */

$this->breadcrumbs=array(
	'Tipo Empresas'=>array('index'),
	$model->IdTipoEmpresa=>array('view','id'=>$model->IdTipoEmpresa),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoEmpresa', 'url'=>array('index')),
	array('label'=>'Create TipoEmpresa', 'url'=>array('create')),
	array('label'=>'View TipoEmpresa', 'url'=>array('view', 'id'=>$model->IdTipoEmpresa)),
	array('label'=>'Manage TipoEmpresa', 'url'=>array('admin')),
);
?>

<h1>Update TipoEmpresa <?php echo $model->IdTipoEmpresa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>