<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i>Localiza!</i></h1>
<div align="center">
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Alquilar coche',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
    'url'=>$this->createUrl('coche/create')
)); ?>
<br /><br />

<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/lo.png" >
</div>


