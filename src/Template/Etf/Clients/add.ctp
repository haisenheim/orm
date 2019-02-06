
<div class="content">
    <h3 class="page-header text-center"><i class="fa fa-user-friends"></i> &nbsp; NOUVEAU CLIENT</h3>
    <div>
        <form enctype="multipart/form-data" action="<?= $this->Url->build(['controller' => 'Clients', 'action' => 'add']) ?>" method="post">
            <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
            <div class="" style="padding: 15px; border: 1px solid #cccccc; border-radius: 7px; margin: 10px 0">
                <h6 class="page-header"><i class="fa fa-exclamation-circle"></i> &nbsp; Informations sur le client</h6>
                <div class="row">

                    <div class="col-lg-10 col-md-10 col-sm-12">
                        <label for="name">NOM :</label>
                        <input type="text" class="form-control" placeholder="ex: Alliages Technologies" name="name" id="name"/>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <label for="address">ADRESSE :</label>
                        <input type="text" class="form-control" placeholder="ex: Sis enceinte bourse du travail" name="address" id="address"/>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <label for="phone">TELEPHONE :</label>
                        <input type="tel" class="form-control" placeholder="contact telephonique du client" name="phone" id="phone"/>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" />
                    </div>

                    <?php if($usr['role_id']==1): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label for="compagny_id">Categorie :</label>
                            <select name="tclient_id" id="compagny_id">
                                <option value="0">Selectionner une categorie</option>
                                <?php foreach($tclients as $p): ?>
                                    <option value="<?= $p->id ?>"><?= $p->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label for="photo">PHOTO</label>
                        <input type="file" name="photo"/>
                    </div>

                </div>
            </div>

            <div class="" style="border: solid 1px #cccccc; border-radius: 7px; padding: 15px; margin: 10px 0">
                <h6 class="page-header"><i class="fa fa-user-cog"></i> Informations sur l'utilisateur administrateur</h6>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="last_name">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="first_name">Prenom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" />
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <label for="user_address">Adresse</label>
                        <input type="text" class="form-control" id="user_address" name="user_address" />
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <label for="user_email">Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" />
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <label for="user_phone">Telephone</label>
                        <input type="tel" class="form-control" id="user_phone" name="user_phone" />
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="user_photo">PHOTO</label>
                        <input type="file" name="user_photo"/>
                    </div>

                </div>
            </div>



            <div class="text-center" style="padding: 20px 0;">
                <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-save"></i> Enregister</button>
            </div>
           

        </form>
    </div>
</div>

