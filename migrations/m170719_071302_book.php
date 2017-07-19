<?php

use yii\db\Migration;

class m170719_071302_book extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%book}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(64)->notNull()->comment('书名'),
            'owner_id'=>$this->integer(11)->notNull()->comment('所属者'),
            'image'=>$this->string(64)->notNull()->comment('封面'),
            'author'=>$this->string(32)->notNull()->comment('作者'),
            'market_price'=>$this->decimal(10,2)->notNull()->comment('市场价格'),
            'now_user_id'=>$this->integer(11)->notNull()->comment('当前使用者'),

            'created_at'=>$this->integer(11)->notNull()->comment('生成时间'),
            'updated_at'=>$this->integer(11)->notNull()->comment('更新时间'),
        ]);
    }

    public function safeDown()
    {
        echo "m170719_071302_book cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170719_071302_book cannot be reverted.\n";

        return false;
    }
    */
}
