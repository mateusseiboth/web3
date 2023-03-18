<h1>Detalhes da vaga</h1>
<div class='row'>
  <?php
  echo "
  <div class='col-sm-8' style='margin-top: 2rem;'>
    <div class='card'>
      <div class='card-body' style='text-align: center;'>
        <h5 class='card-title'>Vaga número {$ticket['id_vaga']}</h5>
        <div class='mb-3'>
          <label for='nome' class='form-label'>Cliente</label>
          <input type='text' id='nome' class='form-control' placeholder='{$ticket['nome_cliente']}' disabled>
        </div>
        <div class='mb-3'>
          <label for='nome' class='form-label'>Placa do carro</label>
          <input type='text' id='nome' class='form-control' placeholder='{$ticket['nome_placa']}' disabled>
        </div>
        <div class='mb-3'>
          <label for='nome' class='form-label'>Tipo de cobrança</label>
          <input type='text' id='nome' class='form-control' placeholder='{$ticket['tipo_vaga']}' disabled>
        </div>
        <div class='mb-3'>
          <label for='nome' class='form-label'>Valor</label>
          <input type='text' id='nome' class='form-control' placeholder='{$ticket['preco_tipo']}' disabled>
        </div>
        <div class='mb-3'>
          <label for='nome' class='form-label'>Hora de entrada</label>
          <input type='text' id='nome' class='form-control' placeholder='{$ticket['hora_entrada']}' disabled>
        </div>
      </div>
    </div>
  </div>
";
  ?>
</div>