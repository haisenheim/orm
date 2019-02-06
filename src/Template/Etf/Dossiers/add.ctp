


<div class="fiche" style="margin-bottom: 70px">
    <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>
    <input type="hidden" id="marketer_id" name="marketer_id" value="<?= $usr['id'] ?>"/>
    <input type="hidden" id="owner_id" value="<?= !empty($client)?$client->id:'' ?>"/>

    <div class="fiche-inner">
        <div class="row section" id="section-1" style="border: solid 1px #cccccc; border-radius: 7px; padding: 10px; margin: 5px">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div>
                    <label for="name">Code du Dossier</label>
                    <input type="text" class="form-control" placeholder="saisir le code. Si vide un code sera genere par le systeme" id="name"/>
                </div>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-12">
                <div>
                    <label for="sector_id">Secteur d'activite</label>
                    <select name="sector_id" id="sector_id" class="form-control">
                        <option value="0">Selectionner un secteur d'activite</option>
                        <?php foreach($sectors as $p): ?>
                            <option value="<?= $p->id ?>"><?= $p->name ?></option>
                        <?php endforeach; ?>
                    </select>

                    </div>
                 </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div>
                    <div>
                        <label for="produit_id">Produit/Service</label>
                        <select name="produit_id" id="produit_id" class="form-control">
                            <option value="0">Selectionner un produit ou service</option>
                            <?php foreach($produits as $p): ?>
                                <option value="<?= $p->id ?>"><?= $p->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <ul class="list-inline" id="list-produit">

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class=" section" id="section-2">
            <h4 class="page-header">OBJECTIFS DE PERFORMANCE</h4>

            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-4" >
                    <label for="name">CA N1</label>
                    <input type="number" class="form-control" placeholder="chiffre d'affaire attendu la premiere annee" id="ca1"/>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4" >
                    <label for="name">CA N2</label>
                    <input type="number" class="form-control" placeholder="chiffre d'affaire attendu la deuxieme annee" id="ca2"/>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4" >
                    <label for="name">CA N3</label>
                    <input type="number" class="form-control" placeholder="chiffre d'affaire attendu la troisieme annee" id="ca3"/>
                </div>
                <div class="separator"></div>
            </div>


            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3" >
                    <label for="name">COUT N1</label>
                    <input type="number" class="form-control" placeholder="couts prevus la premiere annee" id="cout1"/>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3" >
                    <label for="name">COUT N2</label>
                    <input type="number" class="form-control" placeholder="couts prevus la deuxieme annee" id="cout2"/>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3" >
                    <label for="name">COUT N3</label>
                    <input type="number" class="form-control" placeholder="couts prevus la troisieme annee" id="cout3"/>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-3" >
                    <label for="delai">DELAI DE REALISATION (EN MOIS)</label>
                    <input type="number" class="form-control" placeholder="ex:36 (equivalent de 3ans)" id="delai"/>
                </div>
            </div>

        </div>


        <div class="section" id="section-3">
            <h4 class="page-header">BESOINS DE FINANCEMENT</h4>

            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-4" >
                    <label for="name">APPORT PERSONNEL</label>
                    <input type="number" class="form-control" placeholder="Votre apport personnel" id="apport_personnel"/>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4" >
                    <label for="name">APPORT DES ASSOCIES</label>
                    <input type="number" class="form-control" placeholder="L'apport de vos associes" id="apport_associes"/>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4" >
                    <label for="name">EMPRUNT</label>
                    <input type="number" class="form-control" placeholder="Le montant de l'emprunt" id="emprunt"/>
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
                            <ul id="actifs" style="margin-left: 0; padding-left: 0" class="list-inline">
                                <?php foreach($actifs as $p): ?>

                                    <li style="margin-left: 0;" class="">
                                        <?= $p->name ?> <input type="checkbox" style="margin-top: 3px" data-id="<?= $p->id ?>"/>
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
                            <ul id="immobilisations" style="margin-left: 0; padding-left: 0" class="list-inline">
                                <?php foreach($timmobilisations as $p): ?>

                                    <li style="margin-left: 0;" class="">
                                        <?= $p->name ?> <input type="checkbox" style="margin-top: 3px" data-id="<?= $p->id ?>"/>
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
                            <ul id="mfinancements" style="margin-left: 0; padding-left: 0" class="list-inline">
                                <?php foreach($mfinancements as $p): ?>

                                    <li style="margin-left: 0;" class="">
                                        <?= $p->name ?> <input type="checkbox" style="margin-top: 3px" data-id="<?= $p->id ?>"/>
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
                    <input type="text" class="form-control" id="representant"/>
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="" class="control-label">ADRESSE</label>
                    <input type="text" class="form-control" id="adresse"/>
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="" class="control-label">EMAIL</label>
                    <input type="text" class="form-control" id="email"/>
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="" class="control-label">TELEPHONE</label>
                    <input type="text" class="form-control" id="telephone"/>
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="" class="control-label">MOBILE</label>
                    <input type="text" class="form-control" id="mobile"/>
                </div>
            </div>

        </div>


        <div class="section" id="section-4">
            <h4 class="page-header">IDENTIFICATION DES RISQUES</h4>
        </div>

        <div class="loader"></div>


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

    var url = "<?= $this->Url->build(['controller'=>'Produits', 'action'=>'getByIdJson']) ?>";
    var qurl = "<?= $this->Url->build(['controller'=>'Produits', 'action'=>'getQuestionsByIdJson']) ?>";

    $('.loader').hide();
    $("#sector_id").on('change',function(){
       // console.log($("#sector_id").val());
        $.ajax({
            url:url,
            type:'Post',
            dataType:'Json',
            data:{_csrf:$('#csrf').val(), id:$("#sector_id").val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())

            },
            success: function(data){
                $("#produit_id").html("");

                var option = '<option value="0">Selectionner un produit</option>';
                 var dat =data.produits;
                var quest = data.questions;
                for(var i=0; i<dat.length;i++ ){

                    option=option+'<option value='+ dat[i].id +'>'+ dat[i].name +'</option>';

                    $("#produit_id").html(option);
                }

            }
        });
    });


    $("#produit_id").on('change', function(){

        var list = $('#list-produit');
        var idp = $("#produit_id").val();
        var pn = $("#produit_id option:selected").text();
        list.prepend('<li class="list-item badge remove-item" data-id='+ idp+'>'+ pn +'</li>');

        $.ajax({
            url:qurl,
            type:'Post',
            dataType:'Json',
            data:{_csrf:$('#csrf').val(), id:$("#produit_id").val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
            },
            success: function(qt){

                var html='<div id="sect'+idp+'"'+' style="padding: 15px; border: solid 0.6px #cccccc; border-radius: 4px"> <h6 class="page-header" style="font-weight: 700">'+$("#produit_id option:selected").text()+'</h6><div class="">';
                var qt =Object.entries(qt);

                for(var i=0; i<qt.length;i++){

                    //console.log(qt[i]);

                    var risque=qt[i][0];
                    var prs = qt[i][1];

                    //  console.log(prs);
                    html+='<h6 class="page-header">'+risque+'</h6><div class="questionnaire row">';
                    for(var j=0; j<prs.length; j++){
                        console.log(prs[j].question);
                        //console()
                        if(prs[j].question!=null){
                            html+='<div class="col-lg-4 col-md-4 col-sm-12"><h6>'+prs[j].question.name+'</h6><div class="choices">';
                            var choices = prs[j].question.choices;
                            // console.log(choices);
                            html+='<ul class="list-unstyled">';
                            for(var k=0; k<choices.length; k++){
                                //console.log(choices[k]);
                                html+='<li class=""><input data-id='+ choices[k].taux +' value='+ choices[k].id +' type="radio" name='+ prs[j].question.id +'>'+choices[k].name+'</li>';
                            }
                            html+='</ul></div></div>';
                        }

                    }
                    html+='</div>';

                }

                html+='</div></div>';

                $("#section-4").append(html);


            }
        });

        $('.remove-item').click(function(){
            $('#sect'+$(this).data('id')).remove();
            $(this).remove();
        });
    });


    $('#search-client').click(function(e){
        var clientUrl="<?= $this->Url->build(['controller'=>'Clients','action'=>'search','prefix'=>'etf']) ?>";
        e.preventDefault();
        $.ajax({
            url:clientUrl,
            type:'Post',
            dataType:'JSON',
            data:{_csrf:$('#csrf').val(), code:$('#code-client').val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
            },
            success: function(data){
               /*var div = $('#client-data');
                var cont = '';
                cont +='<h6>'+data.name+'</h6>';
                div.html(cont);*/
                $('#code-client').val(data.client.name);
                $('#owner_id').val(data.client.id);
            }

        });

    });


