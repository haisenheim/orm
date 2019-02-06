<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Risque $risque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $risque->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $risque->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Risques'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Defaillances'), ['controller' => 'Defaillances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defaillance'), ['controller' => 'Defaillances', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="risques form large-9 medium-8 columns content">
    <?= $this->Form->create($risque) ?>
    <fieldset>
        <legend><?= __('Edit Risque') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('produits._ids', ['options' => $produits]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
