<?php


namespace common\widgets;


use yii\bootstrap\Widget;
use yii\helpers\Html;

class Categories extends Widget
{
    public $content;


    public function run()
    {
        $result = '<div class="sidenav">';
        foreach ($this->content as $category_name => $children) {
            $result .= "<button data-target='#$category_name-dropdown' data-toggle='hidden' class='dropdown-btn'
                            onclick='$(this.dataset.target).toggleClass(this.dataset.toggle)'>$category_name
                            </button><div class='dropdown-container hidden' id='$category_name-dropdown'>";
            foreach ($children as $child) {
                $result .= Html::a($child['title'], '/tables/index/?id=' . $child['id']);
            }
            $result .= "</div>";
        }

        $result .= Html::a('+', "/edit-table/new/?id=5") . "</div>";
        return $result;
    }
}