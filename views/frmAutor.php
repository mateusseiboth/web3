<h1>Cadastro de Autor</h1>
<form action="<?php echo APP.'autor/salvar'; ?>" method="post">
  <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input readonly class="form-control" readonly type="text" name="id" value="<?php echo $autor['id']; ?>">
  </div>
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input class="form-control" type="text" name="nome" value="<?php echo $autor['nome']; ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input class="form-control" type="email" name="email" value="<?php echo $autor['email']; ?>">
  </div>

  <button type="submit" name="button">Salvar</button>
</form>
