

<div class="content">
    <h3 class="page-header text-center"><i class="fa fa-question-circle"></i>&nbsp; QUESTION D'EVALUATION</h3>

    <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>
    <input type="hidden" id="pr_id" name="_csrfToken" value="<?= $pr->id ?>"/>
    <h4>DEFAILLANCE: <span class="value"><?= $pr->name ?></span></h4>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">

            <input type="hidden" id="risque_id" name="risque_id" value="<?= $pr->risque->id ?>"/>
            <input type="hidden" id="produit_id" name="produit_id" value="<?= $pr->produit->id ?>"/>
            <div class="panel panel-default">
                <div class="panel-body" style="font-size: 1.4rem">
                    TYPE DE RIQUE : <span class="value"><?= $pr->risque->name  ?></span>
                    <br/>
                    PRODUIT: <span class="value"><?=  $this->Html->link($pr->produit->name, ['controller' => 'Produits', 'action' => 'view', $pr->  produit->id]) ?></span>
                </div>
            </div>
    </div>

        <div class="col-lg-7 col-md-7 col-sm-12">
            <label for="name">INTITULE :</label>
            <input type="text" class="form-control" placeholder="ex: Quel est votre plus belle rencontre ?" name="name" id="name"/>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="choix">Element de reponse</label>
                    <input type="text" class="form-control" placeholder="" name="choix" id="choix"/>

                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 form-group">
                    <label for="taux">Coefficient</label>
                    <select class="form-control mandatory" name="taux" id="taux">
                        <option value="0.25">0.25</option>
                        <option value="0.5">0.5</option>
                        <option value="0.75">0.75</option>
                        <option value="1">1</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6 form-group">
                    <button class="btn btn-success btn-sm" id="btn-add"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Ajouter </button>
                </div>
            </div>
        </div>

        </div>




    <h6 class="">Tableau des reponses possibles</h6>
    <table id="tab" class="table-condensed table-responsive">
        <thead>
        <tr>
            <th>Element de reponse</th>
            <th>Coefficient</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        </tbody>

    </table>

    <button type="submit" id="btn-save" class="btn btn-success btn-sm">Enregister</button>

</div>



<script>

    var saveUrl = "<?= $this->Url->build(['controller'=>'Questions', 'action'=>'createJson']) ?>";
    var redirectUrl = "<?= $this->Url->build(['controller' => 'Questions', 'action' => 'index']) ?>";

    $('#btn-add').click(function(e){
        e.preventDefault();

        if($('.mandatory').val()==0){
            alert('donnees invalides !!');
        }

        var tr = '<tr><td>'+ $('#choix').val() +'</td><td>'+ $('#taux').val() +'</td><td><button class="btn btn-xs btn-danger remove"><i class="glyphicon glyphicon-trash"></i></button></td></tr>';
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

            var question={};

            question.name=$('#name').val();
            question.pr_id=$('#pr_id').val();


            $('#tab').find('tbody').find('tr').each(function(){
                var elt = {};

                elt.choice=$(this).find('td').eq(0).text()
                elt.coef=$(this).find('td').eq(1).text();

                data.push(elt);

            });

            //console.log();

            $.ajax({
                url:saveUrl,
                type:'Post',
                dataType:'JSON',
                data:{_csrf:$('#csrf').val(), donnees:data, question:question},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
                },
                success: function(data){
                    window.location.replace(redirectUrl);
                }

            });
        }
    });
</script>