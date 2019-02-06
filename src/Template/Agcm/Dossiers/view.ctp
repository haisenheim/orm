


<div class="">
    <div style="margin: 5px 0" class="page-header">

        <?php if(!empty($dossier->plan)): ?>
            <a class="btn btn-primary btn-sm" href="<?= $this->Url->build(['controller'=>'Plans','action'=>'view', $dossier->plan->id]) ?>"><i class="fa fa-tasks"></i> Afficher le plan d'action</a>
        <?php else: ?>
            <a class="btn btn-info btn-sm" href="<?= $this->Url->build(['controller'=>'Plans','action'=>'info',$dossier->id]) ?>"><i class="fa fa-tasks"></i> CREER UN PLAN D'ACTION</a>
        <?php endif; ?>

        <a class="btn btn-success btn-sm" href="<?= $this->Url->build(['controller'=>'Dossiers','action'=>'edit', $dossier->id]) ?>"><i class="fa fa-edit"></i> MODIFIER</a>

    </div>

    <div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div>
                    <div class="panel panel-default">
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
                                    <li class="badge">N1: <span class="value"><?= $dossier->ca1 . " FCFA" ?></span></li>
                                    <li class="badge">N2: <span class="value"><?= $dossier->ca2 . " FCFA" ?></span></li>
                                    <li class="badge">N3: <span class="value"><?= $dossier->ca3 ." FCFA" ?></span></li>
                                </ul>

                            <ul class="list-group list-inline" style="margin-bottom: 15px">
                                COUTS:
                                <li class="badge">N1: <span class="value"><?= $dossier->cout1 ." FCFA" ?></span></li>
                                <li class="badge">N2: <span class="value"><?= $dossier->cout2 ." FCFA" ?></span></li>
                                <li class="badge">N3: <span class="value"><?= $dossier->cout3 ." FCFA" ?></span></li>
                            </ul>
                           <h6><i class="glyphicon glyphicon-time"></i> DELAI NECESSAIRE POUR ATTEINDRE LES OBJECTIFS: <span class="value badge"><?= $dossier->delai. " MOIS" ?></span></h6>
                            <h6>APPORT PERSONNEL: <span class="value badge"><?= $dossier->apport_personnel." FCFA" ?></span></h6>
                            <h6>APPORT DES ASSOCIES: <span class="value badge"><?= $dossier->apport_associes." FCFA" ?></span></h6>
                            <h6>MONTANT DE L'EMPRUNT: <span class="value badge"><?= $dossier->emprunt. " FCFA" ?></span></h6>
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
                                <?php if($dossier->actifs): ?>
                                <?php foreach($dossier->actifs as $t): ?>
                                    <li class="badge"><?= $t->name ?></li>
                                <?php endforeach; ?>
                                <?php endif ?>
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
        <h5 style="background-color: white; margin: 5px 0; padding: 20px" class="page-header">IDENTIFICATION DES RISQUES</h5>
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
