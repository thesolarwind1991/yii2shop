<?php


namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex() {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $query2  = Product::find()->where(['category_id' => '9'])->all();
        $this->setMeta('Интернет-магазин быстрого приготовления');
        return $this->render('index', compact('hits','query2'));
    }

    public function actionView($id) {
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new \yii\web\HttpException(404, 'Данной категории нет');
        }

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6,
                                 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Пиццерия для всех '.$category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages','category'));
    }

    public function actionSearch() {
        $q = trim(Yii::$app->request->get('q'));
        if (!$q) {
            return $this->render('search');
        }
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }
}