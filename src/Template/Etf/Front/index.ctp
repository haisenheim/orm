<?php
    $colors=['red','yellow','green','white']
?>


<div class="" style="margin-top: 0">
    <input id="_csrfToken" name="_csrfToken" type="hidden" value="<?= $token ?>"/>
    <div class="container-fluid" >
        <div class="">
            <h1 class="page-header text-center" style="background-color: #FFFFFF; font-weight: 900">TABLEAU DE BORD</h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="page-header">DOSSIERS URGENTS</h4>
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>DATE</th>
                                <th>PROPRIETAIRE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($dossiers as $dossier): ?>
                                <tr style="background-color: <?= $colors[$dossier->alerte] ?>">
                                    <td><?= $dossier->name ?></td>
                                    <td><?= $dossier->created ?></td>
                                    <td><?= $dossier->owner?$dossier->owner->name:'-' ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-sm-12 col-lg-6">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="page-header">REPARTITION DOSSIER/PRODUIT</h4>
                        <table class="table table-bordered table-striped table-condensed">
                            <tbody>
                                <?php foreach($results as $k=>$v): ?>
                                    <tr>
                                        <th><?= $k ?></th>
                                        <th class="value"><span class="badge"><?= $v ?></span></th>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div>
                <div id="line-container " style="width: 99%; height: auto; background-color: #FFFFFF; font-weight: 800;">
                    <div class="loader"></div>
                    <canvas id="mycanvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.loader').hide();
        var uri = "<?= $this->Url->build(['controller'=>'Front', 'action'=>'chart']) ?>";
        $.ajax({
            url:uri,
            type:'Post',
            dataType:'json',
            data:{_csrfToken:$('#_csrfToken').val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('#_csrf').val())
                $('.loader').show();
            },
            success : function(data){
                // console.log(data[0]);
                $('.loader').hide();
                var critere = [];
                var valeur = [];

                for (var d in data.results) {

                    console.log(d);

                   critere.push(d);
                   valeur.push(data.results[d]);


                    var chartdata = {
                        labels: critere,
                        datasets : [
                            {
                                label: 'NOMBRE DE DOSSIERS PAR PRODUIT',
                                backgroundColor: 'rgba(202, 220, 240, 0.75)',
                                borderColor: 'rgba(200, 200, 200, 0.75)',
                                hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                data: valeur
                            }
                        ]
                    };


                    var ctx = $("#mycanvas");

                    var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata
                    });



                };
            }
        });
    })
</script>
