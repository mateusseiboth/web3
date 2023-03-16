<h1>Cadastro de Categoria</h1>
<form action="<?php echo APP.'categoria/salvar'; ?>" method="post">
  <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input readonly class="form-control" readonly type="text" name="id" value="<?php echo $categoria['id']; ?>">
  </div>
  <div class="mb-3">
    <label for="id" class="form-label">Descrição</label>
    <input class="form-control" type="text" name="descricao" value="<?php echo $categoria['descricao']; ?>">
  </div>
  <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>
