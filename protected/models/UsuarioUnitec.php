<?php

/**
 * This is the model class for table "UsuarioUnitec".
 *
 * The followings are the available columns in table 'UsuarioUnitec':
 * @property integer $IdUsuarioUnitec
 * @property string $Nombre
 * @property string $PrimerApellido
 * @property string $SegundoApellido
 * @property string $Usuario
 * @property string $Contrasena
 * @property string $Email
 * @property string $CreadoPor
 * @property string $ModificadoPor
 * @property integer $Activo
 * @property string $FechaCreacion
 * @property string $FechaModificacion
 * @property integer $Rol_IdRol
 */
class UsuarioUnitec extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'UsuarioUnitec';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('Rol_IdRol', 'required'),
			array('Activo', 'numerical', 'integerOnly'=>true),
			array('Nombre, PrimerApellido, SegundoApellido, Usuario, Contrasena', 'length', 'max'=>45),
			array('Email', 'length', 'max'=>70),
			array('CreadoPor, ModificadoPor, FechaCreacion, FechaModificacion', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdUsuarioUnitec, Nombre, PrimerApellido, SegundoApellido, Usuario, Contrasena, Email, CreadoPor, ModificadoPor, Activo, FechaCreacion, FechaModificacion', 'safe', 'on'=>'search'),
		);
	}

	public function getNombreCompleto()
    {
        return $this->Nombre.' '.$this->PrimerApellido.' '.$this->SegundoApellido;
    }

    public function getPrimerNombrePrimerApellido()
    {
        return $this->Nombre.' '.$this->PrimerApellido;
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'carrerasPorJefe' => array(self::HAS_MANY,'CarreraPorUsuarioUnitec','TipoUsuarioUnitec_IdTipoUsuarioUnitec')
		);
	}


	// es para llenar cualquier DropDownList solamente con las carreras de las cuales sean jefe académico
	public function CarrerasPorJefe(){

	$Curso = CarreraPorUsuarioUnitec::model()->findAllByAttributes(array('UsuarioUnitec_IdUsuarioUnitec'=>Yii::app()->user->getId(),'TipoUsuarioUnitec_IdTipoUsuarioUnitec'=>2,'Activo'=>1));

	$arrayConIds = "";
	$contador=0;


	foreach ($Curso as $cursito) {
	$arrayConIds[$contador]=$cursito->Carrera_IdCarrera;
	$contador = $contador+1;
	}

	//  Cuando los usuarios no son jefes de ninguna carrera y por alguna razon entran, asi no da error(addInCondition tiene que recibir un array)
	if(empty($arrayConIds)){
	$arrayConIds[0] = "";
	}

	$criteria = new CDbCriteria;
	$criteria->addInCondition('IdCarrera',$arrayConIds);
	$criteria->order = 'NombreCarrera ASC';


	return CHtml::listData(Carrera::model()->findAll($criteria),'IdCarrera','NombreCarrera');
	

	}

// es para llenar enviar solamente el array a alguna funcion de busqueda mediante el addInCondition
	public function CarrerasPorJefe2(){

	$Curso = CarreraPorUsuarioUnitec::model()->findAllByAttributes(array('UsuarioUnitec_IdUsuarioUnitec'=>Yii::app()->user->getId(),'TipoUsuarioUnitec_IdTipoUsuarioUnitec'=>2,'Activo'=>1));

	$arrayConIds = "";
	$contador=0;

	foreach ($Curso as $cursito) {
	$arrayConIds[$contador]=$cursito->Carrera_IdCarrera;
	$contador = $contador+1;
	}
	//  Cuando los usuarios no son jefes de ninguna carrera y por alguna razon entran, asi no da error(addInCondition tiene que recibir un array)
	if(empty($arrayConIds)){
	$arrayConIds[0] = "";
	}


	$criteria = new CDbCriteria;
	$criteria->addInCondition('IdCarrera',$arrayConIds);
	$criteria->order = 'NombreCarrera ASC';

	return $arrayConIds;
	
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdUsuarioUnitec' => 'Id Usuario Unitec',
			'Nombre' => 'Nombre',
			'PrimerApellido' => 'Primer Apellido',
			'SegundoApellido' => 'Segundo Apellido',
			'Usuario' => 'Usuario',
			'Contrasena' => 'Contrasena',
			'Email' => 'Email',
			'CreadoPor' => 'Creado Por',
			'ModificadoPor' => 'Modificado Por',
			'Activo' => 'Activo',
			'FechaCreacion' => 'Fecha Creacion',
			'FechaModificacion' => 'Fecha Modificacion',
			
		);
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
	public function search2()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IdUsuarioUnitec',$this->IdUsuarioUnitec);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('PrimerApellido',$this->PrimerApellido,true);
		$criteria->compare('SegundoApellido',$this->SegundoApellido,true);
		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('Contrasena',$this->Contrasena,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('CreadoPor',$this->CreadoPor,true);
		$criteria->compare('ModificadoPor',$this->ModificadoPor,true);
		$criteria->compare('Activo',$this->Activo);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}




	public function search()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('Nombre',$this->Nombre,true);

	$criteria->compare('PrimerApellido',$this->PrimerApellido,true);

	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			'defaultOrder'=>'PrimerApellido ASC',
		),
		'pagination'=>array(
			'pageSize'=>5
		),
	));
}

	public function BusquedaUnitecInactivos()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('CONCAT(Nombre," ",PrimerApellido, "  ",SegundoApellido)',$this->Nombre,true);

	$criteria->addNotInCondition('IdUsuarioUnitec',array(Yii::app()->user->getId())); 

	$criteria->compare('Email',$this->Email,true);

	$criteria->compare('Activo',$this->Activo = 0 ,true);

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


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioUnitec the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

