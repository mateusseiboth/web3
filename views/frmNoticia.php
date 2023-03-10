<h1>Cadastro de Noticia</h1>
<form action="<?php echo APP.'noticia/salvar'; ?>" method="post">
  <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input class='form-control' readonly type="text" name="id" value="<?php echo $noticia['id']; ?>">
  </div>
  <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input class='form-control' type="text" name="titulo" value="<?php echo $noticia['titulo']; ?>">
  </div>
  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <input class='form-control' type="text" name="descricao" value="<?php echo $noticia['descricao']; ?>">
  </div>
  <div class="mb-3">
    <label for="autor" class="form-label">Autor</label>
    <input class='form-control' type="text" name="autor" value="<?php echo $noticia['autor']; ?>">
  </div>
  <div class="mb-3">
    <label for="autor" class="form-label">Data</label>
    <input class='form-control' type="date" name="data" value="<?php echo $noticia['data']; ?>">
  </div>
  <div class="mb-3">
    <label for="autor" class="form-label">Categoria</label>
    <select class="form-select" name="categoria_id" >
      <?php
        foreach ($categorias as $categoria) {
          $selected = $categoria['id']==$noticia['categoria_id']?'selected':'';
          echo "<option $selected value='{$categoria['id']}'>{$categoria['descricao']}</option>";
        }
       ?>
    </select>
  </div>
  <button class="btn-btn-primary" type="submit" name="button">Salvar</button>
</form>
