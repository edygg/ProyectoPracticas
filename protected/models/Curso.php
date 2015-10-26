<?php

/**
 * This is the model class for table "Curso".
 *
 * The followings are the available columns in table 'Curso':
 * @property integer $IdCurso
 * @property string $Nombre
 * @property string $Codigo
 * @property string $Seccion
 * @property string $Activo
 * @property string $CreadoPor
 * @property string $ModificadoPor
 * @property integer $PeriodoAcademico_IdPeriodoAcademico
 * @property integer $UsuarioUnitec_IdUsuarioUnitec
 */
class Curso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $periodoConcatenado;
	public $asesor;
	public function tableName()
	{
		return 'Curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array( 'PeriodoAcademico_IdPeriodoAcademico, UsuarioUnitec_IdUsuarioUnitec', 'required'),
			array('IdCurso, PeriodoAcademico_IdPeriodoAcademico, UsuarioUnitec_IdUsuarioUnitec,periodoConcatenado,asesor', 'numerical', 'integerOnly'=>true),
			array('Nombre, Codigo, Seccion, Activo, CreadoPor, ModificadoPor', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdCurso, Nombre, Codigo, Seccion, Activo, CreadoPor, ModificadoPor, PeriodoAcademico_IdPeriodoAcademico, UsuarioUnitec_IdUsuarioUnitec,periodoConcatenado,asesor', 'safe', 'on'=>'search'),
		);
	}

	public function getCursoCompleto()
	{
	return $this->Nombre.' - '.$this->Codigo.' - '.$this->Seccion;
	}

	public function getCursoCompleto2()
	{
	return $this->Nombre.' - '.$this->Codigo.' - '.$this->Seccion .' - ' .$this->periodoAcademico->PeriodoConcatenado;
	}



	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'periodoAcademico'=> array(self::BELONGS_TO,'PeriodoAcademico','PeriodoAcademico_IdPeriodoAcademico'),
			'usuarioUnitec'=> array(self::BELONGS_TO,'UsuarioUnitec','UsuarioUnitec_IdUsuarioUnitec'),
			'carreras' => array(self::HAS_MANY,'Carrera','Carrera_IdCarrera'),
		);
	}


	public function getAsesoresPorCarrera($idCurso)
	{

	$Curso = CarrerasPorCurso::model()->findAll("Curso_IdCurso=?",array($idCurso));	
		

		$arregloCarrerasPorCurso = null ;

		$contador2 = 0 ;
		foreach ($Curso as $cursito) {
		$arregloCarrerasPorCurso[$contador2] = $cursito->Carrera_IdCarrera;
		$contador2++;
			
		}
return $arregloCarrerasPorCurso;

	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdCurso' => 'Id Curso',
			'Nombre' => 'Nombre',
			'Codigo' => 'Codigo',
			'Seccion' => 'Seccion',
			'Activo' => 'Activo',
			'CreadoPor' => 'Creado Por',
			'ModificadoPor' => 'Modificado Por',
			'PeriodoAcademico_IdPeriodoAcademico' => 'Periodo Academico Id Periodo Academico',
			'UsuarioUnitec_IdUsuarioUnitec' => 'Usuario Unitec Id Usuario Unitec',
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

		$criteria->compare('IdCurso',$this->IdCurso);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Codigo',$this->Codigo,true);
		$criteria->compare('Seccion',$this->Seccion,true);
		$criteria->compare('Activo',$this->Activo,true);
		$criteria->compare('CreadoPor',$this->CreadoPor,true);
		$criteria->compare('ModificadoPor',$this->ModificadoPor,true);
		$criteria->compare('PeriodoAcademico_IdPeriodoAcademico',$this->PeriodoAcademico_IdPeriodoAcademico);
		$criteria->compare('UsuarioUnitec_IdUsuarioUnitec',$this->UsuarioUnitec_IdUsuarioUnitec);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

			public function BusquedaCursosActivos()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->with = array('periodoAcademico' , 'usuarioUnitec') ;

	$criteria->compare('t.Nombre',$this->Nombre,true);

	$criteria->compare('Codigo',$this->Codigo,true);

	$criteria->compare('Seccion',$this->Seccion,true);

	$criteria->compare('CONCAT(usuarioUnitec.Nombre," ",usuarioUnitec.SegundoApellido)',$this->asesor,true);

	$criteria->compare('CONCAT(periodoAcademico.Anio,"/",periodoAcademico.Semestre,"/",periodoAcademico.Trimestre)',$this->periodoConcatenado,true);


	$criteria->compare('t.Activo',$this->Activo = 1 ,true);

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

			public function BusquedaCursosInactivos()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->compare('Nombre',$this->Nombre,true);

	$criteria->compare('Codigo',$this->Codigo,true);

	$criteria->compare('Seccion',$this->Seccion,true);

	

	$criteria->compare('Activo',$this->Activo = 0 ,true);

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
	 * @return Curso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
