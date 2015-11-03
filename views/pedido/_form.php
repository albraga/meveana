<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Situacao;
use app\models\Entregador;
use app\models\Cliente;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */

$stats = ArrayHelper::getColumn(Situacao::find()->all(), function ($element) {
    return $element['status'];
});
$statuses = array_combine($stats, $stats);

$entregadores = ArrayHelper::getColumn(Entregador::find()->all(), function($element) {
    return $element['nome']; 
}); 
$entregadores = array_combine($entregadores, $entregadores);

$clientes = ArrayHelper::getColumn(Cliente::find()->all(), function($element) {
    return $element['nome']; 
}); 
$clientes = array_combine($clientes, $clientes);

$tels = ArrayHelper::getColumn(Cliente::find()->all(), function($element) {
    return $element['tel']; 
}); 
$tels = array_combine($tels, $tels);


?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'cliente_nome')->dropDownList($clientes,['prompt'=>'Selecione...']) ?>

    <?= $form->field($model, 'cliente_tel')->dropDownList($tels,['prompt'=>'Selecione...']) ?>

    <?= $form->field($model, 'entregador')->dropDownList($entregadores,['prompt'=>'Selecione...']) ?>

    <?= $form->field($model, 'situacao_status')->dropDownList($statuses,['prompt'=>'Selecione...']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Iniciar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
