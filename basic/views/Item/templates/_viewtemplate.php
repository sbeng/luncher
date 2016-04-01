<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Item */
?>

<div class="item-view">
    <?php $form = ActiveForm::begin(); ?>
        <div class="item-image">
            <?= Html::img($model->image_url);?>
        </div>
        <div class="item-content">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="item-description">
                <?= Html::label("Детальніше")?>
                <?= Html::label($model->description, null, ['class' => 'description'])?>
            </div>
            <div class="item-description">
                <?= Html::label("Вага")?>
                <?= Html::label($model->weight, null, ['class' => 'description'])?>
            </div>
            <div class="price">
                <?= Html::label($model->price)?> грн.
            </div>
            <div class="form-group">
                <?= Html::a('Замовити', ['cart/add-item', 'id' => $model->id], ['class' => 'btn btn-success', 'disabled' => !$model->canBeOrdered()]) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>

