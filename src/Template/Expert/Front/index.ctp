<?php
    $colors=['red','yellow','green','white']
?>


<div class="" style="margin-top: 0">
    <input id="_csrfToken" name="_csrfToken" type="hidden" value="<?= $token ?>"/>
    <div class="container-fluid" >
        <div class="">
            <h1 class="page-header text-center" style="background-color: #FFFFFF; font-weight: 900">TABLEAU DE BORD</h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="page-header">DOSSIERS URGENTS</h4>
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>DATE</th>
                                <th>PROPRIETAIRE</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($dossiers as $dossier): ?>
                                <tr style="background-color: <?= $colors[$dossier->alerte] ?>">
                                    <td><?= $this->Html->link($dossier->name,['controller'=>'Dossiers','action'=>'view',$dossier->id]); ?></td>
                                    <td><?= $dossier->created ?></td>
                                    <td><?= $dossier->owner?$dossier->owner->name:'-' ?></td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-sm-12 col-lg-6">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="page-header">REPARTITION DOSSIER/PRODUIT</h4>
                        <table class="table table-bordered table-striped table-condensed">
                            <tbody>
                                <?php foreach($results as $k=>$v): ?>
                                    <tr>
                                        <th><?= $k ?></th>
                                        <th class="value"><span class="badge"><?= $v ?></span></th>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


