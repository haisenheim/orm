<h5 class="page-header">Modification du type d'actif ciculant</h5>
<div class="timmobilisations form large-9 medium-8 columns content">
    <?= $this->Form->create($actif) ?>
    <fieldset>

        <?php
            echo $this->Form->control('name',['label'=>'NOM :']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
