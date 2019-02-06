
<div class="" style="margin-top: 0">
    <div class="container-fluid" >
        <div class="">
            <h1 class="page-header" style="margin: 10px 0 5px 0">TABLEAU DE BORD</h1>
            <div>
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <h4 class="page-header" style="margin: 10px 0 5px 0">RECRUTEMENT DES EXPERTS</h4>
                        <div>
                            <div class="panel">
                                <div class="panel-body" style="font-size: 1.1rem">
                                   <table class="table table-bordered">
                                       <thead>
                                       <tr>
                                           <th>SECTEURS</th>
                                           <th>OBJECTIF</th>
                                           <th>REALISATION</th>
                                           <th>ECART</th>
                                           <th>REALISATION_N-1</th>
                                           <th>PROGRESSION</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                            <?php foreach($results as $key => $values): ?>
                                                <tr>
                                                    <th><?= $key ?></th>
                                                    <td><?= $values[1]->objectif ?></td>
                                                    <td><?= $values[1]->realisation ?></td>
                                                    <th><?= $values[1]->realisation - $values[1]->objectif  ?></th>
                                                    <td><?= $values[0]->realisation ?></td>
                                                    <th><?= $values[0]->realisation?round((($values[1]->realisation - $values[0]->realisation)*100)/$values[0]->realisation,2) . ' %' :'-' ?></th>
                                                </tr>
                                            <?php endforeach; ?>
                                       </tbody>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <h4 class="page-header" style="margin: 10px 0 5px 0">CREATION DES COMPTES CLIENTS</h4>
                        <div>
                            <div class="panel">
                                <div class="panel-body" style="font-size: 1.1rem">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>CATEGORIE</th>
                                            <th>OBJECTIF</th>
                                            <th>REALISATION</th>
                                            <th>ECART</th>
                                            <th>REALISATION_N-1</th>
                                            <th>PROGRESSION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($mtcs as $key => $values): ?>
                                            <tr>
                                                <th><?= $key ?></th>
                                                <td><?= $values[1]->objectif ?></td>
                                                <td><?= $values[1]->realisation ?></td>
                                                <th><?= $values[1]->realisation - $values[1]->objectif  ?></th>
                                                <td><?= $values[0]->realisation ?></td>
                                                <th><?= $values[0]->realisation?round((($values[1]->realisation - $values[0]->realisation)*100)/$values[0]->realisation,2) . ' %' :'-' ?></th>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <hr/>


                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <h4 class="page-header" style="margin: 10px 0 5px 0">ANALYSE DE DOSSIERS</h4>
                        <div>
                            <div class="panel">
                                <div class="panel-body" style="font-size: 1.1rem">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>SECTEURS</th>
                                            <th>OBJECTIF</th>
                                            <th>REALISATION</th>
                                            <th>ECART</th>
                                            <th>REALISATION_N-1</th>
                                            <th>PROGRESSION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($results as $key => $values): ?>
                                            <tr>
                                                <th><?= $key ?></th>
                                                <td><?= $values[1]->p_objectif ?></td>
                                                <td><?= $values[1]->p_realisation ?></td>
                                                <th><?= $values[1]->p_realisation - $values[1]->p_objectif  ?></th>
                                                <td><?= $values[0]->p_realisation ?></td>
                                                <th><?= $values[0]->p_realisation?round((($values[1]->p_realisation - $values[0]->p_realisation)*100)/$values[0]->p_realisation,2) . ' %' :'-' ?></th>
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
        </div>
    </div>
</div>

