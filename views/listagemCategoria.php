<h1>Listagem de Categorias</h1>
 <a class="btn btn-primary" href="<?php echo APP.'categoria/novo'; ?>">Novo</a>
 <table class="table table-bordered table-striped">
   <thead>
     <tr>
       <th>ID</th>
       <th>Descrição</th>
       <th></th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     <?php
       foreach ($categorias as $categoria) {
          $pathEditar = APP.'categoria/editar';
          $pathExcluir = APP.'categoria/excluir';

          echo "
          <tr>
            <td>{$categoria['id']}</td>
            <td>{$categoria['descricao']}</td>
            <td><a class='btn btn-primary' href='$pathEditar/{$categoria['id']}'>+</a></td>
            <td><a class='btn btn-danger' href='$pathExcluir/{$categoria['id']}'>-</a></td>
          </tr>
          ";
       }
      ?>

   </tbody>
 </table>
