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

function displayForme($filteringCallback, $models)
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

$Inf = displayForme(function ($forme) {
    return $forme->temps === 'Inf';
}, $models);

$IndPr_1_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-pr'
        && $forme->num === '1'
        && $forme->person === 'S';
}, $models);
$IndPr_2_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-pr'
        && $forme->num === '2'
        && $forme->person === 'S';
}, $models);
$IndPr_3_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-pr'
        && $forme->num === '3'
        && $forme->person === 'S';
}, $models);
$IndPr_1_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-pr'
        && $forme->num === '1'
        && $forme->person === 'P';
}, $models);
$IndPr_2_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-pr'
        && $forme->num === '2'
        && $forme->person === 'P';
}, $models);
$IndPr_3_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-pr'
        && $forme->num === '3'
        && $forme->person === 'P';
}, $models);

$IndImp_1_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-imp'
        && $forme->num === '1'
        && $forme->person === 'S';
}, $models);
$IndImp_2_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-imp'
        && $forme->num === '2'
        && $forme->person === 'S';
}, $models);
$IndImp_3_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-imp'
        && $forme->num === '3'
        && $forme->person === 'S';
}, $models);
$IndImp_1_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-imp'
        && $forme->num === '1'
        && $forme->person === 'P';
}, $models);
$IndImp_2_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-imp'
        && $forme->num === '2'
        && $forme->person === 'P';
}, $models);
$IndImp_3_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-imp'
        && $forme->num === '3'
        && $forme->person === 'P';
}, $models);

$IndPs_1_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-ps'
        && $forme->num === '1'
        && $forme->person === 'S';
}, $models);
$IndPs_2_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-ps'
        && $forme->num === '2'
        && $forme->person === 'S';
}, $models);
$IndPs_3_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-ps'
        && $forme->num === '3'
        && $forme->person === 'S';
}, $models);
$IndPs_1_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-ps'
        && $forme->num === '1'
        && $forme->person === 'P';
}, $models);
$IndPs_2_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-ps'
        && $forme->num === '2'
        && $forme->person === 'P';
}, $models);
$IndPs_3_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-ps'
        && $forme->num === '3'
        && $forme->person === 'P';
}, $models);

$IndFut_1_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-fut'
        && $forme->num === '1'
        && $forme->person === 'S';
}, $models);
$IndFut_2_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-fut'
        && $forme->num === '2'
        && $forme->person === 'S';
}, $models);
$IndFut_3_S = displayForme(function ($forme) {
    return $forme->temps === 'Ind-fut'
        && $forme->num === '3'
        && $forme->person === 'S';
}, $models);
$IndFut_1_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-fut'
        && $forme->num === '1'
        && $forme->person === 'P';
}, $models);
$IndFut_2_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-fut'
        && $forme->num === '2'
        && $forme->person === 'P';
}, $models);
$IndFut_3_P = displayForme(function ($forme) {
    return $forme->temps === 'Ind-fut'
        && $forme->num === '3'
        && $forme->person === 'P';
}, $models);

$CondPr_1_S = displayForme(function ($forme) {
    return $forme->temps === 'Cond-pr'
        && $forme->num === '1'
        && $forme->person === 'S';
}, $models);
$CondPr_2_S = displayForme(function ($forme) {
    return $forme->temps === 'Cond-pr'
        && $forme->num === '2'
        && $forme->person === 'S';
}, $models);
$CondPr_3_S = displayForme(function ($forme) {
    return $forme->temps === 'Cond-pr'
        && $forme->num === '3'
        && $forme->person === 'S';
}, $models);
$CondPr_1_P = displayForme(function ($forme) {
    return $forme->temps === 'Cond-pr'
        && $forme->num === '1'
        && $forme->person === 'P';
}, $models);
$CondPr_2_P = displayForme(function ($forme) {
    return $forme->temps === 'Cond-pr'
        && $forme->num === '2'
        && $forme->person === 'P';
}, $models);
$CondPr_3_P = displayForme(function ($forme) {
    return $forme->temps === 'Cond-pr'
        && $forme->num === '3'
        && $forme->person === 'P';
}, $models);

