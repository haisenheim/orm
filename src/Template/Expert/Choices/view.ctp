<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Choice $choice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Choice'), ['action' => 'edit', $choice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Choice'), ['action' => 'delete', $choice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $choice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Choices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Choice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="choices view large-9 medium-8 columns content">
    <h3><?= h($choice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($choice->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $choice->has('question') ? $this->Html->link($choice->question->name, ['controller' => 'Questions', 'action' => 'view', $choice->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($choice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Taux') ?></th>
            <td><?= $this->Number->format($choice->taux) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Answers') ?></h4>
        <?php if (!empty($choice->answers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Dossier Id') ?></th>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Choice Id') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($choice->answers as $answers): ?>
            <tr>
                <td><?= h($answers->id) ?></td>
                <td><?= h($answers->dossier_id) ?></td>
                <td><?= h($answers->question_id) ?></td>
                <td><?= h($answers->choice_id) ?></td>
                <td><?= h($answers->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Answers', 'action' => 'view', $answers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Answers', 'action' => 'edit', $answers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Answers', 'action' => 'delete', $answers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
