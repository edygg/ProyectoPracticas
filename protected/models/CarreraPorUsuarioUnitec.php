<?php

/**
 * This is the model class for table "CarreraPorUsuarioUnitec".
 *
 * The followings are the available columns in table 'CarreraPorUsuarioUnitec':
 * @property integer $IdCarreraPorUsuarioUnitec
 * @property integer $UsuarioUnitec_IdUsuarioUnitec
 * @property integer $Carrera_IdCarrera
 * @property integer $Rol_IdRol
 * @property string $Activo
 * @property string $VerificadoPor
 * @property string $CreadoPor
 * @property string $ModificadoPor
 * @property string $FechaCreacion
 * @property string $FechaModificacion
 * @property string $FechaVerificacion
 * @property integer $TipoUsuarioUnitec_IdTipoUsuarioUnitec
 */
class CarreraPorUsuarioUnitec extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CarreraPorUsuarioUnitec';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UsuarioUnitec_IdUsuarioUnitec, Carrera_IdCarrera, Rol_IdRol, TipoUsuarioUnitec_IdTipoUsuarioUnitec', 'required'),
			array('UsuarioUnitec_IdUsuarioUnitec, Carrera_IdCarrera, Rol_IdRol, TipoUsuarioUnitec_IdTipoUsuarioUnitec, Activo', 'numerical', 'integerOnly'=>true),
			array('Activo, VerificadoPor, CreadoPor, ModificadoPor, FechaCreacion, FechaModificacion, FechaVerificacion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdCarreraPorUsuarioUnitec, UsuarioUnitec_IdUsuarioUnitec, Carrera_IdCarrera, Rol_IdRol, Activo, VerificadoPor, CreadoPor, ModificadoPor, FechaCreacion, FechaModificacion, FechaVerificacion, TipoUsuarioUnitec_IdTipoUsuarioUnitec', 'safe', 'on'=>'search'),
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
			'userUnitec'=> array(self::BELONGS_TO,'UsuarioUnitec','UsuarioUnitec_IdUsuarioUnitec'),
			'carrera'=> array(self::BELONGS_TO,'Carrera','Carrera_IdCarrera'),
			'tipoUsuarioUnitec'=> array(self::BELONGS_TO,'TipoUsuarioUnitec','TipoUsuarioUnitec_IdTipoUsuarioUnitec'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdCarreraPorUsuarioUnitec' => 'Id Carrera Por Usuario Unitec',
			'UsuarioUnitec_IdUsuarioUnitec' => 'Usuario Unitec Id Usuario Unitec',
			'Carrera_IdCarrera' => 'Carrera Id Carrera',
			'Rol_IdRol' => 'Rol Id Rol',
			'Activo' => 'Activo',
			'VerificadoPor' => 'Verificado Por',
			'CreadoPor' => 'Creado Por',
			'ModificadoPor' => 'Modificado Por',
			'FechaCreacion' => 'Fecha Creacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'FechaVerificacion' => 'Fecha Verificacion',
			'TipoUsuarioUnitec_IdTipoUsuarioUnitec' => 'Tipo Usuario Unitec Id Tipo Usuario Unitec',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IdCarreraPorUsuarioUnitec',$this->IdCarreraPorUsuarioUnitec);
		$criteria->compare('UsuarioUnitec_IdUsuarioUnitec',$this->UsuarioUnitec_IdUsuarioUnitec);
		$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera);
		$criteria->compare('Rol_IdRol',$this->Rol_IdRol);
		$criteria->compare('Activo',$this->Activo,true);
		$criteria->compare('VerificadoPor',$this->VerificadoPor,true);
		$criteria->compare('CreadoPor',$this->CreadoPor,true);
		$criteria->compare('ModificadoPor',$this->ModificadoPor,true);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('FechaVerificacion',$this->FechaVerificacion,true);
		$criteria->compare('TipoUsuarioUnitec_IdTipoUsuarioUnitec',$this->TipoUsuarioUnitec_IdTipoUsuarioUnitec);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function BusquedaCarrerasPorUsuario()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;
	$criteria->with = 'carrera';

	$criteria->compare('UsuarioUnitec_IdUsuarioUnitec', $this->UsuarioUnitec_IdUsuarioUnitec = Yii::app()->user->getId(),true);

	$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera,true);

	$criteria->compare('TipoUsuarioUnitec_IdTipoUsuarioUnitec',$this->TipoUsuarioUnitec_IdTipoUsuarioUnitec,true);


	$criteria->compare('Activo',$this->Activo  ,true);

	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
		'defaultOrder'=>'carrera.NombreCarrera ASC',
		),
		'pagination'=>array(
			'pageSize'=>6
		),
	));
}

	public function borrarRegistro($id){

	$temp = CarreraPorUsuarioUnitec::model()->findbyPk($id);
	$temp->delete();

	}

	public function BusquedaPrueba()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->with = array('userUnitec','carrera' );


	$criteria->compare('CONCAT(userUnitec.Nombre," ",userUnitec.PrimerApellido," ",userUnitec.SegundoApellido)',$this->UsuarioUnitec_IdUsuarioUnitec,true);


	$criteria->addNotInCondition('UsuarioUnitec_IdUsuarioUnitec',array(Yii::app()->user->getId())); // para que no aparezcan las solicitudes de el usuario logueado

	$criteria->compare('carrera.NombreCarrera',$this->Carrera_IdCarrera,true);

	$criteria->compare('TipoUsuarioUnitec_IdTipoUsuarioUnitec',$this->TipoUsuarioUnitec_IdTipoUsuarioUnitec,true);

	$criteria->compare('t.Activo',$this->Activo = 0,true);	

	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			'defaultOrder'=>'Carrera_IdCarrera ASC',
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
	 * @return CarreraPorUsuarioUnitec the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}




}
