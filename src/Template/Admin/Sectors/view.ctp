
<div class="sectors view large-9 medium-8 columns content">
    <h5 class="page-header"><?= h($sector->name) ?></h5>
    <table class="vertical-table">
        <tr>
            <th scope="row">NOM DU SECTEUR</th>
            <td><?= h($sector->name) ?></td>
        </tr>

    </table>
    <div class="related">
       <h6>Liste des produits et services de ce secteur</h6>
        <?php if (!empty($sector->produits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>

                <th scope="col">NOM</th>

                <th scope="col">EST-CE UN SERVICE ?</th>

            </tr>
            <?php foreach ($sector->produits as $produits): ?>
            <tr>
                <td><?= h($produits->name) ?></td>
                <td><?= $produits->service?"OUI":"NON" ?></td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
