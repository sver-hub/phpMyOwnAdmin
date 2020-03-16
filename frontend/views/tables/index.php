<?php

/* @var $this yii\web\View
 * @var $content array
 * @var $tables array
 */


use common\widgets\Table;
use yii\helpers\Html;

$this->title = 'Tables';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sidenav">
    <a href="#about">About</a>
    <a href="#services">Services</a>
    <a href="#clients">Clients</a>
    <a href="#contact">Contact</a>
    <button class="dropdown-btn">Dropdown
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
    </div>
    <a href="#contact">Search</a>
</div>
<div class="tables-index">
    <h1><?= Html::encode($this->title) ?></h1>



    <?php if (!is_null($tables)) {
        foreach ($tables as $table) {
            echo Table::widget(['table' => $table]);
        }
    } ?>
</div>