<?php
namespace omidmm\admin\models;

use Yii;

use omidmm\admin\helpers\Data;
use omidmm\admin\behaviors\CacheFlush;
use omidmm\admin\behaviors\SortableModel;
use yii\helpers\FileHelper;
class Module extends \omidmm\admin\components\ActiveRecord
{
    const STATUS_OFF= 0;
    const STATUS_ON = 1;

    const CACHE_KEY = 'progsoft_modules1';

    public static function tableName()
    {
        return 'progsoft_modules';
    }

    public function rules()
    {
        return [
           
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('progsoft', 'Name'),
            'class' => Yii::t('progsoft', 'Class'),
            'title' => Yii::t('progsoft', 'Title'),
            'icon' => Yii::t('progsoft', 'Icon'),
            'order_num' => Yii::t('progsoft', 'Order'),
        ];
    }
    public function events(){
        return[
         ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
        
    }


    public function behaviors()
    {
        return [
            CacheFlush::className(),
            SortableModel::className()
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if(!$this->settings || !is_array($this->settings)){
                $this->settings = self::getDefaultSettings($this->name);
            }
            $this->settings = json_encode($this->settings);

            return true;
        } else {
            return false;
        }
    }
    public function afterDelete(){
        parent::afterDelete();
        $mf = ModuleUp::moduleDir().strtolower($this->name);
        $config= $mf.'/includes/config.php';
        require($config);
           if ($migration == 'yes') {
                                       
                                       $str = $this->name; 
                                       $folder = strtolower($str);
                                        $class = '\omidmm\admin\modules\\'.$folder.'\\'.'includes\migrations\\'.$str.'Migration';
                                        
                                        $migrate = new $class;
                                         $migrate->down();
                                        
                                    }
                                     if (is_array($map)) {
                                         
                                         foreach ($map as $map1) {
                                            $key = key($map1);

                                            $value = $map1[$key];
                                            
                                           if (is_dir(Yii::getAlias('@root').'/'.$value) || file_exists(Yii::getAlias('@root').'/'.$value)) {
                                             $dirfolder = Yii::getAlias('@root').'/'.$value.'/';
                                              chmod($dirfolder, 0777);
                                            
                                           FileHelper::removeDirectory($dirfolder);
     
                                            
                                           }
                                         

                                          
                                            
                                         }
                                     }

    }

    public function afterFind()
    {
        parent::afterFind();
        $this->settings = $this->settings !== '' ? json_decode($this->settings, true) :'';
    }

    public static function findAllActive()
    {

        return Data::cache(self::CACHE_KEY, 3600*100^1000000, function(){
            $result = [];
            try {
                foreach (self::find()->where(['status' => self::STATUS_ON])->sort()->all() as $module) {
                    $module->trigger(self::EVENT_AFTER_FIND);
                    $result[$module->name] = (object)$module->attributes;
                }
            }catch(\yii\db\Exception $e){}

            return $result;
        });
    }

    public function setSettings($settings)
    {
        $newSettings = [];
        foreach($this->settings as $key => $value){
            $newSettings[$key] = is_bool($value) ? ($settings[$key] ? true : false) : ($settings[$key] ? $settings[$key] : '');
        }
        $this->settings = $newSettings;
    }

    public function checkExists($attribute)
    {
        if(!class_exists($this->$attribute)){
            $this->addError($attribute, Yii::t('progsoft', 'Class does not exist'));
        }
    }

    static function getDefaultSettings($moduleName)
    {
        $modules = Yii::$app->getModule('admin')->activeModules;
        if(isset($modules[$moduleName])){
            return Yii::createObject($modules[$moduleName]->class, [$moduleName])->settings;
        } else {
            return [];
        }
    }

}