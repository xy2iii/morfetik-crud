<?php
/* Widget used when expanding a row. Shows foreign key data. */

use yii\widgets\DetailView;
/* @var $model The related model, a model instance. */

// https://www.php.net/manual/fr/function.array-unique.php#122857
function array_uunique(array $array, callable $comparator): array
{
    $unique_array = [];
    do {
        $element = array_shift($array);
        $unique_array[] = $element;

        $array = array_udiff(
            $array,
            [$element],
            $comparator
        );
    } while (count($array) > 0);

    return $unique_array;
}

function displayAdj($filteringCallback, $models)
{
    $comparator = function ($a, $b) {
        return $a->forme <=> $b->forme;
    };

    $formes = array_filter($models, $filteringCallback);
    $uniqueFormes = array_uunique($formes, $comparator);
    $formesString = array_map(function ($forme) {
        $str = $forme->forme;
        Yii::trace('before substr');
        if (mb_substr($str, -1) === '°') { // Forme rare
            Yii::trace('before substr check');
            $str = mb_substr($str, 0, -1); // Get every character except the last
            // Add a label marking this as a 'rare' form
            Yii::trace('after substr check');
            $str .= '<span class="badge badge-info ml-1">Rare</span>';
            return $str;
        } else {
            return $str;
        }
    }, $uniqueFormes);
    return join(' / ', $formesString);
}

$lemme = $models[0]; // Same for every row

$M_S = displayAdj(function ($forme) {
    return $forme->genre === 'M'
        && $forme->num === 'S';
}, $models);
$M_P = displayAdj(function ($forme) {
    return $forme->genre === 'M'
        && $forme->num === 'P';
}, $models);
$F_S = displayAdj(function ($forme) {
    return $forme->genre === 'F'
        && $forme->num === 'S';
}, $models);
$F_P = displayAdj(function ($forme) {
    return $forme->genre === 'F'
        && $forme->num === 'P';
}, $models);


?>
<div class="container-fluid">
    <div class="row">
        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><?= $lemme->lemme ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Masculin singulier</th>
                    <td><?= $M_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Masculin pluriel</th>
                    <td><?= $M_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Féminin singulier</th>
                    <td><?= $F_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Féminin pluriel</th>
                    <td><?= $F_P ?></td>
                </tr>
            </tbody>
        </table>

        <div class="col-md-8">
            <table class="table ml-1">
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