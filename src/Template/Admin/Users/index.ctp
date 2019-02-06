<h3 class="page-header text-center"><i class="fa fa-database" style="color:  #4caf50;"></i> BASE DE DONNEES DES UTILISATEURS</h3>
<div class="">
    <a href="<?= $this->Url->build(['action'=>'add']) ?>" style="margin-bottom: 20px" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> AJOUTER</a>
    <table class="table-condensed table-responsive table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>

                <th scope="col">TELEPHONE</th>
                <th scope="col">EMAIL</th>
                <th scope="col">Client</th>
                <th scope="col">Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->phone) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= $user->has('client') ? $this->Html->link($user->client->name, ['controller' => 'Clients', 'action' => 'view', $user->client->id]) : '' ?></td>
                <th><?= $user->role->name ?></th>

                <td class="actions">
                    <ul class="list-inline" style="margin-bottom: 0; text-align: center">
                        <li class="" style="" title="afficher" >
                            <a class="btn btn-sm btn-info" style="padding: 5px" href="<?= $this->Url->build(['action'=>'view', $user->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                        </li>
                        <?php if($user->active): ?>
                        <li class="" style="" title="Bloquer" >
                            <a class="btn btn-sm btn-default" style="padding: 5px" href="<?= $this->Url->build(['action'=>'disable', $user->id]) ?>" ><i class="fa fa-lock"></i></a>
                        </li>
                        <?php else: ?>
                        <li class="" style="" title="Debloquer" >
                            <a class="btn btn-sm btn-primary" style="padding: 5px" href="<?= $this->Url->build(['action'=>'enable', $user->id]) ?>" ><i class="fa fa-unlock"></i></a>
                        </li>
                        <?php endif ?>
                        <li class="" style="" title="Supprimer" >
                            <a class="btn btn-sm btn-danger" style="padding: 5px" href="<?= $this->Url->build(['action'=>'delete', $user->id]) ?>" ><i class="fa fa-trash"></i></a>
                        </li>
                    </ul>

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
