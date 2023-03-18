<h1>Visão Geral</h1>
<a class="btn btn-primary" href="<?php echo APP . 'ticket/novo'; ?>">Entrada de veiculo</a>
<div class='row'>
<?php
foreach ($vagas as $vaga) {
  $pathChecar = APP . 'vagas/informacao';
  $vaga['estado'] ? $cor = 'green' : $cor = 'red';

echo "
  <div class='col-sm-2' style='margin-top: 2rem;'>
    <div class='card'>
      <div class='card-body' style='text-align: center;'>
        <h5 class='card-title'>Vaga número {$vaga['id']}</h5>
        <a class='btn' href='$pathChecar/{$vaga['id']}'><i class='bi bi-car-front-fill' style='font-size: 8rem; color: {$cor};'></i></a>
      </div>
    </div>
  </div>
";
}
?>
</div>
