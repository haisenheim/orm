<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DossiersMfinancement[]|\Cake\Collection\CollectionInterface $dossiersMfinancements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dossiers Mfinancement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dossiers'), ['controller' => 'Dossiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dossier'), ['controller' => 'Dossiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mfinancements'), ['controller' => 'Mfinancements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mfinancement'), ['controller' => 'Mfinancements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dossiersMfinancements index large-9 medium-8 columns content">
    <h3><?= __('Dossiers Mfinancements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dossier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mfinancement_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dossiersMfinancements as $dossiersMfinancement): ?>
            <tr>
                <td><?= $this->Number->format($dossiersMfinancement->id) ?></td>
                <td><?= $dossiersMfinancement->has('dossier') ? $this->Html->link($dossiersMfinancement->dossier->name, ['controller' => 'Dossiers', 'action' => 'view', $dossiersMfinancement->dossier->id]) : '' ?></td>
                <td><?= $dossiersMfinancement->has('mfinancement') ? $this->Html->link($dossiersMfinancement->mfinancement->name, ['controller' => 'Mfinancements', 'action' => 'view', $dossiersMfinancement->mfinancement->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dossiersMfinancement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dossiersMfinancement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dossiersMfinancement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dossiersMfinancement->id)]) ?>
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
