<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180204_085843_create_table_users
 */
class m180204_085843_create_table_users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => 'smallint(3) not null auto_increment primary key',
            'login' => 'char(30) not null unique',
            'password' => 'char(60) not null'
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
