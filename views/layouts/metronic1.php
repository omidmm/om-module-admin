<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use dlds\metronic\helpers\Layout;
use dlds\metronic\Metronic;

$asset = Metronic::registerThemeAsset($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl($asset->sourcePath);
?>
<?php $this->beginPage() ?>
<!--[if IE 8]> <html lang="<?= Yii::$app->language ?>" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="<?= Yii::$app->language ?>" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<!DOCTYPE html>
<html  dir="rtl">
<!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body <?= Layout::getHtmlOptions('body',['class'=>'page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo'],true) ?>      >
<?php $this->beginBody() ?>

<?= $this->render('parts/header.php', ['directoryAsset' => $directoryAsset]) ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
<?= $this->render('parts/sidebar.php', ['directoryAsset' => $directoryAsset]) ?>

<?= $this->render('parts/content.php', ['content' => $content, 'directoryAsset' => $directoryAsset]) ?>
</div>
<?= $this->render('parts/footer.php', ['directoryAsset' => $directoryAsset]) ?>
 <div class="quick-nav-overlay"></div>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>