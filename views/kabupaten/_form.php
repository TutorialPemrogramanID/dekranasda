<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kabupaten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_kabupaten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kabupaten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_kota')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
