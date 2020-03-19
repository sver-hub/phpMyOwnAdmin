<?php


namespace common\widgets;

/* @var $record Record */

use src\Modules\Record\Domain\Entity\Record;
use yii\bootstrap\Widget;
use yii\helpers\Html;


class EditableRow extends Widget
{
    public $index;
    public $record;

    public function run()
    {
        $result = "<div class='form-row'>";
        foreach ($this->record->getAttributes() as $key => $value) {
            $result .= "<div class='form-input-wrapper'>";

            if ($key == 'id') {
                $result .= "<input type='text' name='$key $this->index' class='form-input form-control' value='$value' readonly></div>";
            } else if ($value === null) {
                $result .= "<input type='text' name='$key $this->index' class='form-input form-control' placeholder='null'></div>";
            } else {
                $result .= "<input type='text' name='$key $this->index' class='form-input form-control' value='$value'></div>";
            }

        }
        $id = $this->record->id;
        $tableName = $this->record->tableName;
        $result .= Html::a('delete', "/edit-table/delete/?id=$id&tableName=$tableName") . "</div>";

        return $result;
    }
}