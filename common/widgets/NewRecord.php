<?php


namespace common\widgets;


use yii\bootstrap\Widget;
use yii\helpers\Html;

class NewRecord extends Widget
{
    public $columns;

    public function run()
    {
        $result = "";
        foreach ($this->columns as $column) {
            if ($column->column_name == 'id') {
                $result .= Html::hiddenInput("$column->column_name");
                continue;
                $result .= "<div class='form-input-wrapper'><label class='form-label'>$column->column_name</label><input type='text' name='$column->column_name' class='form-input form-control' readonly></div>";
            } else {
                $result .= "<div class='form-input-wrapper'><label class='form-label'>$column->column_name</label><input type='text' name='$column->column_name' class='form-input form-control'></div>";
            }
        }


        return "<div class='form-row'>$result</div>";
    }

}