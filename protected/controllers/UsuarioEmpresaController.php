<?php

class UsuarioEmpresaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
		public $layout='//layouts/perfilEmpresa';

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
				'actions'=>array('index','view','editarPerfilEmpresa','ActualizarDatos','PerfilEmpresa','Perfil','Usuarios','ActualizarInfoAdicionalEmpresa','CrearPP','misPracticas','editarPP','ActualizarPracticaProfesional','practicas','verificarUsuarioDuplicado','editarPerfil',
					'ActualizarInfoAdicional','CambiarContrasena','SubirImagen', 'misPracticasEnCurso'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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



	public function actionSubirImagen()
	{
		
		$model = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());

        	
       if(isset($_POST['ContactoEmpresa']['Imagen']))
        {
        	$rnd = rand(1, 999999999999999999); // creando numero random para evitar que se dupliquen nombres de archivos
            $model->Imagen= $_POST['ContactoEmpresa']['Imagen']; 
            
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
                	$this->redirect(array('UsuarioEmpresa/Perfil'));
            }
        }
        
           Yii::app()->user->setFlash("warning","<strong>Cuidado!</strong> La foto necesita cuadrada y menor a 600 kb");
           $this->redirect(array('UsuarioEmpresa/editarPerfil'));
 

	}




		//CAMBIA LA CONTRASEÑA EN EL PERFIL DEL ALUMNO
	public function actionCambiarContrasena()
	{
		$model=ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());
		
		if(isset($_POST['password']))
		{
			$model->Contrasena = $_POST['password'];
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su contraseña ha sido actualizada exitosamente");
			$this->redirect(Yii::app()->request->urlReferrer);

		}


	}


	// ACTUALIZAR INFORMACIÓN ADICIONAL DEL CONTACTO EMPRESA
		public function actionActualizarInfoAdicional()
	{

	$model = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());

		if(isset($_POST['ObjetivoProfesional'],$_POST['DescripcionPersonal']))
		{
	$model->ObjetivoProfesional = $_POST['ObjetivoProfesional'];

	$model->DescripcionPersonal = $_POST['DescripcionPersonal'];
	$model->save();
	Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Este es SU PERFIL PÚBLICO y ha sido actualizado . Para volver a editar haga <strong>CLIC AQUI </strong>");
	$this->redirect(array('UsuarioEmpresa/Perfil'));

	}
		

	}


public function actioneditarPerfil()
	{


		$this->render('editarPerfil',array(
			'model'=>ContactoEmpresa::model()->findByPk(Yii::app()->user->getId()),
			
		));
	}


	// Verifica que no exista ningun usuario registrado con el nombre de usuario que tiene el formulario 
