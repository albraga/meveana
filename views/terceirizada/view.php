<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Terceirizada */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Terceirizadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terceirizada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nome], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nome], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'cnpj',
            'endereco',
            'telefone',
            'email:email',
        ],
    ]) ?>

</div>