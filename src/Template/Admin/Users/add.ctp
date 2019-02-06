



<div class="content">
    <h3 class="page-header text-center"><i class="fa fa-user" style="color: #4caf50;"></i> NOUVEL UTILISATEUR</h3>
    <form action="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>" method="post">
        <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
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
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <label for="phone">Telephone</label>
                <input type="tel" class="form-control" id="phone" name="phone" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
        </div>
        <div style="margin: 20px auto; max-width: 400px;">
            <button type="submit" class="btn btn-success btn-sm btn-block"><i class="glyphicon glyphicon-save"></i> Enregister</button>
        </div>
    </form>
</div>
