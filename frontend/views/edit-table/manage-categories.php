<?php

/* @var $this yii\web\View
 * @var $tableId integer
 * @var $thisCategories SysCategory[]
 * @var $availableCategories SysCategory[]
 */


use src\Modules\SysTable\Domain\Entity\SysCategory;
use yii\helpers\Html;

$this->title = 'Manage Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="manage-categories">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php foreach ($thisCategories as $thisCategory) {
    echo "<div class='form-input-wrapper'><label class='form-label'>$thisCategory->category_name</label>";
    echo Html::a('delete', "/edit-table/remove-category/?id=$tableId&category=$thisCategory->id") . "</div>";
    }?>

    <?= Html::beginForm("/edit-table/add-category/?id=$tableId")?>
    <?= "<div class='form-input-wrapper'><label class='form-label'>Add Category
        </label><select class='form-input form-control' name='add-category'>"?>
    <?php foreach ($availableCategories as $availableCategory) {
        echo "<option value='$availableCategory->id'>$availableCategory->category_name</option>";
    }?>

    <?= "</select>" . Html::submitButton('Add') . "</div>"?>


</div>