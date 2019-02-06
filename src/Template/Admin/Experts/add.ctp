



<div class="fiche">
    <div class="fiche-inner">
        <h3 class="page-header text-center"><i class="fa fa-user" style="color: #4caf50;"></i> NOUVEL EXPERT</h3>
        <form action="<?= $this->Url->build(['controller' => 'Experts', 'action' => 'add']) ?>" method="post">
            <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
            <fieldset>
                <legend>IDENTITE</legend>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="last_name">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="first_name">Prenom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" />
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="last_name">DOMAINE D'EXPERTISE</label>
                        <select name="sector_id" id="">
                            <option value="0">SELECTIONNER UN SECTEUR</option>
                            <?php foreach($secteurs as $s): ?>
                                <option value="<?= $s->id ?>"><?= $s->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <label for="last_name">NATIONALITE</label>
                        <select name="nation_id" id="">
                            <option value="0">SELECTIONNER UN PAYS</option>
                            <?php foreach($nations as $s): ?>
                                <option value="<?= $s->id ?>"><?= $s->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="address">DATE DE RECRUTEM.</label>
                        <input type="date" class="form-control" id="address" name="date_recrut" />
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend class="page-header">COORDONNEES</legend>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="address">Adresse</label>
                        <input type="text" class="form-control" id="address" name="address" />
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="phone">Telephone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" />
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="phone">Ville</label>
                        <input type="text" class="form-control" id="phone" name="ville" />
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <h5 class="page-header">INFORMATION DE CONNEXION</h5>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="password">Conformation du mot de passe</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" />
                    </div>
                </div>
            </fieldset>

            <div style="margin: 20px auto; max-width: 400px;">
                <button type="submit" class="btn btn-success btn-sm btn-block"><i class="glyphicon glyphicon-save"></i> Enregister</button>
            </div>
        </form>
    </div>
</div>
