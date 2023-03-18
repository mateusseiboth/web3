<h1>Manutenção de tipos</h1>

<div class='row'>
  <form action="<?php echo APP . 'tipo/salvar'; ?>" method="post">
    <div class="col-md-1 mb-1">
      <label for="id" class="form-label">ID</label>
      <input class='form-control' readonly type="text" name="id" value="<?php echo $tipo['id']; ?>">
    </div>
    <div class="col-md-1 mb-1">
      <label for="titulo" class="form-label">Preço</label>
      <input class='form-control' type="text" name="preco" value="<?php echo $tipo['preco']; ?>">
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <input class='form-control' type="text" name="descr" value="<?php echo $tipo['descr']; ?>">
    </div>
    <button class="btn btn-success" type="submit" name="button">Salvar</button>
  </form>
</div>