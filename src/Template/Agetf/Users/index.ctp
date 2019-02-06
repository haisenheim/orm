<h5 class="page-header">Liste des utilisateurs</h5>
<div class="users index large-9 medium-8 columns content">
    <span class="btn btn-sm btn-primary"><?= $this->Html->link('Ajouter',['action'=>'add']) ?></span>
    <table class="table-condensed" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">ADRESSE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">EMAIL</th>
                <th scope="col">Client</th>
                <th scope="col">Role</th>
                <th scope="col">Derniere connexion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->address) ?></td>
                <td><?= h($user->phone) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= $user->has('client') ? $this->Html->link($user->client->name, ['controller' => 'Clients', 'action' => 'view', $user->client->id]) : '' ?></td>
                <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>

                <td><?= h($user->last_connexion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $user->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
