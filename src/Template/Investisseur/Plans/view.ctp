
<div class="" style="border: 1px solid #cccccc; border-radius: 7px; padding: 15px">



    <div class="row">

        <div class="col-sm-12 col-lg-8 col-md-8">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><?= $plan->name ?></h5>
                    </div>
                    <div class="panel-body">
                        DOSSIER: <span class="value"><?= $plan->dossier->name ?></span> <br/>
                        <i class="glyphicon glyphicon-list-alt"></i> &nbsp; PRODUIT/SERVICE: &nbsp;<span class="value">
                            <ul class="list-inline">
                                <?php foreach($plan->dossier->produits as $produit): ?>
                                    <li class="badge badge-danger">
                                        <?= $produit->name ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </span>
                        <br/>
                        <i class="glyphicon glyphicon-time"></i> &nbsp; DATE DE CREATION: &nbsp;<span class="value"><?= $plan->created ?></span>
                        <br/>
                        <i class="glyphicon glyphicon-user"></i> &nbsp; OPERATEUR: &nbsp;<span class="value"><?= $plan->user?$plan->user->last_name ."  ".$plan->user->first_name :'-' ?></span>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="" style="border-radius: 4px; border: 1px solid #cccccc; padding: 10px">
        <?php if (!empty($plan->plignes)): ?>
        <table class="table table-bordered" >
            <tr>
               <th></th>


                <th scope="col">ACTIONS D'AMELIORATION</th>
                <th scope="col">NIVEAU</th>
                <th scope="col">ECHEANCE</th>
                <th scope="col">PILOTE</th>
                <th scope="col">CONTRIBUTEUR</th>
                <th scope="col">MODALITES DE SUIVI</th>
                <th>STATUT</th>
                <th>DATE DE VALIDATION</th>

            </tr>
            <?php foreach ($plan->plignes as $plignes): ?>
            <tr>

                <td><?= $plignes->produits_risque->name ?></td>
                <td><?= $plignes->amelioration ?></td>
                <td>
                    <?= $plignes->niveau ?>
                </td>
                <td><?= $plignes->echeance?date_format(new DateTime($plignes->echeance),'d-m-Y'):'-' ?></td>
                <td>
                    <?= $plignes->pilote?$plignes->pilote->first_name." ".$plignes->pilote->last_name:'' ?>
                </td>
                <td ><?= $plignes->contributeur ?></td>
                <td ><?= $plignes->modalites ?></td>
                <td>
                    <?= $plignes->status?'FAIT':'EN ATTENTE' ?>
                </td>
                <td><?= $plignes->status?date_format(new DateTime($plignes->date_eff),'d-m-Y H:i'):'-' ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
