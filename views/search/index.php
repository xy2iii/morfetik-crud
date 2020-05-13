<?php
/* @var $this yii\web\View */

use yii\widgets\Pjax;
use yii\form\ActiveForm;
?>
<h1>search/search/index</h1>

<pre>
    <?php
    $res = $model::findAll(['lemme' => 'abjectement']);
    foreach ($res as $r) {
        echo $r->primaryCategory;
        echo PHP_EOL;
    }
    ?>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='fas fa-search'></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Rechercher</button>
        </div>
  </div>
</pre>