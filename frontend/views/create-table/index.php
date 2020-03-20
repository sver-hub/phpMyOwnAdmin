<?php

/* @var $this yii\web\View
 * @var $available bool
 */

use yii\helpers\Html;

$this->title = 'Create Table';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="createTable-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::beginForm('/create-table/columns', 'post', ['autocomplete' => 'off' , 'class' => 'form-group']) ?>

    <label>
        Table Name
        <input name="table_name" required="required" class='form-input form-control'>
    </label>
    <br>
    <br>
    <label>
        Title
        <input name="title" required="required" class='form-input form-control'>
    </label>
    <br>
    <br>
    <label>
        Number of columns
        <input name="num_of_cols" type="number" min="1" value="1" class='form-input form-control'>
    </label>
    <br>
    <br>
    <label>
        Category
        <select name="category" class='form-input form-control'>
            <?php foreach ($categories as $category) {
                if ($category->id == 1) {
                    echo "<option value='$category->id'>no category</option>";
                    continue;
                }
                echo "<option value='$category->id'>$category->category_name</option>";
            }?>
        </select>
        <?= Html::a('New Category', "/edit-table/new/?id=5")?>
    </label>
    <br>
    <br>
    <?= Html::submitButton('Confirm', ['class' => 'btn btn-primary'])?>
    <?= Html::endForm() ?>

</div>
