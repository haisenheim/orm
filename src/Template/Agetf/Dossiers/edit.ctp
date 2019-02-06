


<div class="content" style="margin-bottom: 70px">
<input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>
<input type="hidden" id="marketer_id" name="marketer_id" value="<?= $usr['id'] ?>"/>
<input type="hidden" id="owner_id" value="<?= !empty($client)?$client->id:'' ?>"/>
<input type="hidden" id="id" value="<?= $dossier->id ?>"/>
<h3 class="page-header text-center"><i style="color: #4caf50;" class="fa fa-edit"></i> MODIFICATION DU DOSSIER <?= $dossier->name ?></h3>
<div>
<div class="row section" id="section-1" style="border: solid 1px #cccccc; border-radius: 7px; padding: 10px; margin: 5px">
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div>
            <label for="name">Code du Dossier</label>
            <input type="text" class="form-control" value="<?= $dossier->name ?>" placeholder="saisir le code. Si vide un code sera genere par le systeme" id="name"/>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="panel-body">
            <p>PRODUIT(S):
            <ul class="list-inline">
                <?php foreach($dossier->produits as $p) ?>
            </ul>
            <span class="badge"><?= $p->name ?></span> </p>


        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div>

        </div>
    </div>
</div>

<div class=" section" id="section-2">
    <h4 class="page-header">OBJECTIFS DE PERFORMANCE</h4>

    <div class="row">
        <div class="col-lg-4 col-sm-6 col-md-4" >
            <label for="name">CA N1</label>
            <input type="number" class="form-control" value="<?= $dossier->ca1 ?>" placeholder="chiffre d'affaire attendu la premiere annee" id="ca1"/>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-4" >
            <label for="name">CA N2</label>
            <input type="number" class="form-control" value="<?= $dossier->ca2 ?>" placeholder="chiffre d'affaire attendu la deuxieme annee" id="ca2"/>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-4" >
            <label for="name">CA N3</label>
            <input type="number" class="form-control" value="<?= $dossier->ca3 ?>" placeholder="chiffre d'affaire attendu la troisieme annee" id="ca3"/>
        </div>
        <div class="separator"></div>
    </div>


    <div class="row">
        <div class="col-lg-3 col-sm-6 col-md-3" >
            <label for="name">COUT N1</label>
            <input type="number" class="form-control" value="<?= $dossier->cout1 ?>" placeholder="couts prevus la premiere annee" id="cout1"/>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-3" >
            <label for="name">COUT N2</label>
            <input type="number" class="form-control" value="<?= $dossier->cout2 ?>" placeholder="couts prevus la deuxieme annee" id="cout2"/>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-3" >
            <label for="name">COUT N3</label>
            <input type="number" class="form-control" value="<?= $dossier->cout3 ?>" placeholder="couts prevus la troisieme annee" id="cout3"/>
        </div>
        <div class="col-lg-3 col-sm-12 col-md-3" >
            <label for="delai">DELAI DE REALISATION (EN MOIS)</label>
            <input type="number" class="form-control" value="<?= $dossier->delai ?>" placeholder="ex:36 (equivalent de 3ans)" id="delai"/>
        </div>
    </div>

</div>


<div class="section" id="section-3">
    <h4 class="page-header">BESOINS DE FINANCEMENT</h4>

    <div class="row">
        <div class="col-lg-4 col-sm-6 col-md-4" >
            <label for="name">APPORT PERSONNEL</label>
            <input type="number" class="form-control" value="<?= $dossier->apport_personnel ?>" placeholder="Votre apport personnel" id="apport_personnel"/>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-4" >
            <label for="name">APPORT DES ASSOCIES</label>
            <input type="number" class="form-control" value="<?= $dossier->apport_associes ?>" placeholder="L'apport de vos associes" id="apport_associes"/>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-4" >
            <label for="name">EMPRUNT</label>
            <input type="number" class="form-control" value="<?= $dossier->emprunt ?>" placeholder="Le montant de l'emprunt" id="emprunt"/>
        </div>
    </div>
