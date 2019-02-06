<?php
$colors=['red','yellow','green','white']
?>

<div class="">
    <h3 class="page-header text-center">TABLEAU DE SUIVI DES RISQUES</h3>

    <div style="" class="">

        <?php if(!empty($plignes)): ?>
            <div class="">
                <table id="example" class="table table-bordered table-striped table-hover table-responsive table-condensed">
                    <thead>
                    <tr>
                        <th>TYPE DE RISQUE</th>
                        <th>PRODUIT</th>
                        <th>DEFAILLANCE</th>
                        <th>LIBELLE</th>
                        <th>DOSSIER</th>
                        <th>NIVEAU</th>
                        <th>ECHEANCE</th>
                        <th>RESPONSABLE</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($plignes as $action): ?>
                        <tr style="background-color: <?= $colors[$action->alerte] ?>">
                            <td><?= $action->produits_risque->risque->name ?></td>
                            <td><?= $action->produits_risque->produit->name ?></td>
                            <td><?= $action->produits_risque->name ?></td>
                            <td><?= $action->amelioration ?></td>

                            <td><?= $action->plan->dossier->name ?></td>
                            <td><?= $action->niveau ?></td>
                            <td><?= date_format(new DateTime($action->echeance),'d-m-Y') ?></td>

                            <td><?= $action->pilote?$action->pilote->name:'-' ?></td>

                            <td>
                                <a class="btn btn-xs btn-danger" href="<?= $this->Url->build(['action'=>'view',$action->id]) ?>"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        <?php endif; ?>
    </div>
</div>