public function actionverificarUsuarioDuplicado()
{

$Estudiante = UsuarioEstudiante::model()->findAllByAttributes(array('Usuario'=>$_POST["UsuarioContactoEmpresa"]));
$Unitec = UsuarioUnitec::model()->findAllByAttributes(array('Usuario'=>$_POST["UsuarioContactoEmpresa"]));
$ContactoEmpresa = ContactoEmpresa::model()->findAllByAttributes(array('Usuario'=>$_POST["UsuarioContactoEmpresa"]));

if(!empty($Estudiante) or  !empty($Unitec)  or !empty($ContactoEmpresa) )
	{ 
		  echo "<div class='alert alert-warning fade in alert-dismissable'>
				<strong>Oh-Oh! </strong> Parece que este NOMBRE DE USUARIO ya tiene dueño!
				</div> ";
 
 	}
 

}

		public function actionpracticas(){

	$ContactoEmpresa= ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());	

	$criteria = new CDbCriteria;		
	$criteria->compare('Activo',1,false ); // practicas que ya estan verificadas.
	$criteria->compare('ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa',$ContactoEmpresa->UsuarioEmpresa_IdUsuarioEmpresa,false); // que sean de la misma empresa del usuario logueado.
	// que no esten vencidas
	$now = new CDbExpression("NOW()");
	$criteria->addCondition('FechaVencimientoPlaza > '.$now);
	$criteria->order = 'ContactoEmpresa_IdContactoEmpresa ASC';
	$practicas =  PracticaProfesional::model()->findAll($criteria);

	//$practicas =  PracticaProfesional::model()->findAllByAttributes(array('ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa'=>$ContactoEmpresa->UsuarioEmpresa_IdUsuarioEmpresa,'Activo'=>1));

	$this->render('practicas',array(
			'practicas'=>$practicas,
		));	

	}

		public function actionActualizarPracticaProfesional(){

		$practicaProfesional = PracticaProfesional::model()->findByPk($_POST['IdPracticaProfesional']);

		$camposSalvados= "";

	if(!empty($practicaProfesional)){

	if(PracticaProfesional::model()->findByPk($_POST['IdPracticaProfesional'])->ContactoEmpresa_IdContactoEmpresa == Yii::app()->user->getId()){

	
		 if(isset($_POST['AreaODepartamento'])  and ($_POST['AreaODepartamento'] != $practicaProfesional->AreaODepartamento))
		{
			$practicaProfesional->AreaODepartamento = $_POST['AreaODepartamento'];
			$camposSalvados .= "#" . "Departamento " ;
		
		}
		 if(isset($_POST['PuestoDesempeniar']) and ($_POST['PuestoDesempeniar'] != $practicaProfesional->PuestoDesempeniar))
		{
			$practicaProfesional->PuestoDesempeniar = $_POST['PuestoDesempeniar'];
			$camposSalvados .= "#" . "Puesto " ;
		
		}
		 if(isset($_POST['HoraEntrada']) and ($_POST['HoraEntrada'] != $practicaProfesional->HoraEntrada))
		{
			$practicaProfesional->HoraEntrada = $_POST['HoraEntrada'];
			$camposSalvados .= "#" . "HoraDeEntrada " ;
		
		}
		 if(isset($_POST['HoraSalida']) and ($_POST['HoraSalida'] != $practicaProfesional->HoraSalida))
		{
			$practicaProfesional->HoraSalida = $_POST['HoraSalida'];
			$camposSalvados .= "#" . "HoraDeSalida " ;
		
		}
		 if(isset($_POST['FechaVencimientoPlaza'])and ($_POST['FechaVencimientoPlaza'] != $practicaProfesional->FechaVencimientoPlaza))
		{
			$practicaProfesional->FechaVencimientoPlaza = $_POST['FechaVencimientoPlaza'];
			$camposSalvados .= "#" . "FechaVencimientoPlaza " ;
		
		}
		 if(isset($_POST['ObjetivoDelCargo'])and ($_POST['ObjetivoDelCargo'] != $practicaProfesional->ObjetivoDelCargo))
		{
			$practicaProfesional->ObjetivoDelCargo = $_POST['ObjetivoDelCargo'];
			$camposSalvados .= "#" . "ObjetivoDelCargo " ;
		
		}
		 if(isset($_POST['Reponsabilidades'])and ($_POST['Reponsabilidades'] != $practicaProfesional->Reponsabilidades))
		{
			$practicaProfesional->Reponsabilidades = $_POST['Reponsabilidades'];
			$camposSalvados .= "#" . "Reponsabilidades " ;
		
		}
		 if(isset($_POST['Observaciones'])and ($_POST['Observaciones'] != $practicaProfesional->Observaciones))
		{
			$practicaProfesional->Observaciones = $_POST['Observaciones'];
			$camposSalvados .= "#" . "Observaciones " ;
		
		}

		 if(isset($_POST['PosibilidadEmpleo'])and ($_POST['PosibilidadEmpleo'] != $practicaProfesional->PosibilidadEmpleo))
		{
			$practicaProfesional->PosibilidadEmpleo = $_POST['PosibilidadEmpleo'];
			$camposSalvados .= "#" . "PosibilidadDeEmpleo " ;
		
		}

		 if(isset($_POST['RequierePromedio'])and ($_POST['RequierePromedio'] != $practicaProfesional->RequierePromedio))
		{
			$practicaProfesional->RequierePromedio = $_POST['RequierePromedio'];
			$camposSalvados .= "#" . "RequierePromedio " ;
		
		}

		 if(isset($_POST['HorarioFlexible'])and ($_POST['HorarioFlexible'] != $practicaProfesional->HorarioFlexible))
		{
			$practicaProfesional->HorarioFlexible = $_POST['HorarioFlexible'];
			$camposSalvados .= "#" . "HorarioFlexible " ;
		
		}

		 if(isset($_POST['carrerasPracticaProfesional']))
		{
			$carreras = CarrerasPorPractica::model()->findAll("PracticaProfesional_IdPracticaProfesional=?",array($_POST['IdPracticaProfesional']));

			foreach($carreras as $carrera){

			$carrera->delete();

			}

			$cantidadCarreras = count($_POST['carrerasPracticaProfesional']);

			if($cantidadCarreras > 0)
			{
				$camposSalvados .= "#Carreras";

			}

			for ($i = 0; $i < $cantidadCarreras; $i++){
			  	$carreraTemp = new CarrerasPorPractica;
			  	$carreraTemp->Carrera_IdCarrera=$_POST['carrerasPracticaProfesional'][$i];
			  	$carreraTemp->PracticaProfesional_IdPracticaProfesional= $_POST['IdPracticaProfesional']; 
			  	$carreraTemp->UsuarioEmpresa_IdUsuarioEmpresa= ContactoEmpresa::model()->findByPk(Yii::app()->user->getId())->UsuarioEmpresa_IdUsuarioEmpresa;; 	
			  	$carreraTemp->save();
			}

		
		}


		if($practicaProfesional->save()){

		if(!empty($camposSalvados))	{
		Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Se han modificado los siguiente campos: " . $camposSalvados);
		}else{
		Yii::app()->user->setFlash("warning","<strong>Advertencia! </strong> Usted no ha modificado ningún campo.");
		} 

		
		$this->redirect(array('UsuarioEmpresa/MisPracticas'));


		}

		

		}else{
			Yii::app()->user->setFlash("warning","<strong>Es extraño...</strong> Parece que usted quiere crear una solicitud de practica profesional.<strong> Aqui esta el formulario. </strong>");

			$this->redirect(array('UsuarioEmpresa/crearPP'));
		}

		}
		else{
			Yii::app()->user->setFlash("warning","<strong>Es extraño...</strong> Parece que usted quiere crear una solicitud de practica profesional. <strong> Aqui esta el formulario. </strong>");
			$this->redirect(array('UsuarioEmpresa/crearPP'));
		}


	}


	public function actioneditarPP(){

	$temp = PracticaProfesional::model()->findByPk($_GET['cpp']);

	if(!empty($temp)){

	if(PracticaProfesional::model()->findByPk($_GET['cpp'])->ContactoEmpresa_IdContactoEmpresa == Yii::app()->user->getId()){

		$this->render('editarPP',array(
			'practicaProfesional'=> PracticaProfesional::model()->findByPk($_GET['cpp']),
		));

		}else{
			Yii::app()->user->setFlash("warning","<strong>Es extraño...</strong> Para que usted quiere crear una solicitud de practica profesional.");

			$this->redirect(array('UsuarioEmpresa/crearPP'));
		}

		}
		else{
			Yii::app()->user->setFlash("warning","<strong>Es extraño...</strong> Para que usted quiere crear una solicitud de practica profesional.");
			$this->redirect(array('UsuarioEmpresa/crearPP'));
		}

	}



	public function actionmisPracticas(){

	$criteria = new CDbCriteria;		
	$criteria->compare('Activo',0,false ); // practicas que no verificadas aún.
	$criteria->compare('ContactoEmpresa_IdContactoEmpresa',Yii::app()->user->getId(),false); // que son del usuario logueado.
	$now = new CDbExpression("NOW()"); // tomando la fecha actual.
	$criteria->addCondition('FechaVencimientoPlaza > '.$now);  // practicas que no han vencido.
	$criteria->order = 'FechaCreacion ASC';
	$practicas =  PracticaProfesional::model()->findAll($criteria);
	$this->render('misPracticas',array(
			'practicas'=>$practicas,
		));	

	}

	public function actionmisPracticasEnCurso(){
	$criteria = new CDbCriteria;		
	$criteria->compare('Activo',1,false ); // practicas que ya estan verificadas.
	$criteria->compare('ContactoEmpresa_IdContactoEmpresa',Yii::app()->user->getId(),false); // que son del usuario logueado.
	$criteria->order = 'FechaCreacion ASC';
	$practicas =  PracticaProfesional::model()->findAll($criteria);

	$this->render('misPracticasEnCurso',array(
			'practicas'=>$practicas,
		));	

	}


	public function actionCrearPP(){
		date_default_timezone_set('America/Tegucigalpa'); 

		$practicaProfesional =  new PracticaProfesional;

		if(isset($_POST['AreaODepartamento'],$_POST['PuestoDesempeniar'],$_POST['HoraEntrada'],$_POST['HoraSalida']))
		{

		If(!isset($_POST['carrerasPracticaProfesional'])){

		Yii::app()->user->setFlash("danger","<strong>Error!</strong> Su práctica no se pudo guardar debido a que usted no la asosio con ningúna carrera.");

		}

		If(isset($_POST['carrerasPracticaProfesional'])){

		$practicaProfesional->AreaODepartamento = $_POST['AreaODepartamento'];
		$practicaProfesional->PuestoDesempeniar = $_POST['PuestoDesempeniar'];
		$practicaProfesional->HoraEntrada = $_POST['HoraEntrada'];
		$practicaProfesional->HoraSalida = $_POST['HoraSalida'];
		$practicaProfesional->FechaVencimientoPlaza = $_POST['FechaVencimientoPlaza'];
		$practicaProfesional->ObjetivoDelCargo = $_POST['ObjetivoDelCargo'];
		$practicaProfesional->Reponsabilidades = $_POST['Reponsabilidades'];
		$practicaProfesional->Observaciones = $_POST['Observaciones'];
		$practicaProfesional->PosibilidadEmpleo = $_POST['PosibilidadEmpleo'];

		$practicaProfesional->RequierePromedio = $_POST['RequierePromedio'];
		$practicaProfesional->Activo = 0;
		$practicaProfesional->HorarioFlexible = $_POST['HorarioFlexible'];
		$practicaProfesional->FechaCreacion = date('Y-m-d H:i:s');
			
		$practicaProfesional->ContactoEmpresa_IdContactoEmpresa = Yii::app()->user->getId(); // id del usuario contacto de la empresa
		$practicaProfesional->ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId())->UsuarioEmpresa_IdUsuarioEmpresa;			// id de la empresa
		$practicaProfesional->ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa = 1;    // id del tipo de empresa que es


		if($practicaProfesional->save())
		{	
		
		$carreras = $_POST['carrerasPracticaProfesional'];

		$IdUltimaPracticaInsertada = Yii::app()->db->getLastInsertID('CarrerasPorPractica');

		foreach ($carreras as $carrera) {
			$temp = new CarrerasPorPractica;
			$temp->PracticaProfesional_IdPracticaProfesional= $IdUltimaPracticaInsertada;
			$temp->Carrera_IdCarrera = $carrera; 
			$temp->UsuarioEmpresa_IdUsuarioEmpresa = Yii::app()->user->getId();
			$temp->save();
		}			

		Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Se ha creado la práctica profesional");
		$this->redirect(array('UsuarioEmpresa/misPracticas'));
		}
		

		
		}
			
		}
			$this->render('CrearPP',array(
			'practicaProfesional'=>$practicaProfesional,
		));
	}



	// ACTUALIZAR INFORMACIÓN ADICIONAL DE LA EMPRESA
		public function actionActualizarInfoAdicionalEmpresa()
	{
	$ContactoEmpresa = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());

	$model = UsuarioEmpresa::model()->findByPk($ContactoEmpresa->UsuarioEmpresa_IdUsuarioEmpresa);

		if(isset($_POST['Mision'],$_POST['Vision']))
		{
	$model->Mision = $_POST['Mision'];

	$model->Vision = $_POST['Vision'];
	$model->save();
	Yii::app()->user->setFlash("success","<strong>Excelente! </strong> Este es SU PERFIL PÚBLICO y ha sido actualizado . Para volver a editar haga <strong>CLIC AQUI </strong>");
	$this->redirect(array('UsuarioEmpresa/PerfilEmpresa'));

	}
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

	// PERFIL PUBLICO DE LA EMPRESA 
		public function actionPerfilEmpresa()
	{
		
		$ContactoEmpresa = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());
		
		$Usuarios = ContactoEmpresa::model()->findAll('UsuarioEmpresa_IdUsuarioEmpresa=?',array($ContactoEmpresa->UsuarioEmpresa_IdUsuarioEmpresa));

		$this->render('perfilEmpresa',array(
			'model'=> UsuarioEmpresa::model()->findByPk($ContactoEmpresa->UsuarioEmpresa_IdUsuarioEmpresa),
			'Usuarios' => $Usuarios ,
		));
	}

    public function actionPerfil()
	{
		
		$ContactoEmpresa = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());

		$this->render('perfil',array(
			'model'=>  $ContactoEmpresa,
		));
	}

	public function actionUsuarios()
	{
		$ContactoActual = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());
		

		$Usuarios = ContactoEmpresa::model()->findAll('UsuarioEmpresa_IdUsuarioEmpresa=?',array($ContactoActual->UsuarioEmpresa_IdUsuarioEmpresa));
	

		$this->render('Usuarios',array(
			'Usuarios' =>  $Usuarios,
		));
	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actioneditarPerfilEmpresa()
	{

	$ContactoEmpresa = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());


	$modelContactoEmpresa =	UsuarioEmpresa::model()->findByPk($ContactoEmpresa->UsuarioEmpresa_IdUsuarioEmpresa);
		$this->render('editarPerfilEmpresa',array(
			'model'=> $ContactoEmpresa,
			'modelEmpresa' => $modelContactoEmpresa ,
		));
	}

		public function actionActualizarDatos()
	{
	 $modelContactoEmpresa = ContactoEmpresa::model()->findByPk(Yii::app()->user->getId());

	 $model= UsuarioEmpresa::model()->findByPk($modelContactoEmpresa->UsuarioEmpresa_IdUsuarioEmpresa);

	 if(isset($_POST['NombreEmpresa']))
		{
			$model->NombreEmpresa = strtoupper($_POST['NombreEmpresa']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> El NOMBRE DE LA EMPRESA ha sido actualizado");
			$this->redirect(array('UsuarioEmpresa/editarPerfilEmpresa'));

		}
		if(isset($_POST['TelefonoEmpresa']))
		{
			$model->TelefonoEmpresa = strtoupper($_POST['TelefonoEmpresa']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Tu NÚMERO DE TELÉFONO de la empresa ha sido actualizado");
			$this->redirect(array('UsuarioEmpresa/editarPerfilEmpresa'));

		}
		if(isset($_POST['CorreoEmpresa']))
		{
			$model->CorreoEmpresa = strtolower($_POST['CorreoEmpresa']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> El CORREO ELECTRÓNICO de tu empresa ha sido actualizado");
			Yii::app()->user->setFlash("warning","<strong>Recuerda!</strong> Las notificaciones del sistema se enviarán a tu nuevo correo electrónico");
			$this->redirect(array('UsuarioEmpresa/editarPerfilEmpresa'));

		}
		if(isset($_POST['RubroEmpresa']))
		{
			$model->RubroEmpresa = strtoupper($_POST['RubroEmpresa']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> El RUBRO  de tu empresa ha sido actualizado");
			$this->redirect(array('UsuarioEmpresa/editarPerfilEmpresa'));

		}
			if(isset($_POST['SitioWebEmpresa']))
		{
			$model->SitioWebEmpresa = strtolower($_POST['SitioWebEmpresa']);
			$model->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> El SITIO WEB de tu empresa ha sido actualizado");
			$this->redirect(array('UsuarioEmpresa/editarPerfilEmpresa'));

		}

		if(isset($_POST['NombreContacto']))
		{
			$modelContactoEmpresa->NombreCompleto = strtoupper($_POST['NombreContacto']);
			$modelContactoEmpresa->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su NOMBRE ha sido actualizado exitosamente");
			$this->redirect(array('UsuarioEmpresa/editarPerfil'));

		}

			if(isset($_POST['TelefonoFijoo']))
		{
			$modelContactoEmpresa->TelefonoFijo = $_POST['TelefonoFijoo'];
			$modelContactoEmpresa->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su NÚMERO DE TELEFONO FIJO ha sido actualizado exitosamente");
			$this->redirect(array('UsuarioEmpresa/editarPerfil'));

		}


				if(isset($_POST['TelefonoCelularContacto']))
		{
			$modelContactoEmpresa->TelefonoCelular = $_POST['TelefonoCelularContacto'];
			$modelContactoEmpresa->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su NÚMERO DE TELEFONO CELULAR ha sido actualizado exitosamente");
			$this->redirect(array('UsuarioEmpresa/editarPerfil'));

		}


				if(isset($_POST['correoContacto']))
		{
			$modelContactoEmpresa->CorreoElectronico = $_POST['correoContacto'];
			$modelContactoEmpresa->save();
			Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su Correo Electrónico ha sido actualizado exitosamente");
			$this->redirect(array('UsuarioEmpresa/editarPerfil'));

		}





		

	}


	public function actionCreate()
	{
		$this->layout='main';
		$model=new UsuarioEmpresa;
		$modelContactoEmpresa=new ContactoEmpresa;
		$modelTipoEmpresa = new TipoEmpresa ;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NombreEmpresa'],$_POST['number'],$_POST['nombreContactoEmpresa'],$_POST['telefonoCelularContacto']))
		{

			if(UsuarioEstudiante::model()->VerificarDuplicidadUsuario2($_POST['UsuarioContactoEmpresa']) == ""){

			//EMPEZAMOS A GUARDAR LOS VALORES QUE VIENEN POR POST DE LA EMPRESA
			$model->NombreEmpresa = strtoupper($_POST['NombreEmpresa']);
			$model->TelefonoEmpresa = strtoupper($_POST['number']);
			$model->CorreoEmpresa =strtolower( $_POST['emailEmpresa']);
			$model->SitioWebEmpresa = strtolower($_POST['url']);
			$model->RubroEmpresa = strtoupper($_POST['rubroEmpresa']);
			$model->Mision = $_POST['Mision'];
			$model->Vision = $_POST['Vision'];

			date_default_timezone_set('America/Guatemala'); 
			$model->FechaCreacion = date('Y-m-d H:i:s');
			$model->FechaModificacion = date('Y-m-d H:i:s');
			$model->Activo = 0;
			
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

			$model->Rol_IdRol = 1 ;
			$model->TipoEmpresa_IdTipoEmpresa = $_POST ['tipoEmpresa'];
			// TERMINAMOS DE GUARDAR TODO PUES


			
			// NO ES NECESARIA POR QUE YA VALIDO CON JQUERY
		//	$validarUsuarioEmpresa  = $model->validate();
		//	$validarContactoEmpresa = $modelContactoEmpresa->validate() && $validarUsuarioEmpresa;

        	if($model->save())
        	{
        	// EMPEZAMOS A GUARDAR LOS VALORES QUE VIENEN POR POST DEL USUARIO DE LA EMPRESA
			$modelContactoEmpresa->NombreCompleto = strtoupper($_POST['nombreContactoEmpresa']);
			$modelContactoEmpresa->CorreoElectronico = strtolower($_POST['emailContacto']);
			$modelContactoEmpresa->TelefonoFijo = $_POST['telefonoFijoContacto'];
			$modelContactoEmpresa->TelefonoCelular = $_POST['telefonoCelularContacto'];
			$modelContactoEmpresa->PuestoEmpresa = strtoupper($_POST['puestoEmpresa']);
			$modelContactoEmpresa->Activo = 0;
			$modelContactoEmpresa->Usuario = $_POST['UsuarioContactoEmpresa'] ; 
			$modelContactoEmpresa->Contrasena = $_POST['ContrasenaContactoEmpresa'] ; 
			$modelContactoEmpresa->FechaCreacion = date('Y-m-d H:i:s');
			$modelContactoEmpresa->FechaModificacion = date('Y-m-d H:i:s');

			$modelContactoEmpresa->UsuarioEmpresa_IdUsuarioEmpresa = Yii::app()->db->getLastInsertID('UsuarioEmpresa'); 
			$modelContactoEmpresa->UsuarioEmpresa_Rol_IdRol = 1;
			$modelContactoEmpresa->UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa = 1;


      		if($modelContactoEmpresa->save()) {

      		Yii::app()->user->setFlash("success","<strong>Excelente!</strong> Su USUARIO ha sido creado exitosamente. Inicie sesion para ver su perfil");
      		$this->redirect($this->redirect(array('Site/loginEmpresa')));
      		}
		
		}
		}	
		else
		{

		Yii::app()->user->setFlash("warning","<strong>Ummmm...</strong> El NOMBRE DE USUARIO se encuentra asociado con una cuenta existente");		
		}



		}


		$this->render('create',array(
			'model'=>$model,
			'modelContactoEmpresa' => $modelContactoEmpresa ,
			'modelTipoEmpresa' => $modelTipoEmpresa ,
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

		if(isset($_POST['UsuarioEmpresa']))
		{
			$model->attributes=$_POST['UsuarioEmpresa'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdUsuarioEmpresa));
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
		$dataProvider=new CActiveDataProvider('UsuarioEmpresa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UsuarioEmpresa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UsuarioEmpresa']))
			$model->attributes=$_GET['UsuarioEmpresa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UsuarioEmpresa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UsuarioEmpresa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UsuarioEmpresa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-empresa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
