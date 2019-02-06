<h3 class="page-header text-center" style="padding: 20px 0 10px 0; background-color: #FFFFFF"><i class="fa fa-user-friends" style="color: #1b351d; "></i> Liste des utilisateurs</h3>
<div class="">
    <span class="btn btn-sm btn-success"><a href="<?= $this->Url->build(['action'=>'add']) ?>"><i class="fa fa-plus-circle"></i> AJOUTER </a></span>
    <table class="table-condensed table-bordered table-responsive table table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>ADRESSE</th>
                <th>TELEPHONE</th>
                <th>EMAIL</th>
                <th>Role</th>

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
                <td><?= $user->has('role') ? $user->role->name: '' ?></td>



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
