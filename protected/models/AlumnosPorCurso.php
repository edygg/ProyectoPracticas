<?php

/**
 * This is the model class for table "AlumnosPorCurso".
 *
 * The followings are the available columns in table 'AlumnosPorCurso':
 * @property integer $idAlumnosPorCurso
 * @property integer $UsuarioEstudiante_IdUsuarioEstudiante
 * @property integer $Curso_IdCurso
 * @property string $Activo
 * @property string $CreadoPor
 * @property string $FechaCreacion
 */
class AlumnosPorCurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $carrera;
	public $NCuenta;
	public $practica;

	public function tableName()
	{
		return 'AlumnosPorCurso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UsuarioEstudiante_IdUsuarioEstudiante, Curso_IdCurso', 'required'),
			array('UsuarioEstudiante_IdUsuarioEstudiante, Curso_IdCurso, carrera, NCuenta', 'numerical', 'integerOnly'=>true),
			array('Activo, CreadoPor, FechaCreacion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAlumnosPorCurso, UsuarioEstudiante_IdUsuarioEstudiante, Curso_IdCurso, Activo,NCuenta, CreadoPor, FechaCreacion', 'safe', 'on'=>'search'),
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
			'userEstudiante'=> array(self::BELONGS_TO,'UsuarioEstudiante','UsuarioEstudiante_IdUsuarioEstudiante'),
			'curso'=> array(self::BELONGS_TO,'Curso','Curso_IdCurso'),

		);
	}

	public function codigoPractica($idAlumno, $idCurso ){
	$practica = PracticasPorAlumno::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>$idAlumno , 'Curso_IdCurso'=>$idCurso));		
	$codigoPractica = "";
	foreach ($practica as $p) {
	$codigoPractica += $p->practica->IdPracticaProfesional;
	}

	return $codigoPractica;

	}

		public function EstudianteTienePractica($idAlumno, $idCurso ){
	$practica = PracticasPorAlumno::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>$idAlumno , 'Curso_IdCurso'=>$idCurso));		
	$codigoPractica = "";
	foreach ($practica as $p) {
	$codigoPractica += $p->practica->IdPracticaProfesional;
	}

	if($codigoPractica != ""){
		return true;
	}
	else
	{
		return false;
	}
	

	}

	public function EstadoAlumnoEnCurso($IdCurso, $IdUsuarioEstudiante){
	$Estudiantes = AlumnosPorCurso::model()->findAllByAttributes(array('UsuarioEstudiante_IdUsuarioEstudiante'=>$IdUsuarioEstudiante, 'Curso_IdCurso'=>$IdCurso));
	
	foreach ($Estudiantes as $Estudiante) {
	
	if($Estudiante->Activo == 1){
		return true;
	}
		else {
		return false;
		}
	}
	}

	public function ContarAlumnosPorCurso($id)
	{
    return count( AlumnosPorCurso::model()->findAllByAttributes(array('Curso_IdCurso'=>$id))); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlumnosPorCurso' => 'Id Alumnos Por Curso',
			'UsuarioEstudiante_IdUsuarioEstudiante' => 'Usuario Estudiante Id Usuario Estudiante',
			'Curso_IdCurso' => 'Curso Id Curso',
			'Activo' => 'Activo',
			'CreadoPor' => 'Creado Por',
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

		$criteria->compare('idAlumnosPorCurso',$this->idAlumnosPorCurso);
		$criteria->compare('UsuarioEstudiante_IdUsuarioEstudiante',$this->UsuarioEstudiante_IdUsuarioEstudiante);
		$criteria->compare('Curso_IdCurso',$this->Curso_IdCurso);
		$criteria->compare('Activo',$this->Activo,true);
		$criteria->compare('CreadoPor',$this->CreadoPor,true);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function BusquedaAlumnosPorCurso()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->with = array('userEstudiante' ,'curso');

	$criteria->compare('CONCAT(userEstudiante.Nombre," ",userEstudiante.PrimerApellido," ",userEstudiante.SegundoApellido)',$this->UsuarioEstudiante_IdUsuarioEstudiante,true);

	$criteria->compare('CONCAT(curso.Nombre,"-",curso.Seccion," - ",curso.Codigo)',$this->Curso_IdCurso,true);

	$criteria->compare('curso.Activo',1,true);	// Solo cursos activo 

	$criteria->compare('userEstudiante.NumeroDeCuenta',$this->NCuenta,true);

	$criteria->compare('userEstudiante.carrera.NombreCarrera',$this->carrera,true);

	$criteria->compare('userEstudiante.Activo',1 ,true); 

	$criteria->compare('t.Activo',$this->Activo,true);




	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			// 'defaultOrder'=>'FechaCreacion ASC',
		),
		'pagination'=>array(
			'pageSize'=>5
		),
	));
}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AlumnosPorCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
