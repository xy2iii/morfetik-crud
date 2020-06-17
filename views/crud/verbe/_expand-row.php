<?php
/* Widget used when expanding a row. Shows foreign key data. */

use app\models\search\Forme;
use app\models\enums\Pronominal;
/* @var $model The related model, a model instance. */

/* Using the base form provided by the controller,
 * use the base form with each suffix to create the full form.
 */

$suffix = [];
foreach ([
    'Inf',
    'Indpr1S',
    'Indpr2S',
    'Indpr3S',
    'Indpr1P',
    'Indpr2P',
    'Indpr3P',
    'Indimp1S',
    'Indimp2S',
    'Indimp3S',
    'Indimp1P',
    'Indimp2P',
    'Indimp3P',
    'Indps1S',
    'Indps2S',
    'Indps3S',
    'Indps1P',
    'Indps2P',
    'Indps3P',
    'Indfut1S',
    'Indfut2S',
    'Indfut3S',
    'Indfut1P',
    'Indfut2P',
    'Indfut3P',
    'Condpr1S',
    'Condpr2S',
    'Condpr3S',
    'Condpr1P',
    'Condpr2P',
    'Condpr3P',
    'Subpr1S',
    'Subpr2S',
    'Subpr3S',
    'Subpr1P',
    'Subpr2P',
    'Subpr3P',
    'Subimp1S',
    'Subimp2S',
    'Subimp3S',
    'Subimp1P',
    'Subimp2P',
    'Subimp3P',
    'Imppr2S',
    'Imppr1P',
    'Imppr2P',
    'Ppres',
    'PpSM',
    'PpSF',
    'PpPM',
    'PpPF',
] as $genre) {
    $suffix[$genre] = $relatedModel[$genre];
}

$elision = Forme::isElision($model->Lemme);

$pronominalValue = $model->pronominal;
if ($pronominalValue === Pronominal::getValueByName('Non') || $pronominalValue === Pronominal::getValueByName('Peut-être?')) {
    $prono = [
        '1S' => '',
        '2S' => '',
        '3S' => '',
        '1P' => '',
        '2P' => '',
        '3P' => '',
    ];
} else if ($pronominalValue === Pronominal::getValueByName('Oui')) {
    if ($elision) {
        $prono = [
            '1S' => "m'",
            '2S' => "t'",
            '3S' => "s'",
            '1P' => "nous ",
            '2P' => "vous ",
            '3P' => "s'",
        ];
    } else {
        $prono = [
            '1S' => "me ",
            '2S' => "te ",
            '3S' => "se ",
            '1P' => "nous ",
            '2P' => "vous ",
            '3P' => "se ",
        ];
    }
} else if ($pronominalValue === Pronominal::getValueByName('Oui + non')) {
    if ($elision) {
        $prono = [
            '1S' => "(m') ",
            '2S' => "(t') ",
            '3S' => "(s') ",
            '1P' => "(nous) ",
            '2P' => "(vous) ",
            '3P' => "(s') ",
        ];
    } else {
        $prono = [
            '1S' => "(me) ",
            '2S' => "(te) ",
            '3S' => "(se) ",
            '1P' => "(nous) ",
            '2P' => "(vous) ",
            '3P' => "(se) ",
        ];
    }
}
$isPronominal = ($pronominalValue === Pronominal::getValueByName('Oui'));
$isBothFormsPronominal =  $pronominalValue === Pronominal::getValueByName('Oui + non');

if ($elision) {
    if ($isPronominal) {
        $firstPerson = 'Je';
    } else if ($isBothFormsPronominal) {
        $firstPerson = "J' (Je)";
    } else {
        $firstPerson = "J'";
    }
} else {
    $firstPerson = 'Je';
}
?>

<div class="row">
    <div class="col-md-4">
        <table class='table'>
            <thead class="thead-light">
                <tr>
                    <th scope="col">Infinitif</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $baseForm ?><strong><?= $suffix['Inf'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-8">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Forme tronquée</th>
                    <th scope="col"><?= $baseForm ?></th>
                </tr>
            </thead>
        </table>
    </div>

</div>

<div class="row">
    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Indicatif présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $firstPerson ?></th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indpr1S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indpr2S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indpr3S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indpr1P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indpr2P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indpr3P'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Indicatif imparfait</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $firstPerson ?></th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indimp1S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indimp2S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indimp3S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indimp1P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indimp2P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indimp3P'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Passé simple</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $firstPerson ?></th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indps1S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indps2S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indps3S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indps1P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indps2P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indps3P'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Indicatif futur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $firstPerson ?></th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indfut1S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indfut2S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indfut3S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indfut1P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indfut2P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Indfut3P'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Conditionnel présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $firstPerson ?></th>
                    <td><?= $baseForm ?><strong><?= $suffix['Condpr1S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Condpr2S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Condpr3S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Condpr1P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Condpr2P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Condpr3P'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Subjonctif présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $firstPerson ?></th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subpr1S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subpr2S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subpr3S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subpr1P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subpr2P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subpr3P'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Subjonctif imparfait</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $firstPerson ?></th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subimp1S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subimp2S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subimp3S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subimp1P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subimp2P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Subimp3P'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table">
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
                    <td><?= $baseForm ?><strong><?= $suffix['Imppr2S'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">1<sup>ème</sup> pluriel</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Imppr1P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">2<sup>ème</sup> pluriel</th>
                    <td><?= $baseForm ?><strong><?= $suffix['Imppr2P'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Participe présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $baseForm ?><strong><?= $suffix['Ppres'] ?></strong></td>
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
                    <th scope="row">Masculin</th>
                    <td><?= $baseForm ?><strong><?= $suffix['PpSM'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Féminin</th>
                    <td><?= $baseForm ?><strong><?= $suffix['PpSF'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Masculins</th>
                    <td><?= $baseForm ?><strong><?= $suffix['PpPM'] ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Féminins</th>
                    <td><?= $baseForm ?><strong><?= $suffix['PpPF'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>