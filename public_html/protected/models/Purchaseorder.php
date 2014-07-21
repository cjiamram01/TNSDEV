<?php

/**
 * This is the model class for table "tbl_purchaseorder".
 *
 * The followings are the available columns in table 'tbl_purchaseorder':
 * @property string $id
 * @property integer $supplier_id
 * @property string $po_no
 * @property string $order_date
 * @property integer $Status
 * @property string $Comment
 *
 * The followings are the available model relations:
 * @property TblPurchasedetail[] $tblPurchasedetails
 * @property TblSupplier $supplier
 * @property TblReceivetransaction[] $tblReceivetransactions
 */
class Purchaseorder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_purchaseorder';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supplier_id', 'required'),
			array('supplier_id, Status', 'numerical', 'integerOnly'=>true),
			array('po_no', 'length', 'max'=>20),
			array('Comment', 'length', 'max'=>500),
			array('order_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, supplier_id, po_no, order_date, Status, Comment', 'safe', 'on'=>'search'),
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
			'tblPurchasedetails' => array(self::HAS_MANY, 'TblPurchasedetail', 'PurchaseOrder_id'),
			'supplier' => array(self::BELONGS_TO, 'TblSupplier', 'supplier_id'),
			'tblReceivetransactions' => array(self::HAS_MANY, 'TblReceivetransaction', 'PO_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'supplier_id' => Yii::t('app','Supplier'),
			'po_no' => Yii::t('app','Po No'),
			'order_date' => Yii::t('app','Order Date'),
			'Status' => Yii::t('app','Status'),
			'Comment' => Yii::t('app','Comment'),
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
		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('po_no',$this->po_no,true);
		$criteria->compare('order_date',$this->order_date,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Comment',$this->Comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Purchaseorder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
