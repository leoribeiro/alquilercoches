<?php
$this->breadcrumbs=array(
	'Alquilers',
);

$this->menu=array(
	array('label'=>'Create Alquiler','url'=>array('create')),
	array('label'=>'Manage Alquiler','url'=>array('admin')),
);
?>

<h1>Alquilers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
