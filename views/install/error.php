<?php
$asset = \omidmm\admin\assets\EmptyAsset::register($this);

$this->title = Yii::t('modules/install', 'Installation error');
?>
<div class="container">
    <div id="wrapper" class="col-md-6 col-md-offset-3 vertical-align-parent">
        <div class="vertical-align-child">
            <div class="panel">
                <div class="panel-heading text-center">
                    <?= Yii::t('modules/install', 'Installation error') ?>
                </div>
                <div class="panel-body text-center">
                    <?= $error ?>
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
