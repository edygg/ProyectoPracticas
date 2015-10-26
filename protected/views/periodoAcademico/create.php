<?php
/* @var $this PeriodoAcademicoController */
/* @var $model PeriodoAcademico */

$this->breadcrumbs=array(
	'Periodo Academicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PeriodoAcademico', 'url'=>array('index')),
	array('label'=>'Manage PeriodoAcademico', 'url'=>array('admin')),
);
?>

<h1>Create PeriodoAcademico</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>