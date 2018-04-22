<?php
use yii\helpers\Url;

$action = $this->context->action->id;
?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
        <a href="<?= $this->context->getReturnUrl(['/admin/modules']) ?>">
            <?php if($action === 'edit' || $action === 'settings') : ?>
                <i class="glyphicon glyphicon-chevron-left font-12"></i>
            <?php endif; ?>
            <?= Yii::t('progsoft', 'List') ?>
        </a>
    </li>
    <li <?= ($action==='create') ? 'class="active"' : '' ?>><a href="<?= Url::to(['/admin/modules/create']) ?>"><?= Yii::t('progsoft', 'Create') ?></a></li>
       <li <?= ($action==='add-zip') ? 'class="active"' : '' ?>><a href="<?= Url::to(['/admin/modules/add-zip']) ?>"><?= Yii::t('progsoft', 'Add') ?></a></li>
</ul>
<br/>
