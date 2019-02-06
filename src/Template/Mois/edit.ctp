<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mois $mois
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mois->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mois->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mois'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mois form large-9 medium-8 columns content">
    <?= $this->Form->create($mois) ?>
    <fieldset>
        <legend><?= __('Edit Mois') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('abb');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
