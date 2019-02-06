<h3 class="page-header text-center"><i class="fa fa-user-friends"></i> CLIENTS </h3>
<div class=" content">
    <span> <a class="btn btn-sm btn-success" href="<?= $this->Url->build(['action'=>'add']) ?>"><i class="fa fa-plus-circle"></i> AJOUTER</a></span>
    <table cellpadding="0" cellspacing="0" class="table-responsive table table-bordered table-striped table-condensed table-hover">
        <thead>
            <tr>
                <th>&numero; D'ID</th>
                <th scope="col">NOM</th>
                <th scope="col">ADRESSE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TYPE DE CLIENT</th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <th><?= $client->code ?></th>
                <td><?= h($client->name) ?></td>
                <td><?= h($client->address) ?></td>
                <td><?= h($client->phone) ?></td>
                <td><?= h($client->email) ?></td>
                <td><?= $client->has('tclient') ? $this->Html->link($client->tclient->name, ['controller' => 'Tclients', 'action' => 'view', $client->tclient->id]) : '' ?></td>

                <td class="actions">
                    <ul class="list-inline" style="margin-bottom: 0; text-align: center">
                        <li class="" style="" title="afficher" >
                            <a class="btn btn-sm btn-dark" style="padding: 5px" href="<?= $this->Url->build(['action'=>'view', $client->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                        </li>
                        <?php if($client->active): ?>
                        <li class="" style="" title="desactiver" >
                            <a class="btn btn-sm btn-danger" style="padding: 5px" href="<?= $this->Url->build(['action'=>'disable', $client->id]) ?>" ><i class="fa fa-lock"></i></a>
                        </li>
                        <?php else: ?>
                            <li class="" style="" title="activer" >
                                <a class="btn btn-sm btn-success" style="padding: 5px" href="<?= $this->Url->build(['action'=>'enable', $client->id]) ?>" ><i class="fa fa-unlock"></i></a>
                            </li>
                        <?php endif; ?>
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
