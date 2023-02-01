<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<section id="cart_orders">
    <div class="container">
        <h1>Оформление заказа</h1>
        <div class="table-responsive_" style="padding-bottom: 40px">
            <?php if(Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>

            <?php if(Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif; ?>

            <h5>Покупка в количестве: <?=$session['cart.qty']?>шт.</h5>
            <h5>Покупка на сумму: <?=$session['cart.sum']?> руб.</h5>

            <div class="row">
                <div class="col-sm-6">
                    <div class="order_block">
                       <?php $form = ActiveForm::begin();?>
                       <?=$form->field($order, 'name'); ?>
                       <?=$form->field($order, 'email'); ?>
                       <?=$form->field($order, 'phone'); ?>
                       <?=$form->field($order, 'address'); ?>
                    </div>
                    <?=Html::submitButton('Заказать', ['class' => 'btn btn-success btn_ord']);?>
                </div>

                <? ActiveForm::end();?>
            </div>

        </div>
    </div>
</section>

