<?php

class PropertyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>
array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>Yii::app()->user->getAdmin(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model=new Property;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if ( isset( $_POST['Property'] ) ) {
			$model->attributes=$_POST['Property'];

			$slug = Library::filterPostalCode( $model->title );

			$uniqueName = ( time() ) . '.jpg';
			$original = 'upload/PictureMaps/'.$uniqueName;

			$picture = CUploadedFile::getInstance( $model, 'picture' );

			if ( !empty( $picture ) ) {
				$model->picture = $picture;
				$model->picture->saveAs( $original );
				$model->picture = '/upload/PictureMaps/'.$uniqueName;
				$thumb=Yii::app()->phpThumb->create( $original );
				$thumb->adaptiveResize( 64, 64 );
				$thumb->save( $original );
			}

			if ( $model->save() )
				$this->redirect( array( 'view', 'id'=>$model->id ) );
		}

		$this->render( 'create', array(
				'model'=>$model,
			) );
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate( $id ) {
		$model=$this->loadModel( $id );

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if ( isset( $_POST['Property'] ) ) {
			$model->attributes=$_POST['Property'];

			$slug = Library::filterPostalCode( $model->title );

			$uniqueName = ( time() ) . '.jpg';
			$original = 'upload/PictureMaps/'.$uniqueName;

			$picture = CUploadedFile::getInstance( $model, 'picture' );

			if ( !empty( $picture ) ) {
				$model->picture = $picture;
				$model->picture->saveAs( $original );
				$model->picture = '/upload/PictureMaps/'.$uniqueName;
				$thumb=Yii::app()->phpThumb->create( $original );
				$thumb->adaptiveResize( 64, 64 );
				$thumb->save( $original );
			}

			if ( $model->save() ) {
				Yii::app()->user->setFlash( 'response', '' );
				$this->redirect( array( 'update', 'id'=>$model->id ) );
			}
		}

		$lists=new Property( 'search' );
		$lists->unsetAttributes();  // clear any default values
		if ( isset( $_GET['Property'] ) )
			$lists->attributes=$_GET['Property'];

		$this->render( 'update', array(
				'model'=>$model,
				'lists'=>$lists,
			) );

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria();

		if(isset($_GET['search'])){
			$criteria=new CDbCriteria();
			$keyword = explode(' ', $_GET['search']);
			foreach ($keyword as $key => $value) {
				$criteria->addSearchCondition( 'id', $value, true, 'OR' );
				$criteria->addSearchCondition( 'title', $value, true, 'OR' );
				$criteria->addSearchCondition( 'description', $value, true, 'OR' );
			}
		}	

		$dataProvider = new CActiveDataProvider( 'Property',
			array(
				'criteria'  => $criteria,
			)
		);
		$Marker = $dataProvider->getData();

		// if ( $Marker==null )
		// 	throw new CHttpException( 404, 'ค้นหาไม่เจอ' );

		$this->render( 'index', array(
				'Marker'=>$Marker,
				'dataProvider'=>$dataProvider,
			) );
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Property('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Property']))
			$model->attributes=$_GET['Property'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Property the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Property::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Property $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='property-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}