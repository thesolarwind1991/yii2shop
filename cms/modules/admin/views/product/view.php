<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\BaseUrl;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($data) {
                    return $data->category->name;
                }
            ],
            'name',
            'content:html', //ntext',
            'price',
            'keywords',
            'description:html',
            //'img',
            [
                'attribute' => 'img',
                'value' => function($data) {
                   if ($data->img)
                     return "<img src='".BaseUrl::home()."/files/".$data->img."' width='200'/><br>
                     <a href='".\yii\helpers\Url::to(['product/load', 'id' => $data->id])."'>Загрузить</a>";
                },
                'format' => 'html',

            ],
            [
                'attribute' => 'hit',
                'value' => function($data) {
                    return !$data->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'new',
                'value' => function($data) {
                    return !$data->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'sale',
                'value' => function($data) {
                    return !$data->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],
            //'hit',
            //'new',
            //'sale',
        ],
    ]) ?>

</div>
