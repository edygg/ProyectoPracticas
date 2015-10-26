<?php

/**
 * This is the model class for table "PracticaProfesional".
 *
 * The followings are the available columns in table 'PracticaProfesional':
 * @property integer $IdPracticaProfesional
 * @property string $AreaODepartamento
 * @property string $PuestoDesempeniar
 * @property string $HoraEntrada
 * @property string $HoraSalida
 * @property string $FechaVencimientoPlaza
 * @property string $ObjetivoDelCargo
 * @property string $Reponsabilidades
 * @property string $Observaciones
 * @property string $PosibilidadEmpleo
 * @property string $RequierePromedio
 * @property integer $ContactoEmpresa_IdContactoEmpresa
 * @property integer $ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa
 * @property integer $ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa
 * @property string $Activo
 * @property string $FechaCreacion
 * @property string $FechaModificacion
 * @property string $HorarioFlexible
 */
class PracticaProfesional extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PracticaProfesional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ContactoEmpresa_IdContactoEmpresa, ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa, ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa', 'required'),
			array('ContactoEmpresa_IdContactoEmpresa, ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa, ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa', 'numerical', 'integerOnly'=>true),
			array('AreaODepartamento, PuestoDesempeniar, HoraEntrada, HoraSalida, FechaVencimientoPlaza, RequierePromedio, Activo, FechaCreacion, FechaModificacion, HorarioFlexible', 'length', 'max'=>45),
			array('ObjetivoDelCargo', 'length', 'max'=>500),
			array('Reponsabilidades, Observaciones', 'length', 'max'=>2000),
			array('PosibilidadEmpleo', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdPracticaProfesional, AreaODepartamento, PuestoDesempeniar, HoraEntrada, HoraSalida, FechaVencimientoPlaza, ObjetivoDelCargo, Reponsabilidades, Observaciones, PosibilidadEmpleo, RequierePromedio, ContactoEmpresa_IdContactoEmpresa, ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa, ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa, Activo, FechaCreacion, FechaModificacion, HorarioFlexible', 'safe', 'on'=>'search'),
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
			'asesor'=> array(self::BELONGS_TO,'ContactoEmpresa','ContactoEmpresa_IdContactoEmpresa'),
			'usuarioEstudiante'=> array(self::BELONGS_TO,'UsuarioEstudiante','UsuarioEstudiante_IdUsuarioEstudiante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdPracticaProfesional' => 'Id Practica Profesional',
			'AreaODepartamento' => 'Area Odepartamento',
			'PuestoDesempeniar' => 'Puesto Desempeniar',
			'HoraEntrada' => 'Hora Entrada',
			'HoraSalida' => 'Hora Salida',
			'FechaVencimientoPlaza' => 'Fecha Vencimiento Plaza',
			'ObjetivoDelCargo' => 'Objetivo Del Cargo',
			'Reponsabilidades' => 'Reponsabilidades',
			'Observaciones' => 'Observaciones',
			'PosibilidadEmpleo' => 'Posibilidad Empleo',
			'RequierePromedio' => 'Requiere Promedio',
			'ContactoEmpresa_IdContactoEmpresa' => 'Contacto Empresa Id Contacto Empresa',
			'ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa' => 'Contacto Empresa Usuario Empresa Id Usuario Empresa',
			'ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa' => 'Contacto Empresa Usuario Empresa Tipo Empresa Id Tipo Empresa',
			'Activo' => 'Activo',
			'FechaCreacion' => 'Fecha Creacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'HorarioFlexible' => 'Horario Flexible',
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

		$criteria->compare('IdPracticaProfesional',$this->IdPracticaProfesional);
		$criteria->compare('AreaODepartamento',$this->AreaODepartamento,true);
		$criteria->compare('PuestoDesempeniar',$this->PuestoDesempeniar,true);
		$criteria->compare('HoraEntrada',$this->HoraEntrada,true);
		$criteria->compare('HoraSalida',$this->HoraSalida,true);
		$criteria->compare('FechaVencimientoPlaza',$this->FechaVencimientoPlaza,true);
		$criteria->compare('ObjetivoDelCargo',$this->ObjetivoDelCargo,true);
		$criteria->compare('Reponsabilidades',$this->Reponsabilidades,true);
		$criteria->compare('Observaciones',$this->Observaciones,true);
		$criteria->compare('PosibilidadEmpleo',$this->PosibilidadEmpleo,true);
		$criteria->compare('RequierePromedio',$this->RequierePromedio,true);
		$criteria->compare('ContactoEmpresa_IdContactoEmpresa',$this->ContactoEmpresa_IdContactoEmpresa);
		$criteria->compare('ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa',$this->ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa);
		$criteria->compare('ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa',$this->ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa);
		$criteria->compare('Activo',$this->Activo,true);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('HorarioFlexible',$this->HorarioFlexible,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


		public function BusquedaPracticasInactivas()
{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	$criteria->with ='asesor';

	$criteria->compare('asesor.usuarioEmpresa.NombreEmpresa',$this->ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa);

	$criteria->compare('AreaODepartamento',$this->AreaODepartamento,true);

	$criteria->compare('PuestoDesempeniar',$this->PuestoDesempeniar,true);

	$criteria->compare('t.FechaCreacion',$this->FechaCreacion,true);

	$criteria->compare('t.Activo',0,true);


	return new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
			//'defaultOrder'=>'FechaVencimientoPlaza asc',
		),
		'pagination'=>array(
			'pageSize'=>12
		),
	));
}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PracticaProfesional the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
