<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kegiatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kegiatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kegiatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tanggal_mulai',
            'tanggal_selesai',
            'tempat',
            'deskripsi:ntext',
            'kepesertaan',
            'nilai',
            'jenis_kegiatan_id',
            'dosen_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
