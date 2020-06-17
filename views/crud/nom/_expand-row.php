<?php
/* Widget used when expanding a row. Shows foreign key data. */

use yii\widgets\DetailView;
/* @var $model The related model, a model instance. */

/* Using the base form provided by the controller,
 * use the base form with each suffix to create the full form.
 */

$suffix = [];
foreach ([
    'S', 'P'
] as $genre) {
    $suffix[$genre] = $relatedModel[$genre];
}

?>
<table class="table col-md-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Forme tronquée</th>
            <th scope="col"><?= $baseForm ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Masculin singulier</th>
            <td><?= $baseForm ?><strong><?= $suffix['S'] ?></strong></td>
        </tr>
        <tr>
            <th scope="row">Masculin pluriel</th>
            <td><?= $baseForm ?><strong><?= $suffix['P'] ?></strong></td>
        </tr>
    </tbody>
</table>