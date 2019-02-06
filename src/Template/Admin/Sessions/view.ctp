<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Annees'), ['controller' => 'Annees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Annee'), ['controller' => 'Annees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mois'), ['controller' => 'Mois', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mois'), ['controller' => 'Mois', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $session->has('user') ? $this->Html->link($session->user->id, ['controller' => 'Users', 'action' => 'view', $session->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Annee') ?></th>
            <td><?= $session->has('annee') ? $this->Html->link($session->annee->name, ['controller' => 'Annees', 'action' => 'view', $session->annee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mois') ?></th>
            <td><?= $session->has('mois') ? $this->Html->link($session->mois->name, ['controller' => 'Mois', 'action' => 'view', $session->mois->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($session->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= $this->Number->format($session->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login') ?></th>
            <td><?= h($session->login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logout') ?></th>
            <td><?= h($session->logout) ?></td>
        </tr>
    </table>
</div>
