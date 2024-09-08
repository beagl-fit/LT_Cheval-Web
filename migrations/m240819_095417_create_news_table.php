<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m240819_095417_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'image_name' => $this->string(50),

            'header_cs' => $this->string(50)->notNull(),
            'header_en' => $this->string(50)->notNull(),
            'header_fr' => $this->string(50)->notNull(),

            'body_cs' => $this->string(1000)->notNull(),
            'body_en' => $this->string(1000)->notNull(),
            'body_fr' => $this->string(1000)->notNull(),

            'url' => $this->string(2048),
            'deleted' => $this->boolean()->defaultValue(false)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
