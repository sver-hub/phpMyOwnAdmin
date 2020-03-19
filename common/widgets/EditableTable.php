<?php




namespace common\widgets;

/* @var $columns SysColumn[]
 * @var $records Record[]
 */

use yii\bootstrap\Widget;
use src\Modules\Record\Domain\Entity\Record;
use src\Modules\SysTable\Domain\Entity\SysColumn;

class EditableTable extends Widget
{
    public $columns;
    public $records;


    public function run()
    {
        $result = "<div class='edit-table'><div class='edit-table-header'>";
        foreach ($this->columns as $column) {
            $result .= "<div class='edit-table-col'>$column->column_name</div>";
        }
        $result .= "</div><div class='edit-table-records'>";
        foreach ($this->records as $record) {
            $result .= "<div class='edit-table-row'>";
            foreach ($record->getAttributes() as $key => $value) {
                $result .= "<div class='edit-table-value'>$value</div>";
            }
            $result .= "</div>";
        }
        $result .= "</div></div>";

        return $result;
    }
}