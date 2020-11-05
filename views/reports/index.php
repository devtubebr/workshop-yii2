<?php
/** @var array $data */
?>

<h1>Relatorio de contas</h1>
<?php foreach($data as $date => $bills):?>

    <h2><?= $date ?></h2>

    <table class="table table-striped table-bordered">
        <thead>
        <tr class="">
            <td>Data</td>
            <td>Descrição</td>
            <td>Valor</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($bills as $bill):?>
            <tr>
                <td><?= $bill->date ?></td>
                <td><?= $bill->description ?></td>
                <td><?= $bill->amount ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php endforeach;?>
