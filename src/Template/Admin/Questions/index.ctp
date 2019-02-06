

<h3 class="page-header text-center"><i style="color: #4caf50;" class="fa fa-database"></i> BASE  DE DONNEES DES QUESTIONS D'EVALUATION</h3>
<div class="">
    <a href="<?= $this->Url->build(['action'=>'add']) ?>" style="margin-bottom: 20px" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> AJOUTER</a>
    <table id="example" class="dataTable table table-bordered table-responsive table-condensed table-hover" style="width: 100%;">
        <thead>
            <tr>
                <th style="max-width: 30%">Question</th>
                <th>DEFAILLANCE</th>

                <th scope="col">RISQUE</th>
                <th>PRODUIT</th>
                <th style="width: 15%" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td style="max-width: 30%"><?= h($question->name) ?></td>
                <td><?= $question->produits_risque->name ?></td>
                <th><?= $question->produits_risque->risque->name ?></th>
                <td><?= $question->produits_risque->produit->name ?></td>
                <td style="width:15% " class="actions">

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
</div>


<script>
    $(document).ready(function(){
        $('#example').DataTable({
            "language": {
                     "paginate": {
                   "previous": "Precedent",
                         "search":"Rechercher",
                         "next":"Suivant"
                     }
                }
        });
    })
</script>