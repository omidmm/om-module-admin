<?php
namespace omidmm\admin\models;

class Tag extends \omidmm\admin\components\ActiveRecord
{
    public static function tableName()
    {
        return 'progsoft_tags';
    }

    public function rules()
    {
        return [
            ['name', 'required'],
            ['frequency', 'integer'],
            ['name', 'string', 'max' => 64],
        ];
    }
}