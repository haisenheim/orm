
<div class="content">
    <h5 class="page-header">EDITION DU PROFIL UTILISATEUR</h5>
    <form enctype="multipart/form-data" action="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit']) ?>" method="post">
        <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="last_name">Nom</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $user->last_name ?>" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="first_name">Prenom</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $user->first_name ?>" />
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" name="address"  value="<?= $user->address ?>" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <label for="email">Email</label>
                <input type="" class="form-control" id="email" name="email"  value="<?= $user->email ?>" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <label for="phone">Telephone</label>
                <input type="tel" class="form-control" id="phone" name="phone"  value="<?= $user->phone ?>" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password"  value="<?= $user->password ?>" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="password"> Confirmation du Mot de passe</label>
                <input type="password" class="form-control" id="password" name="cpassword"  value="<?= $user->password ?>" />
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="password">PHOTO:</label>
                <input type="file" class="form-control" id="" name="imageUri" />
            </div>

        </div>
        <div style="margin-top: 20px">
            <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-open"></i> Enregister</button>
        </div>
    </form>
</div>
