<?php
namespace omidmm\admin\migrations;
use yii\db\Schema;
use omidmm\news\admin\models\News;
class NewsMigration extends \yii\db\Migration
{
    const VERSION = 0.9;

    public $engine = 'ENGINE=MyISAM DEFAULT CHARSET=utf8';
    
    public  function up()
    {
       
        //NEWS MODULE
        $this->createTable(News::tableName(), [
            'news_id' => 'pk',
            'title' => Schema::TYPE_STRING . '(128) NOT NULL',
            'image' => Schema::TYPE_STRING . '(128) DEFAULT NULL',
            'short' => Schema::TYPE_STRING . '(1024) DEFAULT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . '(128) DEFAULT NULL',
            'time' => Schema::TYPE_INTEGER .  " DEFAULT '0'",
            'views' => Schema::TYPE_INTEGER . " DEFAULT '0'",
            'status' => Schema::TYPE_BOOLEAN . " DEFAULT '1'"
        ], $this->engine);
       

     
  }
    public function down()
    {
        $this->dropTable(News::tableName());
        
    }
}


?>