<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%horses}}`.
 */
class m240819_102938_create_horses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE {{%horses}} (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                image_name VARCHAR(50),
                birth DATE NOT NULL,
                owner VARCHAR(200) NOT NULL DEFAULT 'Lokotrans',
                status ENUM('foal', 'yearling', 'none') NOT NULL DEFAULT 'none',
                mare TINYINT(1) NOT NULL DEFAULT 0,
                father VARCHAR(100) NOT NULL,
                mother VARCHAR(100) NOT NULL,
                father_father VARCHAR(100) NOT NULL,
                father_mother VARCHAR(100) NOT NULL,
                mother_father VARCHAR(100) NOT NULL,
                mother_mother VARCHAR(100) NOT NULL,
                for_sale TINYINT(1) NOT NULL DEFAULT 0,
                url VARCHAR(2048),
                foals TEXT,
                covered_by VARCHAR(100),
                deleted TINYINT(1) NOT NULL DEFAULT 0,
                sex ENUM('M', 'F') NOT NULL
            )
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%horses}}');
    }
}
