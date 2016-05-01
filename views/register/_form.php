<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'no_tlp')->textInput() ?>
            <?= $form->field($model, 'image[]')->FileInput(['multiple' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'wilayah')->textInput(['maxlength' => true]) ?>
           
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
