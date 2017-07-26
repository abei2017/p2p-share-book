<?php

use yii\db\Migration;

class m170723_043031_user extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user}}',[
            'id'=>$this->primaryKey(),
            'username'=>$this->string(32)->notNull()->comment('用户名'),
            'password'=>$this->string(60)->notNull()->comment('密码'),// Yii::$app->getSecurity()->generatePasswordHash()
            'phone'=>$this->string(11)->notNull()->unique()->comment('手机号码'),

            'created_at'=>$this->integer(11)->notNull()->comment('生成时间'),
            'updated_at'=>$this->integer(11)->notNull()->comment('更新时间'),
        ]);

        $this->createIndex('index_username','{{%user}}','username',true);
    }

    public function safeDown()
    {
        echo "m170723_043031_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170723_043031_user cannot be reverted.\n";

        return false;
    }
    */
}
