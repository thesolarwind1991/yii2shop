<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

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
            //'parent_id',
            [
                    'attribute' => 'parent_id',
                    'value' => function($modal) {
                        $name_cat = "Самостоятельная категория";
                        if (is_object($modal->category)) {
                            if ($modal->category->name)
                                $name_cat = $modal->category->name;
                        }

                        return $name_cat;
                        //return $data->category->name ? $data->category->name : 'Самостоятельная категория';
                    }
            ],
            'name',
            'keywords',
            'description',
        ],
    ]) ?>

</div>
