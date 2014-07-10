<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Genre', 'url'=>array('index')),
	array('label'=>'Create Genre', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#genre-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="container">




<div class="table-responsive">

<div class="col-sm-2">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'genre-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	//'itemsCssClass' => 'table',
	//'summaryText'=>'Displaying {start}-{end} of {count} results.',
	//'template'=>'{summary} {pager} {items} {pager}',
	//'pagerCssClass'=>'text-center col-sm-12',
	//'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'columns'=>array(
		//'GenreId',
		//'Name',

		/*array(
        'name'  => 'Genre Name',
        'value' => 'CHtml::link($data->Name, Yii::app()
 ->createUrl("genre/ListGenre",array("id"=>$data->primaryKey)))',
        'type'  => 'raw',
    ),*/


    array(
            'name' => 'Name',
            'type' => 'raw',
            'value' => '
					CHtml::link(
								$data->Name, 
								array(\'genre/ListGenre\',\'id\'=>$data->primaryKey)
								
							)
						',
            'htmlOptions' => array(
                'align' => 'left',
                //'width' => '150px'
            )
        ),

    
		//'Description',
		
	),
)); ?>
</div>
<div class="col-sm-10">

	<?php
		$id= Yii::app()->getRequest()->getQuery('id'); 
		$modelGenre=Genre::model()->findByPk($id);
		echo $modelGenre->Description;
	?>


</div>
</div>
</div>