<?php

/**
 * Transform the sets to strings.
 * Will append a label if the forme is rare,
 * meaning has a ° at the end.
 * We need to check every single forme for this.
 */
function transform($tempsArray)
{
    foreach ($tempsArray as $personne => $formes) {
        // Using a set removed duplicates in the controller.
        //  We no longer need it here, so use an array for easier processing.
        $arr = $formes->toArray();
        $tempsArray[$personne] = transform_each($arr);
    }
    return $tempsArray;
}
function transform_each($arr)
{
    // For each forme, check if it is a rare forme.
    foreach ($arr as $k => $v) {
        if (mb_substr($v, -1) === '°') {
            $new = mb_substr($v, 0, -1);
            // Add a label marking this as a 'rare' form
            $new .= '<span class="badge badge-info ml-1">Rare</span>';

            $arr[$k] = $new;
        }
    }
    // Convert to a string. We display all the different formes.
    return implode(' / ', $arr);
}

// A different transform for Inf, since it has one forme.
$vrb['Inf'] = transform_each($vrb['Inf']->toArray());
$vrb['Ind-pr'] = transform($vrb['Ind-pr']);
$vrb['Ind-imp'] = transform($vrb['Ind-imp']);
$vrb['Ind-ps'] = transform($vrb['Ind-ps']);
$vrb['Ind-fut'] = transform($vrb['Ind-fut']);
$vrb['Cond-pr'] = transform($vrb['Cond-pr']);
$vrb['Sub-pr'] = transform($vrb['Sub-pr']);
$vrb['Sub-imp'] = transform($vrb['Sub-imp']);
$vrb['Imp-pr'] = transform($vrb['Imp-pr']);
$vrb['Ppres'] = transform_each($vrb['Ppres']->toArray());
$vrb['Pp'] = transform($vrb['Pp']);
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
                    <td><?= $vrb['Inf'] ?></td>
                </tr>
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
                    <th scope="row">Je</th>
                    <td><?= $vrb['Ind-pr']['1S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $vrb['Ind-pr']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $vrb['Ind-pr']['3S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $vrb['Ind-pr']['1P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $vrb['Ind-pr']['2P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $vrb['Ind-pr']['3P'] ?></td>
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
                    <th scope="row">Je</th>
                    <td><?= $vrb['Ind-imp']['1S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $vrb['Ind-imp']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $vrb['Ind-imp']['3S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $vrb['Ind-imp']['1P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $vrb['Ind-imp']['2P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $vrb['Ind-imp']['3P'] ?></td>
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
                    <th scope="row">Je</th>
                    <td><?= $vrb['Ind-ps']['1S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $vrb['Ind-ps']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $vrb['Ind-ps']['3S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $vrb['Ind-ps']['1P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $vrb['Ind-ps']['2P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $vrb['Ind-ps']['3P'] ?></td>
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
                    <th scope="row">Je</th>
                    <td><?= $vrb['Ind-fut']['1S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $vrb['Ind-fut']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $vrb['Ind-fut']['3S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $vrb['Ind-fut']['1P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $vrb['Ind-fut']['2P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $vrb['Ind-fut']['3P'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Conditionel présent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Je</th>
                    <td><?= $vrb['Cond-pr']['1S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $vrb['Cond-pr']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $vrb['Cond-pr']['3S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $vrb['Cond-pr']['1P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $vrb['Cond-pr']['2P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $vrb['Cond-pr']['3P'] ?></td>
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
                    <th scope="row">Je</th>
                    <td><?= $vrb['Sub-pr']['1S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $vrb['Sub-pr']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $vrb['Sub-pr']['3S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $vrb['Sub-pr']['1P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $vrb['Sub-pr']['2P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $vrb['Sub-pr']['3P'] ?></td>
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
                    <th scope="row">Je</th>
                    <td><?= $vrb['Sub-imp']['1S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Tu</th>
                    <td><?= $vrb['Sub-imp']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Il / Elle / On</th>
                    <td><?= $vrb['Sub-imp']['3S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nous</th>
                    <td><?= $vrb['Sub-imp']['1P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Vous</th>
                    <td><?= $vrb['Sub-imp']['2P'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Ils / Elles</th>
                    <td><?= $vrb['Sub-imp']['3P'] ?></td>
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
                    <td><?= $vrb['Imp-pr']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">1<sup>ème</sup> pluriel</th>
                    <td><?= $vrb['Imp-pr']['2S'] ?></td>
                </tr>
                <tr>
                    <th scope="row">2<sup>ème</sup> pluriel</th>
                    <td><?= $vrb['Imp-pr']['2S'] ?></td>
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
                    <td><?= $vrb['Ppres'] ?></td>
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
                    <td><?= $vrb['Pp']['MS'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Féminin</th>
                    <td><?= $vrb['Pp']['FS'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Masculins</th>
                    <td><?= $vrb['Pp']['MP'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Féminins</th>
                    <td><?= $vrb['Pp']['FP'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>