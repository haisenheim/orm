<?= $this->Html->script('tinymce/jquery.tinymce.min.js') ?>
<?= $this->Html->script('tinymce/tinymce.min.js') ?>

<div class="content">

    <div class="row">

        <div class="col-sm-12 col-lg-3 col-md-3">
            <p>DOSSIER : <span class="value"><?= $pligne->plan->dossier->name ?></span></p>
        </div>

        <div class="col-sm-12 col-lg-4 col-md-4">
            <p>TYPE DE RISQUE : <span class="value"><?=  $pligne->produits_risque->risque->name ?></span></p>
        </div>

        <div class="col-sm-12 col-lg-4 col-md-4">
            <p>PRODUIT OU SERVICE : <span class="value"><?=  $pligne->produits_risque->produit->name ?></span></p>
        </div>

        <div class="col-sm-12 col-lg-5 col-md-5">
            <p>DEFAILLANCE : <span class="value "><?=  $pligne->produits_risque->name ?></span></p>
        </div>

        <div class="col-sm-12 col-lg-7 col-md-7">
            ACTION D'AMELIORATION : <span class="value" style="display: inline"><?=  $pligne->amelioration ?></span>
        </div>


        <div class="col-sm-12 col-lg-6 col-md-6">
            <p>NIVEAU : <span class="value"><?=  $pligne->niveau ?></span></p>
        </div>


        <div class="col-sm-12 col-lg-6 col-md-6">
            <p>CONTRIBUTEUR : <span class="value"><?=  $pligne->contributeur ?></span></p>
        </div>


        <div class="col-sm-12 col-lg-6 col-md-6">
            <p>ECHEANCE : <span class="value badge"><?=  $pligne->echeance?date_format(new DateTime($pligne->echeance),'d-m-Y'):'-' ?></span></p>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="well">
                <h6 class="page-header">MODALITES :</h6>
                <p class="value"><?= $pligne->modalites ?></p>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="well">
                <h6 class="page-header">NOTES :</h6>
                <p class="value"><?= $pligne->commentaires ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="well">
                <h6 class="page-header">PV de realisation :</h6>
                <p>
                    <?= $pligne->pv ?>
                </p>
            </div>
        </div>

    </div>



</div>
<script>
    tinymce.init({ selector:'textarea' });
</script>
