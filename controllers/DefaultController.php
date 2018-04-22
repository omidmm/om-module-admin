<?php
namespace omidmm\admin\controllers;

class DefaultController extends \omidmm\admin\components\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}