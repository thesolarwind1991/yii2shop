<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\controllers\AppAdminController;

/**
 * Default controller for the `Module` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
