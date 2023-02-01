<?php
namespace app\controllers;
use app\models\Order;
use app\models\OrderItems;
use app\models\Product;
use app\models\Cart;
use Yii;

class CartController extends AppController
{
    // добавление в корзину товара
    public function actionAdd() {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');

        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);

        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product, $qty);

        if (!Yii::$app->request->isAjax) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));

    }

    // отображение корзины
    public function actionCart() {
        $session = $id = Yii::$app->session;
        $session->open();

        return $this->render('cart', compact('session'));

    }

    // полная очистка корзины
    public function actionClear() {
        $session = $id = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    // удаление пунктов заказа из корзины
    public function actionDelItem() {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal2', compact('session'));
    }

    // отображение корзины
    public function actionShow() {
        $session = Yii::$app->session;
        $session->open();
        //$this->layout = false;
        $this->setMeta('Интернет магазин | Корзина ');

        return $this->render('cart-modal', compact('session'));
    }

    // отображение страницы "оформление заказа"
    public function actionView() {
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Оформление заказа ');
        $order = new Order();
        if ($order->load(Yii::$app->request->post()))
        {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if ($order->save())
            {
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер позвонит Вам.');
                /*Yii::$app->mailer->compose('order', ['session' => $session])
                  ->setFrom(['itegralal@mail.ru' => 'yii2shop'])
                  ->setTo($order->email)
                  ->setSubject('Заказ')           //Тема сообщения
                  ->send();
             */
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка формирования заказа');
            }
        }
        return $this->render('view', compact('session', 'order'));
    }

    // Сохранение данных корзины пользователя в базу данных
    protected function saveOrderItems($items, $order_id) {
      foreach ($items as $id => $item) {
          $order_items = new OrderItems();
          $order_items->order_id = $order_id;
          $order_items->product_id = $id;
          $order_items->name = $item['name'];
          $order_items->price = $item['price'];
          $order_items->qty_item = $item['qty'];
          $order_items->sum_item = $item['qty'] * $item['price'];
          $order_items->save();
      }
    }
}