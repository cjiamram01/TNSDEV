<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);
?>
<div class="container">
<div class="col-sm-10">
		<h2 class="headline first-child text-color"><span class="border-color">Create Item</span></h2>
	</div>
	<div class="col-sm-2">

		<a  data-toggle="modal" data-target="#myModal" class="btn btn-default">
		<i class="glyphicon glyphicon-search"></i>	
			<?php echo yii::t('app','Search')  ?>		</a>
		

	</div>
</div>
<div class="container">



<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<div class="container">


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:1010px" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Item</h4>
      </div>
      <div class="modal-body">
      	<?php $this->renderPartial('admin', array('model'=>$model)); ?>	
    	 
	
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


</div>