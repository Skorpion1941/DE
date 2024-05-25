<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_start')->input('date') ?>

    <?= $form->field($model, 'date_end')->input('date')  ?>

    <?= $form->field($model, 'climate_tech_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'climate_tech_model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'problem_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Status::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'surname')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
