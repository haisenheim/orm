<h5 class="page-header">Liste des secteurs</h5>
<div class="sectors index large-9 medium-8 columns content">
    <span class="btn btn-sm btn-primary"><?= $this->Html->link('Ajouter',['action'=>'add']) ?></span>
    <table class="table-condensed table-responsive" cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col">NOM</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sectors as $sector): ?>
            <tr>

                <td><?= h($sector->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $sector->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $sector->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $sector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sector->id)]) ?>
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
