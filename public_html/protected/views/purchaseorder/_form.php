<?php
/* @var $this PurchaseorderController */
/* @var $model Purchaseorder */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchaseorder-form',
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
		<?php echo $form->labelEx($model,'supplier_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'supplier_id',
								array(	'id'=>'supplier_id',
										'class'=>'form-control',
										'placeholder'=>'Enter supplier_id')); ?>
		<?php echo $form->error($model,'supplier_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'po_no',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'po_no',
								array(	'id'=>'po_no',
										'class'=>'form-control',
										'placeholder'=>'Enter po_no')); ?>
		<?php echo $form->error($model,'po_no',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'order_date',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'order_date',
								array(	'id'=>'order_date',
										'class'=>'form-control',
										'placeholder'=>'Enter order_date')); ?>
		<?php echo $form->error($model,'order_date',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Status',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'Status',
								array(	'id'=>'Status',
										'class'=>'form-control',
										'placeholder'=>'Enter Status')); ?>
		<?php echo $form->error($model,'Status',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Comment',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'Comment',
								array(	'id'=>'Comment',
										'class'=>'form-control',
										'placeholder'=>'Enter Comment')); ?>
		<?php echo $form->error($model,'Comment',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->