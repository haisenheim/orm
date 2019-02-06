<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Defaillance $defaillance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Defaillance'), ['action' => 'edit', $defaillance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Defaillance'), ['action' => 'delete', $defaillance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $defaillance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Defaillances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defaillance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Risques'), ['controller' => 'Risques', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Risque'), ['controller' => 'Risques', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Causes'), ['controller' => 'Causes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cause'), ['controller' => 'Causes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="defaillances view large-9 medium-8 columns content">
    <h3><?= h($defaillance->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($defaillance->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Risque') ?></th>
            <td><?= $defaillance->has('risque') ? $this->Html->link($defaillance->risque->name, ['controller' => 'Risques', 'action' => 'view', $defaillance->risque->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cause') ?></th>
            <td><?= $defaillance->has('cause') ? $this->Html->link($defaillance->cause->name, ['controller' => 'Causes', 'action' => 'view', $defaillance->cause->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($defaillance->id) ?></td>
        </tr>
    </table>
</div>
