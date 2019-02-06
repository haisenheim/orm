<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annee $annee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Annee'), ['action' => 'edit', $annee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Annee'), ['action' => 'delete', $annee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $annee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Annees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Annee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="annees view large-9 medium-8 columns content">
    <h3><?= h($annee->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($annee->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($annee->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sessions') ?></h4>
        <?php if (!empty($annee->sessions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Login') ?></th>
                <th scope="col"><?= __('Logout') ?></th>
                <th scope="col"><?= __('Annee Id') ?></th>
                <th scope="col"><?= __('Moi Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($annee->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->id) ?></td>
                <td><?= h($sessions->user_id) ?></td>
                <td><?= h($sessions->created) ?></td>
                <td><?= h($sessions->login) ?></td>
                <td><?= h($sessions->logout) ?></td>
                <td><?= h($sessions->annee_id) ?></td>
                <td><?= h($sessions->moi_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
