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
  <?php
        foreach ($categorias as $categoria) {
          $selected = $categoria['id']==$noticia['categoria_id']?'selected':'';
          echo "<option $selected value='{$categoria['id']}'>{$categoria['descricao']}</option>";
        }
  ?>

  <button type="submit" name="button">Salvar</button>
</form>
