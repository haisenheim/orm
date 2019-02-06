<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsRisque $produitsRisque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produits Risque'), ['action' => 'edit', $produitsRisque->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produits Risque'), ['action' => 'delete', $produitsRisque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produitsRisque->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produits Risques'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produits Risque'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Risques'), ['controller' => 'Risques', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Risque'), ['controller' => 'Risques', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produitsRisques view large-9 medium-8 columns content">
    <h3><?= h($produitsRisque->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Produit') ?></th>
            <td><?= $produitsRisque->has('produit') ? $this->Html->link($produitsRisque->produit->name, ['controller' => 'Produits', 'action' => 'view', $produitsRisque->produit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Risque') ?></th>
            <td><?= $produitsRisque->has('risque') ? $this->Html->link($produitsRisque->risque->name, ['controller' => 'Risques', 'action' => 'view', $produitsRisque->risque->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produitsRisque->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Citicite But') ?></th>
            <td><?= $this->Number->format($produitsRisque->citicite_but) ?></td>
        </tr>
    </table>
</div>
