<h1>Visão Geral</h1>
<a class="btn btn-primary" href="<?php echo APP . 'ticket/novo'; ?>">Entrada de veiculo</a>
<div class='row'>
<?php
foreach ($vagas as $vaga) {
  $_SESSION['tema'] == 'white' ? $tema='bg-light' : $tema='bg-dark';

  $pathChecar = APP . 'ticket/informacao';
  $vaga['estado'] ? $cor = 'green' : $cor = 'red';
  
  echo "
  <div class='col-sm-2 d-flex align-items-stretch' style='margin-top: 2rem;'>
    <div class='card $tema'>
      <div class='card-header' style='text-align: center;'>
        <h5 class='card-title'>Vaga Número #{$vaga['id']}</h5>
      </div>
      <div class='card-body' style='text-align: center'>
        <a class='btn' href='$pathChecar/{$vaga['id']}'><i class='bi bi-car-front-fill' style='font-size: 4rem; color: {$cor};'></i></a>
      </div>
    </div>
  </div>
";
}
?>
</div>
