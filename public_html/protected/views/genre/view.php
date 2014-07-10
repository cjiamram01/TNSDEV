<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Genre', 'url'=>array('index')),
	array('label'=>'Create Genre', 'url'=>array('create')),
	array('label'=>'Update Genre', 'url'=>array('update', 'id'=>$model->GenreId)),
	array('label'=>'Delete Genre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GenreId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Genre', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Genre #<?php echo $model->GenreId; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'GenreId',
		'Name',
		'Description',
	),
)); ?>
</div>