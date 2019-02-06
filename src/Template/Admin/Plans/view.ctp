
<div class="" style="border: solid 1px #cccccc; padding: 15px; border-radius: 7px">
    <div class="row">

        <div class="col-sm-12 col-lg-8 col-md-8">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><?= $plan->name ?></h5>
                    </div>
                    <div class="panel-body">
                        DOSSIER: <span class="value"><?= $plan->dossier->name ?></span> <br/>

                        <i class="glyphicon glyphicon-time"></i> &nbsp; DATE DE CREATION: &nbsp;<span class="value"><?= $plan->created ?></span>
                        <br/>
                        <i class="glyphicon glyphicon-user"></i> &nbsp; OPERATEUR: &nbsp;<span class="value"><?= $plan->user?$plan->user->last_name ."  ".$plan->user->first_name :'-' ?></span>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="related">
        <?php if (!empty($plan->plignes)): ?>
        <table class="datatable table table-bordered table-condensed table-striped table-responsive table-hover" style="background: white; opacity: 1">
            <tr>
               <th></th>

                <th>OBJECTIF</th>
                <th scope="col">ACTION D'AMELIOR.</th>
                <th>BUDGET</th>
                <th scope="col">NIVEAU</th>
                <th scope="col">ECHEANCE</th>
                <th scope="col">PILOTE</th>
                <th scope="col">CONTRIBUTEUR</th>
                <th>ETAT</th>
                <th>STATUT</th>

                <th scope="col" class="actions"></th>
            </tr>
            <?php foreach ($plan->plignes as $plignes): ?>
                <?php

                $color='#EEFFF8';
                $alerte='';
                if($plignes->echeance){
                    if( Date($plignes->echeance) < Date('Y-m-d')){

                       // debug(date_diff($plignes->echeance, new DateTime())->d);
                        if(date_diff($plignes->echeance, new DateTime())->d <= $seuils->critic){
                            $color='#BC1006';
                            $alerte= $seuils->critic;
                        }
                        if((date_diff($plignes->echeance, new DateTime())->d > $seuils->critic)&&(date_diff($plignes->echeance, new DateTime())->d <= $seuils->danger)){
                            $color='#E68010';
                            $alerte=$seuils->danger;

                        }

                        if((date_diff($plignes->echeance, new DateTime())->d > $seuils->danger)&&(date_diff($plignes->echeance, new DateTime())->d <= $seuils->attention)){
                            $color='yellow';
                            $seuils->attention;
                        }
                    }
                }

                ?>
            <tr style="background-color:<?= $color ?> ">

                <td><?= $plignes->produits_risque->name ?></td>
                <td><?= $plignes->objectif ?></td>
                <td contenteditable="true"><?= $plignes->amelioration ?></td>
                <td><?= $plignes->budget ?></td>
                <td>

                    <?= $plignes->niveau ?>

                </td>
                <td contenteditable="true"><?= $plignes->echeance? date_format(new DateTime($plignes->echeance),'d-m-Y'):'-' ?></td>
                <td><?= $plignes->pilote?$plignes->pilote->name:'-' ?></td>
                <td contenteditable="true"><?= $plignes->contributeur ?></td>
                <th style="color: <?= $plignes->status?'green':'red' ?>"><?= $plignes->status?'REALISEE':'NON REALISEE' ?></th>
                <th style="color: <?= $plignes->active?'green':'red' ?>"><?= $plignes->active?'ACTIF':'INACTIF' ?></th>

                <td class="">
                    <ul class="list-inline">
                        <li>
                            <a title="Afficher" class="btn btn-xs btn-primary" href="<?= $this->Url->build(['controller'=>'Plignes','action'=>'view',$plignes->id]) ?>"><i class="fa fa-eye"></i></a>
                        </li>
                        <li>
                            <a title="Editer" class="btn btn-xs btn-info" href="<?= $this->Url->build(['controller'=>'Plignes','action'=>'edit',$plignes->id]) ?>"><i class="fa fa-pencil-alt"></i></a>
                        </li>
                        <?php if($plignes->active): ?>
                            <li>
                                <a title="Desactiver" class="btn btn-xs btn-danger" href="<?= $this->Url->build(['controller'=>'Plignes','action'=>'disable',$plignes->id]) ?>"><i class="fa fa-lock"></i></a>
                            </li>
                         <?php else: ?>
                            <li>
                                <a title="Activer" class="btn btn-xs btn-success" href="<?= $this->Url->build(['controller'=>'Plignes','action'=>'enable',$plignes->id]) ?>"><i class="fa fa-unlock"></i></a>
                            </li>
                        <?php endif ?>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

