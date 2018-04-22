<?php
use omidmm\admin\models\Setting;
use yii\helpers\Url;

$this->title = Yii::t('progsoft', 'Settings');
?>

<?= $this->render('_menu') ?>

<?php if($data->count > 0) : ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <?php if(IS_ROOT) : ?>
                <th width="50">#</th>
                <th><?= Yii::t('progsoft', 'Name') ?></th>
            <?php endif; ?>
            <th><?= Yii::t('progsoft', 'Title') ?></th>
            <th><?= Yii::t('progsoft', 'Value') ?></th>
            <?php if(IS_ROOT) : ?>
                <th width="30"></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data->models as $setting) : ?>
            <tr <?php if($setting->visibility == Setting::VISIBLE_ROOT) echo 'class="warning"'?>>
                <?php if(IS_ROOT) : ?>
                    <td><?= $setting->primaryKey ?></td>
                    <td><?= $setting->name ?></td>
                <?php endif; ?>
                <td><a href="<?= Url::to(['/admin/settings/edit', 'id' => $setting->primaryKey]) ?>" title="<?= Yii::t('progsoft', 'Edit') ?>"><?= $setting->title ?></a></td>
                <td style="overflow: hidden"><?= $setting->value ?></td>
                <?php if(IS_ROOT) : ?>
                    <td><a href="<?= Url::to(['/admin/settings/delete', 'id' => $setting->primaryKey]) ?>" class="glyphicon glyphicon-remove confirm-delete" title="<?= Yii::t('progsoft', 'Delete item') ?>"></a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <?= yii\widgets\LinkPager::widget([
            'pagination' => $data->pagination
        ]) ?>
    </table>
<?php else : ?>
    <p><?= Yii::t('progsoft', 'No records found') ?></p>
<?php endif; ?>