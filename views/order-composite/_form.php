<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderComposite $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-composite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Order::find()->all(), 'id', 'climate_tech_type')) ?>

    <?= $form->field($model, 'composite_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Composite::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
