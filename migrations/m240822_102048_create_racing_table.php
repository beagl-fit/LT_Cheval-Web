<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%racing}}`.
 */
class m240822_102048_create_racing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%racing}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'state' => $this->string(4)->notNull(),
            'length' => $this->string(10)->notNull(),
            'horse' => $this->string(100)->notNull(),
            'url' => $this->string(2048)->Null(),
            'deleted' => $this->boolean()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%racing}}');
    }
}
