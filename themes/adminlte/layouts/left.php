<?php
use yii\bootstrap\Nav;
use yii\helpers\Url;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

         <ul class="sidebar-menu">
            

            <li class="header"><h5><div class="label label-default"> เมนู</div></h5></li>
            
          <?php if (!Yii::$app->user->isGuest) { ?>
            <li><a href="<?php echo Url::to(['patient/index']); ?>"><i class="fa fa-circle text-green"></i> <span> ผู้ป่วย</span> <small class="label pull-right bg-blue"></small></a> </li>
            <li><a href="<?php echo Url::to(['patient/create']); ?>"><i class="fa fa-circle text-aqua"></i> <span> เพิ่มผู้ป่วยรายใหม่</span><small class="label pull-right bg-red"></small></a></li>           
          <?php } ?>  
           
                <li><a href="<?php echo Url::to(['report/index']); ?>">
                        <i class="fa fa-circle text-orange"></i> <span> รายงาน HOSxP</span> 
                        <small class="label pull-right bg-aqua"></small></a>
                </li>
            
             
            
                  
        
        </ul>

    </section>

</aside>
