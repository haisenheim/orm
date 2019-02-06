

<div class="content" style="font-family: 'Lato',sans-serif;">
    <h5 class="page-header">NOUVEAU PRODUIT OU SERVICE</h5>

        <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>

        <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-6">
                <label for="name">NOM :</label>
                <input type="text" class="form-control" placeholder="ex: Cereales" name="name" id="name"/>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 form-group">
                <label for="service">est un service? :</label>
                <input type="checkbox" class="checkbox checkbox"  name="service" id="service"/>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-12">
                <label for="sector_id">SECTEUR D'ACTIVITE :</label>
                <select name="sector_id" id="sector_id" class="form-control">
                    <option value="0">Selectionner une categorie</option>
                    <?php foreach($sectors as $p): ?>
                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>


    <h6 class="page-header"><i class="glyphicon glyphicon-arrow-down"></i> &nbsp; Edition des defaillances possibles</h6>

    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12">
            <label for="risque_id">Choix du risque</label>
            <select class="form-control mandatory" name="risque_id" id="risque_id">
                <option value="0">Selectionner un type de risque</option>
                <?php foreach($risques as $p): ?>
                    <option value="<?= $p->id ?>"><?= $p->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-lg-5 col-md-6 col-sm-12">
            <label for="d_name">Defaillance</label>
            <input type="text" class="form-control" id="d_name" placeholder="Nom de la defaillance"/>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-6 form-group">
            <label for="frequence">Frequence</label>
            <select class="form-control mandatory" name="frequence" id="frequence">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 form-group">
            <label for="gravite">Gravite</label>
            <select class="form-control mandatory" name="gravite" id="gravite">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12">
            <label for="d_cause">Causes</label>
            <input type="text" class="form-control" id="d_cause" placeholder="Liste des causes possibles. les separer par des virgules"/>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12">
            <label for="d_conseq">Consequences</label>
            <input type="text" class="form-control" id="d_conseq" placeholder="Liste des consequences. Les separer par des virgules"/>
        </div>



        <div class="col-lg-2 col-md-3 col-sm-6 form-group">
            <button class="btn btn-success btn-sm" id="btn-add"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Ajouter </button>
        </div>
    </div>

    <h6 class="">TABLEAU DES DEFAILLANCES</h6>
    <table id="tab" class="table-condensed table-responsive">
        <thead>
            <tr>

                <th>RISQUE</th>
                <th>DEFAILLANCE</th>
                <th>CAUSES</th>
                <th>CONSEQUENCES</th>
                <th>FREQUENCE</th>
                <th>GRAVITE</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>

    </table>
        <div class="" style="max-width: 400px; margin: 30px auto">
            <button type="submit" id="btn-save" class="btn btn-success btn-sm btn-block"><i class="fa fa-save"></i> ENREGISTRER</button>
        </div>


</div>



<script>

    var saveUrl = "<?= $this->Url->build(['controller'=>'Produits', 'action'=>'saveJson']) ?>";
    var redirectUrl = "<?= $this->Url->build(['controller' => 'Produits', 'action' => 'view']) ?>";

    $('#btn-add').click(function(e){
        e.preventDefault();

        if($('.mandatory').val()==0){
            alert('donnees invalides !!');
        }

        var tr = '<tr><td data-risque_id='+ $('#risque_id').val() +'>'+ $('#risque_id option:selected').text() +'</td><td>'+ $('#d_name').val() +'</td><td>'+ $('#d_cause').val() +'</td><td>'+ $('#d_conseq').val() +'</td><td>'+ $('#frequence').val() +'</td><td>'+ $('#gravite').val() +'</td><td><button class="btn btn-xs btn-danger remove"><i class="glyphicon glyphicon-trash"></i></button></td></tr>';
        // console.log(tr);
        $('#tab').find('tbody').append(tr);
        $('.remove').click(function(e){
            e.preventDefault();
            $(this).parent().parent().remove();
        });

    });




    $('#btn-save').click(function(e){
        e.preventDefault();
        if($('#tab').find('tbody').find('tr').length<1){
            alert('Impossible d\'effectuer l\'enregistrement. Vous programmation est vide !!!');
        }else{

            var data=[];

            var produit={};

            produit.name=$('#name').val();
            if($('#service').is(':checked')){
                produit.service=1;
            }else{
                produit.service=0;
            }

            produit.sector_id=$('#sector_id').val();

            $('#tab').find('tbody').find('tr').each(function(){
                var elt = {};

                elt.risque_id=$(this).find('td').eq(0).data('risque_id');
                elt.name=$(this).find('td').eq(1).text();
                elt.causes=$(this).find('td').eq(2).text();
                elt.consequences=$(this).find('td').eq(3).text();
                elt.frequence=$(this).find('td').eq(4).text();
                elt.gravite=$(this).find('td').eq(5).text();
                data.push(elt);

            });

            //console.log();

            $.ajax({
                url:saveUrl,
                type:'Post',
                dataType:'JSON',
                data:{_csrf:$('#csrf').val(), donnees:data, produit:produit},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
                },
                success: function(data){
                    window.location.replace(redirectUrl+"/"+data);
                }

            });
        }
    });
</script>