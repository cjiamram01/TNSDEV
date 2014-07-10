<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Property', 'url'=>array('index')),
	array('label'=>'Manage Property', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Create Property</span></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>