<?php

class CocheController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('index','view','displaySavedImage'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new Coche;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Coche']))
		{
			$model->attributes=$_POST['Coche'];
			$imageUploadFile=CUploadedFile::getInstance($model,'uploadedFile');
			if($imageUploadFile !== null){ // only do if file is really uploaded
                $imageFileName = mktime().$imageUploadFile->name;
                $model->foto = $imageFileName;
            }  
			if($model->save()){
				if($imageUploadFile !== null) // validate to save file
				{
					$imageUploadFile->saveAs('images/'.$imageFileName);
					Yii::import('application.extensions.image.Image');
					$image = new Image('images/'.$imageFileName);
					$image->resize(300, 300);
					$image->save();
				}
                    
 
				$this->redirect(array('admin'));
			}
				
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

		if(isset($_POST['Coche']))
		{
			$model->attributes=$_POST['Coche'];
			$imageUploadFile=CUploadedFile::getInstance($model,'uploadedFile');
			if($imageUploadFile !== null){ // only do if file is really uploaded
                $imageFileName = mktime().$imageUploadFile->name;
                $model->foto = $imageFileName;
            }  
			if($model->save()){
				if($imageUploadFile !== null) // validate to save file
				{
					$imageUploadFile->saveAs('images/'.$imageFileName);
					Yii::import('application.extensions.image.Image');
					$image = new Image('images/'.$imageFileName);
					$image->resize(300, 300);
					$image->save();
				}
                    
 
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Coche');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Coche('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Coche']))
			$model->attributes=$_GET['Coche'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Coche::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='coche-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDisplaySavedImage($id)
	{
	    $modelA=Coche::model()->findByPk($id);
	 	if(!empty($modelA->file_name)){
	 		header('Pragma: public');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Content-Transfer-Encoding: binary');
		    header('Content-length: '.$modelA->file_size);
		    header('Content-Type: '.$modelA->file_type);
		    header('Content-Disposition: attachment; filename='.$modelA->file_name);
			 
			echo $modelA->photo;
	 	}
	 	else{
	 		echo "Sem imagem.";
	 	}
	    
	}
}
