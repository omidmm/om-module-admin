<?php
use yii\helpers\Html;
use yii\helpers\Url;
use omidmm\admin\assets\AdminLiteAsset;

$asset = AdminLiteAsset::register($this);
$moduleName = $this->context->module->id;
?>
<?php $this->beginPage() ?>



<html lang="<?= Yii::$app->language ?>">
    <head>
       <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::t('progsoft', 'Control Panel') ?> - <?= Html::encode($this->title) ?></title>
       

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

      
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

        <?php $this->head() ?>
        
    </head>
    <!--
        .boxed = boxed version
    -->
    <body>

     <?php $this->beginBody() ?>
        <!-- WRAPPER -->
        <div id="wrapper" class="clearfix">

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
                <nav id="sideNav"><!-- MAIN MENU -->
                    <ul class="nav nav-list">
                        <li><!-- dashboard -->
                            <a class="dashboard" href="index.html"><!-- warning - url used by default by ajax (if eneabled) -->
                                <i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                              <li><!-- dashboard -->
                            <a class="dashboard" href="<?= Url::to(["/user/admin/index"])  ?>">
                                <i class="main-icon fa fa-user"></i> <span><?= Yii::t('progsoft','User') ?></span>
                            </a>
                        </li>
                            </li>
                              <li><!-- dashboard -->
                             <a href="<?= Url::to(['/admin/settings']) ?>" class="menu-item <?= ($moduleName == 'admin' && $this->context->id == 'settings') ? 'active' :'' ?>">
                               <i class="glyphicon glyphicon-cog"></i> &nbsp;&nbsp;  &nbsp; &nbsp;  
                        <?= Yii::t('progsoft', 'Settings') ?>
                    </a>
                        </li>

                        <?php if(IS_ROOT) : ?>
                              <li>
                                        <a href="<?= Url::to(['/admin/modules']) ?>" class="menu-item <?= ($moduleName == 'admin' && $this->context->id == 'modules') ? 'active' :'' ?>">
                                     <i class="glyphicon glyphicon-folder-close"></i> &nbsp;&nbsp;  &nbsp; &nbsp;  
                                     <?= Yii::t('progsoft', 'Modules') ?>
                                   </a>
                              </li>
                              <li>
                                    <a href="<?= Url::to(['/admin/system']) ?>" class="menu-item <?= ($moduleName == 'admin' && $this->context->id == 'system') ? 'active' :'' ?>">
                                         <i class="glyphicon glyphicon-hdd"></i> &nbsp;&nbsp;  &nbsp; &nbsp;  
                                       <?= Yii::t('progsoft', 'System') ?>
                        </a>
                              </li>
                              <li>
                                   <a href="<?= Url::to(['/admin/logs']) ?>" class="menu-item <?= ($moduleName == 'admin' && $this->context->id == 'logs') ? 'active' :'' ?>">
                            <i class="glyphicon glyphicon-align-justify"></i> &nbsp;&nbsp;  &nbsp; &nbsp;  
                            <?= Yii::t('progsoft', 'Logs') ?>
                        </a>
                              </li>
                        
                       
                        
                       

                        <?php endif; ?>
                       









       
       












                        <li  class="active">
                            <a href="#">
                                <i class="fa fa-menu-arrow pull-right"></i>

                                <i class="main-icon fa fa-gears"></i> <span>ماژول</span>
                            </a>
                            <ul><!-- submenus -->
                             
                               <?php foreach(Yii::$app->getModule('admin')->activeModules as $module) : ?>
                        <li>
                            <a href="<?= Url::to(["/admin/$module->name"]) ?>" class="menu-item <?= ($moduleName == $module->name ? 'active' : '') ?>">
                                 <?php if($module->icon != '') : ?>
                                <i class="glyphicon glyphicon-<?= $module->icon ?>"></i>
                            <?php endif; ?>
                              &nbsp;&nbsp;  &nbsp; &nbsp;                            
                              <?= $module->title ?>
                          <?php if($module->notice > 0) : ?>
                                <span class="badge"><?= $module->notice ?></span>
                            <?php endif; ?>
                        </a>
                        </li>
                          <?php endforeach; ?>
                             
                            </ul>
                        </li>
                    
                        
                    </ul>
                    
                </nav>

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



      
            <section id="middle">
                <div id="content" class="dashboard padding-20">
                    
                 <?= $content ?>
                </div>
            </section>
        

        </div>



    
        <!-- JAVASCRIPT FILES -->
        <script type="text/javascript">var plugin_path = '/plugins/';</script>
        

     
       <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>