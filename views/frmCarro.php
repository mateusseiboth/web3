<?php
// Obtém o tema atual
$_SESSION['tema'] == 'white' ? $tema = 'text-black' : $tema = 'text-white';
var_dump($_SERVER);
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

  <button type="submit" class="btn btn-success">Salvar</button>
</form>

<!-- Tabela de carros -->
<table class="table <?php echo $tema ?>">
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