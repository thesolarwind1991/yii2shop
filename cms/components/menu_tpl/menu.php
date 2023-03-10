<li class="panel" style="margin: 1px 10px 0px -20px">
    <a href="<?=\yii\helpers\Url::to(['category/view', 'id' => $category['id'] ]) ?>" class="collapsed panel-title">
        <?= $category['name'] ?>
        <?php if(isset($category['childs']) ): ?>
            <span class="badge pull-right">
                    <i class="fa fa-plus"></i>
              </span>
        <?php endif; ?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul class="child">
            <?=$this->getMenuHtml($category['childs']) ?>
        </ul>
    <?php endif; ?>
</li>