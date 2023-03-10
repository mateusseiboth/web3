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
    <h1>Cadastro de Autor</h1>
    <form action="<?php echo APP.'autor/salvar'; ?>" method="post">
      <label>
        ID:
        <input readonly type="text" name="id" value="<?php echo $autor['id']; ?>">
      </label>
      <label>
        Nome:
        <input type="text" name="nome" value="<?php echo $autor['nome']; ?>">
      </label>
      <label>
        E-mail:
        <input type="email" name="email" value="<?php echo $autor['email']; ?>">
      </label>
      <button type="submit" name="button">Salvar</button>
    </form>
  </body>
</html>
