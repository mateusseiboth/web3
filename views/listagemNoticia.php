<h1>Listagem de Noticias</h1>
 <a class='btn btn-primary' href="<?php echo APP.'noticia/novo'; ?>">Novo</a>
 <table class='table table-bordered table-striped'>
   <thead>
     <tr>
       <th>ID</th>
       <th>Título</th>
       <th>Autor</th>
       <th>Data</th>
       <th>Categoria</th>
       <th></th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     <?php
       foreach ($noticias as $noticia) {
          $pathEditar = APP.'noticia/editar';
          $pathExcluir = APP.'noticia/excluir';
          $data = $noticia['data']!=''?
            date('d/m/Y', strtotime($noticia['data'])): '';

          echo "
          <tr>
            <td>{$noticia['id']}</td>
            <td>{$noticia['titulo']}</td>
            <td>{$noticia['autor']}</td>
            <td>$data</td>
            <td>{$noticia['categoria_descricao']}</td>
            <td><a class='btn btn-primary' href='$pathEditar/{$noticia['id']}'>+</a></td>
            <td><a class='btn btn-danger' href='$pathExcluir/{$noticia['id']}'>-</a></td>
          </tr>
          ";
       }
      ?>

   </tbody>
 </table>
