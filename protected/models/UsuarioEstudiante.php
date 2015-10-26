<?php

/**
 * This is the model class for table "UsuarioEstudiante".
 *
 * The followings are the available columns in table 'UsuarioEstudiante':
 * @property integer $IdUsuarioEstudiante
 * @property string $Nombre
 * @property string $PrimerApellido
 * @property string $SegundoApellido
 * @property string $Usuario
 * @property string $Contrasena
 * @property string $Email
 * @property string $NumeroDeCuenta
 * @property string $CreadoPor
 * @property string $ModificadoPor
 * @property integer $Activo
 * @property string $FechaCreacion
 * @property string $FechaModificacion
 * @property integer $Rol_IdRol
 * @property integer $Carrera_IdCarrera
 */
class UsuarioEstudiante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'UsuarioEstudiante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Rol_IdRol, Carrera_IdCarrera', 'required'),
			array('Activo, Rol_IdRol, Carrera_IdCarrera', 'numerical', 'integerOnly'=>true),
			array('Nombre, PrimerApellido, SegundoApellido, Usuario, Contrasena, NumeroDeCuenta, CreadoPor, ModificadoPor', 'length', 'max'=>45),
			array('Email', 'length', 'max'=>70),
			array('FechaCreacion, FechaModificacion', 'length', 'max'=>50),
			  array('Imagen', 'file', 'types'=>'jpg, gif, png','maxSize' => (1024 * 600),'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdUsuarioEstudiante, Nombre, PrimerApellido, SegundoApellido, Usuario, Contrasena, Email, NumeroDeCuenta, CreadoPor, ModificadoPor, Activo, FechaCreacion, FechaModificacion, Rol_IdRol, Carrera_IdCarrera', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'carrera'=> array(self::BELONGS_TO,'Carrera','Carrera_IdCarrera'),
		);
	}

		public function getNombreCompleto()
    {
        return $this->Nombre.' '.$this->PrimerApellido.' '.$this->SegundoApellido;
    }

    public function EstadoToString($IdEstudiante,$IdCurso)
    {

    	$Curso = AlumnosPorCurso::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>$IdEstudiante,'Curso_IdCurso'=>$IdCurso));

    	if($Curso[0]->Activo == 0){
    		return "Desertor";
    	}

    	elseif($Curso[0]->Activo==1){
    	 return "Activo";

    	}
    	else
    	{

    	return "Sin Estado";

    	}

    }

    // con numero de cuenta
    public function VerificarDuplicidadUsuario($userName){

		$Estudiante = UsuarioEstudiante::model()->findAllByAttributes(array('Usuario'=>$userName));
		$Unitec = UsuarioUnitec::model()->findAllByAttributes(array('Usuario'=>$userName));
		$ContactoEmpresa = ContactoEmpresa::model()->findAllByAttributes(array('Usuario'=>$userName));
		$NCuenta = UsuarioEstudiante::model()->findAllByAttributes(array('NumeroDeCuenta'=>$_POST["NumeroDeCuenta"]));

		if(!empty($Estudiante) or  !empty($Unitec)  or !empty($ContactoEmpresa) or !empty($NCuenta) ){
				return true;
		 }else
		   {
		   		return false;
		   }	                            

    }

    public function VerificarDuplicidadNCuenta($NCuenta){
    	$NCuenta = UsuarioEstudiante::model()->findAllByAttributes(array('NumeroDeCuenta'=>$NCuenta));

    	if(!empty($NCuenta) ){
				return true;
		 }else
		   {
		   		return false;
		   }		

    }


    // Sin numero de cuenta
    public function VerificarDuplicidadUsuario2($userName){

		$Estudiante = UsuarioEstudiante::model()->findAllByAttributes(array('Usuario'=>$userName));
		$Unitec = UsuarioUnitec::model()->findAllByAttributes(array('Usuario'=>$userName));
		$ContactoEmpresa = ContactoEmpresa::model()->findAllByAttributes(array('Usuario'=>$userName));
		

		if(!empty($Estudiante) or  !empty($Unitec)  or !empty($ContactoEmpresa) ){
				return true;
		 }else
		   {
		   		return false;
		   }
		                            


    }


        public function EstadoVerificarEtiqueta($IdEstudiante,$IdCurso)
    {

    	$Curso = AlumnosPorCurso::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>$IdEstudiante,'Curso_IdCurso'=>$IdCurso));

    	if($Curso[0]->Activo == 0){
    		return 0;
    	}

    	elseif($Curso[0]->Activo==1){
    	 return 1 ;

    	}
    	else
    	{

    	return 2;

    	}

    }



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdUsuarioEstudiante' => 'Id Usuario Estudiante',
			'Nombre' => 'Nombre',
			'PrimerApellido' => 'Primer Apellido',
			'SegundoApellido' => 'Segundo Apellido',
			'Usuario' => 'Usuario',
			'Contrasena' => 'Contrasena',
			'Email' => 'Email',
			'NumeroDeCuenta' => 'Numero De Cuenta',
			'CreadoPor' => 'Creado Por',
			'ModificadoPor' => 'Modificado Por',
			'Activo' => 'Activo',
			'FechaCreacion' => 'Fecha Creacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'Rol_IdRol' => 'Rol Id Rol',
			'Carrera_IdCarrera' => 'Carrera Id Carrera',
		);
	}

	public function BuscarPracticas(){
	$alumno = UsuarioEstudiante::model()->findbyPk(Yii::app()->user->getId());

		$criteria = new CDbCriteria;  
		$criteria->with ='empresa';
		$criteria->addInCondition('Carrera_IdCarrera',array($alumno->Carrera_IdCarrera)); 
		$criteria->with = 'practica' ;
		$criteria->compare('practica.Activo',1,false);
        $criteria->compare('practica.UsuarioEstudiante_IdUsuarioEstudiante',0,false);
        $now = new CDbExpression("NOW()");
        $criteria->addCondition('practica.FechaVencimientoPlaza > '.$now);
		$criteria->group ='UsuarioEmpresa_IdUsuarioEmpresa';

 	return CHtml::listData(CarrerasPorPractica::model()->findAll($criteria),'empresa.IdUsuarioEmpresa','empresa.NombreEmpresa');

	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IdUsuarioEstudiante',$this->IdUsuarioEstudiante);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('PrimerApellido',$this->PrimerApellido,true);
		$criteria->compare('SegundoApellido',$this->SegundoApellido,true);
		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('Contrasena',$this->Contrasena,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('NumeroDeCuenta',$this->NumeroDeCuenta,true);
		$criteria->compare('CreadoPor',$this->CreadoPor,true);
		$criteria->compare('ModificadoPor',$this->ModificadoPor,true);
		$criteria->compare('Activo',$this->Activo);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('Rol_IdRol',$this->Rol_IdRol);
		$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function BusquedaAlumnosInactivos()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;
	
	$criteria->addInCondition('Carrera_IdCarrera', UsuarioUnitec::model()->CarrerasPorJefe2());

	$criteria->compare('CONCAT(Nombre," ",PrimerApellido, "  ",SegundoApellido)',$this->Nombre,true);

	$criteria->compare('NumeroDeCuenta',$this->NumeroDeCuenta,true);

	$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera,true);

	$criteria->compare('Activo',$this->Activo = 0,true);

	

	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			'defaultOrder'=>'FechaCreacion ASC',
		),
		'pagination'=>array(
			'pageSize'=>6
		),
	));
}

	public function BusquedaAlumnosActivos()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->with = 'carrera' ;
	

	$criteria->compare('CONCAT(Nombre," ",PrimerApellido," ",SegundoApellido)',$this->Nombre,true);

	$criteria->compare('NumeroDeCuenta',$this->NumeroDeCuenta,true);

	$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera,true);
	//$criteria->compare('carrera.NombreCarrera',$this->Carrera_IdCarrera,true);

	$criteria->compare('t.Activo',$this->Activo = 1,true);

	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			'defaultOrder'=>'t.FechaCreacion ASC',
		),
		'pagination'=>array(
			'pageSize'=>12
		),
	));
}

	public function TodosLosEstudiantes()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->with = 'carrera' ;

	$criteria->compare('Nombre',$this->Nombre,true);
	$criteria->compare('PrimerApellido',$this->PrimerApellido,true);
	$criteria->compare('SegundoApellido',$this->SegundoApellido,true);
	$criteria->compare('NumeroDeCuenta',$this->NumeroDeCuenta,true);
	$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera,true);
	//$criteria->compare('carrera.NombreCarrera',$this->Carrera_IdCarrera,true);

	$criteria->compare('t.Activo',$this->Activo,true);

	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			'defaultOrder'=>'t.FechaCreacion ASC',
		),
		'pagination'=>array(
			'pageSize'=>12
		),
	));
}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioEstudiante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
