<?php
use yii\helpers\Url;
?>
<?php if(!empty($session['cart'])): ?>
    <table class="table table-hover table-striped" id="tablecart">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" arial-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($session['cart'] as $id => $item): ?>
                 <tr>
                   <td><?//= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?>
                       <? if (empty($item['img'])) {?>
                           <?=\yii\helpers\Html::img("@web/images/products/no-image.jpg", ['alt' => $item['name'], 'height' => 50]);?>
                       <?} else {?>
                           <?=\yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'], 'height' => 50]);?>
                       <? } ?>

                   </td>
                     <td><a href="<?= Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a></td>
                   <td><?= $item['qty']?></td>
                   <td><?= $item['price']?></td>
                   <td><span class="glyphicon glyphicon-remove text-danger del-item" arial-hidden="true" data-id="<?= $id?>"></span></td>
                     </tr>
               <?php endforeach; ?>
                 <tr>
                     <td colspan="4"><strong>Итого:</strong></td>
                     <td><?= $session['cart.qty']?><strong> шт.</strong></td>
                 </tr>
                 <tr>
                     <td colspan="4"><strong>На сумму:</strong> </td>
                     <td><?= $session['cart.sum']?> <strong>руб.</strong></td>
                 </tr>
            </tbody>
         </table>

  <?php else: ?>
    <h1 align="center"> Корзина пуста </h1>
    <a href="<?=\yii\helpers\Url::to(['/category/index'])?>" class="btn btn-default" data-dismiss="modal">Продолжить покупку</a>

<?php endif; ?>
