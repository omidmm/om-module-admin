<?php

namespace omidmm\admin\models;

use dektrium\user\models\User as BaseUser;
use dektrium\user\models\Profile;
class User extends BaseUser
{

      /**
         * @var string
         */
        public $captcha;
    //   public $id;
        /**
         * @inheritdoc
         */
        public function rules()
        {
            $rules = parent::rules();
            $rules[] = ['captcha', 'required'];
            $rules[] = ['captcha', 'captcha'];
            return $rules;
        }


 // public function getProfile()
 //   {
 //    return $this->hasOne(Profile::className(),['id'=>'id']);
 //   }

}