<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Defaillance $defaillance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $defaillance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $defaillance->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Defaillances'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Risques'), ['controller' => 'Risques', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Risque'), ['controller' => 'Risques', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Causes'), ['controller' => 'Causes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cause'), ['controller' => 'Causes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="defaillances form large-9 medium-8 columns content">
    <?= $this->Form->create($defaillance) ?>
    <fieldset>
        <legend><?= __('Edit Defaillance') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('risque_id', ['options' => $risques, 'empty' => true]);
            echo $this->Form->control('cause_id', ['options' => $causes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
