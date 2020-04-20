<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Adverbes</h1>
<ul>
    <?php foreach ($adverbes as $adverbe) :
    ?>
        <li>
            <?= Html::encode("{$adverbe->Lemme})") ?>
        </li>
    <?php endforeach;
    ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>