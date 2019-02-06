<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mois $mois
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mois'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mois form large-9 medium-8 columns content">
    <?= $this->Form->create($mois) ?>
    <fieldset>
        <legend><?= __('Add Mois') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
