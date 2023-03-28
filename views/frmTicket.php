<style>
  h1 {
    text-align: center;
  }
</style>

<h1>
  <i class="bi bi-car-front-fill" style="font-size: 3rem"></i>
  <div class="">Adição de ticket</div>
</h1>
<!-- Criação da modal -->
  
    <div class="modal-content corzinha">
      <div class="modal-body">

        <!-- Formulário de inserção ticket -->
        <form method="POST" action="<?php echo APP . 'ticket/create'; ?>" id="form-car">
          <input type="hidden" name="action" value="save_car">
          <input type="hidden" name="id" value="">
          <div class="mb-3">

            <label for="placa" class="form-label">Placa do Carro:</label>
            <div class="input-group col-mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="bi bi-car-front"></i>
              </span>
              <select name="carro_id" class="form-select" aria-label="cliente_id">
                <option selected name='cliente_id' value='-1'>Selecione um carro</option>
                <?php foreach ($carros as $carro): ?>
                  <option name='carro_id' value='<?= $carro['id'] ?>'><?= $carro['placa'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de estadia:</label>
            <div class="input-group col-mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="bi bi-clock"></i>
              </span>
              <select name="tipo_id" class="form-select" aria-label="tipo">
                <option selected name='tipo_id' value='-1'>Selecione o tipo de estadia</option>
                <?php foreach ($tipos as $tipo): ?>
                  <option name='tipo_id' value='<?= $tipo['id'] ?>'><?= $tipo['descr'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="tipo" class="form-label">Selecione a vaga</label>
            <div class="input-group col-mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="bi bi-p-circle"></i>
              </span>
              <select name="vaga_id" class="form-select" aria-label="vaga">
                <option selected name='vaga_id' value='-1'>Selecione a vaga</option>
                <?php foreach ($vagas as $vaga): ?>
                  <option name='vaga_id' value='<?= $vaga['id'] ?>'><?= $vaga['id'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="modal-footer">
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