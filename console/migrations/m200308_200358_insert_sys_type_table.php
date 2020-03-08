<?php

use yii\db\Migration;

/**
 * Class m200308_200358_insert_sys_type_table
 */
class m200308_200358_insert_sys_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $types = ['int', 'varchar', 'text', 'bool', 'date', 'datetime','timestamp', 'json', 'jsonb'];
        $id = 1;
        foreach ($types as $type) {
            $this->execute("INSERT INTO sys_type VALUES ($id, '$type');");
            $id++;
        }
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m200308_200358_insert_sys_type_table cannot be reverted.\n";

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
        echo "m200308_200358_insert_sys_type_table cannot be reverted.\n";

        return false;
    }
    */
}
