<?php

namespace omidmm\admin\models;

use Yii;

/**
 * This is the model class for table "progsoft_widgets_block".
 *
 * @property integer $widget_id
 * @property string $name
 * @property string $class
 * @property string $width
 * @property string $height
 * @property integer $item_id
 * @property string $render
 */
class Widgets extends \omidmm\admin\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'progsoft_widgets_block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'class'], 'required'],
            [['item_id'], 'integer'],
            [['render','description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['class'], 'string', 'max' => 120],
            [['width', 'height'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'widget_id' => Yii::t('widgets', 'Widget ID'),
            'name' => Yii::t('widgets', 'Name'),
            'class' => Yii::t('widgets', 'Class'),
            'width' => Yii::t('widgets', 'Width'),
            'height' => Yii::t('widgets', 'Height'),
            'item_id' => Yii::t('widgets', 'Item ID'),
            'render' => Yii::t('widgets', 'Render'),
        ];
    }
   public function getClass()
   {
    return $this->hasOne(Modules::className(),['class'=>$this->class]);
   } 
}
