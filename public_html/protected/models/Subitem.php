<?php

/**
 * This is the model class for table "tbl_subitem".
 *
 * The followings are the available columns in table 'tbl_subitem':
 * @property integer $id
 * @property string $Item_id
 * @property string $cost
 * @property integer $lot_order
 * @property string $qty
 *
 * The followings are the available model relations:
 * @property TblItem $item
 */
class Subitem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subitem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, Item_id', 'required'),
			array('id, lot_order', 'numerical', 'integerOnly'=>true),
			array('Item_id', 'length', 'max'=>20),
			array('cost', 'length', 'max'=>45),
			array('qty', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Item_id, cost, lot_order, qty', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'Item_id' => Yii::t('app','Item'),
			'cost' => Yii::t('app','Cost'),
			'lot_order' => Yii::t('app','Lot Order'),
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
		$criteria->compare('Item_id',$this->Item_id,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('lot_order',$this->lot_order);
		$criteria->compare('qty',$this->qty,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subitem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
