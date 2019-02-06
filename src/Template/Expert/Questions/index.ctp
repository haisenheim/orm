

<h3 class="page-header text-center"><i style="color: #4caf50;" class="fa fa-database"></i> BASE  DE DONNEES DES QUESTIONS D'EVALUATION</h3>
<div class="">
    <a href="<?= $this->Url->build(['action'=>'add']) ?>" style="margin-bottom: 20px" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> AJOUTER</a>
    <table class="table-condensed table-responsive table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Question</th>

                <th scope="col">RISQUE</th>
                <th>PRODUIT</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td><?= h($question->name) ?></td>
                <th><?= $question->risque->name ?></th>
                <td><?= $question->has('produit') ? $this->Html->link($question->produit->name, ['controller' => 'Produits', 'action' => 'view', $question->produit->id]) : '' ?></td>
                <td class="actions">

                    <ul class="list-inline" style="margin-bottom: 0; text-align: center">
                        <li class="" style="" title="afficher" >
                            <a class="btn btn-sm btn-info" style="padding: 5px" href="<?= $this->Url->build(['action'=>'view', $question->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                        </li>
                        <li class="" style="" title="Modifier" >
                            <a class="btn btn-sm btn-success" style="padding: 5px" href="<?= $this->Url->build(['action'=>'edit', $question->id]) ?>" ><i class="fa fa-edit"></i></a>
                        </li>
                        <li class="" style="" title="Supprimer" >
                            <a class="btn btn-sm btn-danger" style="padding: 5px" href="<?= $this->Url->build(['action'=>'delete', $question->id]) ?>" ><i class="fa fa-trash"></i></a>
                        </li>
                    </ul>
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
