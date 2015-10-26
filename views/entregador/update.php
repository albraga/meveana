<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entregador */

$this->title = 'Update Entregador: ' . ' ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Entregadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->nome]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entregador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
