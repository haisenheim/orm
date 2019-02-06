<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pligne $pligne
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pligne'), ['action' => 'edit', $pligne->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pligne'), ['action' => 'delete', $pligne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pligne->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Plignes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pligne'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plans'), ['controller' => 'Plans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plan'), ['controller' => 'Plans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="plignes view large-9 medium-8 columns content">
    <h3><?= h($pligne->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Plan') ?></th>
            <td><?= $pligne->has('plan') ? $this->Html->link($pligne->plan->name, ['controller' => 'Plans', 'action' => 'view', $pligne->plan->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pligne->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Id') ?></th>
            <td><?= $this->Number->format($pligne->pr_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Niveau') ?></th>
            <td><?= $this->Number->format($pligne->niveau) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Echeance') ?></th>
            <td><?= $this->Number->format($pligne->echeance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pilote Id') ?></th>
            <td><?= $this->Number->format($pligne->pilote_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contributeur Id') ?></th>
            <td><?= $this->Number->format($pligne->contributeur_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Amelioration') ?></h4>
        <?= $this->Text->autoParagraph(h($pligne->amelioration)); ?>
    </div>
    <div class="row">
        <h4><?= __('Modalites') ?></h4>
        <?= $this->Text->autoParagraph(h($pligne->modalites)); ?>
    </div>
</div>
