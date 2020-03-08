<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sys_table}}`.
 */
class m200307_172334_create_sys_table_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sys_table}}', [
            'id' => $this->primaryKey(),
            'table_name' => $this->string(),
            'title' => $this->string(),
            'parent_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sys_table}}');
    }
}
