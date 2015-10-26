<?php
/* @var $this UsuarioEmpresaController */
/* @var $model UsuarioEmpresa */

$this->breadcrumbs=array(
	'Usuario Empresas'=>array('index'),
	'Create',
);

 /*$this->menu=array(
	array('label'=>'List UsuarioEmpresa', 'url'=>array('index')),
	array('label'=>'Manage UsuarioEmpresa', 'url'=>array('admin')),
); */


?>



<?php $this->renderPartial('_form', array('model'=>$model,'modelContactoEmpresa'=>$modelContactoEmpresa,'modelTipoEmpresa'=>$modelTipoEmpresa)); ?>