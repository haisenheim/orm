
<div class="dossiers form large-9 medium-8 columns content">
    <?= $this->Form->create($dossier) ?>
    <fieldset>
        <legend><?= __('Edit Dossier') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('owner_id');
            echo $this->Form->control('marketer_id');
            echo $this->Form->control('autor_id');
            echo $this->Form->control('produit_id', ['options' => $produits, 'empty' => true]);
            echo $this->Form->control('ca1');
            echo $this->Form->control('ca2');
            echo $this->Form->control('ca3');
            echo $this->Form->control('cout1');
            echo $this->Form->control('cout2');
            echo $this->Form->control('cout3');
            echo $this->Form->control('delai');
            echo $this->Form->control('apport_personnel');
            echo $this->Form->control('apport_associes');
            echo $this->Form->control('emprunt');
            echo $this->Form->control('timmobilisation_id', ['options' => $timmobilisations, 'empty' => true]);
            echo $this->Form->control('mfinancement_id', ['options' => $mfinancements, 'empty' => true]);
            echo $this->Form->control('actions._ids', ['options' => $actions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
