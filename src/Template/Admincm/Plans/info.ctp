
<div class="" style="background-color: #FFFFFF; text-align: justify;  padding: 50px 40px; font-weight: 600">
    <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>
    <input type="hidden" id="id" name="id" value="<?= $id ?>"/>
    <h3 class="page-header">DEMARCHE DE CREATION DU PLAN D'ACTION</h3>
    <p>
        Après avoir analyser les risques du dossier en comité de crédit,
        si votre décision porte sur le financement de ce projet et que vous souhaitez que le cabinet OBAC
        fasse le suivi en établissant d’une part un plan d’action visant à maitriser
        les risques métiers et d’autres part des enquêtes pour assurer le suivi de ce plan d’action,
        et tout ceci aux frais du porteur de projet :
    </p>
    <ul class="list-unstyled">
        <li>
            <span class="" style="font-weight: 800">ETAPE 1: </span>Choisissez la fréquence à laquelle vous souhaitez que
            les experts métiers du cabinet OBAC fassent le suivi sur ce dossier. En choisissant la fréquence, vous choisissez a
            fréquence à laquelle vous aurez l’occasion de consulter le plan d’action mise en place ainsi que son exécution.
            (Tous les 7 jours / Tous les 14 jours / Tous les 21 jours / Tous les mois / Tous les trimestres/ Tous les semestres).
            En choisissant une fréquence, le montant du suivi apparait en fonction de l’option choisi. Cette somme devra être payée par le client.

            <button class="btn btn-success" data-toggle="modal" data-target="#m_plan"><i class="fa fa-eye"></i> AFFICHER LE PLAN TARIFAIRE</button>

        </li>
        <li>
            <span class="" style="font-weight: 800">ETAPE 2: </span> Remettre au client le numéro du dossier ainsi
            qu’une fiche de virement permanent qu’il sera amené à réaliser durant la période du suivi.
            Le client devra venir au cabinet OBAC avec une présentation de
            la photocopie de ce virement permanent effectué sur le compte du cabinet ainsi que le numéro de son dossier.
        </li>

       <li>
           <span class="" style="font-weight: 800">ETAPE 3: </span> Deux experts du cabinet OBAC travailleront avec le porteur
           de projet afin d’élaborer un plan d’action visant à maitriser ou réduire les risques.
           Ce plan d’action sera évalué par une dizaine
           d’experts sectoriels en comité d’évaluation des plans d’actions (lequel a lieu tous les mercredis) avant d’être validé.
       </li>
        <li>
            <span class="" style="font-weight: 800">ETAPE 4: </span> En cas de validation du plan d’action, celui-ci sera mis en ligne et rajouté au dossier.
            Il sera visible par le porteur de projet, par l’investisseur et par le cabinet OBAC.
        </li>
    </ul>

    <p>
        En cas de non validation du plan d’action, le comité d’évaluation des plans
        d’action composée de près d’une dizaine d’experts sectoriels proposeront un plan d’action
        qui sera présenté au porteur de projet. En cas de validation du porteur de projet, le plan d’action
        sera publié et visible par tous les acteurs.
        </p>
        <p>
        En cas de refus du porteur de projet, ce dernier sera invité à présenter sa vision en comité
        d’évaluation des risques accompagné des deux experts qui l’ont accompagné dès le départ.
        Si le plan d’action est validé, il sera publié. Dans le cas où le plan d’action n’est pas validé,
        un courrier sera adressé à l’investisseur afin de l’informer que le cabinet OBAC ne suivra pas l’évolution des risques de ce dossier.
    </p>
</div>

<!--<style>
    .list-unstyled li{
        margin: 15px 0 15px 25px;
    }
</style>-->

<div class="modal fade" id="m_plan" tabindex="-1" role="dialog" aria-labelledby="PLAN_TARIFAIRE" style="z-index: 9999; margin: 120px auto">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                </button>
                <h4 class="modal-title page-header">PLAN TARIFAIRE</h4>
            </div>
            <div class="modal-body">
                <table id="tab" class="table table-condensed table-bordered table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>NOMBRE DE SEANCE PAR MOIS</th>
                        <th>MONTANT HT</th>
                        <th>MONTANT TTC</th>
                    </tr>
                    </thead>
                    <tbody class="" >
                    <tr>
                        <td> Une fois (Tous les 30 jours)</td>
                        <th>145 000 FCFA</th>
                        <th>172 405 FCFA</th>
                        <th><input type="radio" name="option" data-id="1"/></th>
                    </tr>
                    <tr>
                        <td>Deux fois (Tous les 14 jours)</td>
                        <th>261 000 FCFA</th>
                        <th>310 329 FCFA</th>
                        <th><input type="radio" name="option" data-id="2"/></th>
                    </tr>
                    <tr>
                        <td>Quatre fois (Tous les 7 Jours)</td>
                        <th>435 000 FCFA</th>
                        <th>517 215 FCFA</th>
                        <th><input type="radio" name="option" data-id="4"/></th>
                    </tr>

                    </tbody>
                </table>
                <div style="margin: 20px">
                    <button id="btn-save" class="btn btn-block btn-success"><i class="fa fa-check"></i> VALIDER</button>
                </div>
            </div>



        </div>

    </div>
</div>

<script>
    var url = "<?= $this->Url->build(['controller'=>'Plans','action'=>'infoJson']); ?>";
    var redirectUrl = "<?= $this->Url->build(['controller'=>'Dossiers','action'=>'view']); ?>";
    $('#btn-save').click(function(e){
        e.preventDefault();
       var val= $('#tab').find('input:checked').data('id');
        var id=$('#id').val();
        //console.log(id);

        if(val<1){
            alert('Veuillez faire un choix.');
        }else{

            $.ajax({
                url:url,
                type:'Post',
                dataType:'JSON',
                data:{_csrf:$('#csrf').val(),id:id,suivi:val},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val());
                    // $('#btn-save').hide();
                },
                success: function(data){
                    $('#btn-save').show();
                    window.location.replace(redirectUrl+"/"+data.id);
                }

            });
        }


        //console.log(val);
    });
</script>