<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ITEM_CODE',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'ITEM_CODE',
								array(	'id'=>'ITEM_CODE',
										'class'=>'form-control',
										'placeholder'=>'Enter ITEM_CODE')); ?>
		<?php echo $form->error($model,'ITEM_CODE',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ITEM_NAME',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'ITEM_NAME',
								array(	'id'=>'ITEM_NAME',
										'class'=>'form-control',
										'placeholder'=>'Enter ITEM_NAME')); ?>
		<?php echo $form->error($model,'ITEM_NAME',array('class'=>'text-danger')); ?>
		</div>
	</div>

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
		<?php echo $form->labelEx($model,'dimension_code',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'dimension_code',
								array(	'id'=>'dimension_code',
										'class'=>'form-control',
										'placeholder'=>'Enter dimension_code')); ?>
		<?php echo $form->error($model,'dimension_code',array('class'=>'text-danger')); ?>
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

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->