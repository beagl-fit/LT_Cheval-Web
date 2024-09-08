<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carousel}}`.
 */
class m240824_090126_create_carousel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%carousel}}', [
            'id' => $this->primaryKey(),
            'image_name' => $this->string(50),
        ]);

        $this->batchInsert('{{%carousel}}', ['image_name'], [
            ['carousel_1.jpg'],
            ['carousel_2.jpg'],
            ['carousel_3.jpg'],
            ['carousel_4.jpg'],
            ['carousel_5.jpg'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%carousel}}');
    }
}
