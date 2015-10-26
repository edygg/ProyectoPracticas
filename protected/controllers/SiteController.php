<?php

class SiteController extends Controller
{

	public $layout='//layouts/main';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionpreguntasFrecuentes(){
$this->layout='faq';

		$this->render('preguntasFrecuentes',array(
		));	
			
	}



	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */

	public function actionDetallePractica(){
		$this->layout='Practicas';

		$Practica = PracticaProfesional::model()->findByPk($_GET['Cor']);

		$this->render('detallePractica',array(
		'Practica'=>$Practica,
		));


	}


public function actionresultadoBusquedaPPFiltro(){
$this->layout='SearchFilterGeneral';


 
 	if(empty ($_POST['Empresas'])){
	$criteria = new CDbCriteria;  
	$criteria->with = 'practica' ;
	$criteria->addInCondition('Carrera_IdCarrera',array($_GET['Busqueda']));
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	
	$Empresas = CarrerasPorPractica::model()->findAll($criteria);
	$criteria = new CDbCriteria;  
	$criteria->with = 'practica' ;
	$criteria->addInCondition('Carrera_IdCarrera',array($_GET['Busqueda'])); 
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Practicas = CarrerasPorPractica::model()->findAll($criteria);

 	}else {

	$criteria = new CDbCriteria;  
	$criteria->with = 'practica' ;
	$criteria->addInCondition('Carrera_IdCarrera',array($_GET['Busqueda'])); 
	$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']); 
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Practicas = CarrerasPorPractica::model()->findAll($criteria);

	$criteria = new CDbCriteria;  
	$criteria->with = 'practica' ;
	$criteria->addInCondition('Carrera_IdCarrera',array($_GET['Busqueda']));
	$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']);
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Empresas = CarrerasPorPractica::model()->findAll($criteria);
	}

$this->render('ResultadoBusquedaPP',array(
			'Practicas'=>$Practicas,
			'Empresas'=>$Empresas,
		));

}	


public function actionresultadoBusquedaPP(){
$this->layout='SearchFilterGeneral';


 
 	if(empty ($_POST['Empresas'])){
	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($_POST['Carrera']));
	$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Empresas = CarrerasPorPractica::model()->findAll($criteria);

	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($_POST['Carrera'])); 
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Practicas = CarrerasPorPractica::model()->findAll($criteria);

 	}else {

	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($_POST['Carrera'])); 
	$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']); 
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Practicas = CarrerasPorPractica::model()->findAll($criteria);

	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($_POST['Carrera']));
	$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']);
	$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
	// Empieza filtro para que no aparezcan carreras que ya vencieron 
	$criteria->with = 'practica' ;
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	// aqui termina
	$Empresas = CarrerasPorPractica::model()->findAll($criteria);
	}



$this->render('ResultadoBusquedaPP',array(
			'Practicas'=>$Practicas,
			'Empresas'=>$Empresas,
		));

}	


public function actionBuscarPracticas(){

		$criteria = new CDbCriteria;  
		$criteria->addInCondition('Carrera_IdCarrera',$_POST); 
		$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
		// Empezando a eliminar las empresas que con practicas vencidas o ya vinculadas
		$criteria->with = 'practica' ;
		$criteria->compare('practica.Activo',1,false);
		$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
		$now = new CDbExpression("NOW()");
		$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
		$list = CarrerasPorPractica::model()->findAll($criteria);

foreach ($list as $empresa) {
echo "<option value=\"{$empresa->UsuarioEmpresa_IdUsuarioEmpresa}\"> {$empresa->empresa->NombreEmpresa}</option>";
}

 
}



public function actionBuscarPP(){

$Criteria = new CDbCriteria();
$Criteria->limit = 24;
$Criteria->order = 'NombreCarrera ASC';
$Carreras = Carrera::model()->findAll($Criteria);


$this->render('BuscarPP',array(
			'Carreras'=>$Carreras,
		));

}

	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}



	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * ESTE ES EL LOGIN DE UNITEC - JEFES Y ASESORES
	 */

	public function actionLogin()


	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('UsuarioUnitec/editarPerfil'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}



	public function actionLoginEstudiante()


	{
		$model=new LoginEstudianteForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='loginEstudiante-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginEstudianteForm']))
		{
			$model->attributes=$_POST['LoginEstudianteForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				if (Yii::app()->user->Activo=="0"){

				Yii::app()->user->setFlash("danger","<strong>#ATENCIÓN!</strong>  Tu cuenta no ha sido verificada ,  contacta a tu asesor o jefe académico para activar nuevas opciones en tu perfil.");
				Yii::app()->user->setFlash("warning","<strong>CUANDO TU CUENTA SEA VERIFICADA!</strong>  Cierra sesión e inicia sesión nuevamente . ");
			}
				
				$this->redirect(array('UsuarioEstudiante/editarPerfil'));
		}
		// display the login form
		$this->render('loginEstudiante',array('model'=>$model));
	}


	public function actionLoginEmpresa()


	{
		$model=new LoginEmpresaForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='loginEmpresa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginEmpresaForm']))
		{
			$model->attributes=$_POST['LoginEmpresaForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
					if (Yii::app()->user->Activo =="0"){

				Yii::app()->user->setFlash("danger","<strong>#ATENCIÓN!</strong>  LA CUENTA DE TU EMPRESA NO HA SIDO  ,  contacta a un jefé académico para que valide a tu empresa . <strong> CLIC AQUI </strong>");
				Yii::app()->user->setFlash("warning","<strong>CUANDO TU CUENTA SEA VERIFICADA!</strong>  Cierra sesión e inicia sesión nuevamente . ");
			}
				$this->redirect(array('UsuarioEmpresa/perfilEmpresa')); }
		}
		// display the login form
		$this->render('loginEmpresa',array('model'=>$model));
	}


	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}