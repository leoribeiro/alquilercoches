<?php

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'coche-form',
	'enableAjaxValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'clientOptions' => array(
      //'validateOnSubmit'=>false,
      //'validateOnChange'=>true,
      //'validateOnType'=>false,
      
         ),
)); ?>

	<p class="help-block"></p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'marca',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'placa',array('maxlength'=>10,'size'=>3)); ?>

	<?php echo $form->textFieldRow($model,'ano',array('maxlength'=>4,'size'=>2)); ?>

	<?php echo $form->textFieldRow($model,'color',array('class'=>'span5','maxlength'=>45)); ?>

	<?php
	 $modelTipo = Tipocoche::model()->findAll(array('order'=>'nombre'));
	 $lista = CHtml::listData($modelTipo,'id','nombre');
	 echo $form->labelEx($model,'tipocoche_id');
	 echo CHtml::activeDropDownList($model,'tipocoche_id',$lista,array('class'=>'chzn-select','maxlength'=>45));
	 ?>
	 <?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Add',
	    'type'=>'info',
	    'size'=>'mini',
	    'htmlOptions' => array(
             'onclick'=>"{addTipocoche(); $('#dialogTipocoche').dialog('open');}"
	    )
	)); ?>

	<?php
	 $modelTipo = Ciudad::model()->findAll(array('order'=>'nombre'));
	 $lista = CHtml::listData($modelTipo,'id','nombre');
	 echo $form->labelEx($model,'ciudad_id');
	 echo CHtml::activeDropDownList($model,'ciudad_id',$lista,array('class'=>'chzn-select','maxlength'=>45));
	 ?>
	 <?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Add',
	    'type'=>'info',
	    'size'=>'mini',
	    'htmlOptions' => array(
             'onclick'=>"{addCiudad(); $('#dialogCiudad').dialog('open');}"
	    )
	)); ?>

    <?php echo $form->fileFieldRow($model,'uploadedFile'); ?>

        <?php echo $form->textAreaRow($model,'obs',array('class'=>'span5','rows'=>'10')); ?>

    

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Añadir' : 'Save',
		)); ?>
	</div>
	<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogTipocoche',
    'options'=>array(
        'title'=>'Tipo de coche',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>240,
    ),
));?>
<div class="divForForm"></div>
 
<?php $this->endWidget();?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogCiudad',
    'options'=>array(
        'title'=>'Ciudad',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>240,
    ),
));?>
<div class="divForFormCiudad"></div>
 
<?php $this->endWidget();?>


<script type="text/javascript">
// here is the magic
function addTipocoche()
{
    <?php echo CHtml::ajax(array(
            'url'=>array('Tipocoche/create'),
            'data'=> "js:$(this).serialize()",
            'type'=>'POST',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogTipocoche div.divForForm').html(data.div);
                    $('#dialogTipocoche div.divForForm form').submit(addTipocoche);
                }
                else
                {
                	".CHtml::ajax(array(
		                        'type'=>'POST',
                                'url'=>CController::createUrl('/Tipocoche/JSONTipocoche'),
                                'update'=>'#Coche_tipocoche_id'
					))."
                    $('#dialogTipocoche div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogTipocoche').dialog('close') \",3000);
                }
 
            } ",
            ))?>;
    return false; 
 
}

function addCiudad()
{
    <?php echo CHtml::ajax(array(
            'url'=>array('Ciudad/create'),
            'data'=> "js:$(this).serialize()",
            'type'=>'POST',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogCiudad div.divForFormCiudad').html(data.div);
                    $('#dialogCiudad div.divForFormCiudad form').submit(addCiudad);
                }
                else
                {
                	".CHtml::ajax(array(
		                        'type'=>'POST',
                                'url'=>CController::createUrl('/Ciudad/JSONCiudad'),
                                'update'=>'#Coche_ciudad_id'
					))."
                    $('#dialogCiudad div.divForFormCiudad').html(data.div);
                    setTimeout(\"$('#dialogCiudad').dialog('close') \",3000);
                }
 
            } ",
            ))?>;
    return false; 
 
}
 
</script>

<?php $this->endWidget(); ?>

<?php $this->widget( 'ext.EChosen.EChosen', array(
  'target' => 'select',
  'useJQuery' => false,
  'debug' => true,
)); ?>
