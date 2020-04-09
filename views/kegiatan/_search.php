<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KegiatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kegiatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tanggal_mulai') ?>

    <?= $form->field($model, 'tanggal_selesai') ?>

    <?= $form->field($model, 'tempat') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'kepesertaan') ?>

    <?php // echo $form->field($model, 'nilai') ?>

    <?php // echo $form->field($model, 'jenis_kegiatan_id') ?>

    <?php // echo $form->field($model, 'dosen_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
