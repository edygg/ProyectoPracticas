<?php
/* @var $this PeriodoAcademicoController */
/* @var $model PeriodoAcademico */

$this->breadcrumbs=array(
	'Periodo Academicos'=>array('index'),
	$model->IdPeriodoAcademico=>array('view','id'=>$model->IdPeriodoAcademico),
	'Update',
);

$this->menu=array(
	array('label'=>'List PeriodoAcademico', 'url'=>array('index')),
	array('label'=>'Create PeriodoAcademico', 'url'=>array('create')),
	array('label'=>'View PeriodoAcademico', 'url'=>array('view', 'id'=>$model->IdPeriodoAcademico)),
	array('label'=>'Manage PeriodoAcademico', 'url'=>array('admin')),
);
?>

<h1>Update PeriodoAcademico <?php echo $model->IdPeriodoAcademico; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>