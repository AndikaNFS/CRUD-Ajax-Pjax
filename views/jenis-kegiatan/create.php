<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisKegiatan */

$this->title = 'Create Jenis Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
