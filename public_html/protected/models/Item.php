<?php

/**
 * This is the model class for table "tbl_item".
 *
 * The followings are the available columns in table 'tbl_item':
 * @property string $id
 * @property string $item_code
 * @property string $item_name
 * @property integer $unit_id
 *
 * The followings are the available model relations:
 * @property TblUnit $unit
 * @property TblPurchasedetail[] $tblPurchasedetails
 * @property TblReceivetransaction[] $tblReceivetransactions
 * @property TblSubitem[] $tblSubitems
 */
class Item extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_id', 'required'),
			array('unit_id', 'numerical', 'integerOnly'=>true),
			array('item_code', 'length', 'max'=>20),
			array('item_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, item_code, item_name, unit_id', 'safe', 'on'=>'search'),
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
			'unit' => array(self::BELONGS_TO, 'TblUnit', 'unit_id'),
			'tblPurchasedetails' => array(self::HAS_MANY, 'TblPurchasedetail', 'Item_id'),
			'tblReceivetransactions' => array(self::HAS_MANY, 'TblReceivetransaction', 'Item_id'),
			'tblSubitems' => array(self::HAS_MANY, 'TblSubitem', 'Item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'item_code' => Yii::t('app','Item Code'),
			'item_name' => Yii::t('app','Item Name'),
			'unit_id' => Yii::t('app','Unit'),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('item_code',$this->item_code,true);
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('unit_id',$this->unit_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Item the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
