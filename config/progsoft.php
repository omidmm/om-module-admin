<?php

return [
    'modules' => [
        'admin' => [
            'class' => 'omidmm\admin\AdminModule',
        ],
    ],
    'components' =>// require dirname(__DIR__).'/components/components.php',
     [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'admin/<controller:\w+>/<action:[\w-]+>/<id:\d+>' => 'admin/<controller>/<action>',
                'admin/<module:\w+>/<controller:\w+>/<action:[\w-]+>/<id:\d+>' => 'admin/<module>/<controller>/<action>'
            ],
         ],
  //         'settings'=>[
  //         'class'=>'yii2mod\settings\components\Settings',
 
  // ],
     'languages'=>[
     'class'=>'\omidmm\language\admin\components\language',
     ],
       'currency'=>[
     'class'=>'\omidmm\financial\admin\components\Currency',
     ],
        // 'user' => [
        //     'identityClass' => 'omidmm\admin\models\Admin',
        //     'enableAutoLogin' => true,
        //     'authTimeout' => 86400,
        // ],
                
        'formatter' => [
            'sizeFormatBase' => 1000,
           
        ],
      
    ],
    'bootstrap' => ['admin']
];