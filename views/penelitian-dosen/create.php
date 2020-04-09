<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PenelitianDosen */

$this->title = 'Create Penelitian Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Penelitian Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penelitian-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
