
<div class="content">
    <h3 class="page-header"><?= $tclient->name ?></h3>
    <div class="related">
       <h4>LISTE DES CLIENTS DE CE TYPE</h4>
        <?php if (!empty($tclient->clients)): ?>
        <table class="table table-bordered table-striped table-hover">
            <tr>

                <th scope="col">NOM</th>
                <th scope="col">ADRESSE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">EMAIL</th>

                <th ></th>
            </tr>
            <?php foreach ($tclient->clients as $clients): ?>
            <tr>

                <td><?= h($clients->name) ?></td>
                <td><?= h($clients->address) ?></td>
                <td><?= h($clients->phone) ?></td>
                <td><?= h($clients->email) ?></td>

                <td class="actions">
                    <ul class="list-inline">
                        <li>
                            <a href="<?= $this->Url->build(['controller'=>'Clients','action'=>'view',$clients->id]) ?>" class="btn- btn-xs btn-info"><i class="fa fa-eye" title="Afficher"></i></a>
                        </li>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

</div>
