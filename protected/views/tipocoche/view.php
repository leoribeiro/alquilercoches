<?php
$this->breadcrumbs=array(
	'Tipocoches'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tipocoche','url'=>array('index')),
	array('label'=>'Create Tipocoche','url'=>array('create')),
	array('label'=>'Update Tipocoche','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Tipocoche','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipocoche','url'=>array('admin')),
);
?>

<h1>View Tipocoche #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
