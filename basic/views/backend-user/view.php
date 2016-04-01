<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BackendUser */

$this->title = Html::encode($model->username);
$this->params['breadcrumbs'][] = ['label' => 'Backend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('templates/_viewtemplate', [
        'model' => $model,
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            'balance',
            'avatar',
        ],
    ]) ?>

    <p>
        <?= Html::a('Add Funds', ['add-funds', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Refund', ['refund', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
