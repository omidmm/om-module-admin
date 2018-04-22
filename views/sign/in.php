<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$asset = \omidmm\admin\assets\EmptyAsset::register($this);
$this->title = Yii::t('progsoft', 'Sign in');
?>
<div class="container">
    <div id="wrapper" class="col-md-4 col-md-offset-4 vertical-align-parent">
        <div class="vertical-align-child">
            <div class="panel">
                <div class="panel-heading text-center">
                    <?= Yii::t('progsoft', 'Sign in') ?>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin([
                        'fieldConfig' => [
                            'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
                        ]
                    ])
                    ?>
                        <?= $form->field($model, 'username')->textInput(['class'=>'form-control', 'placeholder'=>Yii::t('progsoft', 'Username')]) ?>
                        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control', 'placeholder'=>Yii::t('progsoft', 'Password')]) ?>
                        <?=Html::submitButton(Yii::t('progsoft', 'Login'), ['class'=>'btn btn-lg btn-primary btn-block']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="text-center">
                <a class="logo" href="http://progsoftcms.com" target="_blank" title="progsoftCMS homepage">
                    <img src="<?= $asset->baseUrl ?>/img/logo_20.png">progsoftCMS
                </a>
            </div>
        </div>
    </div>
</div>
