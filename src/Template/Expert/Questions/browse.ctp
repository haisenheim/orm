<h3 class="page-header text-center">QUESTIONNAIRE</h3>
<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-default">
            <div class="panel-body">
                TYPE DE RIQUE : <span class="value"><?= $this->Html->link($risque->name, ['controller' => 'Risques', 'action' => 'view', $risque->id])  ?></span>
                <br/>
                PRODUIT: <span class="value"><?=  $this->Html->link($produit->name, ['controller' => 'Produits', 'action' => 'view', $produit->id]) ?></span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-8 col-md-8">
        <div>
            <div class="">
                <span class="btn btn-sm btn-primary"><?= $this->Html->link('Ajouter',['action'=>'create',$produit->id, $risque->id]) ?></span>
                <table class="table-condensed table-responsive" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">Question</th>

                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($questions as $question): ?>
                        <tr>
                            <td><?= h($question->name) ?></td>

                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['action' => 'view', $question->id]) ?>
                                <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $question->id]) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
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
        </div>
    </div>
</div>



<h5 class="page-header">Base de donnees des questions</h5>

