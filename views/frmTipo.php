<h1>Manutenção de tipos</h1>

<div class='row'>
  <form action="<?php echo APP . 'tipo/salvar'; ?>" method="post">

    <div class="col-md-1">
      <label for="id" class="form-label">ID</label>
      <div class="input-group col-md-1 mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-vcard text-success"></i></span>
        <input readonly type="text" class="form-control" aria-label="ID" name="id" value="<?php echo $tipo['id']; ?>">
      </div>
    </div>

    <div class="col-md-3">
      <label for="preco" class="form-label">Preço</label>
      <div class="input-group col-md-1 mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-bitcoin text-success"></i></span>
        <input class='form-control col-md-1' type="text" name="preco" value="<?php echo $tipo['preco']; ?>">
      </div>
    </div>
    
    <div class="col-md-6">
      <label for="descr" class="form-label">Descrição</label>
      <div class="input-group col-md-1 mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-blockquote-left text-success"></i></span>
        <input class='form-control col-md-1' type="text" name="descr" value="<?php echo $tipo['descr']; ?>">
      </div>
    </div>
    <button class="btn btn-success" type="submit" name="button">Salvar</button>
  </form>
</div>