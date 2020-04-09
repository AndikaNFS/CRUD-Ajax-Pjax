<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenelitianDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penelitian-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dosen_id') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'mulai') ?>

    <?= $form->field($model, 'akhir') ?>

    <?php // echo $form->field($model, 'tahun_ajaran') ?>

    <?php // echo $form->field($model, 'tim_riset') ?>

    <?php // echo $form->field($model, 'bidang_ilmu_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
