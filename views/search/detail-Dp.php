<?php
/* Widget used when expanding a row. Shows foreign key data. */

use yii\widgets\DetailView;
/* @var $model The related model, a model instance. */

$lemme = $models[0]; // Same for every row
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Forme</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Personne</th>
                        <th scope="col">Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($models as $forme) : ?>
                        <tr>
                            <td><?= $forme->forme ?></td>
                            <td><?= $forme->genre ?></td>
                            <td><?= $forme->num ?></td>
                            <td><?= $forme->person ?></td>
                            <td><?= $forme->notes ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Lemme</th>
                        <th scope="col">Ligature</th>
                        <th scope="col">Graphsav</th>
                        <th scope="col">Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b><?= $lemme->lemme ?></b> </td>
                        <td><?= $lemme->lig ?></td>
                        <td><?= $lemme->graphsav ?></td>
                        <td><?= $lemme->notes ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>