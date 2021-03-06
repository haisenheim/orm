

<h3 class="page-header text-center" style="margin: 10px 0 5px 0">APERCU DU DOSSIER <span style="font-weight: 900"><?= $dossier->name ?></span> </h3>
<div class="">
    <div style="margin: 5px 0" class="page-header">

        <?php if(!empty($dossier->plan)): ?>
            <a class="btn btn-primary btn-sm" href="<?= $this->Url->build(['controller'=>'Plans','action'=>'view', $dossier->plan->id]) ?>"><i class="fa fa-tasks"></i> Afficher le plan d'action</a>
        <?php else: ?>
            <a class="btn btn-info btn-sm" href="<?= $this->Url->build(['controller'=>'Plans','action'=>'info',$dossier->id]) ?>"><i class="fa fa-tasks"></i> CREER UN PLAN D'ACTION</a>
        <?php endif; ?>

        <a class="btn btn-success btn-sm" href="<?= $this->Url->build(['controller'=>'Dossiers','action'=>'edit', $dossier->id]) ?>"><i class="fa fa-edit"></i> MODIFIER</a>

        <div class="pull-right">
            <?php if($dossier->retard): ?>
                <a class="btn btn-success btn-sm" href="<?= $this->Url->build(['controller'=>'Dossiers','action'=>'regulariser', $dossier->id]) ?>"><i class="fa fa-donate"></i> REGUALRISER LA SITUATION</a>
            <?php else: ?>
                <a class="btn btn-danger btn-sm" href="<?= $this->Url->build(['controller'=>'Dossiers','action'=>'retard',$dossier->id]) ?>"><i class="fa fa-clock"></i> SIGNALER UN RETARD DE PAIEMENT</a>
            <?php endif; ?>
        </div>



    </div>

    <div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div>
                    <div class="panel panel-default" style="margin-bottom: 0">
                        <div class="panel-heading">
                            <input type="hidden" id="id" value="<?= $dossier->id ?>"/>
                            <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>
                            <h5 class="panel-title">DOSSIER: <span class="value"><?= $dossier->name ?></span>
                                <span class="pull-right"><?= $dossier->active?'<span style="background: #008000; color: white" class="badge">ACTIF</span>':'<span style="background: darkred; color: white" class="badge">INACTIF</span>' ?></span>
                            </h5>
                        </div>

                        <div class="panel-body">
                            <?php if(!empty($dossier->owner)): ?>
                                <h6><i class="glyphicon glyphicon-user"></i>&nbsp;PROPRIETAIRE: <span class="value"><?= $dossier->owner->name ?></span>  </h6>


                            <?php endif; ?>

                            <h6>PERSONNE EN CHARGE: <span class="value"><?= $dossier->autor?$dossier->autor->last_name." ".$dossier->autor->first_name:'-' ?></span></h6>
                           <i class="glyphicon glyphicon-time"></i> Date de creation : <?= date_format(new DateTime($dossier->created),'d-m-Y H:i') ?> <br/>
                                <?php  if(!empty($dossier->produits)): ?>
                                    <ul class="list-inline">
                                        PRODUITS :
                                        <?php foreach($dossier->produits as $p): ?>
                                        <li class="badge"><?= $p->name ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php  endif; ?>

                            <br/>

                        </div>

                        <div style="font-size: 1.2rem" class="panel-footer">
                            <p>Contact: <?= $dossier->representant ?></p>
                            <p>Adresse: <?= $dossier->adresse ?></p>
                            <p><?= $dossier->telephone ."  -  ". $dossier->mobile ?> &nbsp;- &nbsp; <?= $dossier->email ?></p>
                        </div>
                    </div>
                </div>
                <?php if($dossier->retard): ?>
                    <button class="btn btn-block btn-danger btn-sm">DOSSIER EN RETARD DE PAIEMENT</button>
                <?php endif; ?>
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
        <h5 style="background-color: #FFFFFF; padding: 20px" class="page-header">IDENTIFICATION DES RISQUES</h5>
        <?php if(!empty($choix)): ?>
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

                    <th>Criticite nette</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($choix as $k=>$v): ?>




                    <tr style="align-content: center">
                        <td style="align-content: center; margin-top: auto" align="center" rowspan="<?= count($v) +1 ?>"><?= $k ?></td>
                    </tr>
                    <?php foreach($v as $value): ?>

                        <?php
                        // CHANGER ET METTRE CRITICITE = CRITICITE B. * MOYENNE DES COEF ( DIRECTEMENT)
                        $cb=$value->question->produits_risque->frequence * $value->question->produits_risque->gravite;
                        $cn=$value->question->produits_risque->frequence * $value->question->produits_risque->gravite * $value->taux;
                        if($cb >= 13){
                            $clrb='red';
                        }else{
                            if($cb >=4 & $cb <= 12){
                                $clrb='yellow';
                            }else{
                                $clrb = '#0ac60a';
                            }
                        }

                        if($cn >= 13){
                            $clr='red';
                        }else{
                            if($cn >=4 & $cn <= 12){
                                $clr='yellow';
                            }else{
                                $clr = '#0ac60a';
                            }
                        }
                        ?>


                        <tr>
                            <td><?= $value->question->produits_risque->name ?></td>
                            <td><?= $value->question->produits_risque->causes ?></td>
                            <td><?= $value->question->produits_risque->consequences ?></td>
                            <td><?= $value->question->produits_risque->frequence ?></td>
                            <td><?= $value->question->produits_risque->gravite ?></td>
                            <td style="background-color: <?= $clrb ?>; font-weight: 900; text-align: right"><?= $value->question->produits_risque->frequence * $value->question->produits_risque->gravite  ?></td>
                            <td style="background-color:  <?= $clr ?>"><?= $value->question->produits_risque->frequence * $value->question->produits_risque->gravite * $value->taux  ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<script>
    $('#search-client').click(function(e){
        var clientUrl="<?= $this->Url->build(['controller'=>'Clients','action'=>'search','prefix'=>'admin']) ?>";
        e.preventDefault();
        $.ajax({
            url:clientUrl,
            type:'Post',
            dataType:'JSON',
            data:{_csrf:$('#csrf').val(), code:$('#code-client').val(),dossier:$('#id').val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
            },
            success: function(data){
                /*var div = $('#client-data');
                 var cont = '';
                 cont +='<h6>'+data.name+'</h6>';
                 div.html(cont);*/

                if(data.client!=null){
                    window.location.reload();
                }
                else{
                    $('#code-client').val('CODE INVALIDE');
                }


            }

        });

    });
</script>
