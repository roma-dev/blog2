<?php

use yii\db\Migration;

/**
 * Class m180204_200819_create_table_posts
 */
class m180204_200819_create_table_posts extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
         $this->createTable('posts', [
            'id' => 'mediumint(5) not null auto_increment primary key',
            'title' => 'char(100) not null default "title"',
            'text' => 'text(1000)',
            'alias' => 'char(30) not null unique',
            'category_id' => 'smallint(3) not null',
        ]);

        $this->createIndex(
            'idx-post__category_id',
            'posts',
            'category_id'
        );

        $this->addForeignKey(
            'fk-posts__category_id',
            'posts',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'idx-post__category_id',
            'posts'
        );

        $this->dropIndex(
            'idx-post-author_id',
            'posts'
        );
        
        $this->dropTable('posts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180204_200819_create_table_posts cannot be reverted.\n";

        return false;
    }
    */
}
