<?php

use yii\db\Migration;

/**
 * Class m200308_200348_insert_sys_column_table
 */
class m200308_200348_insert_sys_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('sys_column', [
            'id' => 1,
            'column_name' => 'id',
            'table_id' => 1,
            'column_type_id' => 1,
        ]);

        $this->insert('sys_column', [
            'id' => 2,
            'column_name' => 'table_name',
            'table_id' => 1,
            'column_type_id' => 2,
        ]);

        $this->insert('sys_column', [
            'id' => 3,
            'column_name' => 'title',
            'table_id' => 1,
            'column_type_id' => 2,
        ]);

        $this->insert('sys_column', [
            'id' => 4,
            'column_name' => 'parent_id',
            'table_id' => 1,
            'column_type_id' => 1,
        ]);


        $this->insert('sys_column', [
            'id' => 5,
            'column_name' => 'id',
            'table_id' => 2,
            'column_type_id' => 1,
        ]);

        $this->insert('sys_column', [
            'id' => 6,
            'column_name' => 'column_name',
            'table_id' => 2,
            'column_type_id' => 2,
        ]);

        $this->insert('sys_column', [
            'id' => 7,
            'column_name' => 'table_id',
            'table_id' => 2,
            'reference_id' => 1,
            'column_type_id' => 1,
        ]);

        $this->insert('sys_column', [
            'id' => 8,
            'column_name' => 'reference_id',
            'table_id' => 2,
            'column_type_id' => 1,
        ]);

        $this->insert('sys_column', [
            'id' => 9,
            'column_name' => 'column_type',
            'table_id' => 2,
            'reference_id' => 3,
            'column_type_id' => 1,
        ]);


        $this->insert('sys_column', [
            'id' => 10,
            'column_name' => 'id',
            'table_id' => 3,
            'column_type_id' => 1,
        ]);

        $this->insert('sys_column', [
            'id' => 11,
            'column_name' => 'type',
            'table_id' => 3,
            'column_type_id' => 2,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m200308_200348_insert_sys_column_table cannot be reverted.\n";

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
        echo "m200308_200348_insert_sys_column_table cannot be reverted.\n";

        return false;
    }
    */
}
