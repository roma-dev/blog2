<?php

use yii\db\Migration;

/**
 * Class m180217_100531_insert_to_table_categories
 */
class m180217_100531_insert_to_table_categories extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('categories', [
            'id' => null,
            'title' => 'Сео-продвжиение',
            'alias' => 'seo-prodvijenie',       
        ]);
        
        $this->insert('categories', [
            'id' => null,
            'title' => 'Контекстная реклама',
            'alias' => 'kontekstnaya-reklama',       
        ]);
        
        $this->insert('categories', [
            'id' => null,
            'title' => 'Веб-программирование',
            'alias' => 'web-programirovanie',       
        ]);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('categories', ['alias' => 'web-programirovanie']);
        $this->delete('categories', ['alias' => 'kontekstnaya-reklama']);
        $this->delete('categories', ['alias' => 'seo-prodvijenie']);
    }
}
