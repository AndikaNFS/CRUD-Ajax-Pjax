<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
Pjax::begin([
    'id'=>'pjax-form','timeout'=>false,
]);

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 if(Yii::$app->request->isAjax)        
 echo \app\widgets\Alert::widget();    
 ?>

<div class="category-form">
    <?php $form = ActiveForm::begin( [
        'options' => ['data-pjax' => true ]
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
    
    <?php
    $this->registerJs('
        $("#pjax-form").on("pjax:end", function() {
            $.pjax.reload("#pjax-gridview", {
                "timeout": false,
                "url": "'.\yii\helpers\Url::to(['index']).'",
                "replace": false,
            });
        });
    '); ?>
    <?= Html::a('Close', ['index'], [
        'class'=>'btn btn-success',
        'onclick'=>'
            $("#categoryModal").modal("hide");
            return false;
        '
    ]) ?>
   

</div>
 
<?php Pjax::end(); ?>