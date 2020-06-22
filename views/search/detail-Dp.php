<?php
// All of these are sets. Join them with a separator to get the result string.
// We don't need to manage rare forms here, so logic is simpler.
foreach ([
    'Vide',
    'S', 'P', 'M', 'F', 'MS', 'FS', 'MP', 'FP',
    'S1', 'S2', 'S3', 'P1', 'P2', 'P3',
    'MS1', 'MS2', 'MS3', 'MP1', 'MP2', 'MP3',
    'FS1', 'FS2', 'FS3', 'FP1', 'FP2', 'FP3',
] as $genre) {
    $dp[$genre] = $dp[$genre]->join(' / ');
}

?><div class="container-fluid">
    <div class="row">
        <table class="table col-md-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><?= $lemme->lemme ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($dp['Vide'] !== '') : ?>
                    <tr>
                        <th scope="row">Mot</th>
                        <td><?= $dp['Vide'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['S'] !== '') : ?>
                    <tr>
                        <th scope="row">Singulier</th>
                        <td><?= $dp['S'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['P'] !== '') : ?>
                    <tr>
                        <th scope="row">Pluriel</th>
                        <td><?= $dp['P'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['M'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin</th>
                        <td><?= $dp['M'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['F'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin</th>
                        <td><?= $dp['F'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['MS'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin singulier</th>
                        <td><?= $dp['MS'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['MP'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin pluriel</th>
                        <td><?= $dp['MP'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['FS'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin singulier</th>
                        <td><?= $dp['FS'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['FP'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin pluriel</th>
                        <td><?= $dp['FP'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['S1'] !== '') : ?>
                    <tr>
                        <th scope="row">Singulier (1<sup>ère</sup> personne)</th>
                        <td><?= $dp['S1'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['S2'] !== '') : ?>
                    <tr>
                        <th scope="row">Singulier (2<sup>ème</sup> personne)</th>
                        <td><?= $dp['S2'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['S3'] !== '') : ?>
                    <tr>
                        <th scope="row">Singulier (3<sup>ème</sup> personne)</th>
                        <td><?= $dp['S3'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['P1'] !== '') : ?>
                    <tr>
                        <th scope="row">Pluriel (1<sup>ère</sup> personne)</th>
                        <td><?= $dp['P1'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['P2'] !== '') : ?>
                    <tr>
                        <th scope="row">Pluriel (2<sup>ème</sup> personne)</th>
                        <td><?= $dp['P2'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['P3'] !== '') : ?>
                    <tr>
                        <th scope="row">Pluriel (3<sup>ème</sup> personne)</th>
                        <td><?= $dp['P3'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['MS1'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin singulier (1<sup>ère</sup> personne)</th>
                        <td><?= $dp['MS1'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['MS2'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin singulier (2<sup>ème</sup> personne)</th>
                        <td><?= $dp['MS2'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['MS3'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin singulier (3<sup>ème</sup> personne)</th>
                        <td><?= $dp['MS3'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['MP1'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin pluriel (1<sup>ère</sup> personne)</th>
                        <td><?= $dp['MP1'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['MP2'] !== '') : ?>
                    <tr>
                        <th scope="row">Masculin pluriel (2<sup>ème</sup> personne)</th>
                        <td><?= $dp['MP2'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['MP3'] !== '') : ?>
                    <tr>
                        <th scope="row">Masuclin pluriel (3<sup>ème</sup> personne)</th>
                        <td><?= $dp['MP3'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['FS1'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin singulier (1<sup>ère</sup> personne)</th>
                        <td><?= $dp['FS1'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['FS2'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin singulier (2<sup>ème</sup> personne)</th>
                        <td><?= $dp['FS2'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['FS3'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin singulier (3<sup>ème</sup> personne)</th>
                        <td><?= $dp['FS3'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['FP1'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin pluriel (1<sup>ère</sup> personne)</th>
                        <td><?= $dp['FP1'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['FP2'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin pluriel (2<sup>ème</sup> personne)</th>
                        <td><?= $dp['FP2'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($dp['FP3'] !== '') : ?>
                    <tr>
                        <th scope="row">Féminin pluriel (3<sup>ème</sup> personne)</th>
                        <td><?= $dp['FP3'] ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="col-md-8">
            <table class="table ml-1">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Lemme</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Variante</th>
                        <th scope="col">Informations sémantiques</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b><?= $lemme->lemme ?></b> </td>
                        <td><?= $lemme->notes ?></td>
                        <td><?= $lemme->variante ?></td>
                        <td><?= $lemme->infos ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>