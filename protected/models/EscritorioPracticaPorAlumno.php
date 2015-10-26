<?php

/**
 * This is the model class for table "EscritorioPracticaPorAlumno".
 *
 * The followings are the available columns in table 'EscritorioPracticaPorAlumno':
 * @property integer $IdEscritorioPracticaPorAlumno
 * @property integer $UsuarioEstudiante_IdUsuarioEstudiante
 * @property integer $PracticaProfesional_IdPracticaProfesional
 * @property string $FechaCreacion
 */
class EscritorioPracticaPorAlumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EscritorioPracticaPorAlumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UsuarioEstudiante_IdUsuarioEstudiante, PracticaProfesional_IdPracticaProfesional', 'required'),
			array('UsuarioEstudiante_IdUsuarioEstudiante, PracticaProfesional_IdPracticaProfesional', 'numerical', 'integerOnly'=>true),
			array('FechaCreacion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdEscritorioPracticaPorAlumno, UsuarioEstudiante_IdUsuarioEstudiante, PracticaProfesional_IdPracticaProfesional, FechaCreacion', 'safe', 'on'=>'search'),
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
			'practica'=> array(self::BELONGS_TO,'PracticaProfesional','PracticaProfesional_IdPracticaProfesional'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdEscritorioPracticaPorAlumno' => 'Id Escritorio Practica Por Alumno',
			'UsuarioEstudiante_IdUsuarioEstudiante' => 'Usuario Estudiante Id Usuario Estudiante',
			'PracticaProfesional_IdPracticaProfesional' => 'Practica Profesional Id Practica Profesional',
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

		$criteria->compare('IdEscritorioPracticaPorAlumno',$this->IdEscritorioPracticaPorAlumno);
		$criteria->compare('UsuarioEstudiante_IdUsuarioEstudiante',$this->UsuarioEstudiante_IdUsuarioEstudiante);
		$criteria->compare('PracticaProfesional_IdPracticaProfesional',$this->PracticaProfesional_IdPracticaProfesional);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EscritorioPracticaPorAlumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
