<?php


namespace common\widgets;


use yii\bootstrap\Widget;

class SQLTable extends Widget
{
    public $table;

    public function run()
    {
        $result = '<table><tr>';
        foreach ($this->table[0] as $key => $value) {
            $result .= "<th scope=\"col\">$key</th>";
        }
        $result .= '</tr>';
        foreach ($this->table as $entry) {
            $result .= '<tr>';
            foreach ($entry as $key => $value) {
                $result .= '<td>' . ($value ?? 'null') . '</td>';
            }
            $result .= '</tr>';
        }
        $result .= '</table>';

        return $result;
    }
}