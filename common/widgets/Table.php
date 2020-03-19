<?php


namespace common\widgets;


use yii\bootstrap\Widget;


class Table extends Widget
{
    public $records; // array<Record>

    public function run()
    {
        $result = '<table><tr>';
        foreach ($this->records[0]->getKeys() as $key) {
            $result .= "<th scope=\"col\">$key</th>";
        }
        $result .= '</tr>';
        foreach ($this->records as $record) {
            $result .= '<tr>';
            foreach ($record->getKeys() as $key) {
                $result .= ('<td>' . ($record->$key ?? 'null') . '</td>');
            }
            $result .= '</tr>';
        }
        $result .= '</table>';

        return $result;
    }
}