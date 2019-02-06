



<div class="content">
    <h5 class="page-header">Nouvel Utilisateur</h5>
    <form action="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>" method="post">
        <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <label for="last_name">Nom</label>
                <input type="text" class="form-control" id="last_name" name="last_name" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
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
            <?php if($usr['role_id']==1): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label for="compagny_id">Compagnie</label>
                <select name="client_id" id="compagny_id">
                    <option value="0">Selectionner une compagnie</option>
                    <?php foreach($compagnies as $p): ?>
                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-6">
                <label for="role_id">Role</label>
                <select name="role_id" id="role_id">
                    <option value="0">Selectionner un role</option>
                    <?php foreach($roles as $p): ?>
                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif; ?>

        </div>
        <div style="margin-top: 20px">
            <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-open"></i> Enregister</button>
        </div>


    </form>
</div>
