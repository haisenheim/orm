
<div class="">



    <div class="row">

        <div class="col-sm-12 col-lg-8 col-md-8">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><?= $plan->name ?></h5>
                    </div>
                    <div class="panel-body">
                        DOSSIER: <span class="value"><?= $plan->dossier->name ?></span> <br/>
                        <i class="glyphicon glyphicon-bitcoin"></i> &nbsp; PRODUIT/SERVICE: &nbsp;<span class="value">
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


    <div class="related">
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
                <th scope="col" class="actions"></th>
            </tr>
            <?php foreach ($plan->plignes as $plignes): ?>
            <tr>

                <td><?= $plignes->produits_risque->name ?></td>
                <td contenteditable="true"><?= $plignes->amelioration ?></td>
                <td>

                    <?= $plignes->niveau ?>

                </td>
                <td contenteditable="true"><?= $plignes->echeance ?></td>
                <td><select name="pilote_id" id="plote_id">
                        <option value="0">Selection un utilisateur</option>

                        <?php foreach($pilotes as $pil):  ?>
                        <option value="<?= $pil->id ?>"><?= $pil->last_name . "  ".$pil->first_name ?></option>
                        <?php endforeach; ?>
                        <option value="" onclick="">Creer</option>

                </select>
                </td>
                <td contenteditable="true"><?= $plignes->contributeur ?></td>
                <td class="" contenteditable="true"><?= $plignes->modalites ?></td>
                <td class="actions">

                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Plignes', 'action' => 'delete', $plignes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plignes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
