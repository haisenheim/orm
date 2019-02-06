
<div class="dossiers index large-9 medium-8 columns content">
    <span class="btn btn-sm btn-primary"><?= $this->Html->link('Ajouter',['action'=>'add']) ?></span>
    <table class="table-responsive table-hover table-condensed" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">CODE</th>
                <th scope="col">DATE</th>
                <th scope="col">CLIENT</th>
                <th scope="col">COMMERCIAL</th>
                <th scope="col">PRODUIT/SERVICE</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dossiers as $dossier): ?>
            <tr>

                <td><?= h($dossier->name) ?></td>
                <td><?= h($dossier->created) ?></td>
                <td><?= $this->Number->format($dossier->owner_id) ?></td>
                <td><?= $this->Number->format($dossier->marketer_id) ?></td>

                <td><?= $dossier->has('produit') ? $this->Html->link($dossier->produit->name, ['controller' => 'Produits', 'action' => 'view', $dossier->produit->id]) : '' ?></td>
                <td><?= $dossier->produit? $dossier->produit->sector? $dossier->produit->sector->name : '':'' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $dossier->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $dossier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dossier->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
