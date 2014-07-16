<?php

/**
 * This is the model class for table "tbl_checkstock".
 *
 * The followings are the available columns in table 'tbl_checkstock':
 * @property string $id
 * @property string $qty
 * @property string $check_date
 * @property integer $state
 * @property string $old_qty
 * @property integer $subitem_id
 *
 * The followings are the available model relations:
 * @property TblSubitem $subitem
 */
class Checkstock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_checkstock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, subitem_id', 'required'),
			array('state, subitem_id', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>20),
			array('qty, old_qty', 'length', 'max'=>18),
			array('check_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, qty, check_date, state, old_qty, subitem_id', 'safe', 'on'=>'search'),
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
			'subitem' => array(self::BELONGS_TO, 'TblSubitem', 'subitem_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'qty' => Yii::t('app','Qty'),
			'check_date' => Yii::t('app','Check Date'),
			'state' => Yii::t('app','State'),
			'old_qty' => Yii::t('app','Old Qty'),
			'subitem_id' => Yii::t('app','Subitem'),
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
		$criteria->compare('qty',$this->qty,true);
		$criteria->compare('check_date',$this->check_date,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('old_qty',$this->old_qty,true);
		$criteria->compare('subitem_id',$this->subitem_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Checkstock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
