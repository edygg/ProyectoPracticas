<?php

class UsuarioEstudianteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/perfilAlumno';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','editarPerfil','CambiarContrasena','ActualizarDatos','Perfil','ActualizarInfoAdicional'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','CarrerasPorTipo','SubirImagen','misCursos','MisCompanieros','AgregarPracticaAEscritorio','verificarUsuarioDuplicado','verificarNumeroDeCuenta','verAsesoramientos','BuscarPP','resultadoBusquedaPPFiltro','resultadoBusquedaPP','DetallePractica','DetallePractica'),
				'users'=>array('*'),
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





public function actionDetallePractica(){
		$this->layout='PracticasEstudiantes';

		$Practica = PracticaProfesional::model()->findByPk($_GET['Cor']);

		$this->render('detallePractica',array(
		'Practica'=>$Practica,
		));

	}

public function actionresultadoBusquedaPP(){
$this->layout='SearchFilter';

$alumno = UsuarioEstudiante::model()->findbyPk(Yii::app()->user->getId());

 
 	if(empty ($_POST['Empresas'])){
	$criteria = new CDbCriteria;  
	$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera));
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
	$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera)); 
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
	$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera)); 
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
	$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera));
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


public function actionresultadoBusquedaPPFiltro(){
$this->layout='SearchFilter';

$alumno = UsuarioEstudiante::model()->findbyPk(Yii::app()->user->getId());
 
 	if(empty ($_POST['Empresas'])){
	$criteria = new CDbCriteria;  
	$criteria->with = 'practica' ;
	$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera));
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';

	$Empresas = CarrerasPorPractica::model()->findAll($criteria);

	$criteria = new CDbCriteria;  
	$criteria->with = 'practica' ;
	$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera)); 
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$Practicas = CarrerasPorPractica::model()->findAll($criteria);

 	}else {

	$criteria = new CDbCriteria;  
	$criteria->with = 'practica' ;
	$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera)); 
	$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']); 
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$Practicas = CarrerasPorPractica::model()->findAll($criteria);

	$criteria = new CDbCriteria;  
	$criteria->with = 'practica' ;
	$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera));
	$criteria->addInCondition('UsuarioEmpresa_IdUsuarioEmpresa',$_POST['Empresas']);
	$criteria->compare('practica.Activo',1,false);
	$criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
	$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';
	$Empresas = CarrerasPorPractica::model()->findAll($criteria);
	}



$this->render('ResultadoBusquedaPP',array(
			'Practicas'=>$Practicas,
			'Empresas'=>$Empresas,
		));

}	



public function actionBuscarPP(){

	$this->layout='mainBuscarPracticasEstudiantes';

$estudiante = UsuarioEstudiante::model()->findByPk(Yii::app()->user->getId());

$Criteria = new CDbCriteria();
$Criteria->limit = 24;
$Criteria->order = 'NombreCarrera ASC';

$Carreras = Carrera::model()->findAll($Criteria);

$criteria2 = new CDbCriteria();
$criteria2->with = 'practica' ;
$criteria2->compare('t.Carrera_IdCarrera',$estudiante->Carrera_IdCarrera,false);
$criteria2->limit = 16;
$criteria2->order = 'practica.FechaCreacion ASC';
$carreras2 = CarrerasPorPractica::model()->findAll($criteria2);



$this->render('BuscarPP',array(
			'Carreras'=>$Carreras,
		));



}	

public function actionverAsesoramientos(){


	$model = AsesoramientoAlumno::model()->findAllByAttributes(array('Curso_IdCurso'=>$_GET['curso'] ,'UsuarioEstudiante_IdUsuarioEstudiante' =>$_GET['Estudiante'] , 'PracticaProfesional_IdPracticaProfesional'=>$_GET['Practica']  ),array('order'=>'FechaCreacionAsesoramiento DESC'));	
	$Estudiante = UsuarioEstudiante::model()->findByPk($_GET['Estudiante']);	
	$Practica = PracticaProfesional::model()->findByPk($_GET['Practica']);

			$this->render('verAsesoramientos',array(
				'model'=>$model,
				'Estudiante'=> $Estudiante,
				'Practica'=> $Practica,
				'CantidadAsesoramientos'=> count($model)
		));


	}

// Verifica que no exista ningun usuario registrado con el nombre de usuario que tiene el formulario 
public function actionverificarUsuarioDuplicado()
{

$Estudiante = UsuarioEstudiante::model()->findAllByAttributes(array('Usuario'=>$_POST["username"]));
$Unitec = UsuarioUnitec::model()->findAllByAttributes(array('Usuario'=>$_POST["username"]));
$ContactoEmpresa = ContactoEmpresa::model()->findAllByAttributes(array('Usuario'=>$_POST["username"]));

if(!empty($Estudiante) or  !empty($Unitec)  or !empty($ContactoEmpresa) )
	{ 
		  echo "<div class='alert alert-warning fade in alert-dismissable'>
				<strong>Oh-Oh! </strong> Parece que este NOMBRE DE USUARIO ya tiene dueño!
				</div> ";
 
 	}
 

}

