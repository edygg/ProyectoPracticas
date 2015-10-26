<?php

/**
 * This is the model class for table "ContactoEmpresa".
 *
 * The followings are the available columns in table 'ContactoEmpresa':
 * @property integer $IdContactoEmpresa
 * @property string $NombreCompleto
 * @property string $TelefonoFijo
 * @property string $TelefonoCelular
 * @property string $CorreoElectronico
 * @property string $PuestoEmpresa
 * @property integer $UsuarioEmpresa_IdUsuarioEmpresa
 * @property integer $UsuarioEmpresa_Rol_IdRol
 * @property integer $UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa
 * @property integer $Activo
 * @property string $FechaCreacion
 * @property string $FechaModificacion
 * @property string $Usuario
 * @property string $Contrasena
 */
class ContactoEmpresa extends CActiveRecord
{


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ContactoEmpresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UsuarioEmpresa_IdUsuarioEmpresa, UsuarioEmpresa_Rol_IdRol, UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa', 'required'),
			array('UsuarioEmpresa_IdUsuarioEmpresa, UsuarioEmpresa_Rol_IdRol, UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa, Activo', 'numerical', 'integerOnly'=>true),
			array('NombreCompleto, PuestoEmpresa', 'length', 'max'=>200),
			array('TelefonoFijo, TelefonoCelular, FechaCreacion, FechaModificacion, Usuario, Contrasena', 'length', 'max'=>45),
			array('CorreoElectronico', 'length', 'max'=>70),
			array('Imagen', 'file', 'types'=>'jpg, gif, png','maxSize' => (1024 * 600),'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdContactoEmpresa, NombreCompleto, TelefonoFijo, TelefonoCelular, CorreoElectronico, PuestoEmpresa, UsuarioEmpresa_IdUsuarioEmpresa, UsuarioEmpresa_Rol_IdRol, UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa, Activo, FechaCreacion, FechaModificacion, Usuario, Contrasena', 'safe', 'on'=>'search'),
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
			'usuarioEmpresa'=>array(self::BELONGS_TO,'UsuarioEmpresa','UsuarioEmpresa_IdUsuarioEmpresa'),
		);
	}


public function EmpresasContactoEmpresaInactivos(){
$criteria = new CDbCriteria;
  $criteria->with= 'usuarioEmpresa';
  $criteria->order = 'usuarioEmpresa.NombreEmpresa ASC';
  $criteria->addInCondition('t.Activo', array('0'));


return CHtml::listData(ContactoEmpresa::model()->findAll($criteria),'usuarioEmpresa.IdUsuarioEmpresa','usuarioEmpresa.NombreEmpresa');

	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdContactoEmpresa' => 'Id Contacto Empresa',
			'NombreCompleto' => 'Nombre Completo',
			'TelefonoFijo' => 'Telefono Fijo',
			'TelefonoCelular' => 'Telefono Celular',
			'CorreoElectronico' => 'Correo Electronico',
			'PuestoEmpresa' => 'Puesto Empresa',
			'UsuarioEmpresa_IdUsuarioEmpresa' => 'Usuario Empresa Id Usuario Empresa',
			'UsuarioEmpresa_Rol_IdRol' => 'Empresa',
			'UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa' => 'Usuario Empresa Tipo Empresa Id Tipo Empresa',
			'Activo' => 'Activo',
			'FechaCreacion' => 'Fecha Creacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'Usuario' => 'Usuario',
			'Contrasena' => 'Contrasena',
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

		$criteria->compare('IdContactoEmpresa',$this->IdContactoEmpresa);
		$criteria->compare('NombreCompleto',$this->NombreCompleto,true);
		$criteria->compare('TelefonoFijo',$this->TelefonoFijo,true);
		$criteria->compare('TelefonoCelular',$this->TelefonoCelular,true);
		$criteria->compare('CorreoElectronico',$this->CorreoElectronico,true);
		$criteria->compare('PuestoEmpresa',$this->PuestoEmpresa,true);
		$criteria->compare('UsuarioEmpresa_IdUsuarioEmpresa',$this->UsuarioEmpresa_IdUsuarioEmpresa);
		$criteria->compare('UsuarioEmpresa_Rol_IdRol',$this->UsuarioEmpresa_Rol_IdRol);
		$criteria->compare('UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa',$this->UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa);
		$criteria->compare('Activo',$this->Activo);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('Contrasena',$this->Contrasena,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function BusquedaUsuariosEmpresaInactivos()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('NombreCompleto',$this->NombreCompleto,true);

	$criteria->compare('TelefonoCelular',$this->TelefonoCelular,true);

	$criteria->compare('TelefonoFijo',$this->TelefonoFijo,true);

	$criteria->compare('CorreoElectronico',$this->CorreoElectronico,true);

	$criteria->compare('UsuarioEmpresa_IdUsuarioEmpresa',$this->UsuarioEmpresa_IdUsuarioEmpresa,true);	

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
	 * @return ContactoEmpresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
