<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nidn') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'gelar_belakang') ?>

    <?= $form->field($model, 'gelar_depan') ?>

    <?php // echo $form->field($model, 'jk') ?>

    <?php // echo $form->field($model, 'tmp_lahir') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'thn_masuk') ?>

    <?php // echo $form->field($model, 'prodi_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
