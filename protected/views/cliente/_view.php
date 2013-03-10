<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechanascimento')); ?>:</b>
	<?php echo CHtml::encode($data->fechanascimento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dni')); ?>:</b>
	<?php echo CHtml::encode($data->dni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipotarjeta')); ?>:</b>
	<?php echo CHtml::encode($data->tipotarjeta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerotarjeta')); ?>:</b>
	<?php echo CHtml::encode($data->numerotarjeta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caducidadtarjeta')); ?>:</b>
	<?php echo CHtml::encode($data->caducidadtarjeta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('codigotarjeta')); ?>:</b>
	<?php echo CHtml::encode($data->codigotarjeta); ?>
	<br />

	*/ ?>

</div>