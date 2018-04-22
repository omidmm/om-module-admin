<?php
namespace omidmm\admin\models;

use Yii;
use omidmm\admin\behaviors\SortableModel;
use omidmm\admin\behaviors\CacheFlush;

class Photo extends \omidmm\admin\components\ActiveRecord
{
    const PHOTO_MAX_WIDTH = 1900;
    const PHOTO_THUMB_WIDTH = 120;
    const PHOTO_THUMB_HEIGHT = 90;
    const CACHE_KEY = 'progsoft_photos';
    public static function tableName()
    {
        return 'progsoft_photos';
    }

    public function rules()
    {
        return [
            [['class', 'item_id'], 'required'],
            ['item_id', 'integer'],
            ['image', 'image'],
            ['description', 'trim']
        ];
    }

    public function behaviors()
    {
        return [
            SortableModel::className(),
                  'cacheflush'=>[
                 'class'=>CacheFlush::className(),
                   'extraClass'=>'class',
                   'attribute'=>'item_id',

                ],
        ];
    }

    public function afterDelete()
    {
        parent::afterDelete();

        @unlink(Yii::getAlias('@webroot').$this->image);
    }
}