</div>
<div class="section">

    <h4 class="page-header">AFFECTATION DES RESSOURCES</h4>

    <div class="row">
        <div class="col-lg-4 col-sm-12 col-md-4" >
            <div class="panel">
                <div class="panel-heading">
                    <h6>ACTIFS CIRCULANTS</h6>
                </div>
                <div class="panel-body">
                    <?php
                    $ids=[];
                    if(!empty($dossier->actifs)){
                        foreach($dossier->actifs as $act){
                            $ids[]=$act->id;
                        }
                    }
                    ?>
                    <ul id="actifs" style="margin-left: 0; padding-left: 0" class="list-inline">

                        <?php foreach($actifs as $p): ?>
                            <li style="margin-left: 0;" class="">

                                <?= $p->name ?> <input type="checkbox" <?= in_array($p->id,$ids)?"checked":"" ?> style="margin-top: 3px" data-id="<?= $p->id ?>"/>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 col-md-4" >
            <div class="panel">
                <div class="panel-heading">
                    <h6>IMMOBILISATION</h6>
                </div>
                <div class="panel-body">
                    <?php
                    $ids=[];
                    if(!empty($dossier->timmobilisations)){
                        foreach($dossier->timmobilisations as $act){
                            $ids[]=$act->id;
                        }
                    }

                    ?>
                    <ul id="immobilisations" style="margin-left: 0; padding-left: 0" class="list-inline">
                        <?php foreach($timmobilisations as $p): ?>

                            <li style="margin-left: 0;" class="">
                                <?= $p->name ?> <input type="checkbox" <?= in_array($p->id,$ids)?"checked":"" ?> style="margin-top: 3px" data-id="<?= $p->id ?>"/>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 col-md-4" >
            <div class="panel">
                <div class="panel-heading">
                    <h6>MOYENS DE FINANCEMENT</h6>
                </div>
                <div class="panel-body">
                    <?php
                    $ids=[];
                    if(!empty($dossier->mfinancements)){
                        foreach($dossier->mfinancements as $act){
                            $ids[]=$act->id;
                        }
                    }

                    ?>
                    <ul id="mfinancements" style="margin-left: 0; padding-left: 0" class="list-inline">
                        <?php foreach($mfinancements as $p): ?>

                            <li style="margin-left: 0;" class="">
                                <?= $p->name ?> <input type="checkbox" <?= in_array($p->id,$ids)?"checked":"" ?> style="margin-top: 3px" data-id="<?= $p->id ?>"/>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <h4 class="page-header">COORDONNEES</h4>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <label class="control-label" for="">PORTEUR DE PROJET</label>
            <input type="text" value="<?= $dossier->representant ?>" class="form-control" id="representant"/>
        </div>
        <div class="col-md-4 col-sm-12">
            <label for="" class="control-label">ADRESSE</label>
            <input type="text" value="<?= $dossier->adresse ?>" class="form-control" id="adresse"/>
        </div>
        <div class="col-md-4 col-sm-12">
            <label for="" class="control-label">EMAIL</label>
            <input type="email" class="form-control" value="<?= $dossier->email ?>" id="email"/>
        </div>
        <div class="col-md-4 col-sm-12">
            <label for="" class="control-label">TELEPHONE</label>
            <input type="text" value="<?= $dossier->telephone ?>" class="form-control" id="telephone"/>
        </div>
        <div class="col-md-4 col-sm-12">
            <label for="" class="control-label">MOBILE</label>
            <input type="text" class="form-control" value="<?= $dossier->mobile ?>" id="mobile"/>
        </div>
    </div>

</div>



<div>
    <div style="" class="save-section">
        <button id="btn-save" class="btn btn-success btn-block">
            <i class="glyphicon glyphicon-save"></i> Enregistrer
        </button>
    </div>
</div>
</div>
</div>

<script>


    $('#btn-save').click(function(e){

        e.preventDefault();
        $('.questionnaire').find('ul').find('li').find('input:checked').each(function(){
            console.log($(this).data('id') +'---- name: '+$(this).prop('name')+'------------value: '+$(this).val());
        });


        var dossier = {};
        var url = '<?= $this->Url->build(['controller'=>'Dossiers','action'=>'editJson']) ?>';
        var redirectUrl = '<?= $this->Url->build(['controller'=>'Dossiers','action'=>'view']) ?>';

        dossier.id= $('#id').val();
        dossier.name = $('#name').val();
        dossier.produit_id=$('#produit_id').val();
        dossier.ca1=$('#ca1').val();
        dossier.ca2=$('#ca2').val();
        dossier.ca3=$('#ca3').val();
        dossier.cout1=$('#cout1').val();
        dossier.cout2=$('#cout2').val();
        dossier.cout3=$('#cout3').val();
        dossier.delai=$('#delai').val();
        dossier.apport_personnel=$('#apport_personnel').val();
        dossier.apport_associes=$('#apport_associes').val();
        dossier.emprunt=$('#emprunt').val();
        //dossier.timmobilisation_id=$('#timmo_id').val();
        // dossier.mfinancement_id=$('#mfin_id').val();
        dossier.owner_id=$('#owner_id').val();
        dossier.marketer_id=$('#marketer_id').val();
        dossier.representant=$('#representant').val();
        dossier.email=$('#email').val();
        dossier.adresse=$('#adresse').val();
        dossier.telephone=$('#telephone').val();
        dossier.mobile=$('#mobile').val();

        var produits=[];
        $('#list-produit').find('li').each(function(){
            produits.push($(this).data('id'));
        });


        var actifs=[];
        $('#actifs').find('input[type="checkbox"]').each(function(){
            if($(this).is(':checked')){
                actifs.push($(this).data('id'));
            }
        });

        var mfinancements=[];
        $('#mfinancements').find('input[type="checkbox"]').each(function(){
            if($(this).is(':checked')){
                mfinancements.push($(this).data('id'));
            }
        });

        var timmobilisations=[];
        $('#immobilisations').find('input[type="checkbox"]').each(function(){
            if($(this).is(':checked')){
                timmobilisations.push($(this).data('id'));
            }
        });



        $.ajax({
            url:url,
            type:'Post',
            dataType:'JSON',
            data:{_csrf:$('#csrf').val(), dossier:dossier,produits:produits,actifs:actifs,timmobilisations:timmobilisations,mfinancements:mfinancements},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
                // $('#btn-save').hide();
            },
            success: function(data){
                $('#btn-save').show();
                window.location.replace(redirectUrl+"/"+data);
            },
            Error:function(){
                $('#btn-save').show();
            }
        });


    });


</script>

