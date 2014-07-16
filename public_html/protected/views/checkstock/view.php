<?php
/* @var $this CheckstockController */
/* @var $model Checkstock */

$this->breadcrumbs=array(
	'Checkstocks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Checkstock', 'url'=>array('index')),
	array('label'=>'Create Checkstock', 'url'=>array('create')),
	array('label'=>'Update Checkstock', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Checkstock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Checkstock', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Checkstock #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'qty',
		'check_date',
		'state',
		'old_qty',
		'subitem_id',
	),
)); ?>
</div>