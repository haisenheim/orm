<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DossiersTimmobilisation $dossiersTimmobilisation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dossiers Timmobilisation'), ['action' => 'edit', $dossiersTimmobilisation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dossiers Timmobilisation'), ['action' => 'delete', $dossiersTimmobilisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dossiersTimmobilisation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dossiers Timmobilisations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dossiers Timmobilisation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dossiers'), ['controller' => 'Dossiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dossier'), ['controller' => 'Dossiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Timmobilisations'), ['controller' => 'Timmobilisations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timmobilisation'), ['controller' => 'Timmobilisations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dossiersTimmobilisations view large-9 medium-8 columns content">
    <h3><?= h($dossiersTimmobilisation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dossier') ?></th>
            <td><?= $dossiersTimmobilisation->has('dossier') ? $this->Html->link($dossiersTimmobilisation->dossier->name, ['controller' => 'Dossiers', 'action' => 'view', $dossiersTimmobilisation->dossier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timmobilisation') ?></th>
            <td><?= $dossiersTimmobilisation->has('timmobilisation') ? $this->Html->link($dossiersTimmobilisation->timmobilisation->name, ['controller' => 'Timmobilisations', 'action' => 'view', $dossiersTimmobilisation->timmobilisation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dossiersTimmobilisation->id) ?></td>
        </tr>
    </table>
</div>
