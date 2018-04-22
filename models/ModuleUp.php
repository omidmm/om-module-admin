<?php

namespace omidmm\admin\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
class ModuleUp extends \omidmm\admin\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
        const STATUS_OFF = 0;
        const STATUS_ON = 1;
        const CACHE_KEY ='progsoft_moduleup';
        public $file;

    public static function tableName()
    {
       // return 'progsoft_moduleup';
    }
 public static function tempDir()
 {
    return Yii::getAlias('@backend'). DIRECTORY_SEPARATOR .'web/uploads/temp'. DIRECTORY_SEPARATOR;
 }
 public static function tempzipDir(){
     return Yii::getAlias('@backend'). DIRECTORY_SEPARATOR .'web/uploads/temp/zip'. DIRECTORY_SEPARATOR;
 }
  public static function moduleDir()
 {
    return Yii::getAlias('@progsoft'). DIRECTORY_SEPARATOR .'modules'. DIRECTORY_SEPARATOR;
 }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','status'], 'required'],
             ['description', 'safe'],
             ['status', 'default', 'value' => self::STATUS_OFF],
            [['name', 'created_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'template_id' => Yii::t('modules\template', 'Template ID'),
            'name' => Yii::t('modules\template', 'Name'),
            'created_at' => Yii::t('modules\template', 'Created At'),
            'created_by' => Yii::t('modules\template', 'Created By'),
            'description' => Yii::t('modules\template', 'Description'),
            'status' => Yii::t('modules\template', 'Status'),
            'settings_option' => Yii::t('modules\template', 'Settings Option'),
            'settings' => Yii::t('modules\template', 'Settings'),
        ];
    }


/*    public function afterDelete()
    {
        parent::afterDelete();
        
       $dir = self::themesDir().$this->name;
       FileHelper::removeDirectory($dir);
       FileHelper::removeDirectory(Yii::getAlias('@uploads').'/themes/'.$this->name.'/');  
       $dir2 =self::tempDir().$this->name.'.zip';
         unlink($dir2);
      
      
    }*/
     public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if(!$this->settings || (!is_object($this->settings) && !is_array($this->settings))){
                $this->settings = new \stdClass();
            }

            $this->settings = json_encode($this->settings);
        
            return true;
        } else {
            return false;
        }
    }

/*    public function afterSave($insert, $attributes){
        parent::afterSave($insert, $attributes);
      $dir2 = self::themesDir() .$this->name.'/';
      FileHelper::createDirectory(Yii::getAlias('@uploads').'/themes/'.$this->name.'/media/') ;
      FileHelper::copyDirectory($dir2.'media/',Yii::getAlias('@uploads').'/themes/'.$this->name.'/media/');
      
        
    }
*/

/*  public function afterFind()
    {
        parent::afterFind();
        $this->parseData();
        
    }
   private function parseData(){
        $this->settings_option = $this->settings_option !== '' ? json_decode($this->settings_option) : [];
         $this->settings = $this->settings !== '' ? json_decode($this->settings) : [];
    }
*/

/*       public function getBlocks()
    {
        return $this->hasMany(Blocks::className(), ['template_id' => $this->primaryKey]);
    }
    public  static function getActive()
    { 
    return $result = self::find()->where([])->status(self::STATUS_ON)->one();
    }
*/
}
