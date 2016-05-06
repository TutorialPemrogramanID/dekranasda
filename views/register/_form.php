<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Provinsi;
use app\models\Kabupaten;
use app\models\Kecamatan;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
/* @var $form yii\widgets\ActiveForm */

$status = [1 => 'Satu',2 => 'Dua'];
$bahan  = [1 => 'Satu',2 => 'Dua'];

$provinsi            = Provinsi::find()->all();

?>

<div class="anggota-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'no_tlp')->textInput() ?>

            <?= $form->field($model, 'id_provinsi')->dropDownList(ArrayHelper::map($provinsi, 'kode_provinsi', 'nama_provinsi'), [
                'prompt' => 'Pilih Provinsi',
                'id' => 'kode_provinsi',
            ]) ?>

                                    <?= $form->field($model, 'id_kota')->widget(DepDrop::classname(), [
                                        'options'=>['id'=>'kode_kota'],
                                        //'data'=>  [$model->id_kota =>''],
                                        'pluginOptions'=>[
                                            'depends'=>['kode_provinsi'],
                                            //'initialize'  => true,
                                            'placeholder'=>'Select...',
                                            'url'=>Url::to(['register/kabupaten'])
                                        ]
                                    ]); ?>

                                    <?= $form->field($model, 'id_kecamatan')->widget(DepDrop::classname(), [
                                        //'options'=>['id'=>'id_kota'],
                                        //'data'=>  [$model->id_kecamatan =>''],
                                        'pluginOptions'=>[
                                            'depends'=>['kode_provinsi','kode_kota'],
                                            //'initialize'  => true,
                                            'placeholder'=>'Select...',
                                            'url'=>Url::to(['register/kecamatan'])
                                        ]
                                    ]); ?>

            <?= $form->field($model, 'bahan_baku')->widget(Select2::classname(), [
                'data' => $bahan,
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'image[]')->widget(FileInput::classname(), [
                'options' => 
                        [
                        'accept' => 'image/*',
                        'multiple' => true,
                        ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'wilayah')->textInput(['maxlength' => true]) ?>
             <?= $form->field($model, 'jenis_pendaftaran')->widget(Select2::classname(), [
                'data' => $status,
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
            <?= $form->field($model, 'wilayah')->textInput(['maxlength' => true]) ?>
           
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
