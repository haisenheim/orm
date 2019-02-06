<div style="border: solid 1px #cccccc; padding: 15px; border-radius: 7px">
    <div class="row">
        <div class="col-sm-12 col-lg-4 col-md-4">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title"><?= $client->name . " - " .  $client->code ?></h6>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-lg-3">
                                <div style="height: 80px; width: 80px;" >
                                    <?= $this->Html->image($client->imageUri?$client->imageUri:'avatar.png',['fullBase'=>true, 'class'=>'img img-rounded','width'=>'100%', 'height'=>'100%']) ?>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-9 col-lg-9">
                                <div class="" style="display: ">
                                    NOM : <?= $client->name ?> <br/>
                                    ADRESSE : <span class="value"><?= $client->address ?></span> <br/>
                                    EMAIL : <span class="value"><?= $client->email ?></span> <br/>
                                    TEL : <span class="value"><?= $client->phone ?></span>
                                    CATEGORIE : <i class="fa fa-user-friends"></i> <span class="value"><?=$client->tclient->name?$client->tclient->name:'-' ?></span><br/>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="panel-footer">
                        PERSONNE RESSOURCE: <span class="value"><?= $client->representant ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-8">
            <div style="" class="well">
                <div class="">
                    <h6 class="title">LISTE DES DOSSIERS</h6>
                </div>
                <?php if(!empty($dossiers)): ?>
                    <div class="row">
                        <?php foreach ($dossiers as $client): ?>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div>
                                    <a href="<?= $this->Url->build(['controller'=>'Dossiers', 'action'=>'view', $client->id]) ?>">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h6 class="panel-title"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;<?= $client->name ?></h6>
                                            </div>
                                            <div class="panel-body">
                                                CREE LE : <span class="value"><?= date_format(new DateTime($client->created),'d-m-y H:i') ?></span> <br/>
                                                EMPRUNT: <span class="value"><?= $client->emprunt ?></span><br/>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>



<style>
    a:hover{
        text-decoration: none;
    }
</style>

