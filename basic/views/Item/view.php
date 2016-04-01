<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = Html::encode($model->name);
$this->params['breadcrumbs'][] = ['label' => 'Вибирай що хочеш', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <?= $this->render('templates/_viewtemplate', [
        'model' => $model,
    ]) ?>

</div>
