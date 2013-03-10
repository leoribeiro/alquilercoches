<?php
$this->breadcrumbs=array(
	'Tipocoches'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipocoche','url'=>array('index')),
	array('label'=>'Create Tipocoche','url'=>array('create')),
	array('label'=>'View Tipocoche','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tipocoche','url'=>array('admin')),
);
?>

<h1>Update Tipocoche <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>