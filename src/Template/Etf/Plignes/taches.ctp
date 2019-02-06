<div class="">
    <div style="" class="well">
        <div class="">
            <h6 class="title">LISTE DES ACTIONS</h6>
        </div>
        <?php if(!empty($actions)): ?>
            <div class="">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>LIBELLE</th>
                        <th>DOSSIER</th>
                        <th>NIVEAU</th>
                        <th>ECHEANCE</th>
                        <th>MODALITE DE SUIVI</th>
                        <th>STATUT</th>
                        <th>DATE DE VALIDATION</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($actions as $action): ?>
                        <tr>
                            <td><?= $action->amelioration ?></td>
                            <td><?= $action->plan->dossier->name ?></td>
                            <td><?= $action->niveau ?></td>
                            <td><?= date_format(new DateTime($action->echeance),'d-m-Y') ?></td>
                            <td><?= $action->modalites ?></td>
                            <td><?= $action->status?'FAIT':'EN ATTENTE' ?></td>
                            <td><?= date_format(new DateTime($action->date_eff),'d-m-Y H:i') ?></td>
                            <td>
                                <a class="btn btn-xs btn-info" href="<?= $this->Url->build(['action'=>'valider',$action->id]) ?>"><i class="fa fa-hand-point-up"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        <?php endif; ?>
    </div>
</div>