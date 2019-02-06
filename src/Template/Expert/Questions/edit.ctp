<div class="content">
    <h3 class="page-header text-center"><i class="fa fa-edit" style="color: #4caf50;"></i> EDITION DES QUESTIONS</h3>

    <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>
    <input type="hidden" id="id" value="<?= $question->id ?>"/>

    <div class="row">

        <div class="col-lg-10 col-md-10 col-sm-6">
            <label for="name">INTITULE :</label>
            <input type="text" class="form-control" placeholder="ex: Quel est votre plus belle rencontre ?" name="name" id="name" value="<?= $question->name ?>"/>
        </div>



        <div class="col-lg-3 col-md-4 col-sm-12">
            <label for="risque_id">RISQUE :</label>
            <select name="risque_id" id="risque_id" class="form-control">
                <option value="<?= $question->risque->id ?>"><?= $question->risque->name ?></option>
                <?php foreach($risques as $p): ?>
                    <?php if($p->id!=$question->risque_id): ?>
                         <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <label for="produit_id">Produit :</label>
            <select name="produit_id" id="produit_id" class="form-control">
                <option value="<?= $question->produit->id ?>"><?= $question->produit->name ?></option>
                <?php foreach($produits as $p): ?>
                    <?php if($p->id!=$question->produit_id): ?>
                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php endif ?>
                <?php endforeach; ?>
            </select>
        </div>

    </div>


    <h4 class="page-header">EDITION DES RISQUES ASSOCIES</h4>

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
            <?php foreach($question->choices as $choice): ?>
                <tr>
                    <td contenteditable="true"><?= $choice->name ?></td>
                    <td><?= $choice->taux ?></td>
                    <td><button class="btn btn-xs btn-danger remove"><i class="glyphicon glyphicon-trash"></i></button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
        <div class="" style="max-width: 400px; margin:20px auto">
            <button type="submit" id="btn-save" class="btn btn-success btn-sm btn-block"><i class="fa fa-save"></i> Enregister</button>
        </div>


</div>



<script>

    var saveUrl = "<?= $this->Url->build(['controller'=>'Questions', 'action'=>'editJson']) ?>";
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

    $('.remove').click(function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
    });




    $('#btn-save').click(function(e){
        e.preventDefault();
        if($('#tab').find('tbody').find('tr').length<1){
            alert('Impossible d\'effectuer l\'enregistrement. Vous programmation est vide !!!');
        }else{

            var data=[];

            var question={};

            question.name=$('#name').val();
            question.id=$('#id').val();
            question.risque_id=$('#risque_id').val();
            question.produit_id=$('#produit_id').val();

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
