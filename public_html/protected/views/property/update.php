<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Property', 'url'=>array('index')),
	array('label'=>'Create Property', 'url'=>array('create')),
	array('label'=>'View Property', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Property', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Update Property <?php echo $model->id; ?></span></h2>

<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">Update complete.</div>
    
<?php endif; ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->renderPartial('admin', array('model'=>$lists)); ?></div>