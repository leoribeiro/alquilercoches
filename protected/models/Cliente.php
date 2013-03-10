<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $id
 * @property string $nombre
 * @property string $fechanascimento
 * @property string $dni
 * @property string $tipotarjeta
 * @property string $numerotarjeta
 * @property string $caducidadtarjeta
 * @property string $codigotarjeta
 *
 * The followings are the available model relations:
 * @property Alquiler[] $alquilers
 */
class Cliente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, nombre, fechanascimento, dni, tipotarjeta, numerotarjeta, caducidadtarjeta, codigotarjeta', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('nombre, fechanascimento, dni, tipotarjeta', 'length', 'max'=>45),
			array('numerotarjeta', 'length', 'max'=>16),
			array('caducidadtarjeta', 'length', 'max'=>10),
			array('codigotarjeta', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fechanascimento, dni, tipotarjeta, numerotarjeta, caducidadtarjeta, codigotarjeta', 'safe', 'on'=>'search'),
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
			'alquilers' => array(self::HAS_MANY, 'Alquiler', 'cliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'fechanascimento' => 'Fechanascimento',
			'dni' => 'Dni',
			'tipotarjeta' => 'Tipotarjeta',
			'numerotarjeta' => 'Numerotarjeta',
			'caducidadtarjeta' => 'Caducidadtarjeta',
			'codigotarjeta' => 'Codigotarjeta',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fechanascimento',$this->fechanascimento,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('tipotarjeta',$this->tipotarjeta,true);
		$criteria->compare('numerotarjeta',$this->numerotarjeta,true);
		$criteria->compare('caducidadtarjeta',$this->caducidadtarjeta,true);
		$criteria->compare('codigotarjeta',$this->codigotarjeta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}