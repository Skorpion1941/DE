<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_worker".
 *
 * @property int $id
 * @property int $executor
 * @property int $order_id
 * @property int|null $user_id
 *
 * @property Order $order
 * @property User $user
 */
class OrderWorker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_worker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['executor', 'order_id', 'user_id'], 'integer'],
            [['order_id'], 'required'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'executor' => 'Executor',
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
        ];
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
