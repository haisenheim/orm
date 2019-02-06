<h3 class="page-header text-center"><i class="fa fa-user-friends"></i> LISTE DES UTILISATEURS </h3>
<div class="">
    <span class="btn btn-sm btn-primary"><a class="" href="<?= $this->Url->build(['action'=>'add']) ?>"><i class="fa fa-plus-circle"></i> &nbsp;AJOUTER </a></span>


    <div style="padding: 10px; border: 1px #cccccc solid; border-radius: 7px">
        <div class="row">
            <?php foreach ($users as $client): ?>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div>
                        <a href="<?= $this->Url->build(['action'=>'view', $client->id]) ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5><i class="glyphicon glyphicon-user"></i>&nbsp;<?= $client->name ?></h5>
                                </div>
                                <div class="panel-body">
                                    ADRESSE : <span class="value"><?= $client->address ?></span> <br/>

                                    TELEPHONE: <span class="value"><?= $client->phone ?></span> <br/>
                                    EMAIL : <span class="value"><?= $client->email ?></span> <br/>

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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
<style>
    a:hover{
        text-decoration: none;
    }
</style>