<?php
/* @var $this ItemController */
/* @var $data Item */
?>

<div class="col-sm-6">
<div class="panel panel-default">
	<div class="panel-heading">
	<?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?><?php echo CHtml::link(CHtml::encode(''), array('update', 'id'=>$data->id),array('class'=>'fa fa-pencil fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Update')); ?><?php echo CHtml::link(CHtml::encode(''), array('view', 'id'=>$data->id),array('class'=>'fa fa-eye fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'View')); ?></div><div class="panel-body">	<b><?php echo CHtml::encode($data->getAttributeLabel('ITEM_CODE')); ?>:</b>
	<?php echo CHtml::encode($data->ITEM_CODE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ITEM_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->ITEM_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_code')); ?>:</b>
	<?php echo CHtml::encode($data->group_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dimension_code')); ?>:</b>
	<?php echo CHtml::encode($data->dimension_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LEVEL')); ?>:</b>
	<?php echo CHtml::encode($data->LEVEL); ?>
	<br />

</div>
</div>
</div>