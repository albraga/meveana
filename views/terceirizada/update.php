<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terceirizada */

$this->title = 'Update Terceirizada: ' . ' ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Terceirizadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->nome]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terceirizada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
