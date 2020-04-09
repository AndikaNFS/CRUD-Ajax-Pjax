<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tanggal_mulai')->textInput() ?>

    <?= $form->field($model, 'tanggal_selesai')->textInput() ?>

    <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kepesertaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kegiatan_id')->textInput() ?>

    <?= $form->field($model, 'dosen_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
