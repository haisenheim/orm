<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pligne $pligne
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Plignes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Plans'), ['controller' => 'Plans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Plan'), ['controller' => 'Plans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="plignes form large-9 medium-8 columns content">
    <?= $this->Form->create($pligne) ?>
    <fieldset>
        <legend><?= __('Add Pligne') ?></legend>
        <?php
            echo $this->Form->control('plan_id', ['options' => $plans]);
            echo $this->Form->control('pr_id');
            echo $this->Form->control('amelioration');
            echo $this->Form->control('niveau');
            echo $this->Form->control('echeance');
            echo $this->Form->control('pilote_id');
            echo $this->Form->control('contributeur_id');
            echo $this->Form->control('modalites');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
