
<div class="risques view large-9 medium-8 columns content">
    <h3><?= h($risque->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($risque->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($risque->id) ?></td>
        </tr>
    </table>

</div>
