
<div class="">
    <div style="margin: 20px 0">
        <span> <a class="btn btn-sm btn-dark" href="<?= $this->Url->build(['action'=>'add']) ?>"><i class="fa fa-plus-circle"></i> AJOUTER</a></span>
    </div>


   <div style="padding: 15px; border: 1px #cccccc solid; border-radius: 7px">
       <div class="row">
           <?php foreach ($clients as $client): ?>
           <div class="col-lg-3 col-md-3 col-sm-12">
               <div>
                   <a href="<?= $this->Url->build(['action'=>'view', $client->id]) ?>">
                       <div class="panel panel-default">
                           <div class="panel-heading">
                               <h5><?= $client->name ?></h5>
                           </div>
                           <div class="panel-body">
                               ADRESSE : <span class="value"><?= $client->address ?></span> <br/>
                               TEL: <span class="value"><?= $client->phone ?></span><br/>
                               EMAIL: <span class="value"><?= $client->email ?></span>
                           </div>
                           <div class="panel-footer">
                               CODE OBAC : <span class="value"><?= $client->code ?></span>
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