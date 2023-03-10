<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo APP; ?>views/estilo.css">
  </head>
  <body>
    <h1>Listagem de Autores</h1>
     <a href="<?php echo APP.'autor/novo'; ?>">Novo</a>
     <table>
       <thead>
         <tr>
           <th>ID</th>
           <th>Nome</th>
           <th>Email</th>
           <th></th>
           <th></th>
         </tr>
       </thead>
       <tbody>
         <?php
           foreach ($autores as $autor) {
              $pathEditar = APP.'autor/editar';
              $pathExcluir = APP.'autor/excluir';

              echo "
              <tr>
                <td>{$autor['id']}</td>
                <td>{$autor['nome']}</td>
                <td>{$autor['email']}</td>
                <td><a href='$pathEditar/{$autor['id']}'>+</a></td>
                <td><a href='$pathExcluir/{$autor['id']}'>-</a></td>
              </tr>
              ";
           }
          ?>

       </tbody>
     </table>
  </body>
</html>
