<h3 class="page-header text-center">PARAMETRAGE DES OBJECTIFS DE CREATION DES PLANS D'ACTIONS</h3>
<div class="" style="background-color: #EEEEEE; padding: 10px">
    <div class="" style="background-color: #FFFFFF; max-width: 85%; margin: 10px auto; padding-bottom: 30px; ">
        <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>

        <table id="tab" class="table-condensed table-responsive" cellpadding="0" cellspacing="0">
            <thead>
            <tr>

                <th scope="col"></th>
                <th scope="col" class="">JAN.</th>
                <th>FEV.</th>
                <th>MARS</th>
                <th>AVRIL</th>
                <th>MAI</th>
                <th>JUIN</th>
                <th>JUIL.</th>
                <th>AOUT</th>
                <th>SEPT.</th>
                <th>OCT.</th>
                <th>NOV.</th>
                <th>DEC.</th>

            </tr>
            </thead>
            <tbody>

                <tr>

                    <td>OBJECTIFS</td>
                    <td class="ok" contenteditable=true data-mois="1" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="2" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="3" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="4" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="5" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="6" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="7" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="8" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="9" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="10" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="11" data-id="<?= $sector->id ?>"></td>
                    <td class="ok" contenteditable=true data-mois="12" data-id="<?= $sector->id ?>"></td>


                </tr>

            </tbody>
        </table>

        <div class="" style="max-width: 360px; margin: 20px auto">
            <button id="btn-save" class="btn btn-sm btn-success btn-block"><i class="fa fa-save"></i> ENREGISTRER </button>
        </div>
    </div>
</div>

<script>
    var url = "<?= $this->Url->build(['controller'=>'Plans','action'=>'perform']) ?>";
    $('#btn-save').click(function(){
        //console.log('ok ok ok ok ok !!!!');
        var sectors = [];

        $('#tab').find('tbody').find('.ok').each(function(){
            var elt={};
            //console.log($(this).data('id'));
           elt.sector_id=$(this).data('id');
            elt.moi_id=$(this).data('mois');
            elt.value=$(this).text();
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
                window.location.href="<?= $this->Url->build(['controller'=>'Front','action'=>'index']) ?>"
            }
        });

    });


</script>