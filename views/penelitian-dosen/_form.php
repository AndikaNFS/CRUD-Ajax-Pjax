<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenelitianDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penelitian-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dosen_id')->textInput() ?>

    <?= $form->field($model, 'judul')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mulai')->textInput() ?>

    <?= $form->field($model, 'akhir')->textInput() ?>

    <?= $form->field($model, 'tahun_ajaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tim_riset')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bidang_ilmu_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
