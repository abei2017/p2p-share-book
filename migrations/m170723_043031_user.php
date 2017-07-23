<?php

use yii\db\Migration;

class m170723_043031_user extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user}}',[
            'id'=>$this->primaryKey(),
            'open_id'=>$this->string(36)->notNull()->comment('微信OPENID'),

            'created_at'=>$this->integer(11)->notNull()->comment('生成时间'),
            'updated_at'=>$this->integer(11)->notNull()->comment('更新时间'),
        ]);
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
