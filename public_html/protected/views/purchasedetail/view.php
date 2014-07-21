<?php
/* @var $this PurchasedetailController */
/* @var $model Purchasedetail */

$this->breadcrumbs=array(
	'Purchasedetails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Purchasedetail', 'url'=>array('index')),
	array('label'=>'Create Purchasedetail', 'url'=>array('create')),
	array('label'=>'Update Purchasedetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Purchasedetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Purchasedetail', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Purchasedetail #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'PurchaseOrder_id',
		'Item_id',
		'qty',
	),
)); ?>
</div>