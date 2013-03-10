<?php 



$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'alquiler-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fechareserva',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cliente_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'coche_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fechainicio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fechafim',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
