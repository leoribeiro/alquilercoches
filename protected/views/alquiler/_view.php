<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechareserva')); ?>:</b>
	<?php echo CHtml::encode($data->fechareserva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente_id')); ?>:</b>
	<?php echo CHtml::encode($data->cliente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coche_id')); ?>:</b>
	<?php echo CHtml::encode($data->coche_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechainicio')); ?>:</b>
	<?php echo CHtml::encode($data->fechainicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechafim')); ?>:</b>
	<?php echo CHtml::encode($data->fechafim); ?>
	<br />


</div>