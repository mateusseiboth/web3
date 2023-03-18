<h1>Detalhes da vaga</h1>
<div class='row'>
  <?php
  echo "
  <div class='col-sm-8' style='margin-top: 2rem;'>
    <div class='card'>
      <div class='card-body' style='text-align: center;'>
        <h5 class='card-title'>Vaga número {$vaga['id_vaga']}</h5>
        <input type='text' class='form-control' value='{$vaga['nome_cliente']}' disabled>
        <input type='text' class='form-control' value='{$vaga['nome_placa']}' disabled>
        <input type='text' class='form-control inline' value='{$vaga['tipo_vaga']}' disabled>        
        <input type='text' class='form-control inline' value='{$vaga['preco_tipo']}' disabled>
        <input type='text' class='form-control' value='{$vaga['hora_entrada']}' disabled>
      </div>
    </div>
  </div>
";
  ?>
</div>