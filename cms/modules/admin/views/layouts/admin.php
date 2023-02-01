<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\assets\LtAppAsset;
use app\widgets\Alert;
use \yii\helpers\BaseUrl;
use \yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
//use yii\bootstrap4\Modal;

AppAsset::register($this);
LtAppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?=BaseUrl::home();?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=BaseUrl::home();?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=BaseUrl::home();?>/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=BaseUrl::home();?>/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=BaseUrl::home();?>/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <!--<div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <!--
                    <div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?=Url::home(); ?>">
                                <?=\yii\helpers\Html::img('@web/images/home/logo.png', ['alt' => 'Интернет-магазин быстрой еды'])?>
                            </a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Россия
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Белорусия</a></li>
									<li><a href="#">Казахстан</a></li>
                                    <li><a href="#">Украина</a></li>
								</ul>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Рубль
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Белорусский рубль</a></li>
									<li><a href="#">Тенге</a></li>
                                    <li><a href="#">Гривна</a></li>
								</ul>
							</div>
						</div>
					</div>
					-->
                <div class="container col-sm-8_">
                    <h5><?php

                        NavBar::begin([
                            'brandLabel' => "Админка интернет-магазина",//Yii::$app->name,
                            'brandUrl' => Url::to(['/admin']),//Yii::$app->homeUrl,
                            'options' => [
                                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
                            ],
                        ]);

                        echo Nav::widget([
                            'options' => ['class' => 'navbar-nav'],
                            'items' => [
                                ['label' => 'Интернет-магазин', 'url' => ['/category/index']],
                                ['label' => 'О нас', 'url' => ['/site/about']],
                                ['label' => 'Контакты', 'url' => ['/site/contact']],
                                Yii::$app->user->isGuest ? (
                                ['label' => 'Логин', 'url' => ['/admin']]
                                ) : (
                                    '<li>'
                                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                                    . Html::submitButton(
                                        'Выход (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn nav-link btn-link logout',
                                         'style' => 'padding: 15px; font-size: 12px;'
                                        ]
                                    )
                                    . Html::endForm()
                                    . '</li>'
                                )
                            ],
                        ]);
                        NavBar::end();
                        ?></h5>
                    <!--<div class="shop-menu pull-right row">
                        <!--<ul class="nav navbar-nav row">-->
                    <!--<div class="col"><a href="#"><i class="fa fa-user"></i> Account</a></div>
                    <div class="col"><a href="#"><i class="fa fa-star"></i> Wishlist</a></div>
                    <div class="col"><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></div>
                    <div class="col"><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></div>
                    <div class="col"><a href="login.html"><i class="fa fa-lock"></i> Login</a></div>
                <!--</ul>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?=Url::to(['/admin'])?>" class="active">На главную</a></li>
                            <li class="dropdown"><a href="#">Категории<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=Url::to(['category/index'])?>">Список категорий</a></li>
                                    <li><a href="<?=Url::to(['category/create'])?>">Добавить категорию</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Товары<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=Url::to(['product/index'])?>">Список товаров</a></li>
                                    <li><a href="<?=Url::to(['product/create'])?>">Добавить товар</a></li>
                                </ul>
                            </li>
                            <!--<li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Contact</a></li>-->
                        </ul>
                    <!--</div>-->
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?=\yii\helpers\Url::to(['category/search']) ?>">
                            <input type="text" placeholder="Поиск" name="q"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<div class="container">
    <?php if(Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?=$content;?>
</div>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?=BaseUrl::home();?>/images/home/iframe1.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?=BaseUrl::home();?>/images/home/iframe2.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?=BaseUrl::home();?>/images/home/iframe3.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?=BaseUrl::home();?>/images/home/iframe4.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="<?=BaseUrl::home();?>/images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->
<?php

/* Modal::begin([
     //'header' => '<h2>Корзина</h2>',
     'id' => 'cart',
     'size' => 'modal-lg',
     'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупку</button>
                       <a href="'. \yii\helpers\Url::to(['cart/view'])  .' "  class="btn btn-success">Оформить заказ</a>
                       <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
 ]);
 Modal::end();*/
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

