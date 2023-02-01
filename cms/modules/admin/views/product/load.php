<?php
use yii\widgets\ActiveForm;
?>
<div class="product-form">
    <div><h2>№<?=$model_form->id?> Имя: <?=$model_form->name?></h2></div>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
  <?= $form->field($model, 'image')->fileInput() ?>
    <button>Загрузить</button>
<?php ActiveForm::end();?>