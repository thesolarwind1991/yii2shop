<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?//= $form->field($model, 'category_id')->textInput() ?>
    <div class="form-group field-product-category_id required">
        <label class="control-label" for="product-category_id">Родительская категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <option value ="0">Самостоятельная категория</option>
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?
    /*echo $form->field($model, 'content')->widget(CKEditor::className(),[
          'editorOptions' => [
          'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
          'inline' => false, //по умолчанию false
         ],
       ]);
    */?>
    <?
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
    <?//= $form->field($model, 'img')->fileInput() ?>
    <!--<button>Загрузить</button>-->
    <?//= $form->field($model, 'hit')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?//= $form->field($model, 'new')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?//= $form->field($model, 'sale')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
