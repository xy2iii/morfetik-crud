<?php
// All of these are sets. Join them with a separator to get the result string.
// We don't need to manage rare forms here, so logic is simpler.
$adj['MS'] = $adj['MS']->join(' / ');
$adj['MP'] = $adj['MP']->join(' / ');
$adj['FS'] = $adj['FS']->join(' / ');
$adj['FP'] = $adj['FP']->join(' / ');

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
                    <td><?= $adj['MS'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Masculin pluriel</th>
                    <td><?= $adj['MP'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Féminin singulier</th>
                    <td><?= $adj['FS'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Féminin pluriel</th>
                    <td><?= $adj['FP'] ?></td>
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