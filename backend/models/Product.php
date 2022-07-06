<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_data".
 *
 * @property int $id
 * @property string $product_id
 * @property string $box_cod
 * @property string $detail
 * @property int $status
 * @property int $is_gs
 * @property int $is_rma
 * @property string $start_at
 * @property string|null $packed_at
 * @property int $cycle_time
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'box_cod', 'detail', 'status', 'is_gs', 'is_rma', 'cycle_time'], 'required'],
            [['detail'], 'string'],
            [['status', 'is_gs', 'is_rma', 'cycle_time'], 'integer'],
            [['start_at', 'packed_at'], 'safe'],
            [['product_id'], 'string', 'max' => 60],
            [['box_cod'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'box_cod' => 'Box Cod',
            'detail' => 'Detail',
            'status' => 'Status',
            'is_gs' => 'Is Gs',
            'is_rma' => 'Is Rma',
            'start_at' => 'Start At',
            'packed_at' => 'Packed At',
            'cycle_time' => 'Cycle Time',
        ];
    }
    //relacionamento entre produto e serial(1 produto pode ter vários serials)
    public function relations() {
        return array(
            'serial'=>array(self::BELONGS_TO,'Serial','Product Data ID')
        );
    }
}
