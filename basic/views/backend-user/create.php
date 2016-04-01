<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BackendUser */

$this->title = 'Create User';
?>
<div class="backend-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('templates/_createform', [
        'model' => $model,
    ]) ?>

</div>
