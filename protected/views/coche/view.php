<h1>Coche #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'marca',
		'placa',
		'ano',
		'color',
		array(
			'label'=>'Tipo de el Coche',
			'value'=>$model->tipocoche->nombre,
			'filter'=>false,
		),
		array(
			'label'=>'Cidade',
			'value'=>$model->ciudad->nombre,
			'filter'=>false,
		),
		array(
			'label'=>'Foto',
			'type'=> 'html',
			'value'=>"<img src=".Yii::app()->request->baseUrl."/images/".$model->foto." />",
			'filter'=>false,
		),
	),
)); ?>
