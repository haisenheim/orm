<h3 class="page-header text-center"><?=  $defaillance->name ?></h3>
<div class="row">
    <div class="col-sm-12 col-md-5 col-lg-5">

        <div class="panel panel-default">
            <div class="panel-body" style="font-size: 1.5rem">
                TYPE DE RIQUE : <span class="value"><?= $defaillance->risque->name  ?></span>
                <br/>
                PRODUIT: <span class="value"><?=  $this->Html->link($defaillance->produit->name, ['controller' => 'Produits', 'action' => 'view', $defaillance->produit->id]) ?></span>
                <br/>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-7 col-md-7">
        <div>
           <?php if(!empty($defaillance->question)): ?>
               <div class="">
                   <h3>QUESTION: <span class="value"><?=  $defaillance->question->name ?></span></h3>
                   <h5 class="page-header">Liste des options possibles</h5>
                   <?php if (!empty($defaillance->question->choices)): ?>
                       <table class="table table-condensed table-bordered table-responsive table-hover">
                           <tr>

                               <th scope="col">Option</th>
                               <th scope="col">Coefficient</th>

                           </tr>
                           <?php foreach ($defaillance->question->choices as $choices): ?>
                               <tr>

                                   <td><?= h($choices->name) ?></td>
                                   <td><?= $choices->taux ?></td>

                               </tr>
                           <?php endforeach; ?>
                       </table>

                   <?php endif; ?>
               </div>
               <?php else: ?>

               <div style="max-width: 400px">
                   <a href="<?= $this->Url->build(['controller'=>'Questions','action'=>'create', $defaillance->id]) ?>" class="btn btn-primary btn-block" ><i class="fa fa-question-circle"></i> CREER UN QUESTION D'EVALUATION</a>
               </div>
            <?php endif; ?>
        </div>
    </div>
</div>



<h5 class="page-header">Base de donnees des questions</h5>

