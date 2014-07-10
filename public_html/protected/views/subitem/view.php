<?php
/* @var $this SubitemController */
/* @var $model Subitem */

$this->breadcrumbs=array(
	'Subitems'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Subitem', 'url'=>array('index')),
	array('label'=>'Create Subitem', 'url'=>array('create')),
	array('label'=>'Update Subitem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Subitem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subitem', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Subitem #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'Item_id',
		'cost',
		'lot_order',
		'qty',
	),
)); ?>
</div>