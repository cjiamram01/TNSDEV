<?php
/* @var $this ItemgroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Itemgroups',
);

$this->menu=array(
	array('label'=>'Create Itemgroup', 'url'=>array('create')),
	array('label'=>'Manage Itemgroup', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Itemgroups</span></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{pager}\n{items}\n{pager}",
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'itemView'=>'_view',
)); ?>

</div>