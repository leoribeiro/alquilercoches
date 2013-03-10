<?php

/**
 * This is the model class for table "coche".
 *
 * The followings are the available columns in table 'coche':
 * @property integer $id
 * @property string $nombre
 * @property string $marca
 * @property string $placa
 * @property string $ano
 * @property string $color
 * @property integer $tipocoche_id
 * @property integer $ciudad_id
 * @property string $photo
 *
 * The followings are the available model relations:
 * @property Alquiler[] $alquilers
 * @property Tipocoche $tipocoche
 * @property Ciudad $ciudad
 */

class Coche extends CActiveRecord
{

	public $uploadedFile;
	public $informaciones;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Coche the static model class
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
		return 'coche';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, marca, placa, ano, color, tipocoche_id, ciudad_id', 'required'),
			array('id, tipocoche_id, ciudad_id', 'numerical', 'integerOnly'=>true),
			array('uploadedFile', 'file', 'types'=>'jpg, gif, png'),
			array('nombre, marca, placa, ano, color', 'length', 'max'=>45),
			array('obs', 'length', 'max'=>4000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, marca, placa, ano,obs color, tipocoche_id, ciudad_id,  uploadedFile ', 'safe', 'on'=>'search'),
			//photo,file_name,file_type,file_size,
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
			'alquilers' => array(self::HAS_MANY, 'Alquiler', 'coche_id'),
			'tipocoche' => array(self::BELONGS_TO, 'Tipocoche', 'tipocoche_id'),
			'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
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
			'marca' => 'Marca',
			'placa' => 'Placa',
			'ano' => 'Ano',
			'color' => 'Color',
			'tipocoche_id' => 'Tipo de coche',
			'ciudad_id' => 'Ciudad',
			'photo' => 'Photo',
			'uploadedFile' => 'Foto de el Coche',
			'obs' => 'Informaciones',
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
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('placa',$this->placa,true);
		$criteria->compare('ano',$this->ano,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('tipocoche_id',$this->tipocoche_id);
		$criteria->compare('ciudad_id',$this->ciudad_id);
		$criteria->compare('obs',$this->obs,true);
		


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	// public function beforeSave()
 //    {
 //        if($file=CUploadedFile::getInstance($this,'uploadedFile'))
 //        {
 //            $this->file_name=$file->name;
 //            $this->file_type=$file->type;
 //            $this->file_size=$file->size;
 //            $this->photo=file_get_contents($file->tempName);
 //        }
 
 //    	return parent::beforeSave();
 //    }

    public function displaySavedImage($id)
	{
	    $modelA=Coche::model()->findByPk($id);
	 	if(!empty($modelA->file_name)){
	 		// header('Pragma: public');
		  //   header('Expires: 0');
		  //   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		  //   header('Content-Transfer-Encoding: binary');
		  //   header('Content-length: '.$modelA->file_size);
		    //header('Content-Type: '.$modelA->file_type);
		    header("Content-type: image/jpeg");
		    //header('Content-Disposition: attachment; filename='.$modelA->file_name);
			 
			echo $modelA->photo;
	 	}
	 	else{
	 		echo "Sem imagem.";
	 	}
	    
	}


}