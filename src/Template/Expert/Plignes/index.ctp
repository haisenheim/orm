<div class="">
        <h3 class="page-header text-center">LISTE DES ACTIONS D'AMELIORATION</h3>


   <div class="panel panel-default">
       <div>
           <div class="panel-body">

               <?php if(!empty($plignes)): ?>
                   <div class="table-responsive">
                       <table id="example" class=" dataTable table table-bordered table-striped">
                           <thead>
                           <tr>
                               <th>TYPE DE RISQUE</th>
                               <th>PRODUIT</th>
                               <th>DEFAILLANCE</th>
                               <th>LIBELLE</th>
                               <th>DOSSIER</th>
                               <th>NIVEAU</th>
                               <th>ECHEANCE</th>
                               <th>RESPONSABLE</th>
                               <th></th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php foreach ($plignes as $action): ?>
                               <tr>
                                   <td><?= $action->produits_risque->risque->name ?></td>
                                   <td><?= $action->produits_risque->produit->name ?></td>
                                   <td><?= $action->produits_risque->name ?></td>
                                   <td><?= $action->amelioration ?></td>

                                   <td><?= $action->plan->dossier->name ?></td>
                                   <td><?= $action->niveau ?></td>
                                   <td><?= date_format(new DateTime($action->echeance),'d-m-Y') ?></td>

                                   <td><?= $action->pilote?$action->pilote->name:'-' ?></td>

                                   <td>
                                       <a class="btn btn-xs btn-danger" href="<?= $this->Url->build(['action'=>'view',$action->id]) ?>"><i class="fa fa-eye"></i></a>
                                   </td>
                               </tr>
                           <?php endforeach; ?>
                           </tbody>
                       </table>

                   </div>
               <?php endif; ?>
           </div>
       </div>
   </div>
</div>

<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/buttons.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/select.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/fixedHeader.bootstrap4.css') ?>


<?= $this->Html->script('../assets_concept_template/vendor/jquery/jquery-3.3.1.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/bootstrap/js/bootstrap.bundle.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/slimscroll/jquery.slimscroll.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/multi-select/js/jquery.multi-select.js') ?>
<?= $this->Html->script('../assets_concept_template/libs/js/main-js.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/jquery.dataTables.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.buttons.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/data-table.js') ?>



<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.html5.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.print.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.colVis.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.rowGroup.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.select.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.fixedHeader.min.js') ?>