$('#btn-save').click(function(e){

    e.preventDefault();
    $('.questionnaire').find('ul').find('li').find('input:checked').each(function(){
        console.log($(this).data('id') +'---- name: '+$(this).prop('name')+'------------value: '+$(this).val());
    });


    var dossier = {};
    var url = '<?= $this->Url->build(['controller'=>'Dossiers','action'=>'saveJson']) ?>';
    var redirectUrl = '<?= $this->Url->build(['controller'=>'Dossiers','action'=>'view']) ?>';

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

    var reponses = [];
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

    $('.questionnaire').find('ul').find('li').find('input:checked').each(function(){
        var elt = {};
        elt.choice_id=$(this).val();
        elt.question_id=$(this).prop('name');
        reponses.push(elt);
      // console.log($(this).data('id') +'---- name: '+$(this).prop('name')+'------------value: '+$(this).val());
    });

    if(reponses.length<1){
        alert('Remplissage incorrect !!!');
    }else{
        $.ajax({
            url:url,
            type:'Post',
            dataType:'JSON',
            data:{_csrf:$('#csrf').val(), answers:reponses, dossier:dossier,produits:produits,actifs:actifs,timmobilisations:timmobilisations,mfinancements:mfinancements},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
                $('.loader').show();
            },
            success: function(data){
                $('.loader').hide();
                window.location.replace(redirectUrl+"/"+data);

            },
            Error:function(){
                $('#btn-save').show();
            }
        });
    }
   // alert('stop');


});



</script>

<style>
   .content ul>li{
        margin-left: 20px;
    }
</style>
