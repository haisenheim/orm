<div style="border: solid 1px #cccccc; padding: 15px; border-radius: 7px">
    <div class="row">
        <div class="col-sm-12 col-lg-6 col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title"><?= $user->name  ?></h6>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-lg-3">
                                <div style="height: 80px; width: 80px;" >
                                    <?= $this->Html->image($user->imageUri?$user->imageUri:'avatar.png',['fullBase'=>true, 'class'=>'img img-rounded','width'=>'100%', 'height'=>'100%']) ?>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-9 col-lg-9">
                                <div class="" style="display: ">
                                    NOM : <?= $user->name ?> <br/>
                                    ADRESSE : <span class="value"><?= $user->address ?></span> <br/>
                                    EMAIL : <span class="value"><?= $user->email ?></span> <br/>
                                    TEL : <span class="value"><?= $user->phone ?></span>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="panel-footer">
                        DERNIERE CONNEXION : <span class="value"><?= date_format(new DateTime($user->last_connexion),'d-m-Y H:i') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

