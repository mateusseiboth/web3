<h1>Todos os tickets</h1>
<div class='row'>
    <div>
        <a href="<?php echo APP . 'ticket/novo'; ?>" class="btn btn-success">Novo ticket</a>
    </div>
    <?php
    $pathFechar = APP . 'ticket/encerrar';
    foreach ($tickets as $ticket) {

        echo "
  <div class='col-sm-4 col-md-4 col-lg-4' style='margin-top: 2rem;' onLoad='carregarTema()''>
    <div id='cartao' class='card corzinha'>
        <div class='card-header' style='text-align: center;'>
            <h5 class='card-title'> Ticket #{$ticket['ticket_id']}</h5>
        </div>
        <div class='card-body' style='text-align: center;'>
            <label for='nome' class='form-label'>Vaga número {$ticket['id_vaga']}</label>
            <div class='mb-3'>
                <label for='nome' class='form-label'>Cliente</label>
                <div class='input-group col-md-6 mb-3'>
                    <span class='input-group-text' id='basic-addon1'><i class='bi bi-person-vcard text-success'></i></span>
                    <input type='text' id='nome' class='form-control' placeholder='{$ticket['nome_cliente']}' disabled>
                </div>
            </div>
            <div class='mb-3'>
                <label for='placa' class='form-label'>Placa do Carro</label>
                <div class='input-group col-md-6 mb-3'>
                    <span class='input-group-text' id='basic-addon1'><i class='bi bi-postcard text-success'></i></span>
                    <input type='text' id='placa' class='form-control' placeholder='{$ticket['nome_placa']}' disabled>
                </div>
            </div>
            <div class='mb-3'>
                <label for='preco' class='form-label'>Preço base</label>
                <div class='input-group col-md-6 mb-3'>
                    <span class='input-group-text' id='basic-addon1'><i class='bi bi-currency-bitcoin text-success'></i></span>
                    <input type='text' id='preco' class='form-control' placeholder='{$ticket['preco_tipo']}' disabled>
                </div>
            </div>
            <div class='mb-3'>
                <label for='hora' class='form-label'>Hora de entrada</label>
                <div class='input-group col-md-6 mb-3'>
                    <span class='input-group-text' id='basic-addon1'><i class='bi bi-clock-history text-success'></i></span>
                    <input type='text' id='hora' class='form-control' placeholder='{$ticket['hora_entrada']}' disabled>
                </div>
            </div>
            <div class='mb-3'>
                <label for='hora' class='form-label'>Hora de saida</label>
                <div class='input-group col-md-6 mb-3'>
                    <span class='input-group-text' id='basic-addon1'><i class='bi bi-clock-history text-success'></i></span>
                    <input type='text' id='hora' class='form-control' placeholder='{$ticket['hora_saida']}' disabled>
                </div>
            </div>
            <div class='mb-3'>
                <label for='hora' class='form-label'>Total pago</label>
                <div class='input-group col-md-6 mb-3'>
                    <span class='input-group-text' id='basic-addon1'><i class='bi bi-clock-history text-success'></i></span>
                    <input type='text' id='hora' class='form-control' placeholder='{$ticket['custo']}' disabled>
                </div>
            </div>
            "; ?>
            <?php if (!isset($todos['bol'])) { ?>
                <a class='btn btn-danger' href='<?php echo $pathFechar . '/' . $ticket['ticket_id']; ?>'>Encerrar Ticket</a>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
</div>