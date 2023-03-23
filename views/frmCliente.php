<style>
  #form-client {
    padding-top: 40px;
    padding-bottom: 40px;
  }

  h1 {
    text-align: center;
  }
</style>

<h1>
  <i class="bi bi-person-fill"></i>
  <div class="">Clientes</div>
</h1>

<!-- Formulário de inserção/edição de clientes -->
<form method="POST" action="controller.php" id="form-client">
  <input type="hidden" name="action" value="save_cliente">
  <input type="hidden" name="cliente_id" value="">

  <div class="mb-3">
    <label for="nome" class="form-label">Nome:</label>
    <div class="input-group col-mb-3">
      <span class="input-group-text" id="basic-addon1">
        <i class="bi bi-spellcheck"></i>
      </span>
      <input type="text" name="nome" id="nome" class="form-control">
    </div>
  </div>

  <div class="mb-3">
    <label for="cpf" class="form-label">CPF:</label>
    <div class="input-group col-mb-3">
      <span class="input-group-text" id="basic-addon1">
        <i class="bi bi-person-vcard"></i>
      </span>
      <input type="text" name="cpf" id="cpf" class="form-control">
    </div>
  </div>

  <div class="mb-3">
    <label for="telefone" class="form-label">Telefone:</label>
    <div class="input-group col-mb-3">
      <span class="input-group-text" id="basic-addon1">
        <i class="bi bi-telephone"></i>
      </span>
      <input type="text" name="telefone" id="telefone" class="form-control">
    </div>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
</form>

<!-- Tabela de clientes -->
<table class="table tabelinha">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Telefone</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <!-- Linhas da tabela serão preenchidas com dados do banco de dados -->
    <?php
    // Obtém o path para as ações de editar e excluir
    $pathEditar = APP . 'cliente/editar';
    $pathExcluir = APP . 'cliente/excluir';

    // Exibe cada cliente em uma linha da tabela
    foreach ($clientes as $cliente) {
      echo "<tr>";
      echo "<td>{$cliente['id']}</td>";
      echo "<td>{$cliente['nome']}</td>";
      echo "<td>{$cliente['cpf']}</td>";
      echo "<td>{$cliente['telefone']}</td>";
      echo "<td>
              <a href='$pathEditar/{$cliente['id']}' class='btn btn-primary'>Editar</a>
              <a href='$pathExcluir/{$cliente['id']}' class='btn btn-danger'>Excluir</a>
            </td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>