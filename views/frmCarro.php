<?php
// Obtém o tema atual
//var_dump($_SERVER);
?>

<style>
  #form-car {
    padding-top: 40px;
    padding-bottom: 40px;
  }

  h1 {
    text-align: center;
  }
</style>

<h1>
  <i class="bi bi-car-front-fill"></i>
  <div class="">Carros</div>
</h1>

<!-- Formulário de inserção/edição de carros -->


<!-- Tabela de carros -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Novo carro
</button>
<table class="table tabelinha">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Placa</th>
      <th scope="col">ID do cliente</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <!-- Linhas da tabela serão preenchidas com dados do banco de dados -->
    <?php
    // Obtém o path para as ações de editar e excluir
    $pathEditar = APP . 'carro/editar';
    $pathExcluir = APP . 'carro/excluir';

    // Exibe cada carro em uma linha da tabela
    foreach ($carros as $carro) {
      echo "<tr>";
      echo "<td>{$carro['id']}</td>";
      echo "<td>{$carro['placa']}</td>";
      echo "<td>{$carro['cliente_id']}</td>";
      echo "<td>
              <a href='$pathEditar/{$carro['id']}' class='btn btn-primary'>Editar</a>
              <a href='$pathExcluir/{$carro['id']}' class='btn btn-danger'>Excluir</a>
            </td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

<!-- Criação da modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content corzinha">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título da Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="controller.php" id="form-car">
          <input type="hidden" name="action" value="save_car">
          <input type="hidden" name="car_id" value="">

          <div class="mb-3">
            <label for="placa" class="form-label">Placa:</label>
            <div class="input-group col-mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="bi bi-car-front"></i>
              </span>
              <input type="text" name="placa" id="placa" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label for="cliente_id" class="form-label">Nome do Cliente:</label>
            <div class="input-group col-mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="bi bi-person-vcard"></i>
              </span>
              <select name="cliente_id" class="form-select" aria-label="cliente_id">
                <option selected name='cliente_id' value='-1'>Sem cadastro</option>
                <?php foreach ($clientes as $cliente) {
                  echo "<option name='cliente_id' value='{$cliente['id']}'>{$cliente['id']} - {$cliente['nome']}</option>";
                } ?>
              </select>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>

      </div>
      </form>
    </div>
  </div>
</div>

<script>
  var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
    keyboard: false
  })
  myModal.show()
</script>