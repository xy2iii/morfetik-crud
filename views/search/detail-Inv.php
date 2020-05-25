<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $lemme->lemme ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inv as $forme) : ?>
                        <tr>
                            <td><?= $forme ?></td>
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