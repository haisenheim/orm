<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dossier $dossier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dossier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dossier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dossiers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Timmobilisations'), ['controller' => 'Timmobilisations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timmobilisation'), ['controller' => 'Timmobilisations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mfinancements'), ['controller' => 'Mfinancements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mfinancement'), ['controller' => 'Mfinancements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dossiers form large-9 medium-8 columns content">
    <?= $this->Form->create($dossier) ?>
    <fieldset>
        <legend><?= __('Edit Dossier') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('owner_id');
            echo $this->Form->control('marketer_id');
            echo $this->Form->control('autor_id');
            echo $this->Form->control('produit_id', ['options' => $produits, 'empty' => true]);
            echo $this->Form->control('ca1');
            echo $this->Form->control('ca2');
            echo $this->Form->control('ca3');
            echo $this->Form->control('cout1');
            echo $this->Form->control('cout2');
            echo $this->Form->control('cout3');
            echo $this->Form->control('delai');
            echo $this->Form->control('apport_personnel');
            echo $this->Form->control('apport_associes');
            echo $this->Form->control('emprunt');
            echo $this->Form->control('timmobilisation_id', ['options' => $timmobilisations, 'empty' => true]);
            echo $this->Form->control('mfinancement_id', ['options' => $mfinancements, 'empty' => true]);
            echo $this->Form->control('actions._ids', ['options' => $actions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
