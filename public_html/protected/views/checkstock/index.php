<?php
/* @var $this CheckstockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Checkstocks',
);

$this->menu=array(
	array('label'=>'Create Checkstock', 'url'=>array('create')),
	array('label'=>'Manage Checkstock', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Checkstocks</span></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{pager}\n{items}\n{pager}",
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'itemView'=>'_view',
)); ?>

</div>