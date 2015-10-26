<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Entregador */

$this->title = 'Create Entregador';
$this->params['breadcrumbs'][] = ['label' => 'Entregadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entregador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
