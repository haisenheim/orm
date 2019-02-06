<h5 class="page-header">Liste des defaillances possibles</h5>
<div class="defaillances index large-9 medium-8 columns content">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col">NOM</th>
                <th scope="col">RISQUE</th>
                <th scope="col">CAUSE</th>
                <th>PRODUIT</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($defaillances as $defaillance): ?>
            <tr>

                <td><?= h($defaillance->name) ?></td>
                <td><?= $defaillance->has('risque') ? $this->Html->link($defaillance->risque->name, ['controller' => 'Risques', 'action' => 'view', $defaillance->risque->id]) : '' ?></td>
                <td><?= $defaillance->has('cause') ? $this->Html->link($defaillance->cause->name, ['controller' => 'Causes', 'action' => 'view', $defaillance->cause->id]) : '' ?></td>
                <td><?= $defaillance->has('produit') ? $this->Html->link($defaillance->produit->name, ['controller' => 'Produits', 'action' => 'view', $defaillance->produit->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $defaillance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $defaillance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $defaillance->id)]) ?>
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
