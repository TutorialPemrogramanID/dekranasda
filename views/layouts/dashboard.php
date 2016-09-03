<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\widgets\SideNav;
use yii\web\AssetBundle;
use mdm\admin\components\Helper;



 $this->title = 'Dashboard';

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>

<div class="wrap">
     <header style="background:#e34d5a;">
        
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Url::to('/'); ?>">Kawal SDA</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">


                        

                        <?php if (!Yii::$app->user->isGuest) { ;?>

                                <li><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?= Yii::$app->user->identity->username;?> <span class="caret"></span></a>
                                    <ul id="w3" class="dropdown-menu pull-right" style="background:#fff; width:150px;">
                                            <li><a href="/user/settings/account" tabindex="-1">Profile</a></li>
                                            <li><a href="/user/logout" data-method="post" tabindex="-1">Logout (<?= Yii::$app->user->identity->username;?>)</a></li>
                                    </ul>
                                </li>

                        <?php }; ?>

                    </ul>

                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div class="searching">
                <div class="input-group col-xs-12 pull-right" style="padding-top:5px;padding-bottom:5px;">
                  <input type="text" class="form-control" style="border-radius:0px;" placeholder="Masukan Judul Artikel...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" style="border-radius:0px;" type="button"><span class="glyphicon glyphicon-search"></span></button>
                  </span>
                </div>

            </div>
        </div> -->
    </header>
    <!-- end header -->
    <div class="container" style="margin-top:20px;">

        <?php if ( Url::current() !== '/web/user/login' && Url::current() !== '/web/user/register' && Url::current() !== '/web/user/settings/account' && Url::current() !== '/web/user/settings/profile' &&  Url::current() !== '/web/user/forgot' && Url::current() !== '/web/user/resend') { ?>  <!-- Tidak Menampilkan sidebar pada menu login dan register -->
            <div class="row">
                <div class="col-md-3">
                   <?php
                        if (Yii::$app->user->isGuest) {

                            echo "";
                        }else{ 

                        $menuSidebar = [
                            [
                                'url' => ['/dashboard/index/'],
                                'label' => Yii::t('app','Dashboard'),
                                'icon' => 'cog',
                                'active' => (Yii::$app->controller->id === 'dashboard')
                            ],
                        ];
    
                        

                        $menuSidebar[] = [
                            'url' => ['/user/admin'],
                            'label' => Yii::t('app','User'),
                            'icon' => 'user',
                            'active' => (Yii::$app->controller->id === 'admin' || Yii::$app->controller->id === 'id')
                        ];

                        
                        // $menuSidebar = Helper::filter($menuSidebar);
                        echo SideNav::widget([
                            'type' => SideNav::TYPE_DEFAULT,
                            'encodeLabels' => false,
                            'heading' => Yii::t('app','Dashboard'),
                            'items' => $menuSidebar
                        ]);
                    }
                    ?>
                </div>
    
                <div class="col-md-9">
                    <?= $content ?>
                </div>
            </div>
        <?php } else { ?>
            <?= $content ?>
        <?php } ?>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Dekranasda DKI Jakarta <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
