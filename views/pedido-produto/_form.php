<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Produto;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProduto */
/* @var $form yii\widgets\ActiveForm */

$produtos = ArrayHelper::getColumn(Produto::find()->all(), function($element) {
    return $element['desc_tam'];
});
$produtos = array_combine($produtos, $produtos);
?>

<div class="pedido-produto-form">

    <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($model, 'produto_desc_tam')->dropDownList($produtos, ['prompt' => 'Selecione...'])->label('Descrição') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
