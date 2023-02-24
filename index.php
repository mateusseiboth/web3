<?php
  include_once "banco.php";
  showError();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
    <h1>Listagem de Notícias</h1>
     <a href="formulario.php">Novo</a>
     <table>
       <thead>
         <tr>
           <th>ID</th>
           <th>Titulo</th>
           <th>Categoria</th>
           <th>Data</th>
           <th>Autor</th>
           <th>Editar</th>
           <th>Excluir</th>
         </tr>
       </thead>
       <tbody>
         <?php
           $noticias = getNoticias();
           foreach ($noticias as $noticia) {

              $data = $noticia['data']? date('d/m/Y', strtotime($noticia['data'])): "";
              echo "
              <tr>
                <td>{$noticia['id']}</td>
                <td>{$noticia['titulo']}</td>
                <td>{$noticia['categoria']}</td>
                <td>$data</td>
                <td>{$noticia['autor']}</td>
                <td><a href='editar.php?id={$noticia['id']}'>+</a></td>
                <td><a href='excluir.php?id={$noticia['id']}'>-</a></td>
              </tr>
              ";
           }
          ?>

       </tbody>
     </table>
  </body>
</html>
