<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

<div class=" text-center ">
        <h1 class="display-1">Ремонт онлайн</h1>
        <?php
        $orders = \app\models\Order::find()->all();

        $totalDays = 0;
        $countOrders = count($orders);

        foreach ($orders as $order) {
            $startDate = new \DateTime($order->date_start);
            $endDate = new \DateTime($order->date_end);

            $interval = $startDate->diff($endDate);

            $totalDays += $interval->days;
        }
        $averageDays = 0;
        // Вычисляем среднее количество дней
        if($totalDays != 0):
        $averageDays = $totalDays / $countOrders;
        endif;
         if(!yii::$app->user->isGuest && yii::$app->user->identity->isAdmin()): ?>
        <h4>Количество выполненых заявок <?= \app\models\Order::find()->where(['status_id' => 4])->count() ?></h4>
        
        <h4>Среднее количество дней между событиями: <?= $averageDays; ?></h4>
        <?php endif;?>
    </div>
    </div>