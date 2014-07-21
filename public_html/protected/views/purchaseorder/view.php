<?php
/* @var $this PurchaseorderController */
/* @var $model Purchaseorder */

$this->breadcrumbs=array(
	'Purchaseorders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Purchaseorder', 'url'=>array('index')),
	array('label'=>'Create Purchaseorder', 'url'=>array('create')),
	array('label'=>'Update Purchaseorder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Purchaseorder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Purchaseorder', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Purchaseorder #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'supplier_id',
		'po_no',
		'order_date',
		'Status',
		'Comment',
	),
)); ?>
</div>