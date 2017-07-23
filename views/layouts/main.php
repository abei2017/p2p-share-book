<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?>-<?= Yii::$app->name;?></title>
    <?php $this->head() ?>
    <script type="text/javascript">
        layui.config({
            base: '/js/modules/' //你的模块目录
        })
    </script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <ul class="layui-nav" lay-filter="">
        <li class="layui-nav-item layui-this"><a href="">首页</a></li>
        <li class="layui-nav-item"><a href="">书架</a></li>
        <li class="layui-nav-item"><a href="">读后感</a></li>
        <li class="layui-nav-item "><a href="">我要加入</a></li>
        <li class="layui-nav-item" style="float:right;"><a href="<?= Url::to(['/site/login']);?>">登录 / 注册</a></li>
    </ul>
    <div class="container">
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
<script type="text/javascript">
    layui.use('element', function(){
        var element = layui.element();
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
