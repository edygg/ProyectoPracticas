<?php

/**
 * This is the model class for table "TipoCarrera".
 *
 * The followings are the available columns in table 'TipoCarrera':
 * @property integer $idTipoCarrera
 * @property string $Nombre
 */
class TipoCarrera extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TipoCarrera';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Activo', 'numerical', 'integerOnly'=>true),
			array('idTipoCarrera, Nombre, Activo','safe', 'on'=>'search'),

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
			'idTipoCarrera' => 'Id Tipo Carrera',
			'Nombre' => 'Nombre',
		);
	}

		public function getMenuTipoCarrera()
	{
		$criteria=new CDbCriteria;
		$criteria->order = 'Nombre';

		return CHtml::listData(TipoCarrera::model()->findAll($criteria),"idTipoCarrera","Nombre");
	}

		public function getMenuCarrerasFiltradas($carreraNula=0)
	{
		$carreras = Carrera::model()->findAll("TipoCarrera_idTipoCarrera=?",array($carreraNula));
	// por alguna razon no filtraba aunque le ponia el parametro activo , se filtra desde la accion CarrerasPorTipo en Usuario Estudiante
	//	$carreras = Carrera::model()->findAll("Activo=?","TipoCarrera_idTipoCarrera=?",array(1,$carreraNula));

		return CHtml::listData($carreras,"IdCarrera","NombreCarrera");
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

		$criteria->compare('idTipoCarrera',$this->idTipoCarrera);
		$criteria->compare('Nombre',$this->Nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


		public function BusquedaTiposCarreras()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('Nombre',$this->Nombre,true);

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
	 * @return TipoCarrera the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



}
