<?php

/* @var $this yii\web\View */

use common\widgets\Alert;
use yii\helpers\Html;

$this->title = 'SQL Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= HTml::beginForm('/sql/submit') ?>
    <?= Html::textarea('input_sql', null, ['rows' => 10, 'cols' => 150, 'autofocus' => true]) . '<br>' ?>
    <?= Html::submitButton('Run', ['name' => 'run', 'class' => 'btn btn-primary']); ?>
    <?= Html::submitButton('Save', ['name' => 'save', 'class' => 'btn btn-primary']);?>
    <?= Html::endForm() ?>

</div>


