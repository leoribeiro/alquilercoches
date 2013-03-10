<?php

/**
 * This is the model class for table "alquiler".
 *
 * The followings are the available columns in table 'alquiler':
 * @property integer $id
 * @property string $fechareserva
 * @property integer $cliente_id
 * @property integer $coche_id
 * @property string $fechainicio
 * @property string $fechafim
 *
 * The followings are the available model relations:
 * @property Cliente $cliente
 * @property Coche $coche
 */
class Alquiler extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Alquiler the static model class
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
		return 'alquiler';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, fechareserva, cliente_id, coche_id, fechainicio, fechafim', 'required'),
			array('id, cliente_id, coche_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fechareserva, cliente_id, coche_id, fechainicio, fechafim', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_id'),
			'coche' => array(self::BELONGS_TO, 'Coche', 'coche_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fechareserva' => 'Fechareserva',
			'cliente_id' => 'Cliente',
			'coche_id' => 'Coche',
			'fechainicio' => 'Fechainicio',
			'fechafim' => 'Fechafim',
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
		$criteria->compare('fechareserva',$this->fechareserva,true);
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('coche_id',$this->coche_id);
		$criteria->compare('fechainicio',$this->fechainicio,true);
		$criteria->compare('fechafim',$this->fechafim,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}