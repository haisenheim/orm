<h3 class="page-header text-center">PLANNING DE CREATION DES PLANS D'ACTION</h3>
<div class="" style="">
    <div class="" style=" ">
        <a href="<?= $this->Url->build(['controller'=>'Plans','action'=>'planifier']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> EDITER</a>
        <input type="hidden" id="csrf" name="_csrfToken" value="<?= $token ?>"/>

        <table id="tab" class="table-condensed table-responsive" cellpadding="0" cellspacing="0">
            <thead>
            <tr>

                <th scope="col">NOM</th>
                <th >JAN.</th>
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
            <?php foreach ($mp as $k=>$values): ?>
                <tr>
                    <td><?= $k ?></td>

                    <?php foreach($values as $value): ?>
                    <?php if($value->moi_id == 1): ?>
                    <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==1?$value->objectif:0 ?></td>
                    <?php else: ?>
                            <?php if($value->moi_id == 2): ?>
                                <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==2?$value->objectif:0 ?></td>

                                <?php else: ?>
                                <?php if($value->moi_id == 3): ?>
                                    <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==3?$value->objectif:0 ?></td>
                                    <?php else: ?>
                                    <?php if($value->moi_id == 4): ?>
                                        <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==4?$value->objectif:0 ?></td>
                                        <?php else: ?>
                                        <?php if($value->moi_id == 5): ?>
                                            <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==5?$value->objectif:0 ?></td>
                                            <?php else: ?>
                                            <?php if($value->moi_id == 6): ?>
                                                <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==6?$value->objectif:0 ?></td>
                                                <?php else: ?>
                                                <?php if($value->moi_id == 7): ?>
                                                    <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==7?$value->objectif:0 ?></td>
                                                    <?php else: ?>
                                                    <?php if($value->moi_id == 8): ?>
                                                        <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==8?$value->objectif:0 ?></td>
                                                        <?php else: ?>
                                                        <?php if($value->moi_id == 9): ?>
                                                            <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==9?$value->objectif:0 ?></td>
                                                            <?php else: ?>
                                                            <?php if($value->moi_id == 10): ?>
                                                                <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==10?$value->objectif:0 ?></td>
                                                                <?php else: ?>
                                                                <?php if($value->moi_id == 11): ?>
                                                                    <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==11?$value->objectif:0 ?></td>
                                                                    <?php else: ?>
                                                                    <?php if($value->moi_id == 12): ?>
                                                                        <td class="ok" contenteditable=true data-mois="1" ><?= $value->moi_id==12?$value->objectif:0 ?></td>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                 <?php endif; ?>

                            <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

