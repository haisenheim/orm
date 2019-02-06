


<div class="dossiers view large-9 medium-8 columns content">
    <h6 class="page-header">
        <span class="pull-right">
                            <?php if(!empty($dossier->plan)): ?>
                                <a class="btn btn-danger btn-sm" href="<?= $this->Url->build(['controller'=>'Plans','action'=>'view', $dossier->plan->id]) ?>">Afficher le plan d'action</a>
                            <?php else: ?>
                                <a class="btn btn-danger btn-sm" href="<?= $this->Url->build(['controller'=>'Dossiers','action'=>'createPlan', $dossier->id]) ?>">Creer un plan d'action</a>
                            <?php endif; ?>
                        </span>
    </h6>



    <div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">DOSSIER: <span class="value"><?= $dossier->name ?></span>  </h5>
                        </div>

                        <div class="panel-body">
                            <h6><i class="glyphicon glyphicon-user"></i>&nbsp;PROPRIETAIRE: <span class="value"><?= $dossier->owner?$dossier->owner->name:'-' ?></span>  </h6>
                            <h6>PERSONNE EN CHARGE: <span class="value"><?= $dossier->marketer?$dossier->marketer->last_name." ".$dossier->marketer->first_name:'-' ?></span></h6>
                           <i class="glyphicon glyphicon-time"></i> Date de creation : <?= $dossier->created ?> <br/>
                            Produit : <span class="value"><?= $dossier->produit? $dossier->produit->name:'-' ?> </span>  <br/>
                            <?= $dossier->timmobilisation?'Pour le financement de l\'immobilisation de type: '.$dossier->timmobilisation->name:'-' ?>
                            <br/>
                            <?= $dossier->mfinancement?'Pour le financement de: <span class="value">'.$dossier->mfinancement->name:'-' .'</span>' ?>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-12">
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"><i class="glyphicon glyphicon-piggy-bank"></i> FINANCES </h5>
                        </div>
                        <div class="panel-body">

                                <ul class="list-group list-inline" style="margin-bottom: 0">
                                    CHIFFRES D'AFFAIRE
                                    <li class="list-group-item">N1 <span class="value"><?= $dossier->ca1 . " FCFA" ?></span></li>
                                    <li class="list-group-item">N2 <span class="value"><?= $dossier->ca2 . " FCFA" ?></span></li>
                                    <li class="list-group-item">N3 <span class="value"><?= $dossier->ca3 ." FCFA" ?></span></li>
                                </ul>

                            <ul class="list-group list-inline" style="margin-bottom: 0">
                                COUTS
                                <li class="list-group-item">N1 <span class="value"><?= $dossier->cout1 ." FCFA" ?></span></li>
                                <li class="list-group-item">N2 <span class="value"><?= $dossier->cout2 ." FCFA" ?></span></li>
                                <li class="list-group-item">N3 <span class="value"><?= $dossier->cout3 ." FCFA" ?></span></li>
                            </ul>
                           <h6><i class="glyphicon glyphicon-time"></i> DELAI NECESSAIRE POUR ATTEINDRE LES OBJECTIFS: <span class="value"><?= $dossier->delai. " MOIS" ?></span></h6>
                            <h6>APPORT PERSONNEL: <span class="value"><?= $dossier->apport_personnel." FCFA" ?></span></h6>
                            <h6>APPORT DES ASSOCIES: <span class="value"><?= $dossier->apport_associes." FCFA" ?></span></h6>
                            <h6>MONTANT DE L'EMPRUNT: <span class="value"><?= $dossier->emprunt. " FCFA" ?></span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="">
        <h5 class="page-header">IDENTIFICATION DES RISQUES</h5>
        <?php if(!empty($dossier->produits)): ?>
            <table class="table-condensed table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Defaillances possibles</th>
                        <th>Causes</th>
                        <th>Consequences</th>
                        <th>Frequence</th>
                        <th>Gravite</th>
                        <th>Criticite brut</th>
                        <th>Action de maitrise</th>
                        <th>Niveau de maitrise</th>
                        <th>Criticite nette</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dossier->produits as $produit): ?>
                        <?php if(!empty( $produit->risques)): ?>
                            <?php foreach($produit->risques as $risque): ?>
                        <tr>
                            <td>
                                <?= $risque->name ?>
                            </td>
                            <td>
                                <?= $risque->_joinData->name ?>
                            </td>
                            <td>
                                <?= $risque->_joinData->causes ?>
                            </td>
                            <td>
                                <?= $risque->_joinData->consequences ?>
                            </td>
                            <td>
                                <?= $risque->_joinData->frequence ?>
                            </td>
                            <td>
                                <?= $risque->_joinData->gravite ?>
                            </td>
                            <td style="background-color: <?= $risque->clrb ?>">
                                <?= $risque->cb ?>
                            </td>

                            <td>
                                <?php if(!empty($risque->lines)): ?>
                                    <ol class="">
                                        <?php foreach($risque->lines as $line): ?>

                                            <li class="">
                                                    <?= $line->choice?$line->choice->name:'-' ?>
                                            </li>

                                        <?php endforeach; ?>
                                    </ol>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>

                            <td>
                               <?php if(!empty($risque->lines)): ?>
                                   <ol class="">
                                    <?php foreach($risque->lines as $line): ?>

                                           <li class="">
                                               <?= $line->choice?$line->choice->taux:'-' ?>
                                           </li>

                                     <?php endforeach; ?>
                                       </ol>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>

                            <?php

                            /*// CHANGER ET METTRE CRITICITE = CRITICITE B. * MOYENNE DES COEF ( DIRECTEMENT)
                            $criticite=$criticite*(1- ($i?$nb/$i:0));
                            if($criticite >= 13){
                                $color='red';
                            }else{
                                if($criticite >=4 & $criticite <= 12){
                                    $color='yellow';
                                }else{
                                    $color = 'green';
                                }
                            }
                            */?>


                            <td style="background-color: <?= $risque->clrn ?>;  font-weight: 900">
                                <?= $risque->cn ?>
                            </td>
                        </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
