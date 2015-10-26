<?php

/**
 * This is the model class for table "Carrera".
 *
 * The followings are the available columns in table 'Carrera':
 * @property integer $IdCarrera
 * @property string $NombreCarrera
 * @property integer $Activo
 * @property integer $TipoCarrera_idTipoCarrera
 */
class Carrera extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Carrera';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TipoCarrera_idTipoCarrera', 'required'),
			array('Activo, TipoCarrera_idTipoCarrera', 'numerical', 'integerOnly'=>true),
			array('NombreCarrera', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdCarrera, NombreCarrera, Activo, TipoCarrera_idTipoCarrera', 'safe', 'on'=>'search'),
		);
	}

	public function getCarreras()
	{

		return CHtml::listData(Carrera::model()->findAll(array('order' => 'NombreCarrera'),"Activo=?",array(1)),"IdCarrera","NombreCarrera");
	}

	public function getArrayCarreras(){
		$array="";
		$array[-1]="Seleccione Carrrera";

		$carreras = Carrera::model()->findAll();	

		foreach ($carreras as $carrera) {

		$array[$carrera->IdCarrera]= $carrera->NombreCarrera;
					
		}
		
		return $array;

	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tipoCarrera'=> array(self::BELONGS_TO,'TipoCarrera','TipoCarrera_idTipoCarrera'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdCarrera' => 'Id Carrera',
			'NombreCarrera' => 'Nombre Carrera',
			'Activo' => 'Activo',
			'TipoCarrera_idTipoCarrera' => 'Tipo Carrera Id Tipo Carrera',
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

		$criteria->compare('IdCarrera',$this->IdCarrera);
		$criteria->compare('NombreCarrera',$this->NombreCarrera,true);
		$criteria->compare('Activo',$this->Activo);
		$criteria->compare('TipoCarrera_idTipoCarrera',$this->TipoCarrera_idTipoCarrera);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function BusquedaCarreras()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->with = 'tipoCarrera'; 

	$criteria->compare('tipoCarrera.Activo',1,true);	

	$criteria->compare('NombreCarrera',$this->NombreCarrera,true);

	$criteria->compare('Activo',$this->Activo,true);
	
	$criteria->compare('TipoCarrera_idTipoCarrera',$this->TipoCarrera_idTipoCarrera,true);
	


	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			'defaultOrder'=>'t.FechaCreacion ASC',
		),
		'pagination'=>array(
			'pageSize'=>10
		),
	));
}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Carrera the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
