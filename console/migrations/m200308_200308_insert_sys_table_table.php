<?php

use yii\db\Migration;

/**
 * Class m200308_200308_insert_sys_table_table
 */
class m200308_200308_insert_sys_table_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('sys_table', [
            'table_name' => 'sys_table',
            'title' => 'System Table'
        ]);

        $this->insert('sys_table', [
            'table_name' => 'sys_column',
            'title' => 'System Column'
        ]);

        $this->insert('sys_table', [
            'table_name' => 'sys_type',
            'title' => 'System Type'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m200308_200308_insert_sys_table_table cannot be reverted.\n";

        //return false;
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200308_200308_insert_sys_table_table cannot be reverted.\n";

        return false;
    }
    */
}
