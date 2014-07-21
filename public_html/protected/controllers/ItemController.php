<?php

class ItemController extends Controller
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
				'actions'=>array('index','view'),
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
	public function actionCreate()
	{
		$model=new Item;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Item']))
		{
			$model->attributes=$_POST['Item'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Item']))
		{
			$model->attributes=$_POST['Item'];
			if($model->save()){
				Yii::app()->user->setFlash('response','');
				$this->redirect(array('update','id'=>$model->id));
			}	
		}

		$lists=new Item('search');
		$lists->unsetAttributes();  // clear any default values
		if(isset($_GET['Item']))
			$lists->attributes=$_GET['Item'];

		$this->render('update',array(
			'model'=>$model,
			'lists'=>$lists,
		));

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
		$dataProvider=new CActiveDataProvider('Item');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Item('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Item']))
			$model->attributes=$_GET['Item'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	
	public $dataTree;
	public function actionTreeView()
	 {
		$dTree0=array();
		$dTree1=array();
		
		
		$Ms=new Itemgroup();
		$crt0=new CDbCriteria();
		$crt0->select="group_code,DESCRIPTION";
		$crt0->condition="LEVEL=0";
		$Ms=Itemgroup::model()->findAll($crt0);
		$i=0;
		foreach($Ms as $m){
			$dTree1[$i]['text']=$m->DESCRIPTION;
			//*************Add Level 2***************
			$dTree2=array();
			$crt1=new CDbCriteria();
			$crt1->select="group_code,DESCRIPTION";
			$crt1->condition="LEVEL=1 AND parent_code=:parent_code";
			$crt1->params=array(':parent_code'=>$m->group_code);
			$Ms1=Itemgroup::model()->findAll($crt1);
			$i1=0;
			foreach($Ms1 as $m1)
			{
					
				$dTree2[$i1]['text']=$m->DESCRIPTION;

					//**************Add Level 3****************

						$crt2=new CDbCriteria();
						$crt2->select="group_code,DESCRIPTION";
						$crt2->condition="LEVEL=1 AND parent_code=:parent_code";
						$crt2->params=array(':parent_code'=>$m1->group_code);
						$Ms2=Itemgroup::model()->findAll($crt2);
						$i2=0;
						$dTree3=array();
						foreach($Ms2 as $m2)
						{
							$dTree3[$i2]['text']=$m->DESCRIPTION;
							$i2++;
						}
						$dTree2[$i1]['children']=$dTree3;
					//**********************************

				$i1++;
			}

			$dTree1[$i]['children']=$dTree2;//Add into children array into tree level 1
			//**********************************************
			$i++;
        }
		$dTree0['children']=$dTree1;
        /*****************Modify function ctree view************/
        /*$dTree=array();
       
       
        
        $criteria=new CDbCriteria();
		$criteria->select="group_code,DESCRIPTION,LEVEL";

        $Ms=Itemgroup::model()->findAll($criteria);
		$i=0;
		$i1=0;
		$i2=0;
		foreach($Ms as $m)
		{
			if($m->LEVEL=="1")
			{
				$i1=0;
				$dTree1[$i]['text']=$m->DESCRIPTION;
			}
			else
			if($m->LEVEL=="2")
			{
				$dTree2[$i1]['text']=$m->DESCRIPTION;
				$i1++;
			}
			else
			if($m->LEVEL=="3")
			{
				$dTree3[$i2]['text']=$m->DESCRIPTION;
				$i2++;
			}


			$i++;

		}*/




        /******************************************************/

        
		$dataTree=array(
		array(
			'text'=>'Grampa', //must using 'text' key to show the text
			'children'=>array(//using 'children' key to indicate there are children
				array(
					'text'=>'Father',
					'children'=>array(
						array('text'=>'me'),
						array('text'=>'big sis'),
						array('text'=>'little brother'),
					)
				),
				array(
					'text'=>'Uncle',
					'children'=>array(
						array('text'=>'Ben'),
						array('text'=>'Sally'),
					)
				),
				array(
					'text'=>'Aunt',
				)
			)
		)
	);
	

	
	echo count($dataTree[0]);
	//$this->render('TreeView', array('dataTree'=>$dataTree));
	}





	/**
     * Fills the JS tree on an AJAX request.
     * Should receive parent node ID in $_GET['root'],
     *  with 'source' when there is no parent.
     */
   /* public function actionAjaxFillTree()
    {
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        // parse the user input
        $parentId = "NULL";
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = $_GET['root'];
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
           "SELECT m1.group_code, m1.description AS TEXT, m2.id IS NOT NULL AS hasChildren" 
            ."FROM tbl_itemgroup AS m1 LEFT JOIN tbl_itemgroup AS m2 ON m1.group_code=m2.parent_code" 
            ."WHERE m1.parent_code <=> '170300' " 
            ."GROUP BY m1.id ORDER BY m1.description ASC"

        )->queryAll();
        echo str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
            CTreeView::saveDataAsJson($children)
        );
    }*/



	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Item the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Item::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Item $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
