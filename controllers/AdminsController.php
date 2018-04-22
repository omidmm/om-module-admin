<?php
namespace omidmm\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;
use omidmm\admin\models\Admin;

class AdminsController extends \omidmm\admin\components\Controller
{
    public $rootActions = 'all';

    public function actionIndex()
    {
        $data = new ActiveDataProvider([
            'query' => Admin::find()->desc(),
        ]);
        Yii::$app->user->setReturnUrl(['/admin/admins']);

        return $this->render('index', [
            'data' => $data
        ]);
    }

    public function actionCreate()
    {
        $model = new Admin;
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            else{
                if($model->save()){
                    $this->flash('success', Yii::t('progsoft', 'Admin created'));
                    return $this->redirect(['/admin/admins']);
                }
                else{
                    $this->flash('error', Yii::t('progsoft', 'Create error. {0}', $model->formatErrors()));
                    return $this->refresh();
                }
            }
        }
        else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionEdit($id)
    {
        $model = Admin::findOne($id);

        if($model === null){
            $this->flash('error', Yii::t('progsoft', 'Not found'));
            return $this->redirect(['/admin/admins']);
        }

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            else{
                if($model->save()){
                    $this->flash('success', Yii::t('progsoft', 'Admin updated'));
                }
                else{
                    $this->flash('error', Yii::t('progsoft', 'Update error. {0}', $model->formatErrors()));
                }
                return $this->refresh();
            }
        }
        else {
            return $this->render('edit', [
                'model' => $model
            ]);
        }
    }

    public function actionDelete($id)
    {
        if(($model = Admin::findOne($id))){
            $model->delete();
        } else {
            $this->error = Yii::t('progsoft', 'Not found');
        }
        return $this->formatResponse(Yii::t('progsoft', 'Admin deleted'));
    }
}