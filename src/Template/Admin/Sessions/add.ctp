<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Annees'), ['controller' => 'Annees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Annee'), ['controller' => 'Annees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mois'), ['controller' => 'Mois', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mois'), ['controller' => 'Mois', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sessions form large-9 medium-8 columns content">
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Add Session') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('login');
            echo $this->Form->control('logout');
            echo $this->Form->control('annee_id', ['options' => $annees]);
            echo $this->Form->control('moi_id', ['options' => $mois]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
