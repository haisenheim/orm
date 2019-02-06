<h5>Nouveau moyen de financement</h5>
<div class="mfinancements form large-9 medium-8 columns content">
    <?= $this->Form->create($mfinancement) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
