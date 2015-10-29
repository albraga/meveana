<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Situacao */

$this->title = 'Update Situacao: ' . ' ' . $model->status;
$this->params['breadcrumbs'][] = ['label' => 'Situacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->status, 'url' => ['view', 'id' => $model->status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="situacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
