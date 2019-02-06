
<div class="content">
    <h3 class="page-header text-center"><?= h($produit->name) ?></h3>
<div class="">

            <div class="panel-default panel" style="font-size: 1.5rem">
                <div class="panel-heading">
                    <h5 class="panel-title"><?= $produit->name ?></h5>
                </div>
                <div class="panel-body" style="font-size: 1.5rem">
                    SECTEUR : <span class="value"><?= $produit->has('sector') ? $this->Html->link($produit->sector->name, ['controller' => 'Sectors', 'action' => 'view', $produit->sector->id]) : '' ?></span>
                    <br/>
                    SERVICE ? : <span class="value"><?= $produit->service ? "OUI" : "NON"; ?></span>
                </div>
            </div>


            <div class="" style="padding: 10px; border: 1px solid #cccccc; border-radius: 7px; ">
                <h6 class="page-header"><i class="fa fa-thumbs-down"></i> &nbsp;DEFAILLANCES </h6>
                <?php if (!empty($produit->risques)): ?>

                    <table class="table table-bordered table-condensed table-responsive table-hover table-striped">
                        <tr>

                            <th scope="col">RISQUE</th>
                            <th>Defaillance</th>
                            <th>Causes</th>
                            <th>Consequences</th>
                            <th>Actions de maitrises</th>
                            <th>FREQUENCE</th>
                            <th>GRAVITE</th>
                            <th>CRITICITE BRUTE</th>
                            <th></th>

                        </tr>
                        <?php foreach ($produit->risques as $risques): ?>
                            <tr>
                                <?php
                                $criticite = $risques->_joinData->frequence * $risques->_joinData->gravite;
                                if($criticite >= 13){
                                    $color='red';
                                }else{
                                    if($criticite >=4 & $criticite <= 12){
                                        $color='yellow';
                                    }else{
                                        $color = 'green';
                                    }
                                }
                                ?>
                                <td><?= h($risques->name) ?></td>
                                <td><?= $risques->_joinData->name ?></td>
                                <td><?= $risques->_joinData->causes ?></td>
                                <td><?= $risques->_joinData->consequences ?></td>
                                <td><?= $risques->_joinData->actions ?></td>
                                <td><?= $risques->_joinData->frequence ?></td>
                                <td><?= $risques->_joinData->gravite ?></td>
                                <td style="background-color: <?= $color ?>"><?= $risques->_joinData->frequence * $risques->_joinData->gravite ?></td>
                                <td>
                                    <ul class="list-unstyled" style="margin-bottom: 0;">
                                        <li class="" style="" title="afficher le questionnaire" >
                                            <a class="btn btn-sm btn-dark" style="padding: 5px" href="<?= $this->Url->build(['controller'=>'Questions','action'=>'browse', $produit->id, $risques->id]) ?>" ><i class="fa fa-question-circle"></i></a>
                                        </li>

                                    </ul>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>




    <div class="">

        <div class="" style="">

            <h6 class="page-header">DOSSIERS LIES</h6>
            <?php if (!empty($produit->dossiers)): ?>
                <table class="table table-bordered table-responsive table-striped table-condensed table-hover" >
                    <tr>

                        <th >&numero;</th>
                        <th scope="col">DATE DE CREATION</th>
                        <th scope="col">CLIENT</th>
                        <th scope="col">ETABLISSEMENT FINANCIER</th>
                        <th scope="col">MONTANT DE L'EMPRUNT</th>
                        <th></th>


                    </tr>
                    <?php foreach ($produit->dossiers as $dossiers): ?>
                        <tr>

                            <td><?= h($dossiers->name) ?></td>
                            <td><?= date_format(date_create($dossiers->created),'d-m-Y') ?></td>
                            <td><?= $dossiers->owner?$dossiers->owner->name:'-' ?></td>

                            <td><?= $dossiers->autor?$dossiers->author->client?$dossiers->author->client->name:'-':'-' ?></td>

                            <td><?= h($dossiers->emprunt) ?></td>
                            <td>
                                <ul class="list-inline" style="margin-bottom: 0; text-align: center">
                                    <li class="" style="" title="afficher" >
                                        <a class="btn btn-sm btn-dark" style="padding: 5px" href="<?= $this->Url->build(['action'=>'view', $dossiers->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                                    </li>

                                </ul>
                            </td>


                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

        </div>

    </div>
</div>
