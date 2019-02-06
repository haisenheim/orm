
<div class="content">
    <div>
        <form action="<?= $this->Url->build(['action'=>'edit']) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>

            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="">NOM DE L'ETABLISSEMENT :</label>
                        <input type="text" class="form-control" name="name" value="<?= $client->name ?>"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="">SLOGAN :</label>
                        <input type="text" class="form-control" name="slogan" value="<?= $client->slogan ?>"/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">ADRESSE PHYSIQUE :</label>
                        <input type="text" class="form-control" name="address" value="<?= $client->address ?>"/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">ADRESSE EMAIL :</label>
                        <input type="text" class="form-control" name="email" value="<?= $client->email ?>"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="">TELEPHONE :</label>
                        <input type="text" class="form-control" name="phone" value="<?= $client->phone ?>"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="">LOGO :</label>
                        <input type="file" class="form-control" name="imageUri" />
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="">IMAGE DE FOND :</label>
                        <input type="file" class="form-control" name="bg_img" />
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="form-group">
                        <label for="">RCCM :</label>
                        <input type="text" class="form-control" name="rccm" value="<?= $client->rccm ?>" />
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">CAPITAL SOCIAL :</label>
                        <input type="text" class="form-control" name="capital" value="<?= $client->capital ?>" />
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="form-group">
                        <label for="">COULEUR D'ENTETE :</label>
                        <input type="color" class="" name="header_color" />
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="form-group">
                        <label for="">COULEUR DE  PIED :</label>
                        <input type="color" class="" name="footer_color"/>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="form-group">
                        <label for="">COULEUR DES TITRES :</label>
                        <input type="color" class="" name="title_color"/>
                    </div>
                </div>
            </div>
            <hr style="border-bottom: solid 1px #000000; padding-bottom: 15px"/>
            <div class="" style="max-width: 300px; margin: 20px auto">
                <button type="submit" class="btn btn-block btn-success"><i class="fa fa-save"></i> ENREGISTRER</button>
            </div>
        </form>
    </div>
</div>

