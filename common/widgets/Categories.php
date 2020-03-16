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
            if (empty($children)) {
                $result .= "<span>$category_name</span>";
            } else {
                $result .= "<button class=\"dropdown-btn\">$category_name<i class=\"fa fa-caret-down\"></i></button><div class=\"dropdown-container\">";
                foreach ($children as $child) {
                    $result .= Html::a($child['title'], '/tables/index/?id=' . $child['id']);
                }
                $result .=  "</div>";
            }
        }

        $result .= "</div>";
        return $result;
    }
}