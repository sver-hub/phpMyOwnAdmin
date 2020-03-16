<?php

namespace src\Modules\SysTable\Infrastructure\Service;

use src\Modules\SysTable\Domain\Entity\SysSqlCommand;
use src\Modules\SysTable\Domain\Entity\SysTable;
use src\Modules\SysTable\Infrastructure\Repository\SysSqlCommandRepository;
use src\Modules\SysTable\Infrastructure\Repository\SysTableRepository;
use Yii;
use yii\db\Exception;

class SqlService
{
    private $sysSqlCommandRepository;
    private $sysTableRepository;

    public function __construct(SysSqlCommandRepository $sysSqlCommandRepository, SysTableRepository $sysTableRepository)
    {
        $this->sysSqlCommandRepository = $sysSqlCommandRepository;
        $this->sysTableRepository = $sysTableRepository;
    }

    public function run($sql)
    {
        $commands = $this->processSql($sql);
        $queries = [];
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($commands as $command) {
                if ($command['type'] == 'create') {
                    $sysTable = new SysTable();
                    $sysTable->table_name = $command['table_name'];
                    $this->sysTableRepository->save($sysTable);

                    Yii::$app->db->createCommand($command['command'])->execute();
                } else if ($command['type'] == 'select') {
                    $queries[] = Yii::$app->db->createCommand($command['command'])->queryAll();
                } else if ($command['type'] == 'other') {
                    Yii::$app->db->createCommand($command['command'])->execute();
                }
            }
            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Success!');

            if (!empty($queries)) {
                return $queries;
            } else {
                return true;
            }

        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', 'Failure!  ' . $e->getMessage());

            return false;
        }
    }

    public function save($sql) : bool
    {
        $sqlCommand = new SysSqlCommand();
        $sqlCommand->command = $sql;

        try {
            $this->sysSqlCommandRepository->save($sqlCommand);
            Yii::$app->session->setFlash('success', 'Command successfully saved!');

            return true;
        } catch (Exception $exception) {
            Yii::$app->session->setFlash('error', 'Error occurred during saving...');

            return false;
        }
    }

    private function processSql($sql)
    {
        $create_pattern = '/^CREATE TABLE/';
        $select_pattern = '/^SELECT/';

        $commands = [];
        $lines = explode(';', $sql);
        foreach ($lines as $line) {
            $line = trim($line);
            if (preg_match($create_pattern, $line)) {
                $table_name = preg_split('/( )+/', $line)[2];
                $commands[] = ['command' => $line, 'table_name' => $table_name, 'type' => 'create'];
            } else if (preg_match($select_pattern, $line)) {
                $commands[] = ['command' => $line, 'type' => 'select'];
            } else if (preg_match('/( )*/', $line)) {
                continue;
            } else {
                $commands[] = ['command' => $line, 'type' => 'other'];
            }
        }

        return $commands;
    }

}