$SubPr_1_S = displayForme(function ($forme) {
    return $forme->temps === 'Sub-pr'
        && $forme->num === '1'
        && $forme->person === 'S';
}, $models);
$SubPr_2_S = displayForme(function ($forme) {
    return $forme->temps === 'Sub-pr'
        && $forme->num === '2'
        && $forme->person === 'S';
}, $models);
$SubPr_3_S = displayForme(function ($forme) {
    return $forme->temps === 'Sub-pr'
        && $forme->num === '3'
        && $forme->person === 'S';
}, $models);
$SubPr_1_P = displayForme(function ($forme) {
    return $forme->temps === 'Sub-pr'
        && $forme->num === '1'
        && $forme->person === 'P';
}, $models);
$SubPr_2_P = displayForme(function ($forme) {
    return $forme->temps === 'Sub-pr'
        && $forme->num === '2'
        && $forme->person === 'P';
}, $models);
$SubPr_3_P = displayForme(function ($forme) {
    return $forme->temps === 'Sub-pr'
        && $forme->num === '3'
        && $forme->person === 'P';
}, $models);


$SubImp_1_S = displayForme(function ($forme) {
    return $forme->temps === 'Sub-imp'
        && $forme->num === '1'
        && $forme->person === 'S';
}, $models);
$SubImp_2_S = displayForme(function ($forme) {
    return $forme->temps === 'Sub-imp'
        && $forme->num === '2'
        && $forme->person === 'S';
}, $models);
$SubImp_3_S = displayForme(function ($forme) {
    return $forme->temps === 'Sub-imp'
        && $forme->num === '3'
        && $forme->person === 'S';
}, $models);
$SubImp_1_P = displayForme(function ($forme) {
    return $forme->temps === 'Sub-imp'
        && $forme->num === '1'
        && $forme->person === 'P';
}, $models);
$SubImp_2_P = displayForme(function ($forme) {
    return $forme->temps === 'Sub-imp'
        && $forme->num === '2'
        && $forme->person === 'P';
}, $models);
$SubImp_3_P = displayForme(function ($forme) {
    return $forme->temps === 'Sub-imp'
        && $forme->num === '3'
        && $forme->person === 'P';
}, $models);

$Ppres = displayForme(function ($forme) {
    return $forme->temps === 'Ppres';
}, $models);
?>
<div class="container-fluid">
    <div class="row">
        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Lemme</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b><?= $Inf ?></b></td>
                </tr>
            </tbody>
        </table>
        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Infinitif</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $Inf ?></td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="row">
        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Indicatif présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Je</th>
                    <td><?= $IndPr_1_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $IndPr_2_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle</th>
                    <td><?= $IndPr_3_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $IndPr_1_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $IndPr_2_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $IndPr_3_P ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Indicatif imparfait</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Je</th>
                    <td><?= $IndImp_1_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $IndImp_2_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle</th>
                    <td><?= $IndImp_3_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $IndImp_1_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $IndImp_2_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $IndImp_3_P ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Passé simple</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Je</th>
                    <td><?= $IndPs_1_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $IndPs_2_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle</th>
                    <td><?= $IndPs_3_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $IndPs_1_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $IndPs_2_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $IndPs_3_P ?></td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="row">
        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Indicatif futur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Je</th>
                    <td><?= $IndFut_1_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $IndFut_2_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle</th>
                    <td><?= $IndFut_3_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $IndFut_1_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $IndFut_2_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $IndFut_3_P ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Conditionel présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Je</th>
                    <td><?= $CondPr_1_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $CondPr_2_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle</th>
                    <td><?= $CondPr_3_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $CondPr_1_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $CondPr_2_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $CondPr_3_P ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Subjonctif présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Je</th>
                    <td><?= $SubPr_1_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $SubPr_2_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle</th>
                    <td><?= $SubPr_3_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $SubPr_1_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $SubPr_2_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $SubPr_3_P ?></td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="row">
        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Subjonctif imparfait</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Je</th>
                    <td><?= $SubImp_1_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $SubImp_2_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle</th>
                    <td><?= $SubImp_3_S ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $SubImp_1_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $SubImp_2_P ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $SubImp_3_P ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Impératif présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">2<sup>ème</sup> singulier</th>
                    <td><?= $SubPr_2_S ?></td>
                </tr>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">1<sup>ème</sup> pluriel</th>
                    <td><?= $SubPr_1_P ?></td>
                </tr>
                <tr>
                    <th scope="row">2<sup>ème</sup> pluriel</th>
                    <td><?= $SubPr_2_P ?></td>
                </tr>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="col-md-4">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Participe présent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $Ppres ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Participe passé</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Masculin</td>
                        <td><?= $Ppres ?></td>
                    </tr>
                    <tr>
                        <td>Féminin</td>
                        <td><?= $Ppres ?></td>
                    </tr>
                    <tr>
                        <td>Masculins</td>
                        <td><?= $Ppres ?></td>
                    </tr>
                    <tr>
                        <td>Féminins</td>
                        <td><?= $Ppres ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>