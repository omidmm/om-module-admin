<?php
namespace omidmm\admin\controllers;

use yii\data\ActiveDataProvider;

use omidmm\admin\models\LoginForm;

class LogsController extends \omidmm\admin\components\Controller
{
    public $rootActions = 'all';

    public function actionIndex()
    {
        $data = new ActiveDataProvider([
            'query' => LoginForm::find()->desc(),
        ]);

        return $this->render('index', [
            'data' => $data
        ]);
    }
}