


<div class="dossiers view large-9 medium-8 columns content">
    <h3 class="page-header"> &nbsp; <?= h($dossier->name) ?>
        <span class="pull-right">
                            <?php if(!empty($dossier->plan)): ?>
                                <a class="btn btn-danger btn-sm" href="<?= $this->Url->build(['controller'=>'Plans','action'=>'view', $dossier->plan->id]) ?>">Afficher le plan d'action</a>
                            <?php else: ?>
                                <a class="btn btn-danger btn-sm" href="<?= $this->Url->build(['controller'=>'Dossiers','action'=>'createPlan', $dossier->id]) ?>">Creer un plan d'action</a>
                            <?php endif; ?>
                        </span>
    </h3>



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
                            <h5 class="panel-title"><i class="fa fa-donate"></i> FINANCES </h5>
                        </div>
                        <div class="panel-body">

                            <ul class="list-group list-inline" style="margin-bottom: 15px">
                                CHIFFRES D'AFFAIRE :

                                <li class="badge">N1: <span class="value"> <?= $this->Number->format($dossier->ca1 , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></li>
                                <li class="badge">N2: <span class="value"><?= $this->Number->format($dossier->ca2 , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></li>
                                <li class="badge">N3: <span class="value"><?= $this->Number->format($dossier->ca3 , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></li>
                            </ul>

                            <ul class="list-group list-inline" style="margin-bottom: 15px">
                                COUTS:
                                <li class="badge">N1: <span class="value"><?= $this->Number->format($dossier->cout1 , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></li>
                                <li class="badge">N2: <span class="value"><?= $this->Number->format($dossier->cout2 , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></li>
                                <li class="badge">N3: <span class="value"><?= $this->Number->format($dossier->cout3 , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></li>
                            </ul>
                            <h6><i class="glyphicon glyphicon-time"></i> DELAI NECESSAIRE POUR ATTEINDRE LES OBJECTIFS: <span class="value badge"><?= $dossier->delai. " MOIS" ?></span></h6>
                            <h6>APPORT PERSONNEL: <span class="value badge"><?= $this->Number->format($dossier->apport_personnel , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></h6>
                            <h6>APPORT DES ASSOCIES: <span class="value badge"><?= $this->Number->format($dossier->apport_associes , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></h6>
                            <h6>MONTANT DE L'EMPRUNT: <span class="value badge"><?= $this->Number->format($dossier->emprunt , ['place'=>'2', 'locale'=>'fr_FR']) . ' FCFA'; ?></span></h6>
                        </div>
                        <div class="panel-footer">

                            TYPE D'IMMOBLISATION:
                            <ul style="display: inline-block" class="list-inline">
                                <?php foreach($dossier->timmobilisations as $t): ?>
                                    <li class="badge"><?= $t->name ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <br/>



                            ACTIFS CIRCULANTS:
                            <ul style="display: inline-block" class="list-inline">
                                <?php foreach($dossier->actifs as $t): ?>
                                    <li class="badge"><?= $t->name ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <br/>
                            MODE DE FINANCEMENT:
                            <ul style="display: inline-block" class="list-inline">
                                <?php foreach($dossier->mfinancements as $t): ?>
                                    <li class="badge"><?= $t->name ?></li>
                                <?php endforeach; ?>
                            </ul>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="">
        <h5 class="page-header">IDENTIFICATION DES RISQUES</h5>
        <?php if(!empty($dossier->produit->risques)): ?>
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
                    <?php foreach($dossier->produit->risques as $risque): ?>
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
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
