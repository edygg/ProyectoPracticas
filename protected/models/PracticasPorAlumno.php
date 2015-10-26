<?php

/**
 * This is the model class for table "PracticasPorAlumno".
 *
 * The followings are the available columns in table 'PracticasPorAlumno':
 * @property integer $IdPracticasPorAlumno
 * @property integer $PracticaProfesional_IdPracticaProfesional
 * @property integer $UsuarioEstudiante_IdUsuarioEstudiante
 * @property integer $Curso_IdCurso
 * @property integer $UsuarioUnitec_IdUsuarioUnitec
 * @property string $Activo
 * @property string $FechaCreacion
 */
class PracticasPorAlumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PracticasPorAlumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PracticaProfesional_IdPracticaProfesional, UsuarioEstudiante_IdUsuarioEstudiante, Curso_IdCurso, UsuarioUnitec_IdUsuarioUnitec', 'required'),
			array('PracticaProfesional_IdPracticaProfesional, UsuarioEstudiante_IdUsuarioEstudiante, Curso_IdCurso, UsuarioUnitec_IdUsuarioUnitec', 'numerical', 'integerOnly'=>true),
			array('Activo, FechaCreacion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdPracticasPorAlumno, PracticaProfesional_IdPracticaProfesional, UsuarioEstudiante_IdUsuarioEstudiante, Curso_IdCurso, UsuarioUnitec_IdUsuarioUnitec, Activo, FechaCreacion', 'safe', 'on'=>'search'),
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


	public function obtenerEmpresaDePractica($idCurso,$IdEstudiante){


		$EmpresaPractica = PracticasPorAlumno::model()->findAllByAttributes(array('Curso_IdCurso'=>$idCurso,'UsuarioEstudiante_IdUsuarioEstudiante'=>$IdEstudiante));

		if(!empty($EmpresaPractica)){
	

		return $EmpresaPractica[0]->practica->asesor->usuarioEmpresa->NombreEmpresa;
		

		}
		else {
			return "<span style='color:#ff0000'>Centro de Práctica Pendiente</span>";
		}
	
		

	}

		public function obtenerEmpresaDePracticaBoolean($idCurso,$IdEstudiante){


		$EmpresaPractica = PracticasPorAlumno::model()->findAllByAttributes(array('Curso_IdCurso'=>$idCurso,'UsuarioEstudiante_IdUsuarioEstudiante'=>$IdEstudiante));

		if(!empty($EmpresaPractica)){

		return 1;
		

		}
		else {
			return 0;
		}
	
		

	}

	public function obtenerCodigoDePractica($idCurso,$IdEstudiante){

		$criteria = new CDbCriteria;
		$criteria->compare('Curso_IdCurso',$idCurso);
		$criteria->compare('UsuarioEstudiante_IdUsuarioEstudiante',$IdEstudiante);


		$EmpresaPractica = PracticasPorAlumno::model()->findAll($criteria);

		if(!empty($EmpresaPractica)){

		
			return $EmpresaPractica[0]->PracticaProfesional_IdPracticaProfesional;

		}


	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdPracticasPorAlumno' => 'Id Practicas Por Alumno',
			'PracticaProfesional_IdPracticaProfesional' => 'Practica Profesional Id Practica Profesional',
			'UsuarioEstudiante_IdUsuarioEstudiante' => 'Usuario Estudiante Id Usuario Estudiante',
			'Curso_IdCurso' => 'Curso Id Curso',
			'UsuarioUnitec_IdUsuarioUnitec' => 'Usuario Unitec Id Usuario Unitec',
			'Activo' => 'Activo',
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

		$criteria->compare('IdPracticasPorAlumno',$this->IdPracticasPorAlumno);
		$criteria->compare('PracticaProfesional_IdPracticaProfesional',$this->PracticaProfesional_IdPracticaProfesional);
		$criteria->compare('UsuarioEstudiante_IdUsuarioEstudiante',$this->UsuarioEstudiante_IdUsuarioEstudiante);
		$criteria->compare('Curso_IdCurso',$this->Curso_IdCurso);
		$criteria->compare('UsuarioUnitec_IdUsuarioUnitec',$this->UsuarioUnitec_IdUsuarioUnitec);
		$criteria->compare('Activo',$this->Activo,true);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PracticasPorAlumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
