<?php
$this->title = Yii::t('progsoft', 'Create category');
?>
<?= $this->render('_menu') ?>
<?= $this->render('_form', ['model' => $model, 'parent' => $parent]) ?>