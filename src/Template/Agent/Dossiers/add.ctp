

<h5 class="page-header text-center">NOUVEAU DOSSIER</h5>
<div class="content" style="margin-bottom: 70px">
    <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>
    <input type="hidden" id="client_id" name="_csrfToken" value="<?= $company->id ?>"/>
    <input type="hidden" id="marketer_id" name="marketer_id" value="<?= $usr['id'] ?>"/>
    <!--<div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4"><span class="circle" id="circle-1">1</span></div>
        <div class="col-lg-4 col-sm-4 col-md-4"><span class="circle" id="circle-2">2</span></div>
        <div class="col-lg-4 col-sm-4 col-md-4"><span class="circle" id="circle-3">3</span></div>
    </div>
    <h3 class="page-header"></h3>-->

    <div>
        <div class="row section" id="section-1">
            <?php if($usr['role_id'] >=3): ?>
            <div class="col-lg-3 col-sm-6 col-md-3" >
                <label for="owner_id">Porteur du projet
                </label>
                <select name="owner_id" id="owner_id" class="form-control">
                    <option value="0">Selectionner un porteur de projet</option>
                    <?php foreach($owners as $p): ?>
                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php endforeach; ?>
                    <option onclick="window.location.href='<?= $this->Url->build(['controller'=>'Clients','action'=>'add']) ?>'">Nouveau</option>
                </select>
            </div>
            <?php endif; ?>
            <div class="col-lg-3 col-sm-6 col-md-3" >
                <label for="name">Code du Dossier</label>
                <input type="text" class="form-control" placeholder="saisir le code. Si vide un code sera genere par le systeme" id="name"/>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3" >
                <label for="sector_id">Secteur d'activite</label>
                <select name="sector_id" id="sector_id" class="form-control">
                    <option value="0">Selectionner un secteur d'activite</option>
                    <?php foreach($sectors as $p): ?>
                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3" >
                <label for="produit_id">Produit/Service</label>
                <select name="produit_id" id="produit_id" class="form-control">
                    <option value="0">Selectionner un produit ou service</option>
                    <?php foreach($produits as $p): ?>
                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php endforeach; ?>
                </select>
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


        <div class="section" id="section-3">
            <h4 class="page-header">BESOINS DE FINANCEMENT</h4>

            <h6 class="page-header">AFFECTATION DES RESSOURCES</h6>

            <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-6" >
                    <label for="timmo_id">TYPE D'IMMOBILISATION</label>
                    <select name="timmo_id" id="timmo_id" class="form-control">
                        <option value="0">Selectionner un type d'immobilisation</option>
                        <?php foreach($timmobilisations as $p): ?>
                            <option value="<?= $p->id ?>"><?= $p->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6" >
                    <label for="mfin_id">MOYEN DE FINANCEMENT</label>
                    <select name="mfin_id" id="mfin_id" class="form-control">
                        <option value="0">Selectionner un moyen de paiement.</option>
                        <?php foreach($mfinancements as $p): ?>
                            <option value="<?= $p->id ?>"><?= $p->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="section" id="section-4">

        </div>





        <div class="row">

            <div class="pull-left">
                <button class="btn-sm btn btn-primary" id="btn-previous"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;PRECEDENT </button>
            </div>
            <div class="pull-right">
                <button class="btn-sm btn btn-primary" id="btn-next">SUIVANT &nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp; </button>
            </div>

        </div>
    </div>
</div>

<script>

    var url = "<?= $this->Url->build(['controller'=>'Produits', 'action'=>'getByIdJson']) ?>";
    var qurl = "<?= $this->Url->build(['controller'=>'Produits', 'action'=>'getQuestionsByIdJson']) ?>";


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
        $.ajax({
            url:qurl,
            type:'Post',
            dataType:'Json',
            data:{_csrf:$('#csrf').val(), id:$("#produit_id").val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
            },
            success: function(qt){

                var html='<h5 class="page-header">IDENTIFICATION DES RISQUES</h5><div class="row">';
                //console.log(qt);

                for(var i=0; i<qt.length;i++){

                    var risque=qt[i][0].risque;
                    html+='<h6 class="page-header">'+risque.name+'</h6><div class="row questionnaire">';
                    for(var j=0; j<qt[i].length; j++){
                        html+='<h6>'+qt[i][j].name+'</h6><div class="choices">';
                        var choices = qt[i][j].choices;
                       // console.log(choices);
                        html+='<ul class="list-unstyled">';
                        for(var k=0; k<choices.length; k++){
                            //console.log(choices[k]);
                            html+='<li class=""><input data-id='+ choices[k].taux +' value='+ choices[k].id +' type="radio" name='+ qt[i][j].id +'>'+choices[k].name+'</li>';
                        }
                        html+='</ul>';
                    }
                    html+='</div>';

                }

                html+='</div>';

                $("#section-4").html(html);


            }
        });
    });


$('#btn-next').click(function(e){
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
    dossier.timmobilisation_id=$('#timmo_id').val();
    dossier.mfinancement_id=$('#mfin_id').val();
    dossier.owner_id=$('#owner_id').val();
    dossier.marketer_id=$('#marketer_id').val();

    var reponses = [];

    $('.questionnaire').find('ul').find('li').find('input:checked').each(function(){
        var elt = {};
        elt.choice_id=$(this).val();
        elt.question_id=$(this).prop('name');
        reponses.push(elt);
       // console.log($(this).data('id') +'---- name: '+$(this).prop('name')+'------------value: '+$(this).val());
    });
    $.ajax({
        url:url,
        type:'Post',
        dataType:'JSON',
        data:{_csrf:$('#csrf').val(), answers:reponses, dossier:dossier},
        beforeSend:function(xhr){
            xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
        },
        success: function(data){
            window.location.replace(redirectUrl+"/"+data);
        }

    });

});

  /*  $('.section').hide();
    $('#btn-previous').hide();
    $('#circle-1').css({
        'background':'blue'
    });
    $('#section-1').show();

    var i=1;*/

    /*$('#btn-next').click(function(e){
        e.preventDefault();
        $('#section-'+i).hide();
        $('#circle-'+i).css({
            'background':'green'
        });
        $('#btn-previous').show();
        i = i+1;
        if(i<4){
            $('#section-'+i).show();
            $('#circle-'+i).css({
                'background':'blue'
            });
            if(i==4){
                $('#btn-next').hide();
            }
        }

    });*/

</script>

<style>
    ul>li{
        margin-left: 20px;
    }
</style>
