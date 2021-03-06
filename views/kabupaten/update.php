<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kabupaten */

$this->title = 'Update Kabupaten: ' . $model->kode_kabupaten;
$this->params['breadcrumbs'][] = ['label' => 'Kabupatens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_kabupaten, 'url' => ['view', 'id' => $model->kode_kabupaten]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kabupaten-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