// Verifica que no exista ningun usuario registrado con el numero de cuenta que tiene el formulario 
public function actionverificarNumeroDeCuenta()
{

$Estudiante = UsuarioEstudiante::model()->findAllByAttributes(array('NumeroDeCuenta'=>$_POST["NumeroDeCuenta"]));
if(!empty($Estudiante))
	{
		  echo "<div class='alert alert-warning fade in alert-dismissable'>
				<strong> Oh-Oh! </strong> Ya existe un usuario registrado con este <strong> NÚMERO DE CUENTA</strong>.
				</div> ";
	}
                            

}

// Agrega las prácticas al perfi público del estudiante - Si ya esta agregada no hace nada
public function actionAgregarPracticaAEscritorio()
{

	$SiEsta = EscritorioPracticaPorAlumno::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>Yii::app()->user->getId(),'PracticaProfesional_IdPracticaProfesional'=>CHtml::encode($_POST['idPractica'], true)));

	if(empty($SiEsta))
		{
				$temp = new EscritorioPracticaPorAlumno	;
				$temp->UsuarioEstudiante_IdUsuarioEstudiante= Yii::app()->user->getId();
				$temp->PracticaProfesional_IdPracticaProfesional= CHtml::encode($_POST['idPractica'], true);
				$temp->FechaCreacion= date('Y-m-d H:i:s');
				$temp->save();
		}

	else 
		{


		}

}	

