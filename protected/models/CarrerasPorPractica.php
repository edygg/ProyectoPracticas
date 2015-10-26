<?php

/**
 * This is the model class for table "CarrerasPorPractica".
 *
 * The followings are the available columns in table 'CarrerasPorPractica':
 * @property integer $idCarrerasPorPractica
 * @property integer $PracticaProfesional_IdPracticaProfesional
 * @property integer $Carrera_IdCarrera
 * @property integer $UsuarioEmpresa_IdUsuarioEmpresa
 */
class CarrerasPorPractica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CarrerasPorPractica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PracticaProfesional_IdPracticaProfesional, Carrera_IdCarrera, UsuarioEmpresa_IdUsuarioEmpresa', 'required'),
			array('PracticaProfesional_IdPracticaProfesional, Carrera_IdCarrera, UsuarioEmpresa_IdUsuarioEmpresa', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCarrerasPorPractica, PracticaProfesional_IdPracticaProfesional, Carrera_IdCarrera, UsuarioEmpresa_IdUsuarioEmpresa', 'safe', 'on'=>'search'),
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
			'empresa'=> array(self::BELONGS_TO,'UsuarioEmpresa','UsuarioEmpresa_IdUsuarioEmpresa'),
			'practica'=> array(self::BELONGS_TO,'PracticaProfesional','PracticaProfesional_IdPracticaProfesional'),

		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCarrerasPorPractica' => 'Id Carreras Por Practica',
			'PracticaProfesional_IdPracticaProfesional' => 'Practica Profesional Id Practica Profesional',
			'Carrera_IdCarrera' => 'Carrera Id Carrera',
			'UsuarioEmpresa_IdUsuarioEmpresa' => 'Usuario Empresa Id Usuario Empresa',
		);
	}
	// para llenar los combobox del asesor  cuando este vinculando a sus alumnos

	public function ListaCarrerasPorPractica($id){
	$carreras = CarrerasPorPractica::model()->findAll("PracticaProfesional_IdPracticaProfesional=?",array($id));

	$ArrayIdCarreras ="";
	$contador = 0;

	foreach ($carreras as $popo) {
	$ArrayIdCarreras[$contador]= $popo->Carrera_IdCarrera;
	$contador	= $contador +1;
	}

	if(empty($ArrayIdCarreras)){
	$ArrayIdCarreras[0] = "";
	}


	$criteria = new CDbCriteria;
	$criteria->addInCondition('IdCarrera',$ArrayIdCarreras);
	$criteria->order = 'NombreCarrera ASC';


	return CHtml::listData(Carrera::model()->findAll($criteria),'IdCarrera','NombreCarrera');
	

	}


	
	public function CarrerasPorPracticaToString($id)
	{
		$carreras = CarrerasPorPractica::model()->findAll("PracticaProfesional_IdPracticaProfesional=?",array($id));

		$stringCarreras= " ";

		foreach ($carreras as $carrerita) {
			$stringCarreras .= "#". preg_replace('/\s+/', '', $carrerita->carrera->NombreCarrera) . " " . "  ";
			
		}

			return $stringCarreras;


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

		$criteria->compare('idCarrerasPorPractica',$this->idCarrerasPorPractica);
		$criteria->compare('PracticaProfesional_IdPracticaProfesional',$this->PracticaProfesional_IdPracticaProfesional);
		$criteria->compare('Carrera_IdCarrera',$this->Carrera_IdCarrera);
		$criteria->compare('UsuarioEmpresa_IdUsuarioEmpresa',$this->UsuarioEmpresa_IdUsuarioEmpresa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CarrerasPorPractica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
