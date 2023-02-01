<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'parent_id',
            [
                    'attribute' => 'parent_id',
                    'value' => function($data) {
                       $name_cat = "Самостоятельная категория";
                       if (is_object($data->category)) {
                           if ($data->category->name)
                               $name_cat = $data->category->name;
                       }

                       return $name_cat;
                      //return $data->category->name ? $data->category->name : 'Самостоятельная категория';
                    }
            ],
            'name',
            'keywords',
            'description',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
