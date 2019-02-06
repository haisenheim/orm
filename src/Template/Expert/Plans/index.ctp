
<div class="plans index large-9 medium-8 columns content">
    <h3><?= __('Plans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dossier_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plans as $plan): ?>
            <tr>
                <td><?= $this->Number->format($plan->id) ?></td>
                <td><?= h($plan->created) ?></td>
                <td><?= $plan->has('user') ? $this->Html->link($plan->user->id, ['controller' => 'Users', 'action' => 'view', $plan->user->id]) : '' ?></td>
                <td><?= $this->Number->format($plan->name) ?></td>
                <td><?= $plan->has('dossier') ? $this->Html->link($plan->dossier->name, ['controller' => 'Dossiers', 'action' => 'view', $plan->dossier->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $plan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $plan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $plan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plan->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
