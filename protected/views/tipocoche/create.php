<?php
$this->breadcrumbs=array(
	'Tipocoches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipocoche','url'=>array('index')),
	array('label'=>'Manage Tipocoche','url'=>array('admin')),
);
?>

<h1>Create Tipocoche</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>