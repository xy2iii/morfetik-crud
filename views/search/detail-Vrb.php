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
?>


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
</div>