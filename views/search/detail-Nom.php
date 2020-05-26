<?php
// All of these are sets. Join them with a separator to get the result string.
// We don't need to manage rare forms here, so logic is simpler.
$nom['MS'] = $nom['MS']->join(' / ');
$nom['MP'] = $nom['MP']->join(' / ');
$nom['FS'] = $nom['FS']->join(' / ');
$nom['FP'] = $nom['FP']->join(' / ');
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
                <?php if ($nom['MS'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin singulier</th>
                        <td><?= $nom['MS'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($nom['MP'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin pluriel</th>
                        <td><?= $nom['MP'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($nom['FS'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin singulier</th>
                        <td><?= $nom['FS'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($nom['FP'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin pluriel</th>
                        <td><?= $nom['FP'] ?></td>
                    </tr>
                <?php endif; ?>
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