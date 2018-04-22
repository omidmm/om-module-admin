<?php
namespace omidmm\admin\models;

use Yii;

use omidmm\admin\helpers\Data;
use omidmm\admin\behaviors\CacheFlush;
use omidmm\admin\behaviors\SortableModel;
use yii\helpers\FileHelper;
class Components extends \omidmm\admin\components\ActiveRecord
{
    const STATUS_OFF= 0;
    const STATUS_ON = 1;

    const CACHE_KEY = 'progsoft_components';
    const CACHE_KEY_BOOTSTRAP =	'progsoft_component_bootstrap';

    public static function tableName()
    {
        return 'progsoft_components';
    }

    public function rules()
    {
        return [
            [['name','status','class','bootstrapping',], 'required'],
          
             [['status','bootstrapping'], 'default', 'value' => self::STATUS_OFF],
            [['name', 'title'], 'string', 'max' => 100],
             [['class', 'module_class'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('progsoft', 'Name'),
            'class' => Yii::t('progsoft', 'Class'),
            'title' => Yii::t('progsoft', 'Title'),
            'module_class' => Yii::t('progsoft', 'Module class'),
            'bootstrapping' => Yii::t('progsoft', 'Bootstrapping'),
            'status' => Yii::t('progsoft', 'Status'),
            'options' => Yii::t('progsoft', 'Options'),
            'options_settings' => Yii::t('progsoft', 'Options settings'),


             
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
    public function afterFind()
    {
        parent::afterFind();
        $this->settings = $this->settings !== '' ? json_decode($this->settings, true) :'';
    }


    public static function findAllActiveBootstrap()
    {
    	return Data::cache(self::CACHE_KEY_BOOTSTRAP,3600,function(){
    		$result = [];
    		try{
    			foreach(self::find()->where(['status'=>self::STATUS_ON,'bootstrapping'=>self::STATUS_ON])->all() as $bootstrap)
					    	{
					    		$module->trigger(self::EVENT_AFTER_FIND);
					    		$result[] =$bootstrap->name;
					    		}
    	     } catch(\yii\db\Exception $e){}
    	     return $result;
    	});
    }
    public static function findAllActiveComponents()
    {
    	// return Data::cache(self::CACHE_KEY,3600,function(){
    	 $result = [];
    	// 	try{
    	//$name = 'settings';
    	//$class = 'yii2mod\settings\components\Settings';
    		 foreach(self::find()->where(['status'=>self::STATUS_ON])->all() as $component)
				  	{
					  //   	//	$module->trigger(self::EVENT_AFTER_FIND);
					 		//$config[$name] = 'settings';
					        $config[$component->name]['class'] = $component->class;
				 }
					    

     //  } catch(\yii\db\Exception $e){}
    	     return $config;
    	// });
    }
}