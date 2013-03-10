<?php
$this->breadcrumbs=array(
	'Alquilers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alquiler','url'=>array('index')),
	array('label'=>'Create Alquiler','url'=>array('create')),
	array('label'=>'Update Alquiler','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Alquiler','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alquiler','url'=>array('admin')),
);
?>

<h1>View Alquiler #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fechareserva',
		'cliente_id',
		'coche_id',
		'fechainicio',
		'fechafim',
	),
)); ?>
