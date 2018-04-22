<?php
use omidmm\admin\models\Setting;
use yii\helpers\Url;

$this->title = Yii::t('progsoft', 'System');
?>

<h4><?= Yii::t('progsoft', 'Current version') ?>: <b><?= Setting::get('progsoft_version') ?></b>
    <?php if(\omidmm\admin\AdminModule::VERSION > floatval(Setting::get('progsoft_version'))) : ?>
        <a href="<?= Url::to(['/admin/system/update']) ?>" class="btn btn-success"><?= Yii::t('progsoft', 'Update') ?></a>
    <?php endif; ?>
</h4>

<br>

<p>
    <a href="<?= Url::to(['/admin/system/flush-cache']) ?>" class="btn btn-default"><i class="glyphicon glyphicon-flash"></i> <?= Yii::t('progsoft', 'Flush cache') ?></a>
</p>

<br>

<p>
    <a href="<?= Url::to(['/admin/system/clear-assets']) ?>" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i> <?= Yii::t('progsoft', 'Clear assets') ?></a>
</p>