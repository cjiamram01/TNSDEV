<?php
/* @var $this ItemgroupController */
/* @var $model Itemgroup */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'group_code',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'group_code',
								array(	'id'=>'group_code',
										'class'=>'form-control',
										'placeholder'=>'Enter group_code')); ?>
		<?php echo $form->error($model,'group_code',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'DESCRIPTION',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'DESCRIPTION',
								array(	'id'=>'DESCRIPTION',
										'class'=>'form-control',
										'placeholder'=>'Enter DESCRIPTION')); ?>
		<?php echo $form->error($model,'DESCRIPTION',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'parent_code',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'parent_code',
								array(	'id'=>'parent_code',
										'class'=>'form-control',
										'placeholder'=>'Enter parent_code')); ?>
		<?php echo $form->error($model,'parent_code',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'LEVEL',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'LEVEL',
								array(	'id'=>'LEVEL',
										'class'=>'form-control',
										'placeholder'=>'Enter LEVEL')); ?>
		<?php echo $form->error($model,'LEVEL',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'id',
								array(	'id'=>'id',
										'class'=>'form-control',
										'placeholder'=>'Enter id')); ?>
		<?php echo $form->error($model,'id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="text-center">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->