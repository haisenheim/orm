<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cause $cause
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cause'), ['action' => 'edit', $cause->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cause'), ['action' => 'delete', $cause->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cause->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Causes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cause'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Defaillances'), ['controller' => 'Defaillances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defaillance'), ['controller' => 'Defaillances', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="causes view large-9 medium-8 columns content">
    <h3><?= h($cause->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($cause->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cause->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Defaillances') ?></h4>
        <?php if (!empty($cause->defaillances)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Risque Id') ?></th>
                <th scope="col"><?= __('Cause Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cause->defaillances as $defaillances): ?>
            <tr>
                <td><?= h($defaillances->id) ?></td>
                <td><?= h($defaillances->name) ?></td>
                <td><?= h($defaillances->risque_id) ?></td>
                <td><?= h($defaillances->cause_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Defaillances', 'action' => 'view', $defaillances->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Defaillances', 'action' => 'edit', $defaillances->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Defaillances', 'action' => 'delete', $defaillances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $defaillances->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
