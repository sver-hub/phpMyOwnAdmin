<?php


namespace common\widgets;


use yii\bootstrap\Widget;

class ColumnInput extends Widget
{
    public $id;
    public $types;
    public $tables;

    public function run()
    {
        $result = "<div class='form-input-wrapper'><label class='form-label'>Param Name</label><input type='text' name='name$this->id' class='form-input form-control' required></div>";
        $result .= "<div class='form-input-wrapper'><label class='form-label'>Type</label><select class='form-input form-control' name=\"type$this->id\">";
        foreach ($this->types as $type) {
            $result .=  "<option value=\"$type->id\">$type->type</option>";
        }
        $result .= "</select></div><div class='form-input-wrapper'><label class='form-label'>Reference to another table</label><select class='form-input form-control' name=\"reference$this->id\">";
        $result .= "<option value=\"null\">null</option>";
        foreach ($this->tables as $table) {
            $result .= "<option value=\"$table->id\">$table->title</option>";
        }
        $result .= "</select></div>";


        return "<div class='form-row'>$result</div>";
    }
}


