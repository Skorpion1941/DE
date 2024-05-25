<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Composite $model */

$this->title = 'Update Composite: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Composites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="composite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
