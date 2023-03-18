<h1>Controle de espaço e preços</h1>
<div class='row'>
<?php
// #INICIO Mateus Seiboth (18/03/2023)
  $vagaApagar = APP . 'vaga/deletar';
  $tipoApagar = APP . 'tipo/deletar';
  $tipoEditar = APP . 'tipo/editar';
  $tipoNovo = APP . 'tipo/novo';
  $vagaNova = APP . 'vaga/nova';
echo "
  <div class='col-lg-6 col-md-6 col-sm-12'>
    <table class='table'>
        <thead>
      <tr>
        <th scope='col'><a class='btn btn-success' href='$vagaNova'>Nova vaga</a></th>
        <th scope='col'>Código da Vaga</th>
        <th scope='col'>Opções</th>
      </tr>
    </thead>
    <tbody>";
    foreach ($vagas as $vaga) {
      echo "
      <tr>
        <td></td>
        <td>{$vaga['id']}</td>
        <td><a class='btn btn-danger' href='$vagaApagar/{$vaga['id']}'>Excluir</a></td>
      </tr>
    "; }
    echo "
    </tbody>

    </table>
  </div>
    ";
    // Aqui é o formulário para adicionar um novo tipo de vaga 
    echo "
  <div class='col-lg-6 col-md-6 col-sm-12'>
    <table class='table'>
        <thead>
      <tr>
      <th scope='col'><a class='btn btn-success' href='$tipoNovo'>Novo Tipo</a></th>
        <th scope='col'>Código</th>
        <th scope='col'>Valor</th>
        <th scope='col'>Descrição</th>
        <th scope='col'>Opções</th>
      </tr>
    </thead>
    <tbody>";
    foreach ($tipos as $tipo) {
      echo "
      <tr>
      <td></td>
        <td>{$tipo['id']}</td>
        <td>{$tipo['preco']}</td>
        <td>{$tipo['descr']}</td>
        <td>
        <a class='btn btn-danger' href='$tipoApagar/{$tipo['id']}'>Excluir</a>
        <a class='btn btn-primary' href='$tipoEditar/{$tipo['id']}'>Editar</a>
        </td>
      </tr>
    "; }
    echo "
    </tbody>

    </table>
  </div>
";
// #FIM Mateus Seiboth (18/03/2023)
?>
</div>
