<div class="">
    <div>
        <form class="form-inline" action="<?= $this->Url->build(['action'=>'index']) ?>" method="post">
            <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
            <div class="form-group">
                <label for="">DOSSIER :</label>
                <input type="text" name="dossier"/>
            </div>
            <div class="form-group">
                <label for="">Produit :</label>
                <select name="produit" id="">
                    <option value="0">Selctionner un produit ou service</option>
                    <?php foreach($produits as $prod): ?>
                        <option value="<?= $prod->id ?>"><?= $prod->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>

    <div style="" class="">

        <?php if(!empty($plignes)): ?>
            <div class="">
                <table class="table table-bordered table-striped table-hover">
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
                        <tr>
                            <td><?= $action->produits_risque->risque->name ?></td>
                            <td><?= $action->produits_risque->produit->name ?></td>
                            <td><?= $action->produits_risque->name ?></td>
                            <td><?= $action->amelioration ?></td>

                            <td><?= $action->plan->dossier->name ?></td>
                            <td><?= $action->niveau ?></td>
                            <td><?= date_format(new DateTime($action->echeance),'d-m-Y') ?></td>

                            <td><?= $action->pilote?$action->pilote->name:'-' ?></td>

                            <td>
                                <a class="btn btn-xs btn-success" href="<?= $this->Url->build(['action'=>'view',$action->id]) ?>"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        <?php endif; ?>
    </div>
</div>