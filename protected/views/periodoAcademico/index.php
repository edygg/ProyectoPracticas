<?php
/* @var $this PeriodoAcademicoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Periodo Academicos',
);

$this->menu=array(
	array('label'=>'Create PeriodoAcademico', 'url'=>array('create')),
	array('label'=>'Manage PeriodoAcademico', 'url'=>array('admin')),
);
?>

<h1>Periodo Academicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
