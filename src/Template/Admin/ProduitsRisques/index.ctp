<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsRisque[]|\Cake\Collection\CollectionInterface $produitsRisques
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produits Risque'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Risques'), ['controller' => 'Risques', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Risque'), ['controller' => 'Risques', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produitsRisques index large-9 medium-8 columns content">
    <h3><?= __('Produits Risques') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('citicite_but') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('risque_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produitsRisques as $produitsRisque): ?>
            <tr>
                <td><?= $this->Number->format($produitsRisque->id) ?></td>
                <td><?= $this->Number->format($produitsRisque->citicite_but) ?></td>
                <td><?= $produitsRisque->has('produit') ? $this->Html->link($produitsRisque->produit->name, ['controller' => 'Produits', 'action' => 'view', $produitsRisque->produit->id]) : '' ?></td>
                <td><?= $produitsRisque->has('risque') ? $this->Html->link($produitsRisque->risque->name, ['controller' => 'Risques', 'action' => 'view', $produitsRisque->risque->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produitsRisque->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produitsRisque->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produitsRisque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produitsRisque->id)]) ?>
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
