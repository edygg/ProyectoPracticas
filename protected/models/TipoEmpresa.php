<?php

/**
 * This is the model class for table "TipoEmpresa".
 *
 * The followings are the available columns in table 'TipoEmpresa':
 * @property integer $IdTipoEmpresa
 * @property string $NombreTipoEmpresa
 * @property string $DescripcionTipoEmpresa
 * @property integer $Activo
 */
class TipoEmpresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TipoEmpresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Activo', 'numerical', 'integerOnly'=>true),
			array('NombreTipoEmpresa', 'length', 'max'=>200),
			array('DescripcionTipoEmpresa', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdTipoEmpresa, NombreTipoEmpresa, DescripcionTipoEmpresa, Activo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdTipoEmpresa' => 'Id Tipo Empresa',
			'NombreTipoEmpresa' => 'Nombre Tipo Empresa',
			'DescripcionTipoEmpresa' => 'Descripcion Tipo Empresa',
			'Activo' => 'Activo',
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

		$criteria->compare('IdTipoEmpresa',$this->IdTipoEmpresa);
		$criteria->compare('NombreTipoEmpresa',$this->NombreTipoEmpresa,true);
		$criteria->compare('DescripcionTipoEmpresa',$this->DescripcionTipoEmpresa,true);
		$criteria->compare('Activo',$this->Activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getMenuTipoEmpresa()
	{

		return CHtml::listData(TipoEmpresa::model()->findAll("Activo=?",array(1)),"IdTipoEmpresa","NombreTipoEmpresa");
	}


	public function BusquedaTipoEmpresa()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('NombreTipoEmpresa',$this->NombreTipoEmpresa,true);

	$criteria->compare('Activo',$this->Activo,true);


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
	 * @return TipoEmpresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
