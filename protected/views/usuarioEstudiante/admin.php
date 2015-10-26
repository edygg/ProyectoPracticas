<?php
/* @var $this UsuarioEstudianteController */
/* @var $model UsuarioEstudiante */

$this->breadcrumbs=array(
	'Usuario Estudiantes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsuarioEstudiante', 'url'=>array('index')),
	array('label'=>'Create UsuarioEstudiante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-estudiante-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Usuario Estudiantes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-estudiante-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IdUsuarioEstudiante',
		'Nombre',
		'PrimerApellido',
		'SegundoApellido',
		'Usuario',
		'Contrasena',
		/*
		'Email',
		'NumeroDeCuenta',
		'CreadoPor',
		'ModificadoPor',
		'Activo',
		'FechaCreacion',
		'FechaModificacion',
		'Rol_IdRol',
		'Carrera_IdCarrera',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
