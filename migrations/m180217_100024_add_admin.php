<?php

use yii\db\Migration;

/**
 * Class m180217_100024_add_admin
 */
class m180217_100024_add_admin extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('users', [
            'id' => '1',
            'login' => 'admin',
            'password' => '$2y$13$LVxQBS4Zo7u8.jT/9d9CHetgyngNBWypDUWtMlX64/d24/RHJw91m',
            'admin' => '1',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('users', ['login' => 'admin']);
    }
}
