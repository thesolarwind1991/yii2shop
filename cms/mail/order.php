<?php
use yii\helpers\Url;
?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $item): ?>
            <tr>
                <td><?= $item['name']?></td>
                <td><?= $item['qty']?></td>
                <td><?= $item['price']?></td>
                <td><?= $item['qty']?> * <?= $item['price']?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Итого:</strong></td>
            <td><?= $session['cart.qty']?><strong> шт.</strong></td>
        </tr>
        <tr>
            <td colspan="3"><strong>На сумму:</strong> </td>
            <td><?= $session['cart.sum']?> <strong>cом</strong></td>
        </tr>
        </tbody>
    </table>
</div>
