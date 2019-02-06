<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Choice $choice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $choice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $choice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Choices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="choices form large-9 medium-8 columns content">
    <?= $this->Form->create($choice) ?>
    <fieldset>
        <legend><?= __('Edit Choice') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('question_id', ['options' => $questions, 'empty' => true]);
            echo $this->Form->control('taux');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
