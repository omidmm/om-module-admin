<?php
use omidmm\admin\helpers\Image;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use omidmm\admin\widgets\SeoForm;
use yii\helpers\ArrayHelper;

$class = $this->context->categoryClass;
$settings = $this->context->module->settings;
?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'options' => ['enctype' => 'multipart/form-data']
]); ?>
<?= $form->field($model, 'title') ?>

<?php if(!empty($parent)) : ?>
    <div class="form-group field-category-title required">
        <label for="category-parent" class="control-label"><?= Yii::t('progsoft', 'Parent category') ?></label>
        <select class="form-control" id="category-parent" name="parent">
            <option value="" class="smooth"><?= Yii::t('progsoft', 'No') ?></option>
            <?php foreach($class::find()->sort()->asArray()->all() as $node) : ?>
                <option
                    value="<?= $node['category_id'] ?>"
                    <?php if($parent == $node['category_id']) echo 'SELECTED' ?>
                    style="padding-left: <?= $node['depth']*20 ?>px;"
                ><?= $node['title'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php endif; ?>

<?php if($settings['categoryThumb']) : ?>
    <?php if($model->image) : ?>
        <img src="<?= Image::thumb($model->image, 240) ?>">
        <a href="<?= Url::to(['/admin/'.$this->context->moduleName.'/a/clear-image', 'id' => $model->primaryKey]) ?>" class="text-danger confirm-delete" title="<?= Yii::t('progsoft', 'Clear image')?>"><?= Yii::t('progsoft', 'Clear image')?></a>
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput() ?>
<?php endif; ?>
 <?php
    echo $form->field($model, 'lang_id')->dropDownList(ArrayHelper::map($model::getLangs(),'locale','name'),['prompt'=>Yii::t('modules/language','Select defualt language').'->'.Yii::$app->language]);
?>
<?php if(IS_ROOT) : ?>
    <?= $form->field($model, 'slug') ?>
    <?= SeoForm::widget(['model' => $model]) ?>
<?php endif; ?>

<?= Html::submitButton(Yii::t('progsoft', 'Save'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>