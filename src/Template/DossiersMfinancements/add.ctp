<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DossiersMfinancement $dossiersMfinancement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dossiers Mfinancements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Dossiers'), ['controller' => 'Dossiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dossier'), ['controller' => 'Dossiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mfinancements'), ['controller' => 'Mfinancements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mfinancement'), ['controller' => 'Mfinancements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dossiersMfinancements form large-9 medium-8 columns content">
    <?= $this->Form->create($dossiersMfinancement) ?>
    <fieldset>
        <legend><?= __('Add Dossiers Mfinancement') ?></legend>
        <?php
            echo $this->Form->control('dossier_id', ['options' => $dossiers]);
            echo $this->Form->control('mfinancement_id', ['options' => $mfinancements]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
