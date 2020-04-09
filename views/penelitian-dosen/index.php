<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenelitianDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penelitian Dosen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penelitian-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penelitian Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dosen_id',
            'judul:ntext',
            'mulai',
            'akhir',
            'tahun_ajaran',
            'tim_riset',
            'bidang_ilmu_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
