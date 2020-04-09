<?php
use yii\widgets\ActiveForm; 
use yii\helpers\ArrayHelper; 
use yii\helpers\Url;

$form = ActiveForm::begin();
$data = ArrayHelper::map($books, 'id', 'title');
echo $form->field($model, 'title')->dropDownList($data,[
    'prompt'=>'-Choose a title-',
]);
echo $form->field($model, 'author')->textInput();
echo $form->field($model, 'year')->textInput();
ActiveForm::end();

$this ->registerJS('
${"dynamicmodel-title").change(function() {
    $.get("'.Url::to(['get-book','id'=>'']).'" + $(this.val(),function(Data)
    {
        $("#dynamicmodel-author").val(data.book.author);
        $("#dynamicmodel-year").val(data.book.year);
    });
});
');
