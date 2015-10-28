<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Status;


/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */

$stat = Status::find()->select(['status'])->asArray()->all();
$statuses = array_reverse($stat);
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cliente_nometel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entregador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($statuses) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
