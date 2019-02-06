
<div class="fiche">
    <div class="fiche-inner">
        <h3 class="fiche-title">DE FICHE DE L'EXPERT</h3>

        <div class="" style="">
            <div style="display:inline-block">
                <?= $this->Html->image($user->imageUri?$user->imageUri:'avatar.png',['fullBase'=>true,'style'=>'max-width:150px; max-height:150px','class'=>'img img-thumbnail']) ?>
            </div>
            <div class="text-justify" style="display: inline-block; margin: 0 15px">
                <h3 class="text-left"><?= $user->name  ?> </h3>
                <h5><?= $user->sector?$user->sector->name:'' ?></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <table class="" style="border: none">
                    <tr>
                        <th scope="row">NOM </th>
                        <td><?= $user->last_name ?></td>

                    </tr>

                    <tr>
                        <th scope="row">PRENOM </th>
                        <td><?= $user->first_name ?></td>

                    </tr>


                    <tr>
                        <th scope="row">ADRESSE</th>
                        <td><?= h($user->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">TELEPHONE</th>
                        <td><?= h($user->phone) ?></td>
                    </tr>

                    <tr>
                        <th scope="row">VILLE</th>
                        <td><?= $user->ville ?></td>
                    </tr>

                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">DOMAINE D'EXPERTISE</th>
                        <td><?= $user->has('sector') ? $user->sector->name: '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row">DATE DE RECRUTEMENT</th>
                        <td><?= $user->date_recrut?date_format($user->date_recrut,'d-m-Y'):'-' ?></td>
                    </tr>
                    <tr>
                        <th scope="row">NATIONALITE</th>
                        <td><?= $user->nation?$user->nation->name:'-' ?></td>
                    </tr>
                    <tr>
                        <th scope="row">DERNIERE CONNEXION</th>
                        <td><?= $user->last_connexion?date_format($user->last_connexion,'d-m-Y H:i'):'-' ?></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>
