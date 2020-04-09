<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  \yii\widgets\Pjax::begin(['timeout'=>5000, 'id'=>'pjaxgridview']); ?>
    <?php
    use yii\bootstrap\Modal;
    Modal::begin([
        'header' => '<h2>Category Modal</h2>',
        'id' => 'categoryModal',
    ]);
    Pjax::begin([
        'id'=>'pjax-modal','timeout'=>false,
        'enablePushState'=>false,
        'enableReplaceState'=>false,
    ]);
    Pjax::end();
    Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description',
            'created_by',
            'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url,$model) {
                        $icon='<span class="glyphicon glyphicon-eye-open"></span>';
                        return Html::a($icon,$url,[
                            'data-toggle'=>"modal",
                            'data-target'=>"#categoryModal",
                        ]);
                    },
                    'update' => function ($url,$model) {
                        $icon='<span class="glyphicon glyphicon-pencil"></span>';
                        return Html::a($icon,$url,[
                            'data-toggle'=>"modal",
                            'data-target'=>"#categoryModal",
                        ]);
                    },
                    'delete' => function ($url,$model) {
                        $icon='<span class="glyphicon glyphicon-trash"></span>';
                        return Html::a($icon,$url, [
                            'class'=>'pjaxDelete'
                            
                        ]);
                    },
                ]
            ],
        ],
        
    ]); ?>
    <?php
        $this->registerJs('
           /* fungsi ini akan dijalankan ketika class pjaxDelete di klik */
               $(".pjaxDelete").on("click", function (e) {
                  /* cegah link menjalankan default action */
                       e.preventDefault();
                             if(confirm("Are you sure you want to delete this item?")){
                                /* request actionDelete dengan method post */
                                    $.post($this).attr("href"), function(data) {
                                        /* reload gridview */
                                        $.pjax.reload("#pjax-gridview",{"timeout":false});
                                    });
                                }
                            });
                             $("#categoryModal").on("shown.bs.modal", function (event) {
                                 var button = $(event.relatedTarget)     
                                 var href = button.attr("href")
                                 $.pjax.reload("#pjax-modal", {
                                     "timeout":false,
                                     "url":href,
                                     "replace": false,
                                 });
                            })

                    ');
    ?>
   
    <?php \yii\widgets\Pjax::end() ?>

</div>
