<?php

use yii\db\Migration;

/**
 * Class m180204_185332_create_table_categories
 */
class m180204_185332_create_table_categories extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => 'smallint(3) not null auto_increment primary key',
            'title' => 'char(30) not null',
            'alias' => 'char(45) not null unique'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180204_185332_create_table_categories cannot be reverted.\n";

        return false;
    }
    */
}
