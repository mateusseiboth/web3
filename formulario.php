<?php
  if (!isset($noticia)) {
    $noticia = array();
    $noticia['id'] = 0;
    $noticia['titulo'] = "";
    $noticia['descricao'] = "";
    $noticia['autor'] = "";
    $noticia['data'] = "";
    $noticia['categoria'] = "";
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html {
        background-color: gray;
        width: 100%;
      }

      body {
        width: 80%;
        margin: auto;
        background-color: white;
        padding: 2rem;
      }

      label {
        display: block;
      }
      input {
        width: 100%;
        margin-bottom: 1rem;
        padding: 0.25rem;
        font-size: 1.25rem;
      }
      button {
        background-color: lightblue;
        padding: 0.5rem 2rem;
      }
    </style>
  </head>
  <body>
    <h1>Cadastro de Notícia</h1>
    <form action="salvar.php" method="post">
      <label>
        ID:
        <input readonly type="text" name="id" value="<?php echo $noticia['id']; ?>">
      </label>
      <label>
        Titulo:
        <input type="text" name="titulo" value="<?php echo $noticia['titulo']; ?>">
      </label>
      <label>
        Descrição:
        <input type="text" name="descricao" value="<?php echo $noticia['descricao']; ?>">
      </label>
      <label>
        Categoria:
        <input type="text" name="categoria" value="<?php echo $noticia['categoria']; ?>">
      </label>
      <label>
        Data:
        <input type="date" name="data" value="<?php echo $noticia['data']; ?>">
      </label>
      <label>
        Autor:
        <input type="text" name="autor" value="<?php echo $noticia['autor']; ?>">
      </label>
      <button type="submit" name="button">Salvar</button>
    </form>
  </body>
</html>
