<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => false,
    'options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form']
]); ?>

<?= $form->field($model, 'file')->fileInput() ?>



<?= Html::submitButton(Yii::t('progsoft', 'Save'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>