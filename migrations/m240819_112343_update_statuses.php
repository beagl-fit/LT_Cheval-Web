<?php

use yii\db\Migration;

/**
 * Class m240819_112343_update_statuses
 */
class m240819_112343_update_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->update('{{%horses}}', ['status' => 'yearling'], ['status' => 'foal']);
        $this->update('{{%horses}}', ['status' => 'none'], ['status' => 'yearling']);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
    }
}
