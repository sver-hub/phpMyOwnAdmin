<?php

namespace src\Modules\Table\Infrastructure\Service;

use Yii;
use yii\db\Exception;

class SqlService
{

    public function run($sql) : bool
    {
        //$this->processSql($sql);
        try {
            print Yii::$app->db->createCommand($sql)->execute();
            Yii::$app->session->setFlash('success', 'Success!');
            return true;
        } catch (Exception $e) {
            Yii::$app->session->setFlash('error', 'Failure!  ' . $e->getMessage());
            return false;
        }
    }

    public function save($sql)
    {

    }

    private function processSql($sql)
    {
        $create_pattern = '/^CREATE TABLE/';
        $select_pattern = '/^SELECT/';
        $commands = explode(';', $sql);
        foreach ($commands as $command) {
            $command = trim($command);
            if (preg_match($create_pattern, $command)) {
                $table_name = preg_split('/( )+/', $command)[2];
            } else if (preg_match($select_pattern, $command)) {

            }
        }

    }

}