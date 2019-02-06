<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DossiersMfinancement $dossiersMfinancement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dossiers Mfinancement'), ['action' => 'edit', $dossiersMfinancement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dossiers Mfinancement'), ['action' => 'delete', $dossiersMfinancement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dossiersMfinancement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dossiers Mfinancements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dossiers Mfinancement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dossiers'), ['controller' => 'Dossiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dossier'), ['controller' => 'Dossiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mfinancements'), ['controller' => 'Mfinancements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mfinancement'), ['controller' => 'Mfinancements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dossiersMfinancements view large-9 medium-8 columns content">
    <h3><?= h($dossiersMfinancement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dossier') ?></th>
            <td><?= $dossiersMfinancement->has('dossier') ? $this->Html->link($dossiersMfinancement->dossier->name, ['controller' => 'Dossiers', 'action' => 'view', $dossiersMfinancement->dossier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mfinancement') ?></th>
            <td><?= $dossiersMfinancement->has('mfinancement') ? $this->Html->link($dossiersMfinancement->mfinancement->name, ['controller' => 'Mfinancements', 'action' => 'view', $dossiersMfinancement->mfinancement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dossiersMfinancement->id) ?></td>
        </tr>
    </table>
</div>
