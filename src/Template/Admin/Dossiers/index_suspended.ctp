
<div class="">
    <div style="padding: 10px; border: 1px #cccccc solid; border-radius: 7px">
        <div class="row">
            <?php foreach ($dossiers as $client): ?>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div>
                        <a href="<?= $this->Url->build(['action'=>'view', $client->id]) ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5><i class="glyphicon glyphicon-folder-open"></i>&nbsp;<?= $client->name ?></h5>
                                </div>
                                <div class="panel-body">
                                    ets. FIN. : <span class="value"><?= $client->client?$client->client->name:'-' ?></span> <br/>
                                    PROPRIETAIRE : <span class="value"><?= $client->owner?$client->owner->name:'-' ?></span> <br/>
                                    <i class="glyphicon glyphicon-calendar"></i> <span class="value"><?= date_format(new DateTime($client->created),'d-m-Y') ?></span><br/>
                                    EMPRUNT: <span class="value"><?= $client->emprunt ?></span>
                                </div>
                                <div class="panel-footer">

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Premier')) ?>
            <?= $this->Paginator->prev('< ' . __('Precedent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suivant') . ' >') ?>
            <?= $this->Paginator->last(__('Dernier') . ' >>') ?>
        </ul>
    </div>
</div>

<style>
    a:hover{
        text-decoration: none;
    }
</style>
