<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sys_column}}`.
 */
class m200308_194905_create_sys_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sys_column}}', [
            'id' => $this->primaryKey(),
            'column_name' => $this->string(),
            'table_id' => $this->integer(),
            'reference_id' => $this->integer(),
            'column_type_id' => $this->integer(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sys_column}}');
    }
}
