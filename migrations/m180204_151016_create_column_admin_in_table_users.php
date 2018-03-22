<?php

use yii\db\Migration;

/**
 * Class m180204_151016_create_column_admin_in_table_users
 */
class m180204_151016_create_column_admin_in_table_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
         $this->addColumn('users', 'admin', 'enum("0", "1") not null default "0"');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'admin');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180204_151016_create_column_admin_in_table_users cannot be reverted.\n";

        return false;
    }
    */
}
