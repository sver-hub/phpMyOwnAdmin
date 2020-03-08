<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sys_type}}`.
 */
class m200308_195623_create_sys_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sys_type}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sys_type}}');
    }
}
