<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DossiersTimmobilisation $dossiersTimmobilisation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dossiers Timmobilisations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Dossiers'), ['controller' => 'Dossiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dossier'), ['controller' => 'Dossiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Timmobilisations'), ['controller' => 'Timmobilisations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timmobilisation'), ['controller' => 'Timmobilisations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dossiersTimmobilisations form large-9 medium-8 columns content">
    <?= $this->Form->create($dossiersTimmobilisation) ?>
    <fieldset>
        <legend><?= __('Add Dossiers Timmobilisation') ?></legend>
        <?php
            echo $this->Form->control('dossier_id', ['options' => $dossiers]);
            echo $this->Form->control('timmobilisation_id', ['options' => $timmobilisations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
