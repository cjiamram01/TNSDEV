<?php
/* @var $this ItemgroupController */
/* @var $model Itemgroup */

$this->breadcrumbs=array(
	'Itemgroups'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Itemgroup', 'url'=>array('index')),
	array('label'=>'Create Itemgroup', 'url'=>array('create')),
	array('label'=>'Update Itemgroup', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Itemgroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Itemgroup', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Itemgroup #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'group_code',
		'DESCRIPTION',
		'parent_code',
		'LEVEL',
		'id',
	),
)); ?>
</div>