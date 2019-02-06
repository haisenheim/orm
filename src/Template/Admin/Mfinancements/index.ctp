<h5 class="page-header">Liste des moyens de financement</h5>
<div class="mfinancements index large-9 medium-8 columns content">
    <span class="btn btn-sm btn-primary"><?= $this->Html->link('Ajouter',['action'=>'add']) ?></span>
    <table class="table-responsive table-condensed" cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col">NOM</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mfinancements as $mfinancement): ?>
            <tr>

                <td><?= h($mfinancement->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $mfinancement->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $mfinancement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mfinancement->id)]) ?>
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
