<style>
  h1 {
    text-align: center;
  }
</style>

<h1>
  <i class="bi bi-person-fill" style="font-size: 3rem"></i>
  <div class="">Clientes</div>
</h1>

<!-- Tabela de clientes -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Novo cliente
</button>
<table class="table tabelinha" style="text-align: center; margin-top: 2em;">
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
    $pathEditar = APP . 'cliente/salvar';
    $pathExcluir = APP . 'cliente/excluir';

    // Exibe cada cliente em uma linha da tabela
    foreach ($clientes as $cliente) {
      echo "<tr>";
      echo "<td>{$cliente['id']}</td>";
      echo "<td>{$cliente['nome']}</td>";
      echo "<td>{$cliente['cpf']}</td>";
      echo "<td>{$cliente['telefone']}</td>";
      echo "<td>
              <button type='button' class='btn btn-primary btn-editar' data-bs-toggle='modal' data-bs-target='#myModal' 
                data-id='{$cliente['id']}' data-nome='{$cliente['nome']}' data-cpf='{$cliente['cpf']}' data-telefone='{$cliente['telefone']}''>
                Editar
              </button>   
              <a href='$pathExcluir/{$cliente['id']}' class='btn btn-danger'>Excluir</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Inserir Novo Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">

        <!-- Formulário de inserção/edição de clientes -->
        <form method="POST" action="<?php echo APP . 'cliente/salvar'; ?>" id="form-client">
          <input type="hidden" name="action" value="save_cliente">
          <input type="hidden" name="id" value="">

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

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar mudanças</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<script>
  var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
    keyboard: false
  })
  myModal.show()
</script>

<script>
  const btnEditar = document.querySelectorAll('.btn-editar');
  const formClient = document.querySelector('#form-client');
  const inputId = document.querySelector('input[name=id]');
  const inputNome = document.querySelector('input[name=nome]');
  const inputCpf = document.querySelector('input[name=cpf]');
  const inputTelefone = document.querySelector('input[name=telefone]');

  btnEditar.forEach(btn => {
    btn.addEventListener('click', () => {
      inputId.value = btn.dataset.id;
      inputNome.value = btn.dataset.nome;
      inputCpf.value = btn.dataset.cpf;
      inputTelefone.value = btn.dataset.telefone;
    });
  });
</script>