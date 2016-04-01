<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\Cart;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кошик';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function($model) {
            return $this->render('templates/_itemtemplate', [
                'model' => $model,
            ]);
        },
        'summary'=>'',
        'itemOptions' => ['class'=> 'cart-row']
    ]);

    ?>

    <?php if (Cart::getItemCount() > 0) : ?>
        <footer class="cart-footer">
            <div class="cart-subtotal">
                <?= Html::label(Cart::getItemCount())?> шт.
                <?= Html::label(Cart::getTotalPrice())?> грн.
            </div>

            <?= Html::a('Сформувати замовлення', '#', ['class' => 'btn btn-success']) ?>
        </footer>
    <?php endif?>

</div>

<?php
$this->registerJsFile('/js/cartPage.js', ['depends' => 'app\assets\AppAsset']);
?>

