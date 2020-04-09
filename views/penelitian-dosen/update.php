<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PenelitianDosen */

$this->title = 'Update Penelitian Dosen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penelitian Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penelitian-dosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
