<?php
$this->breadcrumbs=array(
	'Tipocoches',
);

$this->menu=array(
	array('label'=>'Create Tipocoche','url'=>array('create')),
	array('label'=>'Manage Tipocoche','url'=>array('admin')),
);
?>

<h1>Tipocoches</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
