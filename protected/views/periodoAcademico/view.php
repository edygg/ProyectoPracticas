<?php
/* @var $this PeriodoAcademicoController */
/* @var $model PeriodoAcademico */

$this->breadcrumbs=array(
	'Periodo Academicos'=>array('index'),
	$model->IdPeriodoAcademico,
);

$this->menu=array(
	array('label'=>'List PeriodoAcademico', 'url'=>array('index')),
	array('label'=>'Create PeriodoAcademico', 'url'=>array('create')),
	array('label'=>'Update PeriodoAcademico', 'url'=>array('update', 'id'=>$model->IdPeriodoAcademico)),
	array('label'=>'Delete PeriodoAcademico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPeriodoAcademico),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PeriodoAcademico', 'url'=>array('admin')),
);
?>

<h1>View PeriodoAcademico #<?php echo $model->IdPeriodoAcademico; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdPeriodoAcademico',
		'Año',
		'Semestre',
		'Trimestre',
		'Activo',
		'CreadoPor',
		'ModificadoPor',
		'FechaCreacion',
	),
)); ?>
