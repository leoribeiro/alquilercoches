<?php
$this->breadcrumbs=array(
	'Alquilers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alquiler','url'=>array('index')),
	array('label'=>'Create Alquiler','url'=>array('create')),
	array('label'=>'View Alquiler','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Alquiler','url'=>array('admin')),
);
?>

<h1>Update Alquiler <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>