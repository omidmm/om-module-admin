<?php
use yii\helpers\Html;
use yii\helpers\Url;
use omidmm\admin\assets\MetronicAsset;
use yii\widgets\Breadcrumbs;
use omidmm\admin\assets\SmartyAdminAsset;
use omidmm\admin\assets\RtlSmartyAdminAsset;
use omidmm\language\admin\api\Language;
 
switch (Language::Dir()) {
    case 'rtl':
       $assets = RtlSmartyAdminAsset::register($this);
        break;
    
    default:
         $assets = SmartyAdminAsset::register($this);
        break;
}

  $pluginsPath = SmartyAdminAsset::getAssetUrl('plugins/');

  $this->registerJs(
    "var plugin_path = '".$pluginsPath."'",

    $this::POS_END
); 

$moduleName = $this->context->module->id;
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html  >
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::t('progsoft', 'Control Panel') ?> - <?= Html::encode($this->title) ?></title>
        
         <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        
        <?php $this->head() ?>
         </head>



    <!--
        .boxed = boxed version
    -->
     
    <body>
 <?php $this->beginBody() ?>

        <!-- WRAPPER -->
        <div id="wrapper">

            <!-- 
                ASIDE 
                Keep it outside of #wrapper (responsive purpose)
            -->
            <aside id="aside">
                <!--
                    Always open:
                    <li class="active alays-open">

                    LABELS:
                        <span class="label label-danger pull-right">1</span>
                        <span class="label label-default pull-right">1</span>
                        <span class="label label-warning pull-right">1</span>
                        <span class="label label-success pull-right">1</span>
                        <span class="label label-info pull-right">1</span>
                -->
                
             
                 <nav id="sideNav">
                    
                    <ul class="nav nav-list">
                      
                        
                              <li>
                                    <a href="<?= Url::to(['/admin/settings']) ?>" class="nav-link <?= ($moduleName == 'admin' && $this->context->id == 'settings') ? 'active' :'' ?>">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title"> <?= Yii::t('progsoft', 'Settings') ?> </span>
                                    </a>
                                </li>
                                  <li>
                                    <a href="<?= Url::to(['/admin/system']) ?>" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title"> <?= Yii::t('progsoft', 'System') ?></span>
                                        
                                    </a>
                                </li>
                                  <li>
                                    <a href="<?= Url::to(['/admin/modules']) ?>"  class="nav-link ">
                                        <i class="glyphicon glyphicon-folder-close"></i>
                                        <span class="title"> <?= Yii::t('progsoft', 'Modules') ?></span>
                                        
                                    </a>
                                </li>
                               
                                   <li>
                                    <a href="<?= Url::to(['/admin/user/admin/index']) ?>" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title"> <?= Yii::t('progsoft', 'User Managment') ?></span>
                                        
                                    </a>
                                </li>
                                     <li>
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <span class="title"><?= Yii::t('progsoft', 'Message') ?></span>
                                <span class="arrow"></span>
                            </a>
                       
                        
                     <ul class="sub-menu" >
                                
                                 <li class="nav-item  ">
                                    <a href="<?= Url::to(["/admin/message/a/compose"]) ?>" class="nav-link">
                                          
                                <i class="glyphicon glyphicon"></i>
                                      
                                        <span class="title"><?= Yii::t('modules/message','Compose') ?></span>
                                          
                                <span class="badge"></span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="<?= Url::to(["/admin/message/a/inbox"]) ?>" class="nav-link">
                                          
                                <i class="glyphicon glyphicon"></i>
                                      
                                        <span class="title"><?= Yii::t('modules/message','Inbox') ?></span>
                                          
                                <span class="badge"></span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="<?= Url::to(["/admin/message/a/sent"]) ?>" class="nav-link">
                                          
                                <i class="glyphicon glyphicon"></i>
                                      
                                        <span class="title"><?= Yii::t('modules/message','Sent') ?></span>
                                          
                                <span class="badge"></span>
                                         
                                    </a>
                                </li>
                                
                            </ul>
                           </li>
                   
                   
                                            
                            <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-bars"></i>
                                <span class="title"><?= Yii::t('progsoft', 'Modules') ?></span>
                                <span class="arrow"></span>
                            </a>
                       
                        
                     <ul class="sub-menu" style="display:block">
                                <?php foreach(Yii::$app->getModule('admin')->activeModules as $module) : ?>
                                <li class="nav-item  ">
                                    <a href="<?= Url::to(["/admin/$module->name"]) ?>" class="nav-link <?= ($moduleName == $module->name ? 'active' : '') ?>">
                                          <?php if($module->icon != '') : ?>
                                <i class="glyphicon glyphicon-<?= $module->icon ?>"></i>
                                       <?php endif; ?>
                                        <span class="title"><?= Yii::t('progsoft',$module->title) ?></span>
                                          <?php if($module->notice > 0) : ?>
                                <span class="badge"><?= $module->notice ?></span>
                                          <?php endif; ?>
                                    </a>
                                </li>
                                 <?php endforeach; ?>
                            </ul>
                           </li>
                   
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </nav>
                <!-- END SIDEBAR -->

                <span id="asidebg"><!-- aside fixed background --></span>
            </aside>
            <!-- /ASIDE -->


            <!-- HEADER -->
            <header id="header">

                <!-- Mobile Button -->
                <button id="mobileMenuBtn"></button>

                <!-- Logo -->
                <span class="logo pull-left">
                    <img src="assets/images/logo_light.png" alt="admin panel" height="35" />
                </span>

                <form method="get" action="page-search.html" class="search pull-left hidden-xs">
                    <input type="text" class="form-control" name="k" placeholder="Search for something..." />
                </form>

                <nav>

                    <!-- OPTIONS LIST -->
                    <ul class="nav pull-right">

                        <!-- USER OPTIONS -->
                        <li class="dropdown pull-left">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img class="user-avatar" alt="" src="assets/images/noavatar.jpg" height="34" /> 
                                <span class="user-name">
                                    <span class="hidden-xs">
                                        John Doe <i class="fa fa-angle-down"></i>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu hold-on-click">
                                <li><!-- my calendar -->
                                    <a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
                                </li>
                                <li><!-- my inbox -->
                                    <a href="#"><i class="fa fa-envelope"></i> Inbox
                                        <span class="pull-right label label-default">0</span>
                                    </a>
                                </li>
                                <li><!-- settings -->
                                    <a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
                                </li>

                                <li class="divider"></li>

                                <li><!-- lockscreen -->
                                    <a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
                                </li>
                                <li><!-- logout -->
                                    <a href="page-login.html"><i class="fa fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                        <!-- /USER OPTIONS -->

                    </ul>
                    <!-- /OPTIONS LIST -->

                </nav>

            </header>
            <!-- /HEADER -->


            <!-- 
                MIDDLE 
            -->
            <section id="middle">


                <!-- page title -->
                <header id="page-header">
                    <?php 
                 echo Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                       ]); ?>
                </header>
                <!-- /page title -->

                   <?php foreach(Yii::$app->session->getAllFlashes() as $key => $message) : ?>
                            <div class="alert alert-<?= $key ?>"><?= $message ?></div>
                              <?php endforeach; ?>
                <div id="content" class="padding-20">
                          
                   <?= $content ?>

                </div>
            </section>
            <!-- /MIDDLE -->

        </div>



    
        <!-- JAVASCRIPT FILES -->
        

    
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>