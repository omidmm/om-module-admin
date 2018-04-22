<?php 

use yii\helpers\Url;
$moduleName = $this->context->module->id;
?>  


     <div class="page-sidebar-wrapper">
             
                <div class="page-sidebar navbar-collapse collapse">
                    
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                      

                            <li class="nav-item start ">
                                    <a href="<?= Url::to(['/admin/settings']) ?>" class="nav-link <?= ($moduleName == 'admin' && $this->context->id == 'settings') ? 'active' :'' ?>">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title"> <?= Yii::t('progsoft', 'Settings') ?> </span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="<?= Url::to(['/admin/system']) ?>" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title"> <?= Yii::t('progsoft', 'System') ?></span>
                                        
                                    </a>
                                </li>
                                  <li class="nav-item start ">
                                    <a href="<?= Url::to(['/admin/modules']) ?>"  class="nav-link ">
                                        <i class="glyphicon glyphicon-folder-close"></i>
                                        <span class="title"> <?= Yii::t('progsoft', 'Modules') ?></span>
                                        
                                    </a>
                                </li>
                               
                                 <li class="nav-item start ">
                                    <a href="<?= Url::to(['/admin/user/admin/index']) ?>" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title"> <?= Yii::t('progsoft', 'User Managment') ?></span>
                                        
                                    </a>
                                </li>
                                  <li class="nav-item start ">
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
                </div>
                <!-- END SIDEBAR -->
            </div>