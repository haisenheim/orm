<h3 class="page-header text-center">OBJECTIFS DE CREATION DES DOSSIERS ET DES PLANS</h3>
<div class="" style="background-color: #EEEEEE; padding: 10px">
    <div class="" style="background-color: #FFFFFF; max-width: 85%; margin: 10px auto; padding-bottom: 30px; ">
        <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>

        <table id="tab" class="table-condensed table-responsive" cellpadding="0" cellspacing="0">
            <thead>
            <tr>

                <th scope="col"></th>
                <th scope="col" class="">OBJECTIFS DOSSIERS</th>
                <th>OBJECTIFS PLANS</th>


            </tr>
            </thead>
            <tbody>

            <?php foreach($mois as $moi): ?>

            <tr data-mois="<?= $moi->id ?>">
                <td><?= $moi->name ?></td>
                <td class="dossier" contenteditable=true  ><?= $moi->objectif_dossier ?></td>
                <td class="plan" contenteditable=true  ><?= $moi->objectif_plan ?></td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

        <div class="" style="max-width: 360px; margin: 20px auto">
            <button id="btn-save" class="btn btn-sm btn-success btn-block"><i class="fa fa-save"></i> ENREGISTRER </button>
        </div>
    </div>
</div>

<script>
    var url = "<?= $this->Url->build(['controller'=>'Mois','action'=>'perform']) ?>";
    $('#btn-save').click(function(){
        //console.log('ok ok ok ok ok !!!!');
        var sectors = [];

        $('#tab').find('tbody').find('tr').each(function(){
            var elt={};
            //console.log($(this).data('id'));
            elt.objectif_dossier=$(this).find('td').eq(1).text();
            elt.moi_id=$(this).data('mois');
            elt.objectif_plan=$(this).find('td').eq(2).text();
            sectors.push(elt);
        });

        $.ajax({
            url:url,
            type:'Post',
            dataType:'json',
            data:{sectors:sectors,_csrf:$('#csrf').val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
            },
            success:function(data){
                window.location.href="<?= $this->Url->build(['controller'=>'Mois','action'=>'planning']) ?>"
            }
        });

    });


</script>