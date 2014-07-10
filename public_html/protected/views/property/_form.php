<?php
/* @var $this PropertyController */
/* @var $model Property */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'property-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>
<fieldset class="gllpLatlonPicker">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php 	if(!empty($model->picture)): echo '
	<div class="form-group">
	<div class="col-md-6 col-md-offset-4 ">
	<img src="'.Yii::app()->request->baseUrl.$model->picture.'" style="height:100px;">
	</div></div>';
			else :echo '<div class="form-group">
	<div class="col-md-6 col-md-offset-4 ">no image</div></div>';
			endif; ?>

	<div class="form-group">

		<?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
	    		<?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
	    	<?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
	    </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'title',
								array(	'id'=>'title',
										'class'=>'form-control',
										'placeholder'=>'Enter title')); ?>
		<?php echo $form->error($model,'title',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'description',
								array(	'id'=>'description',
										'class'=>'form-control',
										'placeholder'=>'Enter description')); ?>
		<?php echo $form->error($model,'description',array('class'=>'text-danger')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<input type="text" class="gllpSearchField form-control">
		</div>
	<input type="button" class="gllpSearchButton col-sm-2 btn btn-color" value="search">
	
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<div class="gllpMap">Google Maps</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6">
			<?php echo $form->textField($model,'lat',
								array(	'id'=>'lat',
										'class'=>'form-control gllpLatitude',
										'placeholder'=>'Enter lat')); ?>
		</div>
		
		<div class="col-sm-6">
			<?php echo $form->textField($model,'lng',
								array(	'id'=>'lng',
										'class'=>'form-control gllpLongitude',
										'placeholder'=>'Enter lng')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'floor',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'floor',
								array(	'id'=>'floor',
										'class'=>'form-control',
										'placeholder'=>'Enter floor')); ?>
		<?php echo $form->error($model,'floor',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'room',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'room',
								array(	'id'=>'room',
										'class'=>'form-control',
										'placeholder'=>'Enter room')); ?>
		<?php echo $form->error($model,'room',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'garage',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'garage',
								array(	'id'=>'garage',
										'class'=>'form-control',
										'placeholder'=>'Enter garage')); ?>
		<?php echo $form->error($model,'garage',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'restroom',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'restroom',
								array(	'id'=>'restroom',
										'class'=>'form-control',
										'placeholder'=>'Enter restroom')); ?>
		<?php echo $form->error($model,'restroom',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'area',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'area',
								array(	'id'=>'area',
										'class'=>'form-control',
										'placeholder'=>'Enter area')); ?>
		<?php echo $form->error($model,'area',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'project_provider',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'project_provider',
								array(	'id'=>'project_provider',
										'class'=>'form-control',
										'placeholder'=>'Enter project_provider')); ?>
		<?php echo $form->error($model,'project_provider',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'swiming_pool',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'swiming_pool',
								array(	'id'=>'swiming_pool',
										'class'=>'form-control',
										'placeholder'=>'Enter swiming_pool')); ?>
		<?php echo $form->error($model,'swiming_pool',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'residentailtype_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'residentailtype_id',
								array(	'id'=>'residentailtype_id',
										'class'=>'form-control',
										'placeholder'=>'Enter residentailtype_id')); ?>
		<?php echo $form->error($model,'residentailtype_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Project_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'Project_id',
								array(	'id'=>'Project_id',
										'class'=>'form-control',
										'placeholder'=>'Enter Project_id')); ?>
		<?php echo $form->error($model,'Project_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'customers_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'customers_id',
								array(	'id'=>'customers_id',
										'class'=>'form-control',
										'placeholder'=>'Enter customers_id')); ?>
		<?php echo $form->error($model,'customers_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->