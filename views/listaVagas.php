<h1>Visão Geral</h1>
<a class="btn btn-primary" href="<?php echo APP . 'ticket/novo'; ?>">Entrada de veiculo</a>
<div class='row'>
<?php
foreach ($vagas as $vaga) {
  $pathEditar = APP . 'autor/editar';
  $pathExcluir = APP . 'autor/excluir';

echo "
  <div class='col-sm-4' style='margin-top: 2rem;'>
    <div class='card'>
      <div class='card-body' style='text-align: center;'>
        <h5 class='card-title'>Vaga número {$vaga['id']}</h5>
        <button class='btn'><i class='bi bi-car-front-fill' style='font-size: 8rem; color: green;'></i></button>
      </div>
    </div>
  </div>
";
}
?>
</div>
