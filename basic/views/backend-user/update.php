<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BackendUser */

$this->title = 'Update Profile';
?>
<div class="backend-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('templates/_updateform', [
        'model' => $model,
    ]) ?>

</div>
