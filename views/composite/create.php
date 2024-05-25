<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Composite $model */

$this->title = 'Create Composite';
$this->params['breadcrumbs'][] = ['label' => 'Composites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="composite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
