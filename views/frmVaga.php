<h1>Detalhes da vaga</h1>
<div class='row'>
  <?php
  if (isset($ticket['ticket_id'])) {
    echo "
  <div class='col-sm-8' style='margin-top: 2rem;' onLoad='carregarTema()''>
    <div id='cartao' class='card-dark'>
      <div class='card-body' style='text-align: center;'>
        <h5 class='card-title'>Vaga número {$ticket['id_vaga']}</h5>
        <div class='mb-1'>
          <label for='nome' class='form-label'>Ticket vinculado #{$ticket['ticket_id']}</label>
        </div>
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
      </div>
    </div>
  </div>
";
  } else {
    echo "<h1>Vaga Livre</h1>";
  }
  ?>
</div>