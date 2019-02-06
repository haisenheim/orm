<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsRisque $produitsRisque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produitsRisque->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produitsRisque->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Produits Risques'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Risques'), ['controller' => 'Risques', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Risque'), ['controller' => 'Risques', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produitsRisques form large-9 medium-8 columns content">
    <?= $this->Form->create($produitsRisque) ?>
    <fieldset>
        <legend><?= __('Edit Produits Risque') ?></legend>
        <?php
            echo $this->Form->control('citicite_but');
            echo $this->Form->control('produit_id', ['options' => $produits, 'empty' => true]);
            echo $this->Form->control('risque_id', ['options' => $risques, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
