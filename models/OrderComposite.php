<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_composite".
 *
 * @property int $id
 * @property int $order_id
 * @property int $composite_id
 *
 * @property Composite $composite
 * @property Order $order
 */
class OrderComposite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_composite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'composite_id'], 'required'],
            [['order_id', 'composite_id'], 'integer'],
            [['composite_id'], 'exist', 'skipOnError' => true, 'targetClass' => Composite::class, 'targetAttribute' => ['composite_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'composite_id' => 'Composite ID',
        ];
    }

    /**
     * Gets query for [[Composite]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComposite()
    {
        return $this->hasOne(Composite::class, ['id' => 'composite_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
