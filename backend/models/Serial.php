<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "serialnumber_data".
 *
 * @property int $id
 * @property string $sn
 * @property int $product_data_id
 * @property string $type
 */
class Serial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'serialnumber_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sn', 'product_data_id', 'type'], 'required'],
            [['product_data_id'], 'integer'],
            [['sn', 'type'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sn' => 'Sn',
            'product_data_id' => 'Product Data ID',
            'type' => 'Type',
        ];
    }

    //relação dos serials com os produtos(1 serial pode ter varios produtos)
    public function relations() {
        return array(
            'product'=>array(self::HAS_MANY,'Product','Product Data ID')
        );
    }
}
