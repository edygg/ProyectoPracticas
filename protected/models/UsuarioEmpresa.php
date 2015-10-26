<?php

/**
 * This is the model class for table "UsuarioEmpresa".
 *
 * The followings are the available columns in table 'UsuarioEmpresa':
 * @property integer $IdUsuarioEmpresa
 * @property string $NombreEmpresa
 * @property string $TelefonoEmpresa
 * @property string $CorreoEmpresa
 * @property string $RubroEmpresa
 * @property string $SitioWebEmpresa
 * @property string $DescripcionEmpresa
 * @property string $CreadoPor
 * @property string $ModificadoPor
 * @property integer $Activo
 * @property string $FechaCreacion
 * @property string $FechaModificacion
 * @property integer $Rol_IdRol
 * @property integer $TipoEmpresa_IdTipoEmpresa
 */
class UsuarioEmpresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'UsuarioEmpresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Rol_IdRol, TipoEmpresa_IdTipoEmpresa', 'required'),
			array('Activo, Rol_IdRol, TipoEmpresa_IdTipoEmpresa', 'numerical', 'integerOnly'=>true),
			array('NombreEmpresa', 'length', 'max'=>300),
			array('TelefonoEmpresa, CreadoPor, ModificadoPor', 'length', 'max'=>45),
			array('CorreoEmpresa', 'length', 'max'=>70),
			array('RubroEmpresa, SitioWebEmpresa', 'length', 'max'=>200),
			
			array('FechaCreacion, FechaModificacion', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdUsuarioEmpresa, NombreEmpresa, TelefonoEmpresa, CorreoEmpresa, RubroEmpresa, SitioWebEmpresa,  CreadoPor, ModificadoPor, Activo, FechaCreacion, FechaModificacion, Rol_IdRol, TipoEmpresa_IdTipoEmpresa', 'safe', 'on'=>'search'),
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
		'tipoEmpresa'=> array(self::BELONGS_TO,'TipoEmpresa','TipoEmpresa_IdTipoEmpresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdUsuarioEmpresa' => 'Id Usuario Empresa',
			'NombreEmpresa' => 'Nombre Empresa',
			'TelefonoEmpresa' => 'Telefono Empresa',
			'CorreoEmpresa' => 'Correo Empresa',
			'RubroEmpresa' => 'Rubro Empresa',
			'SitioWebEmpresa' => 'Sitio Web Empresa',
			
			'CreadoPor' => 'Creado Por',
			'ModificadoPor' => 'Modificado Por',
			'Activo' => 'Activo',
			'FechaCreacion' => 'Fecha Creacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'Rol_IdRol' => 'Rol Id Rol',
			'TipoEmpresa_IdTipoEmpresa' => 'Tipo Empresa Id Tipo Empresa',
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

		$criteria->compare('IdUsuarioEmpresa',$this->IdUsuarioEmpresa);
		$criteria->compare('NombreEmpresa',$this->NombreEmpresa,true);
		$criteria->compare('TelefonoEmpresa',$this->TelefonoEmpresa,true);
		$criteria->compare('CorreoEmpresa',$this->CorreoEmpresa,true);
		$criteria->compare('RubroEmpresa',$this->RubroEmpresa,true);
		$criteria->compare('SitioWebEmpresa',$this->SitioWebEmpresa,true);
		
		$criteria->compare('CreadoPor',$this->CreadoPor,true);
		$criteria->compare('ModificadoPor',$this->ModificadoPor,true);
		$criteria->compare('Activo',$this->Activo);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('Rol_IdRol',$this->Rol_IdRol);
		$criteria->compare('TipoEmpresa_IdTipoEmpresa',$this->TipoEmpresa_IdTipoEmpresa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


		public function search()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('NombreEmpresa',$this->NombreEmpresa,true);

	$criteria->compare('TelefonoEmpresa',$this->TelefonoEmpresa,true);

	$criteria->compare('RubroEmpresa',$this->RubroEmpresa,true);

	$criteria->compare('CorreoEmpresa',$this->CorreoEmpresa,true);

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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioEmpresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
