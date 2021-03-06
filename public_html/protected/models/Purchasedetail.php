<?php

/**
 * This is the model class for table "tbl_purchasedetail".
 *
 * The followings are the available columns in table 'tbl_purchasedetail':
 * @property integer $id
 * @property string $PurchaseOrder_id
 * @property string $Item_id
 * @property string $qty
 *
 * The followings are the available model relations:
 * @property TblItem $item
 * @property TblPurchaseorder $purchaseOrder
 */
class Purchasedetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_purchasedetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, PurchaseOrder_id, Item_id', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('PurchaseOrder_id, Item_id', 'length', 'max'=>20),
			array('qty', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, PurchaseOrder_id, Item_id, qty', 'safe', 'on'=>'search'),
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
			'item' => array(self::BELONGS_TO, 'TblItem', 'Item_id'),
			'purchaseOrder' => array(self::BELONGS_TO, 'TblPurchaseorder', 'PurchaseOrder_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'PurchaseOrder_id' => Yii::t('app','Purchase Order'),
			'Item_id' => Yii::t('app','Item'),
			'qty' => Yii::t('app','Qty'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('PurchaseOrder_id',$this->PurchaseOrder_id,true);
		$criteria->compare('Item_id',$this->Item_id,true);
		$criteria->compare('qty',$this->qty,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Purchasedetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
