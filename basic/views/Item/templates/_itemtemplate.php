<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Item */
?>

<div class="li">
    <a href="<?=Url::to(['view', 'id' => $model->id])?>">
        <div class="c__list-photo">
            <img src="<?= $model->image_url?>" alt="Бургер">
            <div class="label l2"></div>
        </div>

        <div class="c__list-desc">
            <?= Html::label($model->description)?>
        </div>

        <div class="c__list-content">
            <div class="c__list-product">Категория</div>
            <h3 class="c__list-name"><?= Html::label($model->name)?></h3>
            <div class="c__list_short-details"><?= Html::label($model->weight)?></div>
        </div>

        <div class="c__list-price">
            <?= Html::label($model->price)?>
            <small>грн</small>.
        </div>
    </a>

    <footer>
        <?= Html::a('Замовити', "javascript:void(0)", ['class' => 'btn btn-success item-add-to-cart-btn', 'data-id' => $model->id]) ?>
        <div class="fr">
<!--            <div class="wrap-qnt"><input type="text" value="1" class="input-quantity"><span class="plus"></span><span class="minus"></span></div>-->
<!--            <span>шт.</span>-->
        </div>
    </footer>
</div>
