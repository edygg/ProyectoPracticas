<?php

/**
 * This is the model class for table "PeriodoAcademico".
 *
 * The followings are the available columns in table 'PeriodoAcademico':
 * @property integer $IdPeriodoAcademico
 * @property string $Anio
 * @property string $Semestre
 * @property string $Trimestre
 * @property string $Activo
 * @property string $CreadoPor
 * @property string $ModificadoPor
 * @property string $FechaCreacion
 */
class PeriodoAcademico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PeriodoAcademico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Anio, Semestre, Trimestre, Activo, CreadoPor, ModificadoPor, FechaCreacion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdPeriodoAcademico, Anio, Semestre, Trimestre, Activo, CreadoPor, ModificadoPor, FechaCreacion', 'safe', 'on'=>'search'),
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

	public function getPeriodoConcatenado()
	{

		return $this->Anio.'/'.$this->Semestre.'/'.$this->Trimestre;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdPeriodoAcademico' => 'Id Periodo Academico',
			'Anio' => 'Anio',
			'Semestre' => 'Semestre',
			'Trimestre' => 'Trimestre',
			'Activo' => 'Activo',
			'CreadoPor' => 'Creado Por',
			'ModificadoPor' => 'Modificado Por',
			'FechaCreacion' => 'Fecha Creacion',
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

		$criteria->compare('IdPeriodoAcademico',$this->IdPeriodoAcademico);
		$criteria->compare('Anio',$this->Anio,true);
		$criteria->compare('Semestre',$this->Semestre,true);
		$criteria->compare('Trimestre',$this->Trimestre,true);
		$criteria->compare('Activo',$this->Activo,true);
		$criteria->compare('CreadoPor',$this->CreadoPor,true);
		$criteria->compare('ModificadoPor',$this->ModificadoPor,true);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


		public function BusquedaPeriodosActivos()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('Anio',$this->Anio,true);

	$criteria->compare('Semestre',$this->Semestre,true);

	$criteria->compare('Trimestre',$this->Trimestre,true);


	$criteria->compare('Activo',$this->Activo = 1 ,true);

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

		public function BusquedaPeriodosInactivos()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('Anio',$this->Anio,true);

	$criteria->compare('Semestre',$this->Semestre,true);

	$criteria->compare('Trimestre',$this->Trimestre,true);


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
	 * @return PeriodoAcademico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
