<?php

/**
 * This is the model class for table "CarrerasPorCurso".
 *
 * The followings are the available columns in table 'CarrerasPorCurso':
 * @property integer $IdCarrerasPorCurso
 * @property integer $Carrera_IdCarrera
 * @property integer $Curso_IdCurso
 */
class CarrerasPorCurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $prueba;
	public function tableName()
	{
		return 'CarrerasPorCurso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Carrera_IdCarrera, Curso_IdCurso', 'required'),
			array('Carrera_IdCarrera, Curso_IdCurso,prueba', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdCarrerasPorCurso, Carrera_IdCarrera, Curso_IdCurso, prueba', 'safe', 'on'=>'search'),
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
			'curso'=> array(self::BELONGS_TO,'Curso','Curso_IdCurso'),
		);
	}

	public function CarrerasPorCursoToString($id)
	{
		$carreras = CarrerasPorCurso::model()->findAll("Curso_IdCurso=?",array($id));

		$stringCarreras= " ";

		foreach ($carreras as $carrerita) {
			$stringCarreras .= "#". preg_replace('/\s+/', '', $carrerita->carrera->NombreCarrera) . " ";
			
		}

			return $stringCarreras;


	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdCarrerasPorCurso' => 'Id Carreras Por Curso',
			'Carrera_IdCarrera' => 'Carrera Id Carrera',
			'Curso_IdCurso' => 'Curso Id Curso',
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

		$criteria->compare('IdCarrerasPorCurso',$this->IdCarrerasPorCurso);
		$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera);
		$criteria->compare('Curso_IdCurso',$this->Curso_IdCurso);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


				public function BusquedaCarrerasPorCurso()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->with = 'curso' ;

	$criteria->compare('IdCarrerasPorCurso',$this->IdCarrerasPorCurso,true);

	$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera,true);

	$criteria->compare('CONCAT(curso.Nombre,curso.Seccion,curso.Codigo)',$this->Curso_IdCurso,true);

	$criteria->compare('CONCAT(curso.UsuarioUnitec_IdUsuarioUnitec)',$this->prueba,true);

	$criteria->compare('CONCAT(curso.Activo)',1,true);


	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			// 'defaultOrder'=>'FechaCreacion ASC',
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
	 * @return CarrerasPorCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
