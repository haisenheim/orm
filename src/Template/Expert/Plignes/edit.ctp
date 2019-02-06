<?= $this->Html->script('tinymce/jquery.tinymce.min.js') ?>
<?= $this->Html->script('tinymce/tinymce.min.js') ?>

<div class="content" style="border-radius: 7px; border: solid 1px #cccccc; padding: 15px">

    <div class="row well">

        <div class="col-sm-12 col-lg-3 col-md-3">
            <p>DOSSIER : <span class="value"><?= $pligne->plan->dossier->name ?></span></p>
        </div>

        <div class="col-sm-12 col-lg-4 col-md-4">
            <p>TYPE DE RISQUE : <span class="value"><?=  $pligne->produits_risque->risque->name ?></span></p>
        </div>

        <div class="col-sm-12 col-lg-4 col-md-4">
            <p>PRODUIT OU SERVICE : <span class="value"><?=  $pligne->produits_risque->produit->name ?></span></p>
        </div>

        <div class="col-sm-12 col-lg-5 col-md-5">
            <p>DEFAILLANCE : <span class="value"><?=  $pligne->produits_risque->name ?></span></p>
        </div>

    </div>



    <?= $this->Form->create($pligne) ?>

    <div class="row">

        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label for="" class="control-label">OBJECTIF:</label>
                <input type="text" class="form-control" name="objectif" value="<?= $pligne->objectif ?>"/>
            </div>
        </div>

        <div class="col-sm-12 col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Personne Pliote</label>
                <select name="pilote_id" id="">
                    <option value="0">Selectionner une personne pilote</option>
                    <?php foreach($pilotes as $pilote): ?>
                        <option value="<?= $pilote->id ?>"><?= $pilote->last_name . "  ". $pilote->first_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>



        <div class="col-lg-4 col-sm-12 col-md-4">
            <div class="form-group">
                <label for="">BUDGET</label>
                <input type="number" class="form-control" name="budget" value="<?= $pligne->budget ?>" />
            </div>
        </div>

        <div class="col-sm-12 col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Echeance</label>
                <input value="<?= $pligne->echeance ?>" type="date" name="echeance" class="form-control"/>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="">Niveau</label>
                <input type="text" class="form-control" name="niveau" value="<?= $pligne->niveau ?>" />
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="">Contributeur</label>
                <input  value="<?= $pligne->contributeur ?>" type="text" name="contributeur" class="form-control"/>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="">Action d'amelioration:</label>
                <textarea class="form-control" name="amelioration" id="" cols="20" rows="5"><?= $pligne->amelioration ?></textarea>
            </div>
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="">MODALITES : </label>
                <textarea name="modalites" id="" cols="20" rows="5" class="form-control"><?= $pligne->modalites ?></textarea>
            </div>
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="">COMMENTAIRE :</label>
                <textarea name="commentaires" id="" cols="20" rows="5" class="form-control"><?= $pligne->commentaires ?></textarea>
            </div>
        </div>
    </div>



    <div style="max-width: 300px; margin: 20px auto">
        <button title="" type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i>Enregistrer</button>
    </div>
    <?= $this->Form->end() ?>
</div>

<script>
    tinymce.init({ selector:'textarea' });
</script>