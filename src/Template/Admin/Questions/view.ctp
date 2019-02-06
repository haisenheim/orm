
<div class="">
    <h3 class="page-header text-center"><i class="fa fa-question-circle" style="color: #4caf50;"></i> <?= $question->name ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row">Question</th>
            <td><?= h($question->name) ?></td>
        </tr>
        <tr>
            <th scope="row">Produit ou Service</th>
            <td><?= $this->Html->link($question->produits_risque->produit->name, ['controller' => 'Produits', 'action' => 'view', $question->produits_risque->produit_id])  ?></td>
        </tr>
        <tr>
            <th scope="row">Type de risque concerne</th>
            <th><?= $question->produits_risque->risque->name ?></th>
        </tr>



    </table>

    <div class="">
        <h4 class="page-header">Liste des options possibles</h4>
        <?php if (!empty($question->choices)): ?>
        <table class="table table-condensed table-bordered table-responsive table-hover">
            <tr>

                <th scope="col">Option</th>
                <th scope="col">Coefficient</th>

            </tr>
            <?php foreach ($question->choices as $choices): ?>
            <tr>

                <td><?= h($choices->name) ?></td>
                <td><?= $choices->taux ?></td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
