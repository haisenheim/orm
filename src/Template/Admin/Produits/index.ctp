<h3 class="page-header text-center">PRODUITS ET SERVICES</h3>
<div class="produits ">
    <a style="margin-bottom: 20px" href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i>AJOUTER</a>


    <table class="table-responsive table-condensed table-bordered table table-hover">
        <thead>
            <tr>
                <th scope="col">NOM</th>
                <th scope="col">SECTEUR D'ACTIVITE</th>
                <th scope="col">Est-ce un service?</th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?= h($produit->name) ?></td>
                <td><?= $produit->has('sector') ? $this->Html->link($produit->sector->name, ['controller' => 'Sectors', 'action' => 'view', $produit->sector->id]) : '' ?></td>
                <td><?= $produit->service?"OUI":"NON"?></td>
                <td class="actions">
                    <ul class="list-inline" style="margin-bottom: 0; text-align: center">
                        <li class="" style="" title="afficher" >
                            <a class="btn btn-sm btn-info" style="padding: 5px" href="<?= $this->Url->build(['action'=>'view', $produit->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                        </li>
                        <li class="" style="" title="Modifier" >
                            <a class="btn btn-sm btn-success" style="padding: 5px" href="<?= $this->Url->build(['action'=>'edit', $produit->id]) ?>" ><i class="fa fa-edit"></i></a>
                        </li>
                    <?php if($produit->active): ?>
                        <li class="" style="" title="desactiver" >
                            <a class="btn btn-sm btn-default" style="padding: 5px" href="<?= $this->Url->build(['action'=>'disable', $produit->id]) ?>" ><i class="fa fa-lock"></i></a>
                        </li>
                    <?php else: ?>
                    <li class="" style="" title="activer" >
                        <a class="btn btn-sm btn-primary" style="padding: 5px" href="<?= $this->Url->build(['action'=>'enable', $produit->id]) ?>" ><i class="fa fa-unlock"></i></a>
                    </li>
                    <?php endif ?>
                        <li class="" style="" title="Supprimer" >
                            <a class="btn btn-sm btn-danger" style="padding: 5px" href="<?= $this->Url->build(['action'=>'delete', $produit->id]) ?>" ><i class="fa fa-trash"></i></a>
                        </li>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('PREMIER')) ?>
            <?= $this->Paginator->prev('< ' . __('PRECEDENT')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('SUIVANT') . ' >') ?>
            <?= $this->Paginator->last(__('DERNIER') . ' >>') ?>
        </ul>
    </div>
</div>
