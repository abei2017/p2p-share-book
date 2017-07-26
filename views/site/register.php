<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '注册为新会员';
?>
<div class="site-register">
    <?php $form = ActiveForm::begin([
        'id'=>'Form',
        'enableClientValidation'=>false,
        'action'=>'javascript:;',
        'enableClientScript'=>false,
        'options'=>[
            'class'=>'layui-form'
        ],
        'fieldConfig'=>[
            'options'=>['class'=>'layui-form-item']
        ]
    ]);?>
    <div class="register">
        <h1>我要注册</h1>
        <?= $form->field($model,'username')->textInput(['class'=>'layui-input','placeholder'=>'用户名'])->label(false);?>
        <?= $form->field($model,'phone')->textInput(['class'=>'layui-input','placeholder'=>'手机号码'])->label(false);?>
        <?= $form->field($model,'password')->passwordInput(['class'=>'layui-input','placeholder'=>'注册密码'])->label(false);?>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button id="actBtn" data-url="<?= Url::to(['/site/register']);?>" class="layui-btn layui-btn-big layui-btn-danger" lay-submit lay-filter="formDemo">注册为新会员</button>
            </div>
        </div>
    </div>
    <?php ActiveForm::end();?>
</div>

<script type="text/javascript">
    layui.use('user', function(){
        var user = layui.user;

        user.register();
    });
</script>
