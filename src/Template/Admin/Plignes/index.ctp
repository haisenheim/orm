
<div class="plignes index large-9 medium-8 columns content">
    <h3><?= __('Plignes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plan_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('niveau') ?></th>
                <th scope="col"><?= $this->Paginator->sort('echeance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pilote_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contributeur_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plignes as $pligne): ?>
            <tr>
                <td><?= $this->Number->format($pligne->id) ?></td>
                <td><?= $pligne->has('plan') ? $this->Html->link($pligne->plan->name, ['controller' => 'Plans', 'action' => 'view', $pligne->plan->id]) : '' ?></td>
                <td><?= $this->Number->format($pligne->pr_id) ?></td>
                <td><?= $this->Number->format($pligne->niveau) ?></td>
                <td><?= $this->Number->format($pligne->echeance) ?></td>
                <td><?= $this->Number->format($pligne->pilote_id) ?></td>
                <td><?= $this->Number->format($pligne->contributeur_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pligne->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pligne->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pligne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pligne->id)]) ?>
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