// Función para que el estudiante pueda ver los compañeros del curso y su información básica
public function actionMisCompanieros(){

$Companieros = AlumnosPorCurso::model()->findAllByAttributes(array('Curso_IdCurso'=>$_GET['Seccion']));
$IdCurso = $_GET['Seccion'];

		$this->render('misCompanieros',array(
		'Companieros'=>$Companieros,
		'IdCurso'=>$IdCurso,	
		));

}


	public function actionmisCursos()
	{

		$CursosPorEstudiante = AlumnosPorCurso::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>Yii::app()->user->getId()) );

		$this->render('misCursos',array(
			'CursosPorEstudiante'=>$CursosPorEstudiante,
		));

	}


	// ACTUALIZAR INFORMACIÓN ADICIONAL DEL ALUMNO 
		public function actionActualizarInfoAdicional()
	{

	$model = UsuarioEstudiante::model()->findByPk(Yii::app()->user->getId());

		if(isset($_POST['ObjetivoProfesional'],$_POST['DescripcionPersonal']))
		{
	$model->ObjetivoProfesional = $_POST['ObjetivoProfesional'];

	$model->DescripcionPersonal = $_POST['DescripcionPersonal'];
	$model->save();
	Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Este es SU PERFIL PÚBLICO y ha sido actualizado . Para volver a editar haga <strong>CLIC AQUI </strong>");
	$this->redirect(array('UsuarioEstudiante/Perfil'));

	}
		

	}

	// COMBO DEPENDIENTE PARA EL REGISTRO DE USUARIO
	public function actionCarrerasPorTipo()
	{

		$criteria=new CDbCriteria;
		$criteria->compare('TipoCarrera_idTipoCarrera',$_POST['tipoCarrera']);
		$criteria->order = 'NombreCarrera';

		$list = Carrera::model()->findAll($criteria);
		// $list = Carrera::model()->findAll("TipoCarrera_idTipoCarrera=?",array($_POST['tipoCarrera']));
		echo "<option value> Seleccione su carrera</option>";

		foreach($list as $data )
			if($data->Activo==1)
			echo "<option value=\"{$data->IdCarrera}\"> {$data->NombreCarrera }</option>";

	}

	public function actionActualizarDatos()
	{
	 $model=UsuarioEstudiante::model()->findByPk(Yii::app()->user->getId());

	 if(isset($_POST['NombreEstudiante']))
		{
			$model->Nombre = strtoupper($_POST['NombreEstudiante']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu NOMBRE ha sido actualizado");
			$this->redirect(array('UsuarioEstudiante/editarPerfil'));

		}
		if(isset($_POST['PrimerApellido']))
		{
			$model->PrimerApellido = strtoupper($_POST['PrimerApellido']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu PRIMER APELLIDO ha sido actualizado");
			$this->redirect(array('UsuarioEstudiante/editarPerfil'));

		}
		if(isset($_POST['SegundoApellido']))
		{
			$model->SegundoApellido = strtoupper($_POST['SegundoApellido']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu SEGUNDO APELLIDO ha sido actualizado");
			$this->redirect(array('UsuarioEstudiante/editarPerfil'));

		}

		if(isset($_POST['username']))
		{
				if($model->Activo == "0"){ // verificando que el usuario este inactivo para poder cambiar el nombre de usuario
				if(UsuarioEstudiante::model()->VerificarDuplicidadUsuario2($_POST['username']) == true){ // verificando que el nombre de usuario no este tomado
					Yii::app()->user->setFlash("warning","<strong>Aviso!</strong> Este nombre de usuario ya se encuentra vinculado con otra cuenta.");
					$this->redirect(array('UsuarioEstudiante/editarPerfil'));
				}
				else 
				{	
				$model->Usuario = strtolower($_POST['username']);
				$model->save();
				Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu USUARIO ha sido actualizado");
				Yii::app()->user->setFlash("warning","<strong>Recuerda!</strong> La próxima vez inicia sesión con tu nuevo usuario");
				$this->redirect(array('UsuarioEstudiante/editarPerfil'));
				}
		}
		else
			{
				Yii::app()->user->setFlash("warning","<strong>Oh-Oh!</strong> Tu eres malo y estas intentando molestarnos :@ . Te vamos a Descubrir!!! Hemos enviado un correo electrónico al administrador.");
				$this->redirect(array('UsuarioEstudiante/editarPerfil'));
			}

		}

			if(isset($_POST['email']))
		{
			$model->Email = strtolower($_POST['email']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu CORREO ELECTRÓNICO ha sido actualizado");
			Yii::app()->user->setFlash("warning","<strong>Recuerda!</strong> Las notificaciones del sistema se enviarán a tu nuevo correo electrónico");
			$this->redirect(array('UsuarioEstudiante/editarPerfil'));

		}


				if(isset($_POST['NumeroDeCuenta']))
		{ 
			if($model->Activo == "0"){

				if(UsuarioEstudiante::model()->VerificarDuplicidadNCuenta($_POST['NumeroDeCuenta']) == true){ // verificando que el nombre de usuario no este tomado
					Yii::app()->user->setFlash("warning","<strong>Aviso!</strong> Este Numero de Cuenta ya se encuentra vinculado con otro usuario.");
					$this->redirect(array('UsuarioEstudiante/editarPerfil'));
				}
				else{


			$model->NumeroDeCuenta = strtolower($_POST['NumeroDeCuenta']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu numero de cuenta ha sido actualizado.");
			Yii::app()->user->setFlash("warning","<strong>Recuerda!</strong> No podrás volver a actualizar tu número de cuenta cuando tu cuenta sea verificada.");
			$this->redirect(array('UsuarioEstudiante/editarPerfil'));
			}
			
			}
			else
			{

				Yii::app()->user->setFlash("warning","<strong>Oh-Oh!</strong> Tu eres malo y estas intentando molestarnos :@ . Te vamos a Descubrir!!! Hemos enviado un correo electrónico al administrador.");
				$this->redirect(array('UsuarioEstudiante/editarPerfil'));
			}

		}


				if(isset($_POST['FiltroCarrerasPorTipo']))
		{ 
			if($model->Activo == "0"){

			$model->Carrera_IdCarrera = $_POST['FiltroCarrerasPorTipo'];
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su carrera ha sido actualizada");
			Yii::app()->user->setFlash("warning","<strong>Recuerda!</strong> No podrás volver a actualizar tu carrera cuando tu cuenta sea verificada.");
			$this->redirect(array('UsuarioEstudiante/editarPerfil'));	
			}
			else
			{
				Yii::app()->user->setFlash("warning","<strong>Oh-Oh!</strong> Tu eres malo y estas intentando molestarnos :@ . Te vamos a Descubrir!!! Hemos enviado un correo electrónico al administrador.");
				$this->redirect(array('UsuarioEstudiante/editarPerfil'));
			}

		}
		

	}


	//CAMBIA LA CONTRASEÑA EN EL PERFIL DEL ALUMNO
	public function actionCambiarContrasena()
	{
		$model=UsuarioEstudiante::model()->findByPk(Yii::app()->user->getId());
		
		
		
		if(isset($_POST['password']))
		{
			$model->Contrasena = $_POST['password'];
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su contraseña ha sido actualizada exitosamente");
			$this->redirect(Yii::app()->request->urlReferrer);

		}


	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actioneditarPerfil()
	{
			$modelTipoCarrera=new TipoCarrera;


		$this->render('editarPerfil',array(
			'model'=>$this->loadModel(Yii::app()->user->getId()),
			'modelTipoCarrera'=>$modelTipoCarrera ,
		));
	}

		public function actionPerfil()
	{

	$criteria = new CDbCriteria;  
	
	$criteria->with = 'practica' ;
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
	$criteria->addInCondition('t.UsuarioEstudiante_IdUsuarioEstudiante',array(Yii::app()->user->getId()));
	$criteria->compare('practica.Activo',1,false);
	$criteria->order = 'practica.FechaVencimientoPlaza ASC';

	$Practicas = EscritorioPracticaPorAlumno::model()->findAll($criteria);



		$this->render('perfil',array(
			'model'=>$this->loadModel(Yii::app()->user->getId()),
			'Practicas'=>$Practicas ,
		));
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='main';
		$model=new UsuarioEstudiante;
		$modelTipoCarrera=new TipoCarrera;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	if(isset($_POST['NombreEstudiante'],$_POST['email'],$_POST['NumeroDeCuenta']))
		{

			if(UsuarioEstudiante::model()->VerificarDuplicidadUsuario($_POST['username']) == ""){
				
			$model->Nombre = strtoupper($_POST['NombreEstudiante']);
			$model->PrimerApellido = strtoupper($_POST['PrimerApellido']);
			$model->SegundoApellido = strtoupper($_POST['SegundoApellido']);
			$model->Email =strtolower($_POST['email']);
			$model->Contrasena = $_POST['password'];
			$model->Usuario = strtolower($_POST['username']);
			$model->NumeroDeCuenta = $_POST['NumeroDeCuenta'];

			if( Yii::app()->user->isGuest ){
			$model->CreadoPor = "Invitado";
			$model->ModificadoPor	 = "Invitado";
			}
			if(!Yii::app()->user->isGuest ){
			// usted ha creado un usuario , se ha enviado un  correo 
			//electronico a la persona de quien se ha creado el usuario	
			$model->CreadoPor = Yii::app()->user->name ;
			$model->ModificadoPor	 = Yii::app()->user->name;
			}

			$model->Activo	 = 0;
			$model->FechaCreacion = date('Y-m-d H:i:s');
			$model->FechaModificacion	 = date('Y-m-d H:i:s');
			$model->Rol_IdRol	 = 2;
			$model->Carrera_IdCarrera = $_POST ['FiltroCarrerasPorTipo'];
			
			if($model->save()){
				Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su USUARIO ha sido creado exitosamente. Inicie sesion para ver su perfil");
				$this->redirect(array('site/loginEstudiante')); }

				}
				else
				{

				Yii::app()->user->setFlash("warning","<strong>Ummmm...</strong> El NOMBRE DE USUARIO O NÚMERO DE CUENTA se encuentra asociado con una cuenta existente");		
				}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelTipoCarrera'=>$modelTipoCarrera,
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

		if(isset($_POST['UsuarioEstudiante']))
		{
			$model->attributes=$_POST['UsuarioEstudiante'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdUsuarioEstudiante));
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

	public function actionSubirImagen()
	{
		
		$model = UsuarioEstudiante::model()->findByPk(Yii::app()->user->getId());

        	
       if(isset($_POST['UsuarioEstudiante']['Imagen']))
        {
        	$rnd = rand(1, 999999999999999999); // creando numero random para evitar que se dupliquen nombres de archivos
            $model->Imagen= $_POST['UsuarioEstudiante']['Imagen']; 
            
            // verificamos que la foto este ahi, le quitamos los  espacios y la concatenamos con un numero random + el id de la persona logueada + nombre de la imagen
            if (CUploadedFile::getInstance($model,'Imagen')) {
            	$model->Imagen= CUploadedFile::getInstance($model,'Imagen');
            	$newfname = $rnd  . Yii::app()->user->getId() . preg_replace('/\s+/', '', $model->Imagen) ;
            	$model->Imagen->saveAs(Yii::app()->params['basePath'].'banner/'. $newfname );
            	$model->Imagen = $newfname;
            }

            if($model->save())
            {
               
                Yii::app()->user->setFlash("success","<strong>Exito!</strong> Su foto de perfil ha sido actualizada exitosamente");
                	$this->redirect(array('UsuarioEstudiante/Perfil'));
            }
        }
        
           Yii::app()->user->setFlash("warning","<strong>Cuidado!</strong> La foto necesita cuadrada y menor a 600 kb");
           $this->redirect(array('UsuarioEstudiante/editarPerfil'));
 

	}


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
		$dataProvider=new CActiveDataProvider('UsuarioEstudiante');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UsuarioEstudiante('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UsuarioEstudiante']))
			$model->attributes=$_GET['UsuarioEstudiante'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UsuarioEstudiante the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UsuarioEstudiante::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UsuarioEstudiante $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-estudiante-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
