<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вибирай що хочеш!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="clearfix c__list">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function($model) {
            return $this->render('templates/_itemtemplate', [
            'model' => $model,
            ]);
        },
        'summary'=>'<div class="summary">На екрані <strong>{begin}-{end}</strong> з <strong>{totalCount}</strong> </div>',
        'itemOptions' => ['class'=> 'item-row']
    ]);

    ?>
    </div>

</div>

<?php
$this->registerJsFile('/js/itemPage.js', ['depends' => 'app\assets\AppAsset']);
?>
