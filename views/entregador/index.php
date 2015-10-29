<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntregadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entregadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entregador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Entregador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'tercei_nome',
            'cpf',
            'rg',
            'celular',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
