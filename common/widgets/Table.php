<?php


namespace common\widgets;


use yii\bootstrap\Widget;

class Table extends Widget
{
    public $table;

    public function run()
    {
        $result = '<table><tr>';
        foreach ($this->table[0] as $key => $value) {
            $result = $result . "<th scope=\"col\">$key</th>";
        }
        $result = $result . '</tr>';
        foreach ($this->table as $entry) {
            $result = $result . '<tr>';
            foreach ($entry as $key => $value) {
                $result = $result . '<td>' . ($value ?? 'null') . '</td>';
            }
            $result = $result . '</tr>';
        }
        $result = $result . '</table>';

        return $result;
    }
}