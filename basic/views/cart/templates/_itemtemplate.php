<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Item */
?>

<div class="cart-image">
    <img src="<?= $model->image_url?>">
</div>

<div class="cart-name">
    <?= Html::label($model->name)?>
</div>

<div class="cart-price">
    <?= Html::label($model->price)?>
    <small>грн</small>.
</div>

<?= Html::a('Видалити', 'javascript:void(0)', ['class' => 'btn btn-danger item-remove-from-cart-btn', 'data-id' => $model->id]) ?>
