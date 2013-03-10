<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('coche-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Coches Disponibles</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nuevo coche',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'', // null, 'large', 'small' or 'mini'
    'url'=>$this->createUrl('coche/create')
)); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'coche-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'filter'=>false,
			'type'=>'raw',
		    'name'=>'uploadedFile',
		    'value'=>'"<img src=".Yii::app()->request->baseUrl."/images/".$data->foto." />"',
		),
		array(
			'type'=>'raw',
		    'name'=>'nombre',
		    'value'=>'"<strong>".$data->nombre."</strong>"',
		    'htmlOptions'=>array('style'=>'height: 200px;
    line-height:200px;'),
		),
		array(
			'type'=>'raw',
		    'name'=>'marca',
		    'value'=>'$data->marca',
		    'htmlOptions'=>array('style'=>'height: 200px;
    line-height:200px;'),
		),
		array(
			'type'=>'raw',
		    'name'=>'placa',
		    'value'=>'$data->placa',
		    'htmlOptions'=>array('style'=>'height: 200px;
    line-height:200px;'),
		),
		array(
			'type'=>'raw',
		    'name'=>'ano',
		    'value'=>'$data->ano',
		    'htmlOptions'=>array('style'=>'height: 200px;
    line-height:200px;'),
		),
		array(
			'type'=>'raw',
		    'name'=>'obs',
		    'value'=>'$data->obs',
		    'htmlOptions'=>array('style'=>'height: 200px;
    line-height:200px;'),
		),
		/*
		'tipocoche_id',
		'ciudad_id',
		'photo',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'height: 200px;
    line-height:200px;'),

		),
	),
)); ?>
