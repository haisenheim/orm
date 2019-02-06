<h5 class="page-header">TYPES DE RISQUE</h5>
<div class="risques index large-9 medium-8 columns content">
    <span class="btn btn-sm btn-primary"><?= $this->Html->link('Ajouter',['action'=>'add']) ?></span>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">INTITULE</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($risques as $risque): ?>
            <tr>

                <td><?= h($risque->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $risque->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $risque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $risque->id)]) ?>
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
