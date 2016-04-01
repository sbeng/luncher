<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BackendUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            array(
                'format' => 'image',
                'value'=>function($data) { return $data->imageurl; },

            ),
            'username',
            'email:email',
            'balance',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'rowOptions'   => function ($model) {
            return ['data-id' => $model->id];
        }
    ]); ?>

<?php
$this->registerJs("
    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if (e.target == this && id)
            location.href = '" . Url::to(['backend-user/view']) . "&id=' + id;
    });
");
?>

</div>
