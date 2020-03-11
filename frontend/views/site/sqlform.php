<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'SQL Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
        <?= HTml::beginForm()?>
        <?= Html::textarea('input_sql') . '<br>'?>
        <?= Html::button('Run') ?>
        <?= Html::button('Save')?>
        <?= Html::endForm()?>

</div>


