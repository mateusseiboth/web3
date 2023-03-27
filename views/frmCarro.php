<style>
  h1 {
    text-align: center;
  }
</style>

<h1>
  <i class="bi bi-car-front-fill" style="font-size: 3rem"></i>
  <div class="">Carros</div>
</h1>

<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>
  Novo carro
</button>

<table class="table tabelinha" style="text-align: center; margin-top: 2em;">
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
    $pathEditar = APP . 'carro/salvar';
    $pathExcluir = APP . 'carro/excluir'; // Exibe cada carro em uma linha da tabela
    
    foreach ($carros as $carro) {
      echo "<tr>";
      echo "<td>{$carro['id']}</td>";
      echo "<td>{$carro['placa']}</td>";
      echo "<td>{$carro['cliente_id']}</td>";
      echo "<td>
              <button type='button' class='btn btn-primary btn-editar' data-bs-toggle='modal' data-bs-target='#myModal' data-id='{$carro['id']}' data-placa='{$carro['placa']}' data-cliente_id='{$carro['cliente_id']}'>
                Editar
              </button>    
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
        <h5 class="modal-title" id="exampleModalLabel">Inserir Novo Carro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">

        <!-- Formulário de inserção carros -->
        <form method="POST" action="<?php echo APP . 'carro/salvar'; ?>" id="form-car">
          <input type="hidden" name="action" value="save_car">
          <input type="hidden" name="id" value="">
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
                <?php foreach ($clientes as $cliente): ?>
                  <option name='cliente_id' value='<?= $cliente['id'] ?>'><?= $cliente['id'] ?> - <?= $cliente['nome'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
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
  });
  myModal.show();
</script>

<script>
  const btnEditar = document.querySelectorAll('.btn-editar');
  const formCar = document.querySelector('#form-car');
  const inputId = document.querySelector('input[name=id]');
  const inputPlaca = document.querySelector('input[name=placa]');
  const selectCliente = document.querySelector('select[name=cliente_id]');

  btnEditar.forEach(btn => {
    btn.addEventListener('click', () => {
      inputId.value = btn.dataset.id;
      inputPlaca.value = btn.dataset.placa;

      // seleciona a opção do cliente correspondente ao carro a ser editado
      const option = selectCliente.querySelector(`option[value='${btn.dataset.cliente_id}']`);
      option.selected = true;
    });
  });
</script>