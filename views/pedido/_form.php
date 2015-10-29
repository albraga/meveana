<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cliente_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cliente_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entregador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'situacao_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
