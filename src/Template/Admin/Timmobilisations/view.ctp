<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timmobilisation $timmobilisation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Timmobilisation'), ['action' => 'edit', $timmobilisation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Timmobilisation'), ['action' => 'delete', $timmobilisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timmobilisation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Timmobilisations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timmobilisation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dossiers'), ['controller' => 'Dossiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dossier'), ['controller' => 'Dossiers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timmobilisations view large-9 medium-8 columns content">
    <h3><?= h($timmobilisation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($timmobilisation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($timmobilisation->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Dossiers') ?></h4>
        <?php if (!empty($timmobilisation->dossiers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Owner Id') ?></th>
                <th scope="col"><?= __('Marketer Id') ?></th>
                <th scope="col"><?= __('Autor Id') ?></th>
                <th scope="col"><?= __('Produit Id') ?></th>
                <th scope="col"><?= __('Ca1') ?></th>
                <th scope="col"><?= __('Ca2') ?></th>
                <th scope="col"><?= __('Ca3') ?></th>
                <th scope="col"><?= __('Cout1') ?></th>
                <th scope="col"><?= __('Cout2') ?></th>
                <th scope="col"><?= __('Cout3') ?></th>
                <th scope="col"><?= __('Delai') ?></th>
                <th scope="col"><?= __('Apport Personnel') ?></th>
                <th scope="col"><?= __('Apport Associes') ?></th>
                <th scope="col"><?= __('Emprunt') ?></th>
                <th scope="col"><?= __('Timmobilisation Id') ?></th>
                <th scope="col"><?= __('Mfinancement Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($timmobilisation->dossiers as $dossiers): ?>
            <tr>
                <td><?= h($dossiers->id) ?></td>
                <td><?= h($dossiers->name) ?></td>
                <td><?= h($dossiers->created) ?></td>
                <td><?= h($dossiers->owner_id) ?></td>
                <td><?= h($dossiers->marketer_id) ?></td>
                <td><?= h($dossiers->autor_id) ?></td>
                <td><?= h($dossiers->produit_id) ?></td>
                <td><?= h($dossiers->ca1) ?></td>
                <td><?= h($dossiers->ca2) ?></td>
                <td><?= h($dossiers->ca3) ?></td>
                <td><?= h($dossiers->cout1) ?></td>
                <td><?= h($dossiers->cout2) ?></td>
                <td><?= h($dossiers->cout3) ?></td>
                <td><?= h($dossiers->delai) ?></td>
                <td><?= h($dossiers->apport_personnel) ?></td>
                <td><?= h($dossiers->apport_associes) ?></td>
                <td><?= h($dossiers->emprunt) ?></td>
                <td><?= h($dossiers->timmobilisation_id) ?></td>
                <td><?= h($dossiers->mfinancement_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Dossiers', 'action' => 'view', $dossiers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Dossiers', 'action' => 'edit', $dossiers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dossiers', 'action' => 'delete', $dossiers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dossiers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
