<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderComposite $model */

$this->title = 'Create Order Composite';
$this->params['breadcrumbs'][] = ['label' => 'Order Composites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-composite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
