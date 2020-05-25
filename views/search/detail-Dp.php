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