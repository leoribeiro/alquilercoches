<?php
$this->breadcrumbs=array(
	'Alquilers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Alquiler','url'=>array('index')),
	array('label'=>'Manage Alquiler','url'=>array('admin')),
);
?>

<h1>Create Alquiler</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>