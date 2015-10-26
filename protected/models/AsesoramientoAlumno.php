<?php

/**
 * This is the model class for table "AsesoramientoAlumno".
 *
 * The followings are the available columns in table 'AsesoramientoAlumno':
 * @property integer $IdAsesoramientoAlumno
 * @property integer $UsuarioUnitec_IdUsuarioUnitec
 * @property integer $Curso_IdCurso
 * @property integer $UsuarioEstudiante_IdUsuarioEstudiante
 * @property integer $PracticaProfesional_IdPracticaProfesional
 * @property string $PuntosAcordados
 * @property string $FechaCreacionAsesoramiento
 */
class AsesoramientoAlumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'AsesoramientoAlumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UsuarioUnitec_IdUsuarioUnitec, Curso_IdCurso, UsuarioEstudiante_IdUsuarioEstudiante, PracticaProfesional_IdPracticaProfesional', 'required'),
			array('UsuarioUnitec_IdUsuarioUnitec, Curso_IdCurso, UsuarioEstudiante_IdUsuarioEstudiante, PracticaProfesional_IdPracticaProfesional', 'numerical', 'integerOnly'=>true),
			array('PuntosAcordados', 'length', 'max'=>5000),
			array('FechaCreacionAsesoramiento', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdAsesoramientoAlumno, UsuarioUnitec_IdUsuarioUnitec, Curso_IdCurso, UsuarioEstudiante_IdUsuarioEstudiante, PracticaProfesional_IdPracticaProfesional, PuntosAcordados, FechaCreacionAsesoramiento', 'safe', 'on'=>'search'),
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
			'estudiante' => array(self::HAS_MANY,'UsuarioEstudiante','UsuarioEstudiante_IdUsuarioEstudiante'),
			'practica' => array(self::HAS_MANY,'PracticaProfesional','PracticaProfesional_IdPracticaProfesional'),	
			'usuarioUnitec' => array(self::BELONGS_TO,'UsuarioUnitec','UsuarioUnitec_IdUsuarioUnitec')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdAsesoramientoAlumno' => 'Id Asesoramiento Alumno',
			'UsuarioUnitec_IdUsuarioUnitec' => 'Usuario Unitec Id Usuario Unitec',
			'Curso_IdCurso' => 'Curso Id Curso',
			'UsuarioEstudiante_IdUsuarioEstudiante' => 'Usuario Estudiante Id Usuario Estudiante',
			'PracticaProfesional_IdPracticaProfesional' => 'Practica Profesional Id Practica Profesional',
			'PuntosAcordados' => 'Puntos Acordados',
			'FechaCreacionAsesoramiento' => 'Fecha Creacion Asesoramiento',
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

		$criteria->compare('IdAsesoramientoAlumno',$this->IdAsesoramientoAlumno);
		$criteria->compare('UsuarioUnitec_IdUsuarioUnitec',$this->UsuarioUnitec_IdUsuarioUnitec);
		$criteria->compare('Curso_IdCurso',$this->Curso_IdCurso);
		$criteria->compare('UsuarioEstudiante_IdUsuarioEstudiante',$this->UsuarioEstudiante_IdUsuarioEstudiante);
		$criteria->compare('PracticaProfesional_IdPracticaProfesional',$this->PracticaProfesional_IdPracticaProfesional);
		$criteria->compare('PuntosAcordados',$this->PuntosAcordados,true);
		$criteria->compare('FechaCreacionAsesoramiento',$this->FechaCreacionAsesoramiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AsesoramientoAlumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
