<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntregadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'tercei_nome') ?>

    <?= $form->field($model, 'pedido_id') ?>

    <?= $form->field($model, 'cpf') ?>

    <?= $form->field($model, 'rg') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
