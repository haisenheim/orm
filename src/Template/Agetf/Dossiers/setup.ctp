


<div class="">

    <div>
        <div class="well">
            <div class="row">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">DOSSIER: <span class="value"><?= $dossier->name ?></span>  </h5>
                        </div>

                        <div class="panel-body">
                            <h6><i class="glyphicon glyphicon-user"></i>&nbsp;PROPRIETAIRE: <span class="value"><?= $dossier->owner?$dossier->owner->name:'-' ?></span>  </h6>
                            <h6>PERSONNE EN CHARGE: <span class="value"><?= $dossier->autor?$dossier->autor->last_name." ".$dossier->autor->first_name:'-' ?></span></h6>
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


</div>
