<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string|null $date_start
 * @property string $date_end
 * @property string $climate_tech_type
 * @property string $climate_tech_model
 * @property string $problem_description
 * @property int $status_id
 * @property int $user_id
 *
 * @property Comment[] $comments
 * @property OrderComposite[] $orderComposites
 * @property OrderWorker[] $orderWorkers
 * @property Status $status
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_start', 'date_end'], 'safe'],
            [['date_end', 'climate_tech_type', 'climate_tech_model', 'problem_description', 'user_id'], 'required'],
            [['problem_description'], 'string'],
            [['status_id', 'user_id'], 'integer'],
            [['climate_tech_type', 'climate_tech_model'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
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
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'climate_tech_type' => 'Climate Tech Type',
            'climate_tech_model' => 'Climate Tech Model',
            'problem_description' => 'Problem Description',
            'status_id' => 'Status ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[OrderComposites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComposites()
    {
        return $this->hasMany(OrderComposite::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[OrderWorkers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderWorkers()
    {
        return $this->hasMany(OrderWorker::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
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
