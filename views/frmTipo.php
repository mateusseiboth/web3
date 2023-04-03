<h1>Manutenção de tipos</h1>

<div class='row'>
  <form action="<?php echo APP . 'tipo/salvar'; ?>" method="post" id="form-tipo" name="form-tipo">

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
        <input required class='form-control col-md-1' type="text" name="preco" value="<?php echo $tipo['preco']; ?>">
        <small id="msgPreco" class="form-text text-danger"></small>
      </div>
    </div>
    
    <div class="col-md-6">
      <label for="descr" class="form-label">Descrição</label>
      <div class="input-group col-md-1 mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-blockquote-left text-success"></i></span>
        <input required class='form-control col-md-1' type="text" name="descr" value="<?php echo $tipo['descr']; ?>">
        <small id="msgDescr" class="form-text text-danger"></small>
      </div>
    </div>
    <button class="btn btn-success" type="submit" name="button">Salvar</button>
  </form>
</div>